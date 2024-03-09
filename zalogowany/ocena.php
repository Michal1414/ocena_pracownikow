<?php
session_start();

$conn = new mysqli("localhost", "root", "", "ocena_pracownikow");
$logged_userID = $_SESSION['user_id'];
 
$question1 = $_REQUEST['question1'];
$question2 = $_REQUEST['question2'];
$question3 = $_REQUEST['question3'];
$question4 = $_REQUEST['question4'];
$question5 = $_REQUEST['question5'];
$question6 = $_REQUEST['question6'];
$description = $_REQUEST['ocena_opis'];

$employeeID = $_REQUEST['employeeId'];

$question1 = filter_var($question1, FILTER_SANITIZE_SPECIAL_CHARS);
$question2 = filter_var($question2, FILTER_SANITIZE_SPECIAL_CHARS);
$question3 = filter_var($question3, FILTER_SANITIZE_SPECIAL_CHARS);
$question4 = filter_var($question4, FILTER_SANITIZE_SPECIAL_CHARS);
$question5 = filter_var($question5, FILTER_SANITIZE_SPECIAL_CHARS);
$question6 = filter_var($question6, FILTER_SANITIZE_SPECIAL_CHARS);

if(!empty($question1) && !empty($question2) && !empty($question3) && !empty($question4) && !empty($question5) && !empty($question6) && !empty($description)) {
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $q = $conn->prepare("INSERT INTO `oceny`(`id_oceny`, `id_oceniajacego`, `id_ocenianego`, `wynik_pytania1`, `wynik_pytania2`, `wynik_pytania3`, `wynik_pytania4`, `wynik_pytania5`, `wynik_pytania6`, `opisowa_ocena`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $q->bind_param("iiiiiiiis", $logged_userID, $employeeID, $question1, $question2, $question3, $question4, $question5, $question6, $description);
    $q->execute();
    $q->close();


} else {
    $register_error = "uzupełnij wszystkie pola";
}

header("Location: ocenia.php");
exit();
$conn->close();
?>