<?php 
//create FaceMask class 
class FaceMask {
    // fields
    private $ID;
    private $name;
    private $description;
    private $price;
    private $image;
    private $type;

    public function __construct($ID, $name, $description, $price, $image, $type)
    {
        $this->ID = $ID;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->type = $type;

    }
}




?>