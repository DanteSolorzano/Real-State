<?php

require 'functions.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//connection db

$db = connectionDb();

use Model\ActiveRecord;

ActiveRecord::setDB($db);
