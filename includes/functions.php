<?php

require 'app.php';

function includeTemplates( string $name, bool $home = false ){
    include TEMPLATES_URL . "/{$name}.php";
}