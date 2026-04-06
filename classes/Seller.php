<?php

namespace App;

class Seller extends Activerecord {

    protected static $table = 'sellers';
    protected static $columnsDb = ["id", "name", "lastname", "phone_number"];

    public $id;
    public $name;
    public $lastname;
    public $phone_number;


    public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->name = $args['name'] ?? '';
            $this->lastname = $args['lastname'] ?? '';
            $this->phone_number = $args['phone_number'] ?? '';
        }

    public function validate(){

            if(!$this->name){
                self::$errors[] = 'A name is required';
            } elseif (strlen($this->name) > 45) {  // Asegurar que no supere 45 caracteres
                self::$errors[] = 'The name cannot exceed 45 characters';
            }

            if(!$this->lastname){
                self::$errors[] = 'A lastname is required';
            } elseif (strlen($this->name) > 45) {  // Asegurar que no supere 45 caracteres
                self::$errors[] = 'The lastname cannot exceed 45 characters';
            }

            if(!$this->phone_number){
                self::$errors[] = 'A phone number is required';
            }

            if(!preg_match('/[0-9]{10}/', $this->phone_number)){
                self::$errors[] = 'Invalid format. Please enter a 10-digit number.';

            }

            return self::$errors;
    }
         
}