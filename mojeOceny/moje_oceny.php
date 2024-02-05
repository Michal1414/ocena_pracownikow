<?php
session_start();

error_reporting(0);

$conn = new mysqli("localhost", "root", "", "ocena_pracownikow");
$logged_userID = $_SESSION['user_id'];

$evaluated_employee_icons = "";
$employee_to_evaluate_icons = "";

//creating employee-icons
$users = $conn->query("SELECT id, name, surname, teamID FROM uzytkownicy");//get all users

$questions = [
    "1. Efektywność pracy w zespole w skali od 1 do 5?",
    "2. Na ile dokładnie i terminowo wykonuje zadania? (1 - niska, 5 - bardzo wysoka)",
    "3. Kreatywność w rozwiązywaniu problemów zawodowych? (1 - niska, 5 - bardzo wysoka)",
    "4. Wykazywanie zaangażowanie w wykonywaniu swoich obowiązków? (1 - brak zaangażowania, 5 - bardzo zaangażowana)",
    "5. Umiejętność komunikacji w kontekście zawodowym? (1 - słaba, 5 - doskonała)",
    "6. zdolność do radzenia sobie ze stresem i presją w pracy? (1 - słabo, 5 - bardzo dobrze)"
];
$question_box = "";
$i = 1;
while($user = $users->fetch_assoc()) {
    $q = $conn->prepare("SELECT * FROM oceny WHERE id_oceniajacego = ? AND id_ocenianego = ?");
    $q->bind_param("ii", $user['id'], $logged_userID);
    $q->execute();
    $result = $q->get_result();
    if ($result->num_rows > 0) {
        $result_of_evaluation = $result->fetch_assoc();


        $q2 = $conn->prepare("SELECT id, name, surname, teamID FROM uzytkownicy WHERE id = ?");
        $q2->bind_param("i", $logged_userID);
        $q2->execute();
        $result2 = $q2->get_result();
        $logged_user = $result2->fetch_assoc();
    
        //jezeli nie istnieje relacja oceniajacy-oceniany pomiedzy tymi uzytkownikami
        if($user['id'] != $logged_userID && $user['teamID'] == $logged_user['teamID'] && $result->num_rows > 0) {
            
            $employee_to_evaluate_icons .=
            "<button class=\"employee-icon employee_to_evaluate-icon\" onclick=\"ShowFormPopup(".$user['id'].")\">
                <ion-icon name=\"person-circle\"></ion-icon>
                <hr>
                <span> Ocena ".$i."</span>
            </button>";
    
            $i++;
        }
    } 
    $q->close();
}

for($j = 0; $j < 6; $j++) {
    $num_question = "";
    $num_question .= $result_of_evaluation['wynik_pytania' . ($j+1)];
    $question_box .= "
    <div class=\"input_box\">
        <label>".$questions[($j)]."</label>
        <div class=\"ocena\">". $num_question ."/5</div>
        <hr>
    </div>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ocena pracownikow</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Ocenianie współpracowników</h1>
        <nav>
            <a href="../zalogowany/ocenia.php">Oceniaj innych</a>
            <a id="delete-account-btn" onclick="window.location.href = '../deleteAccount/delete_account.php';">Usuń konto</a>
            <a href="../index.php">Wyloguj się</a>
        </nav>
    </header>
        <div class="form_popup">
            <button class="exit" onclick="HideFormPopup()"><ion-icon name="close"></ion-icon></button>
            <form action="ocena.php" method="post" id="form-evaluation">
                <div class="questions_box">
                    <?php
                    echo $question_box;
                    ?>
                </div>
                <div class="description_box">
                    <label for="ocena_opis">Co osoba opisująca o tobie myśli:</label>
                    <textarea name="ocena_opis" id="ocena_opis" cols="30" rows="10" readonly>
                        <?php echo $result_of_evaluation['opisowa_ocena'];?>
                    </textarea>
                </div>
                <div style="clear: both;"></div>    
            </form>
        </div>
    <main>
        <h2>Moje oceny</h2>
        <hr>
        <div class="to_evaluate_box employee_box">
            <?php 
                echo $employee_to_evaluate_icons;
            ?>
        </div>
    </main>

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

