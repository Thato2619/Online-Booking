<?php 
//create FaceMask class 
class FaceMask {
    // fields
    private $ID;
    private $name;
    private $description;
    private $price;
    private $image;
    private $availability = true;

    public function __construct( $name, $description, $price, $image)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;

        $this->ID = $this->generateID();
    }

    //methods

    #create static function method to create from the database
    public static function newFaceMaskFromDB($row) {
        $facemask = new FaceMask($row->name, $row->description, $row->price, $row->image);
        $facemask->setID($row->ID);
        $facemask->setAvailabilty($row->availability);

        return $facemask;
        
    }
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
            if ($this->availability) {
                return "<li style='color:green;'>Available</li>";
            } else {
                return "<li style='color:red;> Out Of Stock</li>";
            }
        }
    }

    private function generateID() {
        $randomIdNumber = rand(10000, 90000);
        $id = md5($randomIdNumber);

        return $this->ID;
    }

    // getters and setters
    #getter and setter for ID
    public function getID() {
        return $this->ID;
    }
    public function setID($ID){
        $this->ID = $ID;

        return $this;
    }

    #getter and setter for name
    public function getName(){
        return $this->name;
    }
    public function setName($name) {
        return $this->name = $name;

        return $this;
    }
    
    #getter and setter for description
    public function getDescription() {
        return $this->description;
    }
    public function setDescription($description) {
        return $this->description = $description;

        return $this;
    }
    
    #getter and setter for price
    public function getPrice() {
        return $this->price;
    }
    public function setPrice($price) {
        return $this->price = $price;

        return $this;
    }

    #getter and setter for image
    public function getImage() {
        return $this->image;
    }
    public function setImage($image) {
        return $this->image = $image;

        return $this;
    }
    

    #getter and setter for availabilty
    public function getAvailability() {
        return $this->availability;
    }
    public function setAvailabilty($availability) {
        return $this->availability = $availability;

        return $this;
    }
    
    
}




?>