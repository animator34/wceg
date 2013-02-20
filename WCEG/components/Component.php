<?php

namespace WCEG\components;

use WCEG\lang;
use WCEG\DataModel;

/**
 * @description of Component
 * abstract class for base UI objects in wceg applications
 * this class is used for rendering and fetching data
 * given by IDataModel object <aData> to template pattern <aTemplate>
 *
 * @author Peter Sokolík <PesokLP13@gmail.com>
 */
abstract class Component extends WCEG\lang\Object{
    
    //Pointer to template object
    //private $smarty; // used with smarty template language
    private $twig; // used with twig template language
    //Identificator of component
    private $aId;
    //Unique template for element
    private $aTemplate;
    //Visibility of component
    private $aVisible;
    //data model of component
    private $aModel;
    
    public function __construct(lang\String $id, IDataModel $model = null){
        //saving pointer to template object
        //smarty disabled 17. 01. 2013 by <Pesoklp13@gmail.com>
        //global $smarty;
        //$this->smarty = $smarty;
        global $twig;
        $this->twig = $twig;
        
        $this->aId = $id;
        //each component is visible as default
        $this->aVisible = true;
        
        $this->aModel = $model;
    }
    
    /**
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * 
     * @description
     * method for changing id of component
     * 
     * @param \WCEG\lang\String $id
     */
    public function setId(lang\String $id){
        $this->aId = $id;
    }
    
    /**
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * 
     * @description
     * method for returning id of component
     * 
     * @return \WCEG\lang\String
     */
    public function getId(){
        return $this->aId;
    }
    
    /**
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * 
     * @description
     * setting unique template for object
     * 
     * @param \WCEG\lang\String $template
     */
    public function setTemplate(lang\String $template){
        $this->aTemplate = $template;
    }
    
    /**
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * 
     * @description
     * getting unique template for object
     * 
     * @return \WCEG\lang\String
     */
    public function getTemplate(){
        if($this->aTemplate==null){
            return new lang\String($this->getClass().".tpl");
        }
        
        return $this->aTemplate;
    }
    
    /**
     * 
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * 
     * @description
     * setting visibility of component
     * 
     * @param Boolean $visible
     * @return void
     * @throws lang\TypeMismatchException
     */
    public function setVisible($visible){
        if(is_bool($visible)){
            $this->aVisible = $visible;
            return;
        }
        
        throw new lang\TypeMismatchException("Input parameter is not valid boolean");
    }
    /**
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * 
     * @description
     * getting visibility of UI component
     * 
     * @return Boolean
     */
    public function isVisible(){
        return $this->aVisible;
    }
    
    /**
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * 
     * @description
     * getting data model of component
     *  
     * @return \WCEG\components\IDataModel
     */
    public function getModel(){
        return $this->aModel;
    }
    
    /**
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * 
     * @description
     * setting a data model if the model was not set in constructor     
     *  
     * @param \WCEG\components\IDataModel $model
     */
    public function setModel(IDataModel $model){
        $this->aModel = $model;
    }
    
    public function render(){
        $template = $this->getLoadedTemplate();
        
        //TODO implementation of IDataModel class to give a attributes 
        //to $template by method Load into $attributes
        $attributes = array();
        $template->display($attributes);
    }
    
    /**
     * @author Peter Sokolík <PesokLP13@gmail.com>
     * 
     * @description
     * getting instance of template object represented by template name
     * given by getTemplate()
     * 
     * @return Twig_TemplateInterface
     */
    private function getLoadedTemplate(){
        return $this->twig->loadTemplate($this->getTemplate()->getString());
    }
}
?>
