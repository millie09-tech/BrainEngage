<?php session_start();
if(isset($_SESSION["username"]))
{
    require('header.php');
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash Card App</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
</head>
<body onload="flashcard()">
<br><br>
<h1 class="title">Study Flashcards Here:</h1><br>
<input type="hidden" id="flash_num" name="flash_num" value="-1">
<div class="term">
    <h3>Term</h3>
</div>

<div class="definition">
    <h3>Definition</h3>
</div>


<div class="button">
    <button class="check">Flip</button>
    <button class="next">Next</button>
</div>
<form method="REQUEST">
    <?php
    $quiz = $_REQUEST['quiz'];
    echo '<input type="hidden" id="quiz" name="quiz" value='.'"'.$quiz.'"'.'>';
    ?>

<button id="test" name="test" formaction="quiz.php">I AM READY FOR MY TEST</button>
</form>
<button id="myBtn" name="myBtn">I AM FRUSTRATED!</button>


<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content" style="background-color:orange">
        <span class="close">&times;</span>
        <h3 style="font-family:'Courier New'">You’re on the right track!</h3><br>
        <h3 style="font-family:'Courier New'"> You’re doing so well!</h3><br>
        <h3 style="font-family:'Courier New'"> Take a deep breath, you’ve got this.</h3><br>
        <h3 style="font-family:'Courier New'">  You can figure this out!</h3><br>
        <h3 style="font-family:'Courier New'">  Calm down and take a moment, you can do this.</h3><br>
        <h3 style="font-family:'Courier New'">  Make sure to drink some water.</h3><br>
        <h3 style="font-family:'Courier New'">  Take a break if you need it</h3><br>

    </div>

</div>


<script src="js/app.js"></script>
<?php     include_once("footer.php");
?>
</body>
</html>
<?php

}else{
    header("location:login.php");
}
    ?>