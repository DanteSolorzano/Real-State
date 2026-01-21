<?php

namespace App;

class Propertie {
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

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? '';
            $this->title = $args['title'] ?? '';
            $this->price = $args['´roce'] ?? '';
            $this->image = $args['image'] ?? '';
            $this->description = $args['description'] ?? '';
            $this->bedrooms = $args['bedrooms'] ?? '';
            $this->wc = $args['wc'] ?? '';
            $this->parking = $args['parking'] ?? '';
            $this->created_at = $args['created_at'] ?? '';
            $this->seller_id = $args['seller_id'] ?? '';
        }

}