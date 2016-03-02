<?php

/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 26.02.16
 * Time: 16:55
 */
class Users
{
    public $userID;
    public $name;
    public $email;
    public $login;
    public $password;
    public $code;
    public $db;

    function __construct()
    {
        $this->db = mysqli_connect('krzysztofsikora24.pl','krzysztofcba','bazacba12','krzysztofsikora24_pl');
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }


    }

    function write() {
        $query = $this -> db->query("SELECT * from `users`");
        $query = $query->fetch_assoc();
        $id = $query['userID'];
        return $id;
    }

    function writeAll() {

            foreach($this->db->query('SELECT * FROM `users`') as $tabUsers) {
                $name = $tabUsers['name'];
                echo "$name <br>";

            }
    }

    function writeForm() {
            /// dodać action form gdzie wyświetlany jest formularz
        echo <<< ENT_DISALLOWED
            Zaloguj się.
<form action="index_unknow.php" method="post">
    <input type="text" name="login" placeholder="Login" /><br><br>
    <input type="text" name="password" placeholder="Hasło" /><br><br>
    <input type="submit" name="log" value="Zaloguj"/>
</form>
<br>S
Jeśli nie masz konta. Zarejestruj się.
<form action="index_unknow.php" method="post">
    <input type="text" name="name" placeholder="Imie" required/><br><br>
    <input type="text" name="surname" placeholder="Nazwisko" required/><br><br>
    <input type="email" name="email" placeholder="E-mail" required/><br><br>
    <input type="text" name="login" placeholder="Login" required/><br><br>
    <input type="password" name="password" placeholder="Hasło" required/><br><br>
    <input type="password" name="password2" placeholder="Powtórz hasło" required/><br><br>
    <input type="submit" name="reg" value="Rejestruj"/>
</form>
ENT_DISALLOWED;


    }

    function login($login, $password) {


        if($this->validateLogin($login, $password)) {
            $query = $this -> db->query("SELECT `login`, `password`, `userID` from `users` WHERE `login` like '$login' and `password` like '$password'");
            $query = $query->fetch_assoc();
            $id = $query['userID'];

            return $id;
        }
    }


    function registry($name, $surname, $email, $login, $password, $password2) {

        if($this->validateRegistry($name, $surname, $email, $login, $password, $password2)) {

            $code = md5(mt_rand()); //generowanie kodu aktywacyjnego

            $this->db->query("INSERT INTO `users` VALUES ('NULL', '$name', '$surname', '$email', '$login', '$password', '$code')");
            // wysylanie meila na poczte
            $this->sendActivate($code, $login, $email);

        } else {
            echo "Rejestracja nie mozliwa.";
        }

    }
    private function validateRegistry($name, $surname, $email, $login, $password, $password2) {

        // walidacja danych
        $flag = 1;

        if (preg_match('/^[A-ZĄĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+$/', $name)) {
            echo("Imie ok <br>");
        } else {
            echo("Imie error <br>");
            $flag = 0;
        }

        if (preg_match('/^[A-ZĄĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+$/', $surname)) {
            echo("Nazwisko ok <br>");
        } else {
            echo("Nazwisko error <br>");
            $flag = 0;
        }

        if (preg_match('/^[A-Za-z]+@[A-Za-z]+.[A-Za-z]+$/', $email)) {
            echo("Email ok <br>");
        } else {
            echo("Email error <br>");
            $flag = 0;
        }

        if (preg_match('/^[0-9A-Za-z]+$/', $login)) {
            echo("Login ok <br>");
        } else {
            echo("Login error <br>");
            $flag = 0;
        }

        if($password === $password2) {
            if (preg_match('/^[0-9A-Za-z]{6,}$/', $password)) {
                echo("Haslo ok <br>");
            } else {
                echo("Haslo error <br>");
                $flag = 0;
            }
        } else {
            echo ("Hasla sie roznia <br>");
            $flag = 0;
        }

        // sprawdzanie loginu
        $tabLogin = $this->db->query("SELECT * FROM `users` WHERE `login` LIKE '$login'");

        $tabLogin = $tabLogin -> fetch_assoc();

        if(!empty($tabLogin)) {
            echo ("Login zajety");
            $flag = 0;
        }
        // sprawdzanie meila
        $tabEmail = $this->db->query("SELECT * FROM `users` WHERE `email` LIKE '$email'");
        $tabEmail = $tabEmail -> fetch_assoc();

        if(!empty($tabEmail)) {
            echo ("Meil zajety");
            $flag = 0;
        }


        if($flag === 1) {
            return true;
        } else {
            return false;
        }

    }

    private function validateLogin($login, $password) {
        $flag = 1;


        if (preg_match('/^[a-zA-Z][a-zA-Z]+$/', $login)) {
            echo("Login ok <br>");
        } else {
            echo("Login error <br>");
            $flag = 0;
        }


        if (preg_match('/^[0-9A-Za-z]{6,}$/', $password)) {
            echo("Haslo ok <br>");
        } else {
            echo("Haslo error <br>");
            $flag = 0;
        }

        // sprawdzic czy są w bazie

        $tabLogin = $this->db->query("SELECT * FROM `users` WHERE `login` LIKE '$login'");

        $tabLogin = $tabLogin -> fetch_assoc();

        if(empty($tabLogin)) {
            echo ("Nie ma takiego loginu w bazie.");
            $flag = 0;
        }


        $tabPassword = $this->db->query("SELECT * FROM `users` WHERE `password` LIKE '$password'");

        $tabPassword = $tabPassword -> fetch_assoc();

        if(empty($tabPassword)) {
            echo ("Błędne hasło.");
            $flag = 0;
        }


        if($flag === 1) {
            return true;
        } else {
            return false;
        }

    }
    function sendActivate($code, $login, $email) {

        $email_template = "templates/email_template.html";
        $message = file_get_contents($email_template);
        $message = str_replace("[login]", $login, $message);
        $message = str_replace("[key]", $code, $message);
        $message = str_replace("[url]", "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'], $message);
        $header = 'From listdlakrzycha@gmail.com' . "\r\n" .
            'Reply-To: listdlakrzycha@gmail.com'. "\r\n" .
            'Content-type: text/html; charset=utf-8' . "\r\n";

        mail($email, "Aktywacja konta " . $email, $message, $header);

        echo "Email wysłany";
    }

    function userActivate($activate) {
        $code = $activate;
        if(isset($code)) {



            $tabCode = $this->db->query("SELECT `code` FROM  `users` WHERE  `code` LIKE '$code' ");

            $tabCode = $tabCode->fetch_assoc();


            // nie ma takiego uzytkownika o takim kodzie;
            if(empty($tabCode)) {
                echo ("Nie ma użytkownika o takim kodzie");

            } else {
                $this ->db->query("UPDATE `users` SET `code` = 'active' WHERE `code` = '$code'");
                echo "Potwierdzona rejestracja";
            }

        }
    }


}