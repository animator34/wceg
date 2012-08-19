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

    /**
     * @description
     * Sole constructor.
     * 
     * @param type $arr 
     */
    public function __construct($arr) {
        $this->array = $arr;
        $this->position = -1;
    }

    /**
     * @description
     * Returns true if there is still element that can be traversed.
     * 
     * @return boolean 
     */
    public function hasNext() {
        if (($this->position + 1) < count($this->array)) {
            return true;
        }
        return false;
    }
    
    /**
     * @description
     * Returns iterators modified array.
     * 
     * @return Array 
     */
    public function getArray() {
        return $this->array;
    }

    /**
     * @description
     * Returns next element of array.
     * 
     * @return Object 
     */
    public function next() {
        $this->position++;
        return $this->array[$this->position];
    }

    /**
     * @description
     * Removes element at position and aligns the array with new indexes. 
     */
    public function remove() {
        unset($this->array[$this->position]);
        $this->position--;
        $this->array = array_values($this->array);
    }

}

?>
