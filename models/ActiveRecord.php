<?php 

namespace Model;

class ActiveRecord {

        //Database 
        protected static $db;
        protected static $columnsDb = [];
        protected static $table = '';

        //Errors
        protected static $errors = [];
        
         //define connection to db
        public static function setDB($database){
            self::$db = $database;
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
            $query = "INSERT INTO " . static::$table .  " ( ";
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

            $query = "UPDATE " . static::$table . " SET "; 
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

            $query = "DELETE FROM "  . static::$table .  " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
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
            foreach(static::$columnsDb as $column){
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

            return static::$errors;
        }

        //validate
        public function validate(){
            static::$errors = [];
            return static::$errors; // Es buena práctica retornar el arreglo de errores al final
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
        $query = "SELECT * FROM " . static::$table;

        $result = self::consultSQL($query);

        return $result;
    }

    //obtain determined number of register
     public static function get($quantity) {
        $query = "SELECT * FROM " . static::$table . " LIMIT " . $quantity;

        $result = self::consultSQL($query);

        return $result;
    }

    //Find a propertie by id
    public static function find($id) {
            $query = "SELECT * FROM "  . static::$table .  " WHERE id = {$id}";
            $result = self::consultSQL($query);

            return (array_shift($result));

    }


    public static function consultSQL($query) {
        //consult the database
        $result = self::$db->query($query);

        //iterate on the result
        $array = [];
        while($registration = $result->fetch_assoc()){
            $array[] = static::createObject($registration);
        }

        //free the storage
        //$result->free();

        //return the result
        return $array;
    }

    protected static function createObject($registration){

            $object = new static;

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

