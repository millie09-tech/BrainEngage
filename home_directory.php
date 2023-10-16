<?php
session_start();
if (isset($_SESSION["username"]))
{
?>
<!DOCTYPE html>
<html>
<title>Directory</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
.button {
        text-align: center;
        margin-top: 50px;
    }

    button {
        color: white;
        background-color: #f27a24;
        padding: 20px;
        border-radius: 15px;
    }

    button:hover {
        transform: scale(1.1);
        /* transform: translateX(300px);
        transition: 5s; */
    }



</style>


<body >

<?php
require_once("header.php");
?>

<div class="w3-container">
    <br>
    <div style="background-color:white">
        <strong><h2 style="font-family: 'Courier New'">Directory</h2></strong><br>
    </div>
    <div style="background-color:lightpink">
        <p style="font-family: 'Courier New'">Choose Your Category</p>
    </div>
    <form method="POST">
    <table class="w3-table">
        <tr>
            <th style="font-family: 'Courier New'">Quizzes</th>
        </tr>

        <tr>
            <td><input type="radio" name="quiz" value="1" required></td>
            <td style="font-family: 'Courier New'">General Biology</td>
        </tr>

        <tr>
            <td><input type="radio" name="quiz" value="2" required></td>
            <td style="font-family: 'Courier New'">General Chemistry</td>
        </tr>

        <tr>
            <td><input type="radio" name="quiz" value="3" required></td>
            <td style="font-family: 'Courier New'">Coding</td>
        </tr>
        <tr>
            <td><input type="radio" name="quiz" value="4" required></td>
            <td style="font-family: 'Courier New'">The Digestive System</td>
        </tr>

    </table>
        <button id="gotoquiz" name="gotoquiz" formaction="quiz.php" style="font-family: 'Courier New'">GO TO QUIZ</button>
        <button id="gotoflashcards" name="gotoflashcards" formaction="index.php" style="font-family: 'Courier New'">GO TO FLASHCARDS</button>
    </form>
</div>
<?php
require_once("footer.php");
?>

</body>

</html>
<?php
}?>