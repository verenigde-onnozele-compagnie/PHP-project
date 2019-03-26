<?php
require 'config.php';
/*
 * Dit is een webserver only script, waar je alleen mag komen als je via een form
 * data verstuurd, en niet als je via de url hier naar toe komt. Iedereen die dat doet
 * sturen we terug naar index.php
 *
 */
if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    header('location: index.php');
    exit;
}

if ( $_POST['type'] === 'login' ) {
    var_dump($_POST);
    /*
     * Hier komen we als we de login form data versturen.
     * things to do:
     * 1. Checken of gebruikersnaam EN email in de database bestaat met de ingevoerde data
     * 2. Indien ja, een $_SESSION['id'] vullen met de id van de persoon die probeert in te loggen.
     * 3. gebruiker doorsturen naar de admin pagina
     *
     * 3. Indien nee, gebruiker terugsturen naar de login pagina met de melding dat gebruikersnaam en/of
     * wachtwoord niet in orde is.
     *
     */
    try {
        $conn= new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit( $e->getMessage() );
    }

    if(isset($_POST['submit']))
    {

        try {
            $stmt = $conn->prepare('SELECT email FROM users WHERE email = ?');
            $stmt->bindParam(1, $_POST['email']);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            }
        }
        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        if($stmt->rowCount() > 0){
            echo "The email exists!";
        } else {
            echo "The email doesnt exist.";
        }


    }
    if(isset($_POST['submit']))
    {

        try {
            $stmt = $conn->prepare('SELECT username FROM users WHERE username = ?');
            $stmt->bindParam(1, $_POST['username']);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            }
        }
        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        if($stmt->rowCount() > 0){
            echo "The username already exists!";
        } else {
            echo "The username doesnt exist.";
        }


    }

}

if ($_POST['type'] === 'register') {
    var_dump($_POST);
    /*
     * Hier komen we als we de register form data versturen
     * things to do:
     *
     * 1. Checken of er al iemand met dit emailadres of username bestaat
     * 2. Indien nee, eerst checken of de password en password_confirm inderdaad hetzelfde ingevoerde is.
     * 3. Dan gebruiker inserten in de database, zodat deze kan gaan inloggen.
     * 4. Gebruiker doorsturen naar de nieuwe inlog pagina.
     *
     * 5. Indien ja, gebruiker terugsturen naar register form met de melding dat gebruikersnaam en/of wachtworod niet op
     * orde is.
     *
     *
     */
    try {
        $conn= new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit( $e->getMessage() );
    }

    if(isset($_POST['submit']))
    {

        try {
            $stmt = $conn->prepare('SELECT email FROM users WHERE email = ?');
            $stmt->bindParam(1, $_POST['email']);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            }
        }
        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        if($stmt->rowCount() > 0){
            echo "The email exists!";
        } else {
            echo "The email doesnt exist.";
        }



    }
    if(isset($_POST['submit']))
    {

        try {
            $stmt = $conn->prepare('SELECT username FROM users WHERE username = ?');
            $stmt->bindParam(1, $_POST['username']);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            }
        }
        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        if($stmt->rowCount() > 0){
            echo "The username already exists!";
        } else {
            echo "The username doesnt exist.";
        }



    }
    if(trim($_POST['pass'])=='' || trim($_POST['pass2'])=='')
    {
        echo('All fields are required!');
    }
    else if($_POST['pass'] != $_POST['pass2'])
    {
        echo('Passwords do not match!');
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

    $sql = "INSERT INTO users (  email,  username, password ) 
        VALUES (  :email, :username, :password )";
    $prepare = $db->prepare($sql);

    
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);

    $result = $stmt->execute();

    header( 'Location: index.php');
}





