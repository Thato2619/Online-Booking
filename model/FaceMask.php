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
    private $availability = true;

    public function __construct($ID, $name, $description, $price, $image, $type)
    {
        $this->ID = $ID;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->type = $type;
    }

    //methods
    // if returns true, then facemasks are available for sale,
    // if returns false, facemask are out of stock
    public function faceMaskSell() {

        if($this->availability) {

            $this->availability = false;
            return true;
        } else {
            return false;
        }
    }

    public function faceMaskPrice() {
        return $this->price;
    }

    public function checkAvailableStock(){
        if ($this->availability) {
            if ($this->available) {
                return "<li style='color:green;'>Available</li>";
            } else {
                return "<li style='color:red;> Out Of Stock</li>";
            }
        }
    }
}




?>