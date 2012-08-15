<?php

/**
 * @author Peter Sokolík <pesoklp13@gmail.com>
 */
require_once "WCEG/SplClassLoader.php";

/**
 * binding namespace of WCEG Framework to load librarys
 */

$loader = new SplClassLoader("WCEG", "WCEG");
$loader->register();
?>
