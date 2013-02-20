<?php

namespace WCEG\DataModel;
/**
 * @description
 * interface for using properties in template and injection data to database
 * loading will return value of data content of IDataModel for correct working
 * without need of control data types
 * 
 * @author Peter Sokolík <PesokLP13@gmail.com>
 */
interface IDataModel{
    public function load();
    public function save();
}

?>
