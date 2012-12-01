<?php

require_once 'PlaceHolder.php';
require_once 'RawTemplate.php';

function ui_extends($file) {
    RawTemplate::runingInstance()->extend($file);
}

function ui_block($name = null) {
    if (!empty($name)) {
        RawTemplate::runingInstance()->placeHolder($name);
    } else {
        RawTemplate::runingInstance()->endPlaceHolder();
    }
}

function ui_include($file) {
    RawTemplate::runingInstance()->includeTemplate($file);
}

function ui_parent() {
    RawTemplate::runingInstance()->renderParentContent();
}
/**
 * Raw PHP templating engine
 *
 * @author JeyDotC
 */
class RawPhp {

    private $values = array();

    public function assign($name, $value) {
        $this->values[$name] = $value;
    }

    public function display($file) {
        echo $this->render($file);
    }

    public function fetch($file) {
        return $this->render($file);
    }

    private function render($file) {
        $template = new RawTemplate($file, $this->values);
        $result = $template->render();
        return $result;
    }

}

?>
