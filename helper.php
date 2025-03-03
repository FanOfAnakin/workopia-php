<?php

function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}


//call views

function loadView($name)
{
    $viewName = basePath("views/{$name}.view.php");

    if (file_exists($viewName)) {
        require $viewName;
    } else {
        echo "View '{$name} Not found!'";
    }
};

//call partials

function loadPartial($name)
{
    $pathName = basePath("views/partials/{$name}.php");

    if (file_exists($pathName)) {
        require $pathName;
    } else {
        echo "Partial '{$name} Not Found!'";
    }
}

function inspect($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function inspectAndDie($value){
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}