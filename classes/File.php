<?php 
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes;


class File{
    
    private $name,$tmpName,$uploadName;

    public function __construct($file)
    {
        $this->name=$file['name'];
        $this->tmpName=$file['tmp_name'];
    }

    // now we want to make a function to rename the image name as a random name
    // this help us if two photo with the same name
    public function rename(){
        $extention=pathinfo($this->name,PATHINFO_EXTENSION);
        $randomStr=uniqid();
        
        $this->uploadName="$randomStr.$extention";
        return $this ;
    }

    public function uploads(){
        $destination = PATH."uploads/".$this->uploadName;

        move_uploaded_file($this->tmpName,$destination);
        return $this->uploadName;
    }


}












?>