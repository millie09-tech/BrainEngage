<?php session_start();
if(isset($_SESSION["username"]))
{
    require('header.php');

$quiz = $_REQUEST['quiz'];

if($quiz == 1){
    $quizname = "BIOLOGY";
}elseif($quiz ==2){
    $quizname = "CHEMISTRY";
}elseif($quiz ==3){
    $quizname= "CODING";
}elseif($quiz ==4){
    $quizname= "DIGESTION";
}else{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        :root {
            --hue-neutral: 200;
            --hue-wrong: 0;
            --hue-correct: 145;
        }


        body.correct {
            --hue: var(--hue-correct);
        }

        body.wrong {
            --hue: var(--hue-wrong);
        }
        .container {
            width: 800px;
            max-width: 80%;
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 0 10px 2px;
        }

        .btn-grid {
            display: grid;
            grid-template-columns: repeat(2, auto);
            gap: 10px;
            margin: 20px 0;
        }

        .btn {
            --hue: var(--hue-neutral);
            border: 1px solid hsl(var(--hue), 100%, 30%);
            background-color: hsl(var(--hue), 100%, 50%);
            border-radius: 5px;
            padding: 5px 10px;
            color: white;
            outline: none;
        }

        .btn:hover {
            border-color: black;
        }

        .btn.correct {
            --hue: var(--hue-correct);
            color: black;
        }

        .btn.wrong {
            --hue: var(--hue-wrong);
        }

        .start-btn, .next-btn {
            font-size: 1.5rem;
            font-weight: bold;
            padding: 10px 20px;
        }

        .controls {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hide {
            display: none;
        }
    </style>
    <script type="application/javascript">

    </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Quiz App</title>
</head>
<body >
<h1 class="title">QUIZ: <?php echo  $quizname?></h1><br>
  <div class="container">
    <div id="question-container"  name="question-container" class="hide">
      <div id="question">Question</div>
      <div id="answer-buttons" class="btn-grid">
        <button class="btn">Answer 1</button>
        <button class="btn">Answer 2</button>
        <button class="btn">Answer 3</button>
        <button class="btn">Answer 4</button>
      </div>
    </div>
      <?php
      echo '<input type="hidden" id="quiz" name="quiz" value='.'"'.$quiz.'"'.'>';
      ?>

    <div class="controls">
      <button id="start-btn" class="start-btn btn">Start</button>
      <button id="next-btn" class="next-btn btn hide">Next</button>
    </div>
  </div>
<?php     include_once("footer.php");
?>
</body>
<script src="js/script.js"></script>
</html>
    <?php

}else{
    header("location:login.php");
}
?>