<?php

//gets all sponsors from DB and renders them using renderSponsor()
function renderSponsors() {

    $sponsors = getSponsors();
    foreach ($sponsors as $sponsor) {
        renderSponsor($sponsor->text, $sponsor->url, $sponsor->alt);
    }
}

//renders the specified sponsor
function renderSponsor($text, $url, $alt) {
    ?>

    <div class="well col-md-3 col-sm-6 col-xs-8" style='text-align: center; height: 400px;'>
        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
        <p><?php echo $text; ?></p>
    </div>

    <?php
}

//gets all sponsors from DB and renders them as editable objects using renderEditableSponsor()
function renderEditableSponsors() {

    $sponsors = getSponsors();
    foreach ($sponsors as $sponsor) {
        renderEditableSponsor($sponsor->id, $sponsor->text, $sponsor->url, $sponsor->alt);
    }
}

//renders the specified sponsor as an editable object
function renderEditableSponsor($id, $text, $url, $alt) {
    ?>

    <div data-id="<?php echo $id; ?>" class="well col-md-3 col-sm-6 col-xs-8" style='text-align: center; height: 400px;'>
        <input type="button" onclick="deleteSponsor(this)" value="Ta bort">
        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
        <br><label for="sponsors[<?php echo $id; ?>][image_url]">Image url: </label><input name="sponsors[<?php echo $id; ?>][image_url]" type="text" placeholder="Image url" value="<?php echo $url; ?>">
        <br><label for="sponsors[<?php echo $id; ?>][image_alt]">Image alt: </label><input name="sponsors[<?php echo $id; ?>][image_alt]" type="text" placeholder="Image alt-text" value="<?php echo $alt; ?>">
        <input id="<?php echo "hidden_sponsor" . $id; ?>" type="hidden" value="<?php echo $text; ?>">
        <textarea id="<?php echo "sponsor" . $id ?>" name="sponsors[<?php echo $id; ?>][text]" placeholder="text"><?php echo $text; ?></textarea>
        <input onclick="resetInput('<?php echo "sponsor" . $id; ?>')" type="button" value="Reset">
    </div>
    <?php
}

//gets all fields from DB and renders them using renderSponsor()
function renderFields() {

    $fields = getFields();
    foreach ($fields as $field) {
        renderField($field->text, $field->url, $field->alt);
    }
}

//renders the specified field
function renderField($text, $url, $alt) {
    ?>

    <div class="well col-md-3 col-sm-6 col-xs-8" style='text-align: center; height: 400px;'>
        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
        <p><?php echo $text; ?></p>
    </div>

    <?php
}

//gets all fields from DB and renders them as editable objects using renderEditableField()
function renderEditableFields() {

    $fields = getFields();
    foreach ($fields as $field) {
        renderEditableField($field->id, $field->text, $field->url, $field->alt);
    }
}

//renders the specified sponsor as an editable object
function renderEditableField($id, $text, $url, $alt) {
    ?>

    <div data-id="<?php echo $id; ?>" class="well col-md-3 col-sm-6 col-xs-8" style='text-align: center; height: 400px;'>
        <input type="button" onclick="deleteEduField(this)" value="Ta bort">
        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
        <br><label for="fields[<?php echo $id; ?>][image_url]">Image url: </label><input name="fields[<?php echo $id; ?>][image_url]" type="text" placeholder="Image url" value="<?php echo $url; ?>">
        <br><label for="fields[<?php echo $id; ?>][image_alt]">Image alt: </label><input name="fields[<?php echo $id; ?>][image_alt]" type="text" placeholder="Image alt-text" value="<?php echo $alt; ?>">
        <input id="<?php echo "hidden_field" . $id; ?>" type="hidden" value="<?php echo $text; ?>">
        <textarea id="<?php echo "field" . $id; ?>" name="fields[<?php echo $id; ?>][text]" placeholder="text"><?php echo $text; ?></textarea>
        <input onclick="resetInput('<?php echo "field" . $id; ?>')" type="button" value="Reset">
    </div>

    <?php
}

//gets textarea with specified id from DB and renders it as an editable object
function renderEditableTextarea($id) {
    
    $text = getTextarea($id);
    ?>
    
    <input id="<?php echo "hidden_" . $id; ?>" type="hidden" value="<?php echo $text; ?>">
    <textarea id="<?php echo $id; ?>" name="<?php echo $id; ?>"><?php echo $text; ?></textarea>
    <input onclick="resetInput('<?php echo $id; ?>')" type="button" value="Reset">
    
    <?php
}
