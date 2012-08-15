<?php

namespace WCEG\lang;

/**
 * Description of String
 *
 * @author Peter Legéň <juicyrevenge@gmail.com>
 */
final class StringUtil extends Object {

    private $string;

    public function __construct($param) {
        if (is_string($param) || is_numeric($param)) {
            $this->string = $param;
        } else {
            throw new TypeMismatchException("Cannot create string from non-string object.");
        }
    }

    public function getString() {
        return $this->string;
    }

    public function charAt($index) {
        if (is_int($index)) {
            return substr($this->string, $index, 1);
        } else {
            throw new TypeMismatchException("InputMismatch: You have to input integer.");
        }
    }

    public function compareTo($obj, $caseSensitive = false) {
        if (is_string($obj) || is_numeric($obj)) {
            if ($caseSensitive) {
                $int = strcmp($this->string, $obj);
            } else {
                $int = strcasecmp($this->string, $obj);
            }
            if ($int > 0) {
                return 1;
            } else if ($int < 0) {
                return -1;
            } else {
                return 0;
            }
        } else {
            throw new TypeMismatchException("Cannot compare with non-string object.");
        }
    }

    public function concat($str) {
        if (is_string($str) || is_numeric($str)) {
            return $this->string . $str;
        } else {
            throw new TypeMismatchException("Cannot concat with non-string object.");
        }
    }

    public function endsWith($suffix) {
        if (is_string($suffix) || is_numeric($suffix)) {
            $cmp = substr($this->string, -strlen($suffix));
            if (strcmp($cmp, $suffix) == 0) {
                return true;
            }
            return false;
        } else {
            throw new TypeMismatchException("Suffix must be a string.");
        }
    }

    public function equals($obj, $caseSensitive = false) {
        if (is_string($obj) || is_numeric($obj)) {
            if ($caseSensitive) {
                $int = strcmp($this->string, $obj);
            } else {
                $int = strcasecmp($this->string, $obj);
            }
            if ($int == 0) {
                return true;
            }
            return false;
        } else {
            throw new TypeMismatchException("Cannot compare with non-string object.");
        }
    }

    public function getBytes() {
        return unpack('C*', $this->string);
    }

    public function getChars() {
        $array = array();
        for ($i = 0; $i < strlen($this->string); $i++) {
            $array[] = $this->charAt($i);
        }
        return $array;
    }

    public function indexOf($str, $fromIndex = 0) {
        if (!is_string($str) && !is_numeric($str)) {
           throw new TypeMismatchException("You must input a string."); 
        }
        if (!is_int($fromIndex)) {
           throw new TypeMismatchException("Index must be an integer."); 
        }
        $pos = strrpos($this->string, $str, $fromIndex);
        if ($pos === false) { // note: three equal signs
            return -1;
        }
        return $pos;
    }

    public function lastIndexOf($str) {
        if (!is_string($str) && !is_numeric($str)) {
           throw new TypeMismatchException("You must input a string."); 
        }
        $lastIndex = -1;
        while(true) {
            $index = $this->indexOf($str, $lastIndex+1);
            if ($index == -1) {
                break;
            }
            $lastIndex = $index;
        }
        return $lastIndex;
    }
    
    public function length() {
        return strlen($this->string);
    }
    
    public function matches($regex) {
        $arr = preg_match($regex, $this->string);
        if (!empty($arr)) {
            return true;
        } 
        return false;
    }

    /**
     * Returns substring of string with begin index and end index.
     * 
     * @param String $beginIndex
     * @param String $endIndex (optional)
     * @return String
     * @throws \Exception
     */
    public function substring($beginIndex, $endIndex = null) {
        if ($endIndex != null) {
            if (is_int($beginIndex) && is_int($endIndex)) {
                return substr($this->string, $beginIndex, ($endIndex - $beginIndex));
            } else {
                throw new TypeMismatchException("InputMismatch: You have to input integer.");
            }
        } else {
            if (is_int($beginIndex)) {
                return substr($this->string, $beginIndex);
            } else {
                throw new TypeMismatchException("InputMismatch: You have to input integer.");
            }
        }
    }

}

?>
