<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <link href="../bootstrap337.css" rel="stylesheet" type="text/css"/>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include '../connection.php';    //database connection
        include '../components.php';    //component renderers
        ?>
        <form action="save.php" method="post">
            <input type="submit" value="Spara">
            <div style="width: 80%; margin: 2% 10%;">
                <h1>TEKNIKUM TEKNIKPROGRAM</h1>
                <div style="width: 100%;">
                    <h2>vad vi gör</h2>
                    <?php renderEditableTextarea("textarea1"); ?>
                </div>
                <div style="width: 100%;">
                    <h2>hur vi gör det</h2>
                    <?php renderEditableTextarea("textarea2"); ?>
                </div>
                <div id="sponsors" class="row">
                    <?php renderEditableSponsors(); ?>
                    <input id="newSponsorButton" type="button" onclick="newSponsor()" value="Ny sponsor">
                </div>
                <div id="edufields" class="row">
                    <?php renderEditableFields(); ?>
                    <input id="newEduFieldButton" type="button" onclick="newEduField()" value="Nytt område">
                </div>
            </div>
        </form>
    </body>
</html>
<script>
    //resets the input field by retrieving the text that was in it before user edited it
    function resetInput(id) {

        var value = $("#hidden_" + id).val();   //get value of hidden input field
        $("#" + id).val(value); //set value of visible input field
    }
    
    //removes the sponsor div-element containing the calling button
    function deleteSponsor(btn) {
        $(btn).offsetParent()[0].remove();
    }
    
    //creates a new sponsor div
    function newSponsor() {

        var id = Number(findHighestId("#sponsors")) + 1;
        var newSponsorHtml =
                "<div data-sponsorid='" + id + "' class='well col-md-3 col-sm-6 col-xs-8' style='text-align: center; height: 400px;'>" +
                "<input type='button' onclick='deleteSponsor(this)' value='Ta bort'>" +
                "<br><label for='sponsors[" + id + "][image_url]'>Image url: </label><input name='sponsors[" + id + "][image_url]' type='text' placeholder='Image url'>" +
                "<br><label for='sponsors[" + id + "][image_alt]'>Image alt: </label><input name='sponsors[" + id + "][image_alt]' type='text' placeholder='Image alt-text' value=''>" +
                "<textarea name='sponsors[" + id + "][text]' placeholder='text'></textarea>" +
                "</div>";

        $("#sponsors").append(newSponsorHtml);
        $("#sponsors").append($("#newSponsorButton"));
    }

    //deletes the education field div containing the calling button
    function deleteEduField(btn) {
        $(btn).offsetParent()[0].remove();
    }

    //creates a new education field div
    function newEduField() {

        var id = Number(findHighestId("edufields")) + 1;
        var newFieldHtml =
                "<div data-id='" + id + "' class='well col-md-3 col-sm-6 col-xs-8' style='text-align: center; height: 400px;'>" +
                "<input type='button' onclick='deleteEduField(this)' value='Ta bort'>" +
                "<br><label for='fields[" + id + "][image_url]'>Image url: </label><input name='fields[" + id + "][image_url]' type='text' placeholder='Image url'>" +
                "<br><label for='fields[" + id + "][image_alt]'>Image alt: </label><input name='fields[" + id + "][image_alt]' type='text' placeholder='Image alt-text'>" +
                "<textarea name='fields[" + id + "][text]' placeholder='text'></textarea>" +
                "</div>";

        $("#edufields").append(newFieldHtml);
        $("#edufields").append($("#newEduFieldButton"));
    }

    //finds the highest data attribute id in the specified selector (e.g. "#sponsors")
    function findHighestId(selector) {

        var lastElement = $(selector).children("div").last();
        if (lastElement[0] === undefined) {
            return 0;
        }
        return lastElement[0].dataset.id;
    }
</script>