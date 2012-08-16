<?php

namespace WCEG\lang;
use WCEG\util\Helper;
/**
 * Description of String
 *
 * @author Peter Legéň <juicyrevenge@gmail.com>
 */
final class String extends Object {

    private $string;

    /**
     * @description
     * Creates an instance of object - String.
     * 
     * @param String $param
     * @throws TypeMismatchException
     */
    public function __construct($param) {
        if (Helper::isString($param) || is_numeric($param)) {
            $this->string = $param;
        } else {
            throw new TypeMismatchException("Cannot create string from non-string object.");
        }
    }

    /**
     * @description
     * Returns object of String as native php string.
     * 
     * @return native string
     */
    public function getString() {
        return $this->string;
    }

    /**
     * @description
     * Returns character at position specified by the index.
     * 
     * @param int $index
     * @return String
     * @throws TypeMismatchException
     */
    public function charAt($index) {
        if (is_int($index)) {
            return substr($this->string, $index, 1);
        } else {
            throw new TypeMismatchException("InputMismatch: You have to input integer.");
        }
    }

    /**
     * @description
     * Compares another object of String to this object of String. Can be case-sensitive and insensitive.
     * 
     * @param String $obj
     * @param boolean $caseSensitive
     * @return int
     * @throws TypeMismatchException
     */
    public function compareTo($obj, $caseSensitive = false) {
        if (Helper::isString($obj) || is_numeric($obj)) {
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
    /**
     * @description
     * Concates other string at the end of this string.
     * 
     * @param String $str
     * @return String
     * @throws TypeMismatchException
     */
    public function concat($str) {
        if (Helper::isString($str) || is_numeric($str)) {
            return new String($this->string . $str);
        } else {
            throw new TypeMismatchException("Cannot concat with non-string object.");
        }
    }

    /**
     * @description
     * Return true if this String ends with specified suffix.
     * 
     * @param String $suffix
     * @return boolean
     * @throws TypeMismatchException
     */
    public function endsWith($suffix) {
        if (Helper::isString($suffix) || is_numeric($suffix)) {
            $cmp = substr($this->string, -strlen($suffix));
            if (strcmp($cmp, $suffix) == 0) {
                return true;
            }
            return false;
        } else {
            throw new TypeMismatchException("Suffix must be a string.");
        }
    }

    /**
     * @description
     * Returns true if this String equals to another String specified.
     * 
     * @param String $obj
     * @param boolean $caseSensitive
     * @return boolean
     * @throws TypeMismatchException
     */
    public function equalsString($obj, $caseSensitive = false) {
        if (Helper::isString($obj) || is_numeric($obj)) {
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

    /**
     * @description
     * Returns an array of bytes.
     * 
     * @return Array
     */
    public function getBytes() {
        return unpack('C*', $this->string);
    }

    /**
     * @description
     * Returns the index within this string of the first occurrence of the specified character.
     * 
     * @param String $str
     * @param int $fromIndex
     * @return int
     * @throws TypeMismatchException
     */
    public function indexOf($str, $fromIndex = 0) {
        if (!Helper::isString($str) && !is_numeric($str)) {
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

    /**
     * @description
     * Returns the index within this string of the last occurrence of the specified character.
     * 
     * @param String $str
     * @return int
     * @throws TypeMismatchException
     */
    public function lastIndexOf($str) {
        if (!Helper::isString($str) && !is_numeric($str)) {
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
    
    /**
     * @description
     * Returns the length of this string.
     * 
     * @return int
     */
    public function length() {
        return strlen($this->string);
    }
    
    /**
     * @description
     * Tells whether or not this string matches the given regular expression.
     * 
     * @param String $regex
     * @return boolean
     */
    public function matches($regex) {
        $arr = preg_match($regex, $this->string);
        if (!empty($arr)) {
            return true;
        } 
        return false;
    }
    
    /**
     * @description
     * Tests if two string regions are equal.
     * 
     * @param int $toffset
     * @param String $other
     * @param int $ooffset
     * @param int $len
     * @param boolean $caseSensitive
     * @return boolean
     * @throws TypeMismatchException
     */
    public function regionMatches($toffset, $other, $ooffset, $len, $caseSensitive=false) {
        if (!is_numeric($toffset) || !is_numeric($ooffset) || !is_numeric($len)) {
            throw new TypeMismatchException("Offsets and length must be numeric!");
        }
        if (!Helper::isString($other) && !is_numeric($other)) {
            throw new TypeMismatchException("Other string must be a string value!");
        }
        if (!is_bool($caseSensitive)) {
            throw new TypeMismatchException("CaseSensitive must be a boolean value!");
        }
        if (!$caseSensitive) {
            $int = strcasecmp(substr($this->string, $toffset, $len), substr($other, $ooffset, $len));
        } else {
            $int = strcmp(substr($this->string, $toffset, $len), substr($other, $ooffset, $len));
        }
        
        if ($int == 0) {
            return true;
        }
        return false;
        
    }
    
    /**
     * @description
     * Returns a new string resulting from replacing all occurrences of oldString in this string with newString.
     * 
     * @param String $old
     * @param String $new
     * @return String
     */
    public function replace($old, $new) {
        return new String(str_replace($old, $new, $this->string));
    }
    
    /**
     * @description
     * Replaces each substring of this string that matches the given regular expression with the given replacement and given maximum replacement limit. 
     *
     * @param String $regex
     * @param String $replace
     * @param int $limit
     * @return String
     * @throws TypeMismatchException
     */
    public function replaceRegex($regex, $replace, $limit=-1) {
        if (!is_int($limit)) {
            throw new TypeMismatchException("Limit must be integer value");
        }
        return new String(preg_replace($regex, $replace, $this->string, $limit));
    }
    
    /**
     * @description
     * Splits this string around matches of the given regular expression.
     * 
     * @param String $regex
     * @param int $limit
     * @return Array
     * @throws TypeMismatchException
     */
    public function split($regex, $limit=-1) {
        if (!is_int($limit)) {
            throw new TypeMismatchException("Limit must be integer value");
        }
        return preg_split($regex, $this->string, $limit);
    }
    
    /**
     * @description
     * Tests if this string starts with the specified prefix.
     * 
     * @param String $prefix
     * @return boolean
     * @throws TypeMismatchException
     */
    public function startsWith($prefix, $toffset = 0) {
        if (!is_int($toffset)) {
            throw new TypeMismatchException("Offset must be an integer value.");
        }
        if (Helper::isString($prefix) || is_numeric($prefix)) {
            $cmp = substr($this->string, $toffset, strlen($prefix));
            if (strcmp($cmp, $prefix) == 0) {
                return true;
            }
            return false;
        } else {
            throw new TypeMismatchException("Prefix must be a string.");
        }
    }

    /**
     * @description
     * Returns substring of string with begin index and end index.
     * 
     * @param String $beginIndex
     * @param String $endIndex (optional)
     * @return String
     * @throws TypeMismatchException
     */
    public function substring($beginIndex, $endIndex = null) {
        if ($endIndex != null) {
            if (is_int($beginIndex) && is_int($endIndex)) {
                return new String(substr($this->string, $beginIndex, ($endIndex - $beginIndex)));
            } else {
                throw new TypeMismatchException("InputMismatch: You have to input integer.");
            }
        } else {
            if (is_int($beginIndex)) {
                return new String(substr($this->string, $beginIndex));
            } else {
                throw new TypeMismatchException("InputMismatch: You have to input integer.");
            }
        }
    }
    
    /**
     * @description
     * Converts this string to a new character array.
     * 
     * @return Array
     */
    public function toCharArray() {
        $array = array();
        for ($i = 0; $i < strlen($this->string); $i++) {
            $array[] = $this->charAt($i);
        }
        return $array;
    }
    
    /**
     * @description
     * Converts all of the characters in this String to lower case using the rules of the default locale.
     * 
     * @return String
     */
    public function toLowerCase() {
        return new String(strtolower($this->string));
    }
    
    /**
     * @description
     * Converts all of the characters in this String to upper case using the rules of the default locale.
     * 
     * @return String
     */
    public function toUpperCase() {
        return new String(strtoupper($this->string));
    }
    
    /**
     * @description
     * Returns a copy of the string, with leading and trailing whitespace omitted.
     * 
     * @return String
     */
    public function trim() {
        return new String(trim($this->string));
    }

    /**
     * @description
     * This object (which is already a string!) is itself returned in native string.
     * 
     * @return native string
     */
    public function __toString() {
        return $this->string;
    }
    
    /**
     * @description
     * Returns the string representation of the Object/phpTypes argument.
     * 
     * @param Object/phpTypes $val
     * @return String
     */
    public static function valueOf($val) {
        if (is_bool($val)) {
            if ($val) {
                return new String("true");
            } else {
                return new String("false");
            }
        }
        return new String("".$val);
    }
}

?>
