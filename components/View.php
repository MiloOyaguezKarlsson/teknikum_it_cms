<?php
/**
 *
 */
require_once("components.php");
require_once("header.php");
require_once("utbildning.php");
require_once("om.php");
require_once("foretag.php");
require_once("bilder.php");
require_once("praktik.php");
require_once("menu.php");
require_once("footer.php");
require_once("fields/EducationField.php");
require_once("fields/SponsorField.php");

class View
{

  function __construct()
  {

  }

  public function render()
  {
    $databaseHandler = new DatabaseHandler();
    $conn = $databaseHandler->get_connection();

    $logo = $this->getLogo($conn);
    $texts = $this->getAllTextFields($conn);
    $slides = $this->getSlides($conn);
    $educations = $this->getEducations($conn);
    $sponsors = $this->getSponsors($conn);
    //$images => $this->getImages($conn);
    $albums = $this->getAlbums($conn);

    $conn->close();

    $args->h1 = $texts["header-h1"];
    $args->h3 = $texts["header-h3"];
    $args->p = $texts["header-p"];

    $args3->h1 = $texts["about-h1"];
    $args3->h2 = $texts["about-h2"];
    $args3->p = $texts["about-p"];
    $args3->images = $slides;

    $args2 = $educations;

    $args4->h1 = $texts["companies-h1"];
    $args4->companies = $sponsors;

    $args6 = (object) [
      "h1" => $texts["internship-h1"],
      "p" => $texts["internship-p"]
    ];

    $args7 = (object) [
      "logo" => (object) [
        "src" => $logo->src,
        "alt" => $logo->alt
      ],
      "p" => $texts["footer-p"]
    ];

    $header = new Header();
    $about = new About();
    $education = new Utbildning();
    $companies = new Companies();
    $images = new Images();
    $internship = new Internship();
    $footer = new Footer();
    $menu = new Menu();


    echo $menu->render($logo);
    echo $header->render($args);
    echo $about->render($args3);
    echo $education->render($args2);
    echo $companies->render($args4);
    echo $images->render($albums);
    echo $internship->render($args6);
    echo $footer->render($args7);
  }

  private function getTextField($fieldsId, $conn) {
    $textAreas = array();

    foreach ($fieldsId as $fieldId) {
      $sql = "SELECT content FROM textareas WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $fieldId);
      $stmt->execute();

      $textarea = "";
      $stmt->bind_result($textArea);
      $stmt->fetch();

      $conn->close();

      array_push($textAreas, $textArea);
    }

    return $textAreas;
  }

  private function getAllTextFields($conn)
  {
    $sql = "SELECT * FROM textareas";
    $result = $conn->query($sql);

    $textareas = array();

    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $textareas[$row["id"]] = $row["content"];
      }
    } else {
      return null;
    }

    return $textareas;
  }

  private function getSlides($conn)
  {
    $sql = 'SELECT * FROM bilder INNER JOIN images_components ON images_components.imageId = bilder.id WHERE images_components.componentId = "slider"';
    $result = $conn->query($sql);

    $slides = array();

    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
        $slides[] = array($row["src"], $row["alt"]);
      }
    }
    else
    {
      return null;
    }

    return $slides;
  }

  function getEducations($conn)
  {

    $fields = [];

    $result = $conn->query("SELECT * FROM utbildningar");

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_array())
        {

            $fields[] = new EducationField($row["id"], $row["text"], $row["image_url"], $row["image_alt"]);
        }
    }

    return $fields;
  }

  private function getSponsors($conn)
  {
    $sponsors = [];

    $result = $conn->query("SELECT * FROM sponsors");

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_array())
        {
            $sponsors[] = new Sponsor($row["id"], $row["text"], $row["image_url"], $row["image_alt"]);
        }
    }

    return $sponsors;
  }

  private function getLogo($conn)
  {
    $image = new stdClass();

    $result = $conn->query("SELECT * FROM bilder WHERE id = 1");

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_array())
        {
            $image = (object)["src" => $row["src"], "alt" => $row["alt"]];
        }
    }

    return $image;
  }

  private function getImages($conn)
  {

  }

  private function getAlbums($conn)
  {
    $albumd = [];

    $result = $conn->query("SELECT bilder.alt, bilder.src, bilder.id, albums.name, albums.text FROM bilder INNER JOIN images_components ON bilder.id = images_components.imageId INNER JOIN albums ON albums.name = images_components.componentId");

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_array())
        {
            $image = array("src" => $row["src"], "alt" => $row["alt"]);
            $albums[$row["name"]]["h2"] = $row["name"];
            $albums[$row["name"]]["p"] = $row["text"];
            $albums[$row["name"]]["images"][] = $image;
        }
    }

    return $albums;
  }
}

?>
