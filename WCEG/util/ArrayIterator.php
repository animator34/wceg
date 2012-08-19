<?php

/**
 * Description of ArrayIterator
 *
 * @author Peter Legéň <juicyrevenge@gmail.com>
 */

namespace WCEG\util;

use WCEG\util\IntIterator;

class ArrayIterator implements IntIterator {

    private $array;
    private $position;

    public function __construct($arr) {
        $this->array = $arr;
        $this->position = -1;
    }

    public function hasNext() {
        if (($this->position + 1) < count($this->array)) {
            return true;
        }
        return false;
    }
    
    public function getArray() {
        return $this->array;
    }

    public function next() {
        $this->position++;
        return $this->array[$this->position];
    }

    public function remove() {
        unset($this->array[$this->position]);
        $this->position--;
        $this->array = array_values($this->array);
    }

}

?>
