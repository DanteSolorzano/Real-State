<?php

namespace App;

class Propertie {

        //Database 
        protected static $db;
        protected static $columnsDb = ['id', 'title', 'price', 'image', 'description', 'bedrooms', 'wc', 'parking', 'created_at', 'seller_id'];

        public $id;
        public $title; 
        public $price;
        public $image;
        public $description; 
        public $bedrooms; 
        public $wc; 
        public $parking; 
        public $created_at;
        public $seller_id;

         //define connection to db
        public static function setDB($database){
            self::$db = $database;
        }

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? '';
            $this->title = $args['title'] ?? '';
            $this->price = $args['price'] ?? '';
            $this->image = $args['image'] ?? 'image.jpg';
            $this->description = $args['description'] ?? '';
            $this->bedrooms = $args['bedrooms'] ?? '';
            $this->wc = $args['wc'] ?? '';
            $this->parking = $args['parking'] ?? '';
            $this->created_at = date('Y/m/d') ?? '';
            $this->seller_id = $args['seller_id'] ?? '';
        }

        public function save() {
            
            //Sanitize the data
            $attributes = $this->sanitizeAttributes();



            //insert in the database
            $query = "INSERT INTO properties (title, price, image, description, bedrooms, wc, parking, created_at, sellers_id) VALUES ('$this->title', '$this->price', '$this->image', '$this->description', '$this->bedrooms', '$this->wc', '$this->parking', '$this->created_at', '$this->seller_id' )";
          
            $result = self::$db->query($query);

            debugger($result);

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
            debugger($attributes);
        }

       

}