<?php
class ImageValidation {
    
    public $_msg;

    public function __construct()
    {
        $this-> _msg = array();
    }
    
    public function validator()
    {
        if(!empty($_FILES)){
            if($_FILES["fileToUpload"]["size"] > 3000000){
                $this-> _msg["status"] = "File is too big";
            }
            elseif(!strstr($_FILES["fileToUpload"]["type"], "image")){
                $this-> _msg["status"] =  "File Type Not Supported Only images allowed";
            }
            else{
                $this->_msg["name"] = uniqid();
                $this-> _msg["status"] = "File Uploaded Successfully";
            }
        }
        return $this-> _msg;
    }
    
}