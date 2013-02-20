<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <head>
    <link rel="stylesheet" href="styles/style.css" type="text/css"></link>
    </head>
    <body>

    </body>
</html>
<?php

/**
 * @author Peter Sokolík <pesoklp13@gmail.com>
 */
require_once "WCEG/SplClassLoader.php";
//require_once "WCEG/Smarty.class.php";
require_once "WCEG/Twig/Autoloader.php";
/**
 * binding namespace of WCEG Framework to load librarys
 */
//$smarty = new Smarty();

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("templates");

$twig = new Twig_Environment($loader,array(
  //'debug' => true,
    'cache' => 'templates_c',
    'auto_reload' => true
));

$clsLoader = new SplClassLoader("WCEG", "WCEG");
$clsLoader->register();
?>
