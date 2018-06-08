<!DOCTYPE html>
<html>
    <body>
        <?php
        
        //include connection functions
        include '../connection.php';
        
        //get input
        $input = filter_input_array(INPUT_POST);
        
        //update text areas
        updateTextarea("textarea1", $input["textarea1"]);
        updateTextarea("textarea2", $input["textarea2"]);
        
        //update sponsors
        $sponsorInput = $input["sponsors"];
        
        $sponsors = [];
        
        foreach($sponsorInput as $sponsor)
        {
            $sponsors[] = new Sponsor(0, $sponsor["text"], $sponsor["image_url"], $sponsor["image_alt"]);
        }
        updateSponsors($sponsors);
        
        //update edu fields
        $fieldInput = $input["fields"];
        
        $fields = [];
        
        foreach($fieldInput as $field) {
            $fields[] = new Field(0, $field["text"], $field["image_url"], $field["image_alt"]);
        }
        updateFields($fields);
        //redirect to index
        header("Location: ../index.php");
        ?>
    </body>
</html>