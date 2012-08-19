<?php

namespace WCEG\util;

use WCEG\lang\Object;
use WCEG\util\ArrayIterator;
/**
 * Description of AbstractCollection
 *
 * @author Peter Legéň <juicyrevenge@gmail.com>
 */
abstract class AbstractCollection extends Object implements Collection {

    protected $container;

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
        $iterator = $this->iterator();
        $pos = $this->size();
        while (--$pos >= 0) {
            $x = $iterator->next();
            if ($o == $x) {
                return true;
            }
        }
        return false;
    }

    public function containsAll(Collection $c) {
        $iterator = $c->iterator();
        $pos = $c->size();
        while (--$pos >= 0) {
            if (!$this->contains($iterator->next())) {
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
        return new ArrayIterator($this->container);
    }

    public function remove(Object $o) {
        $iterator = $this->iterator();
        $pos = $this->size();
        while (--$pos >= 0) {
            if ($o == $iterator->next()) {
                $iterator->remove();
                $this->container = $iterator->getArray();
                return true;
            }
        }
        return false;
        /*for ($i = 0; $i < count($this->container); $i++) {
            if ($this->container[$i] == $o) {
                unset($this->container[$i]);
            }
        }
        $this->container = array_values($this->container);*/
    }

    public function removeAll(Collection $c) {

    }

    public function retainAll(Collection $c) {
        
    }

    public function size() {
        return count($this->container);
    }

    public function toArray() {
        return $this->container;
    }

}

?>
