<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <link href="bootstrap337.css" rel="stylesheet" type="text/css"/>
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include "connection.php";
        include "components.php";
        ?>
        <div style="width: 80%; margin: 2% 10%;">
            <h1>TEKNIKUM TEKNIKPROGRAM</h1>
            <div>
                <h2>vad vi gör</h2>
                <p id="textarea1"><?php echo getTextarea("textarea1"); ?></p>
            </div>
            <div>
                <h2>hur vi gör det</h2>
                <p id="textarea2"><?php echo getTextarea("textarea2"); ?></p>
            </div>
        </div>
        <div id="sponsors" class="row">
            <h1>Våra sponsorer</h1>
            <?php
            renderSponsors();
            ?>
        </div>
        <div id="edufields" class="row">
            <h1>Utbildningsområden</h1>
            <?php
            renderFields();
            ?>
        </div>
    </body>
</html>