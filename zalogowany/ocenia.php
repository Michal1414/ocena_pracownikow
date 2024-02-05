<?php
session_start();

$conn = new mysqli("localhost", "root", "", "ocena_pracownikow");
$logged_userID = $_SESSION['user_id'];

$evaluated_employee_icons = "";
$employee_to_evaluate_icons = "";

//creating employee-icons
$users = $conn->query("SELECT id, name, surname, teamID FROM uzytkownicy");//get all users

while($user = $users->fetch_assoc()) {
    $q = $conn->prepare("SELECT id_oceny, id_oceniajacego, id_ocenianego FROM oceny WHERE id_oceniajacego = ? AND id_ocenianego = ?");
    $q->bind_param("ii", $logged_userID, $user['id']);
    $q->execute();
    $result = $q->get_result();
    
    $q2 = $conn->prepare("SELECT id, name, surname, teamID FROM uzytkownicy WHERE id = ?");
    $q2->bind_param("i", $logged_userID);
    $q2->execute();
    $result2 = $q2->get_result();
    $logged_user = $result2->fetch_assoc();

    //jezeli nie istnieje relacja oceniajacy-oceniany pomiedzy tymi uzytkownikami
    if($user['id'] != $logged_userID && $result->num_rows === 0 && $user['teamID'] == $logged_user['teamID']) {
        
        $employee_to_evaluate_icons .=
        "<button class=\"employee-icon employee_to_evaluate-icon\" onclick=\"ShowFormPopup(".$user['id'].")\">
            <ion-icon name=\"person-circle\"></ion-icon>
            <hr>
            <span>".$user['name']."</span>
            <span>".$user['surname']."</span>
        </button>";

    } elseif($user['teamID'] == $logged_user['teamID'] && $user['id'] != $logged_userID) {
        $evaluated_employee_icons .=
        "<button class=\"employee-icon employee_to_evaluate-icon\">
            <ion-icon name=\"person-circle\"></ion-icon>
            <hr>
            <span>".$user['name']."</span>
            <span>".$user['surname']."</span>
        </button>";
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
            <a href="../mojeOceny/moje_oceny.php">Moje oceny</a>
            <a id="delete-account-btn" onclick="window.location.href = '../deleteAccount/delete_account.php';">Usuń konto</a>
            <a href="\ocena_pracownikow\index.php">Wyloguj się</a>
        </nav>
    </header>
        <div class="form_popup">
            <h2>Uzupełnij:</h2>
            <button class="exit" onclick="HideFormPopup()"><ion-icon name="close"></ion-icon></button>
            <form action="ocena.php" method="post" id="form-evaluation">
                <div class="questions_box">
                    <div class="input_box">
                        <label for="input_question1">1. Jak oceniasz efektywność pracy tej osoby w zespole w skali od 1 do 5?</label>
                        <input id="input_question1" type="number" name="question1" min="1" max="5">
                        <hr>
                    </div>
                    <div class="input_box">
                        <label for="input_question2">2. Na ile dokładnie i terminowo wykonuje swoje zadania ta osoba? (1 - niska, 5 - bardzo wysoka)</label>
                        <input id="input_question2" type="number" name="question2" min="1" max="5">
                        <hr>
                    </div>
                    <div class="input_box">
                        <label for="input_question3">3. Jak oceniasz kreatywność tej osoby w rozwiązywaniu problemów zawodowych? (1 - niska, 5 - bardzo wysoka)</label>
                        <input id="input_question3" type="number" name="question3" min="1" max="5">
                        <hr>
                    </div>
                    <div class="input_box">
                        <label for="input_question4">4. Czy osoba ta wykazuje zaangażowanie w wykonywanie swoich obowiązków? (1 - brak zaangażowania, 5 - bardzo zaangażowana)</label>
                        <input id="input_question4" type="number" name="question4" min="1" max="5">
                        <hr>
                    </div>
                    <div class="input_box">
                        <label for="input_question5">5. Jak oceniasz umiejętność komunikacji tej osoby w kontekście zawodowym? (1 - słaba, 5 - doskonała)</label>
                        <input id="input_question5" type="number" name="question5" min="1" max="5">
                        <hr>
                    </div>
                    <div class="input_box">
                        <label for="input_question6">6. Jak oceniasz jej zdolności do radzenia sobie ze stresem i presją w pracy? (1 - słabo, 5 - bardzo dobrze)</label>
                        <input id="input_question6" type="number" name="question6" min="1" max="5">
                        <hr>
                    </div>
                </div>
                <div class="description_box">
                    <label for="ocena_opis">Opisz swoje doznania zwiazne z pracą z tą osobą:</label>
                    <textarea name="ocena_opis" id="ocena_opis" cols="30" rows="10"></textarea>
                </div>
                <div style="clear: both;"></div>
                <input type="submit" value="Oceń" id="form-button">
            </form>
        </div>
    <main>
        <h2>Pracownicy do ocenienia</h2>
        <hr>
        <div class="to_evaluate_box employee_box">
            <?php 
                echo $employee_to_evaluate_icons;
            ?>
        </div>
        <h2>Ocenieni pracownicy</h2>
        <hr>
        <div class="evaluated_box employee_box">
            <?php
                echo $evaluated_employee_icons;
            ?>
        </div>
    </main>

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

