const canvas = document.getElementById('gameCanvas');
const ctx = canvas.getContext('2d');

let player = {
    x: canvas.width / 2,
    y: canvas.height - 30,
    width: 50,
    height: 10,
    color: 'blue',
    speed: 5
};

let bullets = [];
let stones = [];
let score = 0;

function drawPlayer() {
    ctx.fillStyle = player.color;
    ctx.fillRect(player.x, player.y, player.width, player.height);
}

function drawBullets() {
    ctx.fillStyle = 'red';
    bullets.forEach(bullet => {
        ctx.fillRect(bullet.x, bullet.y, bullet.width, bullet.height);
    });
}

function drawStones() {
    ctx.fillStyle = 'gray';
    stones.forEach(stone => {
        ctx.fillRect(stone.x, stone.y, stone.width, stone.height);
    });
}

function movePlayer() {
    document.addEventListener('keydown', function(event) {
        if (event.key === 'ArrowLeft' && player.x > 0) {
            player.x -= player.speed;
        } else if (event.key === 'ArrowRight' && player.x + player.width < canvas.width) {
            player.x += player.speed;
        }
    });
}

function shootBullet() {
    document.addEventListener('keydown', function(event) {
        if (event.key === ' ') {
            bullets.push({
                x: player.x + player.width / 2 - 2.5,
                y: player.y - 10,
                width: 5,
                height: 10,
                speed: 7
            });
        }
    });
}

function updateBullets() {
    bullets.forEach((bullet, index) => {
        bullet.y -= bullet.speed;
        if (bullet.y + bullet.height < 0) {
            bullets.splice(index, 1);
        }
    });
}

function createStone() {
    stones.push({
        x: Math.random() * (canvas.width - 30),
        y: 0,
        width: 30,
        height: 30,
        speed: 3
    });
}

function updateStones() {
    stones.forEach((stone, index) => {
        stone.y += stone.speed;
        if (stone.y > canvas.height) {
            stones.splice(index, 1);
            score -= 10; // Taş yere düşerse puan azalır
        }
    });
}

function checkCollisions() {
    stones.forEach((stone, sIndex) => {
        bullets.forEach((bullet, bIndex) => {
            if (bullet.x < stone.x + stone.width &&
                bullet.x + bullet.width > stone.x &&
                bullet.y < stone.y + stone.height &&
                bullet.y + bullet.height > stone.y) {
                bullets.splice(bIndex, 1);
                stones.splice(sIndex, 1);
                score += 10;
            }
        });
    });
}

function drawScore() {
    ctx.fillStyle = 'black';
    ctx.font = '20px Arial';
    ctx.fillText('Score: ' + score, 10, 20);
}

function gameLoop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawPlayer();
    drawBullets();
    drawStones();
    drawScore();
    updateBullets();
    updateStones();
    checkCollisions();
    requestAnimationFrame(gameLoop);
}

movePlayer();
shootBullet();
setInterval(createStone, 1000);
gameLoop();



