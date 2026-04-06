<?php

namespace App;

class Propertie extends Activerecord {

    protected static $table = 'properties';
    protected static $columnsDb = ['id', 'title', 'price', 'image', 'description', 'bedrooms', 'wc', 'parking', 'created_at', 'sellers_id'];

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
            $this->sellers_id = $args['sellers_id'] ?? '';
        }

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

}