<?php
namespace WCEG\util;
use WCEG\lang\Object;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Collection
 *
 * @author animator
 */
interface Collection {
    public function add(Object $o);
    public function addAll(Collection $c);
    public function clear();
    public function contains(Object $o);
    public function containsAll(Collection $c);
    public function equals(Object $o);
    public function hashCode();
    public function isEmpty();
    public function iterator();
    public function remove(Object $o);
    public function removeAll(Collection $c);
    public function retainAll(Collection $c);
    public function size();
    public function toArray();   
}

?>
