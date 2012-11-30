<?php

/**
 * Description of PlaceHolder
 *
 * @author JeyDotC
 */
class PlaceHolder {

    private $id;
    private $previousContent = "";
    private $content;
    private $children = array();

    function __construct($id, $previousContent = "", $content = "") {
        $this->id = $id;
        $this->previousContent = $previousContent;
        $this->content = $content;
    }
    
    public function addChild(PlaceHolder $child) {
        $this->children[] = $child;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPreviousContent() {
        return $this->previousContent;
    }

    public function setPreviousContent($previousContent) {
        $this->previousContent = $previousContent;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }
    
    public function __toString() {
        $result = $this->previousContent . $this->content;
        foreach ($this->children as $child) {
            $result .= $child;
        }
        return $result;
    }
}

?>
