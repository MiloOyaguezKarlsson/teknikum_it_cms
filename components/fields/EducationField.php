<?php
class EducationField {

    public $id;
    public $text;
    public $url;
    public $alt;

    public function __construct($id, $text, $url, $alt) {

        $this->id = $id;
        $this->text = $text;
        $this->url = $url;
        $this->alt = $alt;
    }
} ?>
