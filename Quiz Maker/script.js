const questions = [
    {
        question: "What is the capital of France?",
        options: ["Paris", "Berlin", "London"],
        correctAnswer: "Paris"
      },
      {
        question: "What is the largest planet in our solar system?",
        options: ["Jupiter", "Mars", "Venus"],
        correctAnswer: "Jupiter"
      },
      {
        question: "What is the largest ocean on Earth?",
        options: ["Pacific Ocean", "Atlantic Ocean", "Indian Ocean"],
        correctAnswer: "Pacific Ocean"
      },
      {
        question: "Who wrote 'Romeo and Juliet'?",
        options: ["William Shakespeare", "Jane Austen", "Charles Dickens"],
        correctAnswer: "William Shakespeare"
      },
      {
        question: "What is the capital of Japan?",
        options: ["Tokyo", "Beijing", "Seoul"],
        correctAnswer: "Tokyo"
      },
      {
        question: "Which planet is known as the 'Red Planet'?",
        options: ["Mars", "Venus", "Jupiter"],
        correctAnswer: "Mars"
      },
      {
        question: "What is the currency of Germany?",
        options: ["Euro", "Pound Sterling", "Yen"],
        correctAnswer: "Euro"
      },
      {
        question: "Who painted the Mona Lisa?",
        options: ["Leonardo da Vinci", "Vincent van Gogh", "Pablo Picasso"],
        correctAnswer: "Leonardo da Vinci"
      },
      {
        question: "What is the main ingredient in guacamole?",
        options: ["Avocado", "Tomato", "Onion"],
        correctAnswer: "Avocado"
      },
      {
        question: "In what year did the Titanic sink?",
        options: ["1912", "1920", "1905"],
        correctAnswer: "1912"
      }
    
  ];
  
  let currentQuestion = 0;
  let score = 0;
  
  function loadQuestion() {
    const questionContainer = document.getElementById('question-container');
    const optionsContainer = document.getElementById('options-container');
    const currentQuestionObj = questions[currentQuestion];
  
    questionContainer.innerHTML = `<p>${currentQuestionObj.question}</p>`;
  
    optionsContainer.innerHTML = "";
    currentQuestionObj.options.forEach((option, index) => {
      optionsContainer.innerHTML += `
        <div class="option">
          <input type="radio" name="answer" value="${option}" id="option${index + 1}">
          <label for="option${index + 1}">${option}</label>
        </div>
      `;
    });
  }
  
  function nextQuestion() {
    const selectedOption = document.querySelector('input[name="answer"]:checked');
  
    if (!selectedOption) {
      alert('Please select an option before proceeding to the next question.');
      return;
    }
  
    // Check answer and update score (if needed)
    checkAnswer(selectedOption.value);
  
    // Move to the next question or show the result
    if (currentQuestion < questions.length - 1) {
      currentQuestion++;
      loadQuestion();
    } else {
      showResult();
    }
  }
  
  function checkAnswer(answer) {
    const currentQuestionObj = questions[currentQuestion];
    if (answer === currentQuestionObj.correctAnswer) {
      score++;
    }
  }
  
  function showResult() {
    const resultContainer = document.getElementById('result');
    resultContainer.innerHTML = `Your score is: ${score} out of ${questions.length}`;
    resultContainer.style.display = 'block';
  
    // Hide the question and options containers
    document.getElementById('question-container').style.display = 'none';
    document.getElementById('options-container').style.display = 'none';
  
    // Hide the "Next" button
    document.getElementById('next-btn').style.display = 'none';
  }
  
  // Load the first question on page load
  loadQuestion();
  