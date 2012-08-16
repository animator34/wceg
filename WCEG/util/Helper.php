<?php
namespace WCEG\util;
/**
 * Description of Helper
 *
 * @author Peter Legéň <juicyrevenge@gmail.com>
 */
use WCEG\lang\String;

class Helper {
    public static function isString($var) {
        if (is_string($var) || $var instanceof String) {
            return true;
        }
        return false;
    }
}

?>
