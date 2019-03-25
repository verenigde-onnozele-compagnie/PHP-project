<!doctype html>
<html lang="en">
<?php require 'header.php'; ?>
<body>
    <div class="banner">
        <div class="banner-item">
            <h2>What does it do?</h2>
            <p>Jump in the shoes of Joe, Bob or Al and place bets in an intense and exiting dog race!</p>
            <p>Will your chosen player be the one to reach a million euros?</p>
        </div>
        <div class="active">
            <div class="banner-item">
                <h2>Why you should download it!</h2>
                <p>Bet on exiting and fast-paced dog races in this awesome app.</p>
                <p>Designed and created by the master programmer Sem!</p>
                <p>easy to use hard to master, this app guarantees hours of fun!</p>
            </div>
        </div>
        <div class="banner-item">
            <h2>How does is work?</h2>
            <p>You begin with choosing either Joe, Bob or Al.</p>
            <p>Then continue with choosing the amount of cash you want to bet.</p>
            <p>Finally you end with placing the bet on your favorite dog and confirming your bet by pressing the "inzet" button.</p>
            <p>Start the race with the "RACE!" button and watch the hounds battle in a race!</p>
        </div>
    </div>
    <div class="gallery">
        <img src="images/promoimage1.PNG" alt="Promotion image 1">
        <img src="images/promoimage2.PNG" alt="Promotion image 2">
    </div>
    <div class="download">
        <?php
            if ($_SESSION == true){
                ?><a href="downloads/gokkers.exe">Download</a><?php
            }
            else {
                ?><h2>Log-in to download!</h2><?php
            }
        ?>
    </div>
</body>
</html>

<?php require 'footer.php'; ?>