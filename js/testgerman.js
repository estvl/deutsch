'use strict';
const quizData = [
    { 
        question: "Was bedeutet 'Hallo' auf Deutsch?", 
        choices: ["Hello", "Goodbye", "Thank you", "Please"], 
        answer: "Hello" 
    },
    { 
        question: "Was bedeutet 'Hallo' auf Deutsch?", 
        choices: ["Hello", "Goodbye", "Thank you", "Please"], 
        answer: "Hello" 
    }
    // Add more questions here
  ];
  
  const quizContainer = document.getElementById("quiz-container");
  const questionElement = document.getElementById("question");
  const choicesElement = document.getElementById("choices");
  const submitButton = document.getElementById("submit-btn");
  const resultElement = document.getElementById("result");
  
  let currentQuestion = 0;
  let score = 0;
  
  function showQuestion() {
    console.log("1");
    const currentQuizData = quizData[currentQuestion];
    questionElement.innerText = currentQuizData.question;
    choicesElement.innerHTML = "";
    currentQuizData.choices.forEach(choice => {
        console.log("2");
      const button = document.createElement("button");
      button.innerText = choice;
      button.classList.add("choice-btn");
      button.addEventListener("click", () => {
        console.log("3");
        checkAnswer(choice);
      });
      console.log("4");
      choicesElement.appendChild(button);
    });
  }
  
  function checkAnswer(choice) {
    const currentQuizData = quizData[currentQuestion];
    if (choice === currentQuizData.answer) {
      score++;
    }
    currentQuestion++;
    if (currentQuestion < quizData.length) {
      showQuestion();
    } else {
      showResult();
    }
  }
  
  function showResult() {
    quizContainer.style.display = "none";
    resultElement.innerText = `You scored ${score} out of ${quizData.length}`;
    resultElement.style.display = "block";
  }
  
  showQuestion();
  