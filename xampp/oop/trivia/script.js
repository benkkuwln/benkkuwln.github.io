const apiUrl = 'api.php';
let currentQuestion;
let correctAnswers = 0;
let totalQuestions = 0;

async function fetchQuestion() {
    const response = await fetch(apiUrl);
    const data = await response.json();
    currentQuestion = data;

    document.getElementById('question').innerHTML = currentQuestion.question;

    const optionsContainer = document.getElementById('options');
    optionsContainer.innerHTML = '';

    // Shuffles the order of incorrect answers and correct answer
    const shuffledOptions = [...currentQuestion.incorrect_answers, currentQuestion.correct_answer].sort(() => Math.random() - 0.5);

    shuffledOptions.forEach((option) => {
        const button = document.createElement('button');
        button.innerText = option;
        button.addEventListener('click', () => checkAnswer(option));
        optionsContainer.appendChild(button);
    });

    totalQuestions++;
}

function checkAnswer(selectedAnswer) {
    const resultContainer = document.getElementById('result');
    if (selectedAnswer === currentQuestion.correct_answer) {
        correctAnswers++;
        resultContainer.innerText = 'Correct!';
    } else {
        resultContainer.innerText = 'Wrong! The correct answer is: ' + currentQuestion.correct_answer;
    }

    // Check if it's the last question
    if (totalQuestions === 10) {
        showFinalScore();
    } else {
        // Fetch a new question after a delay
        setTimeout(() => {
            resultContainer.innerText = '';
            fetchQuestion();
        }, 2000);
    }
}

function showFinalScore() {
    const scoreContainer = document.getElementById('score');
    scoreContainer.style.display = 'block';
    scoreContainer.innerText = `Final Score: ${correctAnswers} out of ${totalQuestions}`;
}

fetchQuestion(); // Initial question fetch