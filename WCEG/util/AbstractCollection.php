<?php

namespace WCEG\util;

use WCEG\lang\Object;

/**
 * Description of AbstractCollection
 *
 * @author Peter Legéň <juicyrevenge@gmail.com>
 */
abstract class AbstractCollection extends Object implements Collection {

    private $container;

    public function __construct() {
        $this->container = array();
    }

    public function add(Object $o) {
        $this->container[] = $o;
    }

    public function addAll(Collection $c) {
        $this->container = array_merge($this->container, $c->toArray());
    }

    public function clear() {
        $this->container = array();
    }

    public function contains(Object $o) {
        foreach ($this->container as $a) {
            if ($a == $o) {
                return true;
            }
        }
        return false;
    }

    public function containsAll(Collection $c) {
        $arr = $c->toArray();
        for($i = 0; $i < count($this->container); $i++) {
            if (!$this->contains($arr[$i])) {
                return false;
            }
        }
        return true;
    }

    public function isEmpty() {
        if (count($this->container) == 0) {
            return true;
        }
        return false;
    }

    public function iterator() {
        
    }

    public function remove(Object $o) {
        for ($i = 0; $i < count($this->container); $i++) {
            if ($this->container[$i] == $o) {
                unset($this->container[$i]);
            }
        }
        $this->container = array_values($this->container);
    }

    public function removeAll(Collection $c) {

    }

    public function retainAll(Collection $c) {
        
    }

    public function size() {
        
    }

    public function toArray() {
        return $this->container;
    }

}

?>
