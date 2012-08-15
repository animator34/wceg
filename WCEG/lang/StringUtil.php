<?php

namespace WCEG\lang;

/**
 * Description of String
 *
 * @author Peter Legéň <juicyrevenge@gmail.com>
 */
final class StringUtil {

    private $string;

    public function __construct($param) {
        if (is_string($param)) {
            $this->string = $param;
        } else {
            throw new \Exception("Cannot create string from non-string object.");
        }
    }

    public function getString() {
        return $this->string;
    }

    public function substring($beginIndex, $endIndex = null) {
        if ($endIndex != null) {
            if (is_int($beginIndex) && is_int($endIndex)) {
                return substr($this->string, $beginIndex, ($endIndex-$beginIndex));
            } else {
                throw new \Exception("InputMismatch: You have to input integer.");
            }
        } else {
            if (is_int($beginIndex)) {
                return substr($this->string, $beginIndex);
            } else {
                throw new \Exception("InputMismatch: You have to input integer.");
            }
        }
    }
}

?>
