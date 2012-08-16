<?php

namespace WCEG\lang;

/**
 * Description of Object
 *
 * @author Peter Sokolík <PesokLP13@gmail.com>
 */
class Object {

    public function __construct() {
        
    }

    /**
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * @author Peter Legéň <juicyrevenge@gmail.com>
     * 
     * @description
     * copy of method Object.clone()
     * 
     * @changes
     * + access level changed protected to public
     * 
     * @return Object clone 
     */
    public function makeClone() {
        return clone $this;
    }

    /**
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * 
     * @description
     * return boolean value of object comparing result
     * 
     * @param Object $obj
     * @return boolean
     */
    public function equals(Object $obj) {
        return $obj === $this;
    }

    /**
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * 
     * @description
     * return name of current class
     * 
     * @return String $className
     */
    public function getClass() {
        $namespace = get_class($this);
        $className = end(explode("\\", $namespace));
        return $className;
    }

    /**
     * @author Peter Legéň <juicyrevenge@gmail.com>
     * 
     * @description
     * returns hash code of an object
     * 
     * @return String $hashCode
     */
    public function hashCode() {
        return spl_object_hash($this);
    }
    
    public function __toString() {
        return $this->getClass().":".$this->hashCode();
    }
}

?>
