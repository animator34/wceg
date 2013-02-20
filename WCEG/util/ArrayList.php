<?php

namespace WCEG\util;

use WCEG\lang\Iterable;
use WCEG\util\AbstractCollection;

/**
 * This class provides a skeletal implementation of the Collection interface, to minimize the effort required to implement this interface. 
 *
 * @author Peter Legéň <juicyrevenge@gmail.com>
 */
class ArrayList extends AbstractCollection implements Iterable {
    
    public function iterator() {
        return new ArrayIterator($this->toArray());
    }
}

?>
