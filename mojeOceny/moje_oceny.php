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

// generating employee icons
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
            

            $question_box .= '


            <div class="form_popup" id="user'.$user['id'] .'" style="display: none;">
                <button class="exit" onclick="HideFormPopup('.$user['id'].')"><ion-icon name="close"></ion-icon></button>
                <form action="ocena.php" method="post" id="form-evaluation">
                    <div class="questions_box">
                        <div class="input_box">
                            <label>"'.$questions[0].'"</label>
                            <div class="ocena">"'. $result_of_evaluation['wynik_pytania1'] .'"/5</div>
                            <hr>
                        </div>
                        <div class="input_box">
                            <label>"'.$questions[1].'"</label>
                            <div class="ocena">"'. $result_of_evaluation['wynik_pytania2'] .'"/5</div>
                            <hr>
                        </div>
                        <div class="input_box">
                            <label>"'.$questions[2].'"</label>
                            <div class="ocena">"'. $result_of_evaluation['wynik_pytania3'] .'"/5</div>
                            <hr>
                        </div>
                        <div class="input_box">
                            <label>"'.$questions[3].'"</label>
                            <div class="ocena">"'. $result_of_evaluation['wynik_pytania4'] .'"/5</div>
                            <hr>
                        </div>
                        <div class="input_box">
                            <label>"'.$questions[4].'"</label>
                            <div class="ocena">"'. $result_of_evaluation['wynik_pytania5'] .'"/5</div>
                            <hr>
                        </div>
                        <div class="input_box">
                            <label>"'.$questions[5].'"</label>
                            <div class="ocena">"'. $result_of_evaluation['wynik_pytania6'] .'"/5</div>
                            <hr>
                        </div>
                    </div>
                    <div class="description_box">
                        <label for="ocena_opis">Co osoba opisująca o tobie myśli:</label>
                        <textarea name="ocena_opis" id="ocena_opis" cols="30" rows="10" readonly>
                            '.$result_of_evaluation['opisowa_ocena'].'
                        </textarea>
                    </div>
                    <div style="clear: both;"></div>    
                </form>
            </div>';







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
    <?php echo $question_box; ?>
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

