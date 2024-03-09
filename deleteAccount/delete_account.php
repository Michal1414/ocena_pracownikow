<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$userID = $_SESSION['user_id'];

$conn = new mysqli("localhost", "root", "", "ocena_pracownikow");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$q1 = $conn->prepare("DELETE FROM `oceny` WHERE id_oceniajacego = ? OR id_ocenianego = ?");
$q1->bind_param("ii", $userID, $userID);
$q1->execute();
$q1->close();

$q = $conn->prepare("DELETE FROM `uzytkownicy` WHERE `uzytkownicy`.`id` = ?");
$q->bind_param("i", $userID);
$q->execute();
$q->close();


$conn->close();

unset($_SESSION['user_id']);
session_destroy();

header("Location: ../index.php");
exit();
?>
