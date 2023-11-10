document.addEventListener('DOMContentLoaded', function () {
    const cells = document.querySelectorAll('.cell');
    const statusElement = document.getElementById('status');
    const resetButton = document.getElementById('reset');
    const toggleDarkModeButton = document.getElementById('toggleDarkMode');
    const body = document.body;

    let currentPlayer = 'S';
    let gameBoard = ['', '', '', '', '', '', '', '', ''];
    let gameActive = true;
    let darkMode = false;

    function checkWinner() {
        const winPatterns = [
            [0, 1, 2], [3, 4, 5], [6, 7, 8], // Rows
            [0, 3, 6], [1, 4, 7], [2, 5, 8], // Columns
            [0, 4, 8], [2, 4, 6]             // Diagonals
        ];

        for (let pattern of winPatterns) {
            const [a, b, c] = pattern;
            if (gameBoard[a] !== '' && gameBoard[a] === gameBoard[b] && gameBoard[a] === gameBoard[c]) {
                return gameBoard[a];
            }
        }

        if (!gameBoard.includes('')) {
            return 'T'; // Tie
        }

        return null; // No winner yet
    }

    function updateStatus() {
        const winner = checkWinner();

        if (winner) {
            gameActive = false;
            if (winner === 'T') {
                statusElement.textContent = 'GAME SERI!';
            } else {
                statusElement.textContent = `Player ${winner} Menang!`;
            }
        } else {
            statusElement.textContent = `Giliran Player: ${currentPlayer}`;
            statusElement.style.color = currentPlayer === 'S' ? 'white' : 'aliceblue'; // Ubah warna teks sesuai giliran player
        }
    }

    function handleCellClick(index) {
        if (gameBoard[index] === '' && gameActive) {
            gameBoard[index] = currentPlayer;
            cells[index].textContent = currentPlayer;
            currentPlayer = currentPlayer === 'S' ? 'O' : 'S';
            updateStatus();
        }
    }

    function resetGame() {
        gameBoard = ['', '', '', '', '', '', '', '', ''];
        currentPlayer = 'S';
        gameActive = true;

        cells.forEach(cell => {
            cell.textContent = '';
            cell.classList.remove('dark-mode'); // Remove dark mode class when resetting
        });

        statusElement.textContent = 'Giliran Player: S  ';
    }

    function toggleDarkMode() {
        darkMode = !darkMode;
        body.classList.toggle('dark-mode', darkMode);
        updateDarkModeCells();
    }

    function updateDarkModeCells() {
        cells.forEach(cell => {
            cell.classList.toggle('dark-mode', darkMode);
        });
    }

    cells.forEach((cell, index) => {
        cell.addEventListener('click', () => {
            handleCellClick(index);
        });
    });

    resetButton.addEventListener('click', resetGame);

    toggleDarkModeButton.addEventListener('click', toggleDarkMode);
});
