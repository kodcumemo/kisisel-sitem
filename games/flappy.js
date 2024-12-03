const canvas = document.getElementById("gameCanvas");
const ctx = canvas.getContext("2d");

const width = window.innerWidth > 600 ? 600 : window.innerWidth;
const height = window.innerHeight > 800 ? 800 : window.innerHeight;

canvas.width = width;
canvas.height = height;

const bird = {
    x: 50,
    y: height / 2,
    size: 20,
    gravity: 0.3,
    lift: -7,
    velocity: 0
};

const pipes = [];
const pipeWidth = 50;
const pipeGap = 150;
let frame = 0;
let score = 0;

function drawBird() {
    ctx.fillStyle = "yellow";
    ctx.beginPath();
    ctx.arc(bird.x, bird.y, bird.size, 0, Math.PI * 2);
    ctx.closePath();
    ctx.fill();
}

function drawPipes() {
    ctx.fillStyle = "green";
    pipes.forEach(pipe => {
        ctx.fillRect(pipe.x, 0, pipeWidth, pipe.top);
        ctx.fillRect(pipe.x, pipe.top + pipeGap, pipeWidth, height - pipe.top - pipeGap);
    });
}

function updateBird() {
    bird.velocity += bird.gravity;
    bird.y += bird.velocity;

    if (bird.y + bird.size > height || bird.y - bird.size < 0) {
        resetGame();
    }
}

function updatePipes() {
    if (frame % 100 === 0) {
        const top = Math.random() * (height - pipeGap - 100) + 50;
        pipes.push({ x: width, top });
    }

    pipes.forEach(pipe => {
        pipe.x -= 3;
    });

    if (pipes.length > 0 && pipes[0].x + pipeWidth < 0) {
        pipes.shift();
        score++;
    }
}

function checkCollision() {
    pipes.forEach(pipe => {
        if (
            bird.x + bird.size > pipe.x &&
            bird.x - bird.size < pipe.x + pipeWidth &&
            (bird.y - bird.size < pipe.top || bird.y + bird.size > pipe.top + pipeGap)
        ) {
            resetGame();
        }
    });
}

function resetGame() {
    bird.y = height / 2;
    bird.velocity = 0;
    pipes.length = 0;
    score = 0;
    frame = 0;
}

function drawScore() {
    ctx.fillStyle = "black";
    ctx.font = "20px Arial";
    ctx.fillText(`Score: ${score}`, 10, 30);
}

canvas.addEventListener("click", () => {
    bird.velocity = bird.lift;
});

function gameLoop() {
    ctx.clearRect(0, 0, width, height);

    drawBird();
    drawPipes();
    drawScore();

    updateBird();
    updatePipes();
    checkCollision();

    frame++;
    requestAnimationFrame(gameLoop);
}

gameLoop();
