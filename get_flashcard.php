<?php
require_once('config.php');
$quiz = $_REQUEST['quiz'];
$linkID = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbusername, $dbpassword);
$linkID->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting ERRMODE
$query = "SELECT * FROM flash_cards where quiz_id=".'"'.$quiz.'"';
$flashcards = $linkID->query($query)->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($flashcards);
