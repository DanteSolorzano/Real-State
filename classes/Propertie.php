<?php

namespace App;

class Propertie {

        //Database 
        protected static $db;
        protected static $columnsDb = ['id', 'title', 'price', 'image', 'description', 'bedrooms', 'wc', 'parking', 'created_at', 'sellers_id'];

        //Errors
        protected static $errors = [];

        public $id;
        public $title; 
        public $price;
        public $image;
        public $description; 
        public $bedrooms; 
        public $wc; 
        public $parking; 
        public $created_at;
        public $sellers_id;

         //define connection to db
        public static function setDB($database){
            self::$db = $database;
        }

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->title = $args['title'] ?? '';
            $this->price = $args['price'] ?? '';
            $this->image = $args['image'] ?? '';
            $this->description = $args['description'] ?? '';
            $this->bedrooms = $args['bedrooms'] ?? '';
            $this->wc = $args['wc'] ?? '';
            $this->parking = $args['parking'] ?? '';
            $this->created_at = date('Y/m/d') ?? '';
            $this->sellers_id = $args['sellers_id'] ?? 1;
        }

        public function save() {
            if(!is_null($this->id)){
                $this->update();
            } else {
                //create a new property
                $this->create();
            }
    }

        public function create() {
            
            //Sanitize the data
            $attributes = $this->sanitizeAttributes();

            //insert in the database
            $query = "INSERT INTO properties ( ";
            $query .= join(', ', array_keys($attributes)); 
            $query .= " ) VALUES ('";  
            $query .= join("', '", array_values($attributes)); 
            $query .= "')";
          
            $result = self::$db->query($query);

            if($result){
                 //redirect the user after create a propertie

                 header('Location: /admin?resultCreate=1');
              }
        }

        public function update(){
            //Sanitize the data
            $attributes = $this->sanitizeAttributes();

            $values = [];
            foreach($attributes as $key => $value){
              $values[] = "{$key}='{$value}'";
            }

            $query = "UPDATE properties SET "; 
            $query .= join(', ', $values );
            $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
            $query .= "LIMIT 1";

            $result = self::$db->query($query);
    
             if($result){
                 //redirect the user after update a propertie
                 header('Location: /admin?resultCreate=2');
            }
        }

        //delete
        public function delete() {

            $query = "DELETE FROM properties WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
            $result = self::$db->query($query);
                
                 if($result){
                $this->deleteImage();
                 //redirect the user after delete a propertie
                 header('Location: /admin?resultCreate=3');
            }

        }

        //identify and join the attributes of the database
        public function attributes(){
            $attributes = [];
            foreach(self::$columnsDb as $column){
                if($column == 'id') continue;
                $attributes[$column] = $this->$column;
            }
            return $attributes;
        }

        public function sanitizeAttributes() {
            $attributes = $this->attributes();
            $sanitice = [];

            foreach($attributes as $key => $value){
                $sanitice[$key] = self::$db->escape_string($value);
            }
            return $sanitice; 
        }

        public static function getErrors(){
            return self::$errors;
        }

        //validate
        public function validate(){

        if(!$this->title){
            self::$errors[] = 'A title is required';
        } elseif (strlen($this->title) > 45) {  // Asegurar que no supere 45 caracteres
            self::$errors[] = 'The title cannot exceed 45 characters';
        }

        if(!$this->price){
            self::$errors[] = 'A price is required';
        }

        if(strlen($this->description) < 50){
            self::$errors[] = 'A description is required and must be at least 50 characters long';
        }

        // if(empty($_FILES['image']['name']) || $_FILES['image']['size'] === 0) {
        //     self::$errors[] = 'You must select an image file';
        // } 

        if(!$this->bedrooms){
            self::$errors[] = 'The number of bedrooms is required';
        }

        if(!$this->wc){
            self::$errors[] = 'The number of wc is required';
        }

        if(!$this->parking){
            self::$errors[] = 'The number of parking is required';
        }

        // Usamos sellers_id con "s" como lo corregimos anteriormente
        if(!$this->sellers_id){
            self::$errors[] = 'You have to select a seller or agent';
        }

        if (!$this->image){
            self::$errors[] = 'An image is required';
        }

        return self::$errors; // Es buena práctica retornar el arreglo de errores al final
    }

    public function setImage($image){
        //delete the previous image if you updating a porperty

        if(!is_null($this->id)){
            $this->deleteImage();
        }

        if($image) {
            $this->image = $image;
        }
    }

    //delete the file 
    public function deleteImage(){
        $existsFile = file_exists(IMAGES_FILE . $this->image);
            if($existsFile){
                unlink(IMAGES_FILE . $this->image);
            }
    }

    //list all the poperties
    public static function all() {
        $query = "SELECT * FROM properties";

        $result = self::consultSQL($query);

        return $result;
    }

    //Find a propertie by id
    public static function find($id) {
            $query = "SELECT * FROM properties WHERE id = {$id}";
            $result = self::consultSQL($query);

            return (array_shift($result));

    }


    public static function consultSQL($query) {
        //consult the database
        $result = self::$db->query($query);

        //iterate on the result
        $array = [];
        while($registration = $result->fetch_assoc()){
            $array[] = self::createObject($registration);
        }

        //free the storage
        $result->free();

        //return the result
        return $array;
    }

    protected static function createObject($registration){

            $object = new self;

            foreach($registration as $key => $value){
                if(property_exists( $object, $key )){
                        $object->$key = $value;
                }
            }

        return $object;

    }

    //syncronize the object on memory with the changes made by the user
    public function syncr( $args = [] ) {
            foreach($args as $key => $value){
                if(property_exists($this, $key) && !is_null($value)){
                    $this->$key = $value;
                }
            }
    }


}