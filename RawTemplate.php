<?php

/**
 * Description of RawTemplate
 *
 * @author JeyDotC
 */
class RawTemplate {

    private static $instances = array();
    private static $currentLevel = 0;

    /**
     *
     * @var PlaceHolder 
     */
    private $currentPlaceHolder;

    /**
     *
     * @var array<PlaceHolder>
     */
    private $blocks = array();

    /**
     *
     * @var array<PlaceHolder>
     */
    private $blocksById = array();
    private $foot = "";
    private $file;
    private $data = array();

    /**
     *
     * @var RawTemplate
     */
    private $parent;

    function __construct($file, array $data = array()) {
        $this->file = $file;
        $this->data = $data;
        $this->process($file);
    }

    function extend($parentFile) {
        $this->parent = new RawTemplate($parentFile, $this->data);
    }

    function includeTemplate($file) {
        $newTemplate = new RawTemplate($file, $this->data);
        echo $newTemplate->render();
    }

    /**
     * 
     * @return RawTemplate
     */
    public static function runingInstance() {
        return self::$instances[self::$currentLevel];
    }

    public function placeHolder($id) {
        $previous = ob_get_clean();
        $this->addPlaceHolder(new PlaceHolder($id, $previous));
        ob_start();
    }

    public function endPlaceHolder() {
        $content = ob_get_clean();
        $this->currentPlaceHolder->setContent($content);
        if ($this->parent instanceof RawTemplate) {
            $this->parent->override($this->currentPlaceHolder);
        }
        $this->currentPlaceHolder = null;
        ob_start();
    }

    public function render() {
        if ($this->parent instanceof RawTemplate) {
            return $this->parent->render();
        }
        $result = "";
        foreach ($this->blocks as $placeHolder) {
            $result .= $placeHolder;
        }

        return $result . $this->foot;
    }

    public function debug() {
        var_dump($this->blocks);
        var_dump($this->foot);
    }

    private function addPlaceHolder(PlaceHolder $p) {
        $this->currentPlaceHolder = $p;
        $this->blocks[] = $p;
        $this->blocksById[$p->getId()][] = $p;
    }

    private function override(PlaceHolder $block) {
        if (isset($this->blocksById[$block->getId()])) {
            foreach ($this->blocksById[$block->getId()] as $overridenBlock) {
                $overridenBlock->setContent($block->getContent());
            }
        }
        if ($this->parent instanceof RawTemplate) {
            $this->parent->override($block);
        }
    }

    private function process($file) {
        ob_start();
        self::$currentLevel++;
        if (!isset(self::$instances[self::$currentLevel])) {
            self::$instances[self::$currentLevel] = $this;
        }
        require $file;
        $this->foot = ob_get_clean();
        self::$currentLevel--;
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        return $this->data[$name];
    }

}

?>
