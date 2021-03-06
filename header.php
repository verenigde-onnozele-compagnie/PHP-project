<?php
    require 'config.php';
?>

<!-- Even heel easy html code, omdat de focus nu op het inlogsysteem ligt en niet op fancy looks :)  -->
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Amo Login System homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
    <nav>
        <a href="index.php">Home</a>
        <div class="login">
        <?php
        /*
         * Hier checken we of we al ooit eens een 'id' key hebben opgeslagen in de
         * $_SESSION variabele. de ENIGE plek waar we dit doen is als we onszelf inloggen
         * en onze gegevens kloppen. Kijk maar in de logincontroller.php
         *
         * Als we dus al een id in onze session hebben (dus onze klant is al ingelogd) willen we niet dat onze
         * klanten zich nogmaals kunnen registreren of inloggen...
         *
         */
        if ( isset($_SESSION['id']) ) {
            echo "You are currently logged in. Want to <a href='logout.php'>logout?</a>";
        } else {
            echo "<a href='login.php'>Login</a> &nbsp; or &nbsp; <a href='register.php'> register </a>";
        }
        ?>
        </div>
    </nav>
</header>