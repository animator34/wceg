<?php

namespace WCEG\util;

use WCEG\lang\Object;
use WCEG\util\ArrayIterator;
use WCEG\lang\Iterable;

/**
 * This class provides a skeletal implementation of the Collection interface, to minimize the effort required to implement this interface. 
 *
 * @author Peter Legéň <juicyrevenge@gmail.com>
 */
abstract class AbstractCollection extends Object implements Collection {

    protected $container;

    /**
     * Sole constructor.
     */
    public function __construct() {
        $this->container = array();
    }

    /**
     * @description
     * Ensures that this collection contains the specified element.
     * 
     * @param Object $o 
     */
    public function add(Object $o) {
        $this->container[] = $o;
    }

    /**
     * @description
     * Adds all of the elements in the specified collection to this collection.
     * 
     * @param Collection $c 
     */
    public function addAll(Collection $c) {
        $this->container = array_merge($this->container, $c->toArray());
    }

    /**
     * @description
     * Removes all of the elements from this collection.
     */
    public function clear() {
        $this->container = array();
    }

    /**
     * @description
     * Returns true if this collection contains the specified element.
     * 
     * @param Object $o
     * @return boolean 
     */
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

    /**
     * @description
     * Returns true if this collection contains all of the elements in the specified collection.
     * 
     * @param Collection $c
     * @return boolean 
     */
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

    /**
     * @description
     * Returns true if this collection contains no elements.
     * 
     * @return boolean 
     */
    public function isEmpty() {
        if (count($this->container) == 0) {
            return true;
        }
        return false;
    }

    /**
     * @description
     * Returns an iterator over the elements contained in this collection.
     * 
     * @return ArrayIterator 
     */
    public function iterator() {
        return new ArrayIterator($this->container);
    }

    /**
     * @description
     * Removes a single instance of the specified element from this collection, if it is present.
     * 
     * @param Object $o
     * @return boolean 
     */
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
    }

    /**
     * @description
     * Removes from this collection all of its elements that are contained in the specified collection.
     * 
     * @param Collection $c
     * @return boolean 
     */
    public function removeAll(Collection $c) {
        $iterator = $this->iterator();
        $modified = false;
        $pos = $this->size();
        while (--$pos >= 0) {
            if ($c->contains($iterator->next())) {
                $iterator->remove();
                $modified = true;
            }
        }
        if ($modified)
            $this->container = $iterator->getArray();
        return $modified;
    }

    /**
     * @description
     * Retains only the elements in this collection that are contained in the specified collection.
     * 
     * @param Collection $c
     * @return boolean 
     */
    public function retainAll(Collection $c) {
        $iterator = $this->iterator();
        $modified = false;
        $pos = $this->size();
        while (--$pos >= 0) {
            if (!$c->contains($iterator->next())) {
                $iterator->remove();
                $modified = true;
            }
        }
        if ($modified)
            $this->container = $iterator->getArray();
        return $modified;
    }

    /**
     * @description
     * Returns the number of elements in this collection.
     * 
     * @return int 
     */
    public function size() {
        return count($this->container);
    }

    /**
     * @description
     * Returns an array containing all of the elements in this collection.
     * 
     * @return Array 
     */
    public function toArray() {
        return $this->container;
    }

}

?>
