  var quiz = document.getElementById('quiz').value;

  if (quiz == "1") {

  } else if (quiz == "2") {

  } else if (quiz == "3") {

  } else if(quiz=="4"){
    var questions = [
      {
        question: 'Where does the last process of the digestive system take place?',
        answers: [
          {text: 'Large Intestine', correct: true},
          {text: 'Small Intestine', correct: false}
        ]
      },
      {
        question: 'Which one of these is not a common problem of the digestive system?',
        answers: [
          {text: 'Heartburn', correct: false},
          {text: 'Colitis', correct: false},
          {text: 'Ebola', correct: true},
          {text: 'Diverticulitis', correct: false}
        ]
      },
      {
        question: 'How long is digestive tract?',
        answers: [
          {text: '10m', correct: true},
          {text: '9m', correct: false},
          {text: '8m', correct: false},
          {text: '11m', correct: false}
        ]
      }
    ]
  }

const startButton = document.getElementById('start-btn')
const nextButton = document.getElementById('next-btn')
const questionContainerElement = document.getElementById('question-container')
const questionElement = document.getElementById('question')
const answerButtonsElement = document.getElementById('answer-buttons')

let shuffledQuestions, currentQuestionIndex

startButton.addEventListener('click', startGame)
nextButton.addEventListener('click', () => {
  currentQuestionIndex++
  setNextQuestion()
})

function startGame() {
  startButton.classList.add('hide')
  shuffledQuestions = questions.sort(() => Math.random() - .5)
  currentQuestionIndex = 0
  questionContainerElement.classList.remove('hide')
  setNextQuestion()
}

function setNextQuestion() {
  resetState()
  showQuestion(shuffledQuestions[currentQuestionIndex])
}

function showQuestion(question) {
  questionElement.innerText = question.question
  question.answers.forEach(answer => {
    const button = document.createElement('button')
    button.innerText = answer.text
    button.classList.add('btn')
    if (answer.correct) {
      button.dataset.correct = answer.correct
    }
    button.addEventListener('click', selectAnswer)
    answerButtonsElement.appendChild(button)
  })
}

function resetState() {
  clearStatusClass(document.body)
  document.getElementById("question-container").style.color = "black";
  nextButton.classList.add('hide')
  while (answerButtonsElement.firstChild) {
    answerButtonsElement.removeChild(answerButtonsElement.firstChild)
  }
}

function selectAnswer(e) {
  const selectedButton = e.target
  const correct = selectedButton.dataset.correct
  setStatusClass(document.body, correct)
  Array.from(answerButtonsElement.children).forEach(button => {
    setStatusClass(button, button.dataset.correct)
  })
  if (shuffledQuestions.length > currentQuestionIndex + 1) {
    nextButton.classList.remove('hide')
  } else {

    window.location.replace("quizsuccess.php");

    startButton.innerText = 'Restart'
    startButton.classList.remove('hide')
  }
}

function setStatusClass(element, correct) {
  clearStatusClass(element)
  if (correct) {
    element.classList.add('correct')
    document.getElementById("question-container").style.color = "green";
  } else {
    element.classList.add('wrong')
    document.getElementById("question-container").style.color = "red";

  }
}

function clearStatusClass(element) {
  element.classList.remove('correct')
  element.classList.remove('wrong')
}

