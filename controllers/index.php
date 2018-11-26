<?php

// Autoload the class
function loadClass($classname){
    if(file_exists('../model/'. $classname.'.php')) {
        require '../model/'. $classname.'.php';
    }
    else {
        require '../entities/' . $classname . '.php';
    }
}

spl_autoload_register('loadClass');


$db = Database::DB();
$personnageManager = new PersonnageManager($db);

$personnages = $personnageManager->getPersonnages();


include "../views/indexVue.php";
