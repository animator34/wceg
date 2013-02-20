<?php

namespace WCEG\DataModel;

/**
 * @description
 * implementation of IDataModel this DataModel is single for use 
 * like a simple value of component
 * 
 * @author Peter Sokolík <PesokLP13@gmail.com>
 */

class PropertyModel implements IDataModel{
    
    private $aData;
    private $aName;
    
    public function __construct(WCEG\lang\String $name, WCEG\lang\Object $data){
        $this->aData = $data;
        if($name == null){
            throw new \InvalidArgumentException("parameter \$name must not be null");
        }
        $this->aName = $name;
    }
    
    public function load() {
        if($this->aData!=null){
            return array($this->aName => $this->aData->toString());
        }
        return array($this->name=> "");
    }
    
    public function save() {
        
    }
}
?>
