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

        echo <<< ENT_DISALLOWED
            Zaloguj się.
<form action="index_unknow.php" method="post">
    <input type="text" name="login" placeholder="Login" required/><br><br>
    <input type="text" name="password" placeholder="Hasło" required/><br><br>
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

        //echo "$login";
        //echo "$password";
        $query = $this -> db->query("SELECT * from `users` WHERE `login` like '$login' and `password` like '$password'");
        $query = $query->fetch_assoc();
        $id = $query['userID'];

        return $id;
    }


    function registry($name, $surname, $email, $login, $password, $password2) {

        if($this->validate($name, $surname, $email, $login, $password, $password2)) {

            $this->db->query("INSERT INTO `users` VALUES ('NULL', '$name', '$surname', '$email', '$login', '$password', 'kod')");
        } else {
            echo "Rejestracja nie mozliwa.";
        }

    }
    function validate($name, $surname, $email, $login, $password, $password2) {

        $flaga = 1;

        if (preg_match('/^[A-Z][a-z]+$/', $name)) {
            echo("Imie ok <br>");
        } else {
            echo("Imie error <br>");
            $flaga = 0;
        }

        if (preg_match('/^[A-Z][a-z]+$/', $surname)) {
            echo("Nazwisko ok <br>");
        } else {
            echo("Nazwisko error <br>");
            $flaga = 0;
        }

        if (preg_match('/^[A-Za-z]+@[A-Za-z]+.[A-Za-z]+$/', $email)) {
            echo("Email ok <br>");
        } else {
            echo("Email error <br>");
            $flaga = 0;
        }

        if (preg_match('/^[0-9A-Za-z]+$/', $login)) {
            echo("Login ok <br>");
        } else {
            echo("Login error <br>");
            $flaga = 0;
        }

        if($password === $password2) {
            if (preg_match('/^[0-9A-Za-z]{6,}$/', $password)) {
                echo("Haslo ok <br>");
            } else {
                echo("Haslo error <br>");
                $flaga = 0;
            }
        } else {
            echo ("Hasla sie roznia <br>");
            $flaga = 0;
        }
// jeszcze ma sprawdzić czy jest w bazie



        if($flaga === 1) {
            return true;
        } else {
            return false;
        }

    }

}