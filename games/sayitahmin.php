
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        #game {
            text-align: center;
        }
        input, button {
            padding: 10px;
            margin: 10px;
        }
    </style>

    <div id="game">
        <h1>Tahmin Etme Oyunu</h1>
        <p>1 ile 100 arasında bir sayı tahmin edin.</p>
        <input type="number" id="guessInput" placeholder="Tahmininizi girin">
        <button onclick="checkGuess()">Tahmin Et</button>
        <p id="message"></p>
    </div>

    <script>
        let randomNumber = Math.floor(Math.random() * 100) + 1;
        let attempts = 0;

        function checkGuess() {
            let userGuess = document.getElementById('guessInput').value;
            let message = document.getElementById('message');
            attempts++;

            if (userGuess == randomNumber) {
                message.innerHTML = `Tebrikler! Doğru tahmin ettiniz. Sayı ${randomNumber} idi. Toplam deneme sayısı: ${attempts}`;
                message.style.color = 'green';
                resetGame();
            } else if (userGuess > randomNumber) {
                message.innerHTML = 'Daha küçük bir sayı deneyin.';
                message.style.color = 'red';
            } else {
                message.innerHTML = 'Daha büyük bir sayı deneyin.';
                message.style.color = 'red';
            }
        }

        function resetGame() {
            randomNumber = Math.floor(Math.random() * 100) + 1;
            attempts = 0;
            document.getElementById('guessInput').value = '';
        }
    </script>
