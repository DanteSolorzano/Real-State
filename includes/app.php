<?php

require 'functions.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//connection db

$db = connectionDb();

use App\Propertie;

Propertie::setDB($db);
