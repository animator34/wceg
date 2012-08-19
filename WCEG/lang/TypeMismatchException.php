<?php
namespace WCEG\lang;
/**
 * Description of TypeMismatchException
 *
 * @author Peter Legéň <juicyrevenge@gmail.com>
 */
class TypeMismatchException extends \Exception {
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
?>
