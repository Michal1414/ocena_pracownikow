<?php
$conn = new mysqli("localhost", "root", "", "ocena_pracownikow");
session_start();

$login_error = "";
$register_error = "";

// ------------------- login -------------------
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'login') {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    
    $q = $conn->prepare("SELECT * FROM uzytkownicy WHERE email = ?");
    $q->bind_param("s", $email);
    $q->execute();
    
    $result = $q->get_result();
    
    $user = $result->fetch_assoc();
    if($user == null) {
        $login_error = "Błędne hasło lub login<br>";
    } else {
        if(password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: zalogowany\ocenia.php");
            exit();
        } else {
            $login_error = "Błędne hasło lub login<br>";
        }
    }
}

// ------------------- registration -------------------
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'register') {
    
    $name = $_REQUEST['name2'];
    $surname = $_REQUEST['surname'];
    $email = $_REQUEST['email2'];
    $password = $_REQUEST['password2'];
    $repeat_password = $_REQUEST['repeat_password'];
    $teamID = $_REQUEST['teamID'];

    if(!$_REQUEST['password2'] == $_REQUEST['repeat_password']) {
        $register_error = "hasła się nie zgadzają";
    } else {
        $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
        $surname = filter_var($surname, FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $teamID = filter_var($teamID, FILTER_SANITIZE_NUMBER_INT);
        $password = password_hash($password, PASSWORD_ARGON2I);
        
        if(!empty($name) && !empty($surname) && !empty($email) && !empty($password) && !empty($teamID)) {

            $conn = new mysqli("localhost", "root", "", "ocena_pracownikow");
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $q = $conn->prepare("INSERT INTO uzytkownicy VALUES(NULL, ?, ?, ?, ?, ?)");
            $q->bind_param("ssssi", $name, $surname, $email, $password, $teamID);
            $q->execute();
            $q->close();
            
            
            $q = $conn->prepare("SELECT * FROM uzytkownicy WHERE email = ?");
            $q->bind_param("s", $email);
            $q->execute();
            
            $result = $q->get_result();
            
            $user = $result->fetch_assoc();

            $_SESSION['user_id'] = $user['id'];

            header("Location: zalogowany\ocenia.php");
            exit();
        } else {
            $register_error = "uzupełnij wszystkie pola";
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Nazwa</h1>
        <nav>
            <a class="register-login_nav">Zaloguj się</a>
            <a class="login-register_nav">Zarejestruj się</a>
        </nav>
    </header>

    <div class="wrapper">
        <div class="form_box login_box">
            <h2>Logowanie</h2>
            <form action="index.php" method="post">

                <div class="input_box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input id="input_email" type="email" name="email">
                    <label for="input_email">Email</label>
                </div>

                <div class="input_box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input id="input_password" type="password" name="password">
                    <label for="input_password">Haslo</label>
                </div>

                <div class="error_info">
                    <?php echo $login_error; ?>
                </div>

                <p><label for="register-login">Nie masz konta?</label><a class="login-register">Zarejestruj się</a></p>

                <input type="hidden" name="action" value="login">
                <input type="submit" value="Zaloguj" class="login_button">
            </form>
        </div>
        
        <div class="form_box register_box">
            <h2>Rejestracja</h2>
            <form action="index.php" method="post">

                <div class="input_box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input id="input_name2" type="text" name="name2">
                    <label for="input_name2">Imie</label>
                </div>

                <div class="input_box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input id="input_surname" type="text" name="surname">
                    <label for="input_surname">Nazwisko</label>
                </div>

                <div class="input_box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input id="input_email2" type="email" name="email2">
                    <label for="input_email2">Email</label>
                </div>

                <div class="input_box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input id="input_password2" type="password" name="password2">
                    <label for="input_password">Haslo</label>
                </div>

                <div class="input_box">
                    <span class="icon"><ion-icon name="repeat"></ion-icon></span>
                    <input id="input_repeat_password" type="password" name="repeat_password">
                    <label for="input_repeat_password">Powtórz haslo</label>
                </div>
                
                <div class="input_box">
                    <span class="icon"><ion-icon name="id-card"></ion-icon></span>
                    <input id="input_teamID" type="number" name="teamID">
                    <label for="input_teamID">Id twojego zespołu</label>
                </div>

                <div class="error_info">
                    <?php echo $register_error; ?>
                </div>

                <p><label for="register-login">Posiadasz już konto?</label><a class="register-login">Zaloguj się</a></p>

                <input type="hidden" name="action" value="register">
                <input type="submit" value="Utwórz konto" class="register_button">
            </form>
        </div>
    </div>
    

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

