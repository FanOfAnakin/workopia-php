<?php

function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}


//call views

function loadView($name, $data = [])
{
    $viewName = basePath("App/views/{$name}.view.php");

    if (file_exists($viewName)) {
        extract($data);
        require $viewName;
    } else {
        echo "View '{$name} Not found!'";
    }
};

//call partials

function loadPartial($name)
{
    $pathName = basePath("App/views/partials/{$name}.php");

    if (file_exists($pathName)) {
        require $pathName;
    } else {
        echo "Partial '{$name} Not Found!'";
    }
}

function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function inspectAndDie($value)
{
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}

function formatSal($salary)
{
    return '$' . number_format(floatval($salary));
}

function sanitize($unauth)
{
    return filter_var(trim($unauth), FILTER_SANITIZE_SPECIAL_CHARS);
}
