<?php
namespace WCEG\lang;
/**
 * Description of Object
 *
 * @author Peter Sokolík <PesokLP13@gmail.com>
 */
class Object {
    
    public function __construct(){
        
    }
    
    /**
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * 
     * @description
     * copy of method Object.clone()
     * @return Object clone 
     */
    protected function makeClone(){
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
    public function equals(Object $obj){
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
    public function getClass(){
        $namespace = get_class($this);
        $className = end(explode("\\",$namespace));
        return $className;
    }
    /**
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * 
     * @description
     * return hash code of instanced object
     * 
     * @return Integer $hashCode
     */
    public function hashCode(){
        
    }
}

?>
