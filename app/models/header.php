<?php
    class Header
    {
        public $title;
        public $css_path;
        public $js_path;
        public $icon_path;

        public function __construct($title, $css_path, $js_path, $icon_path)
        {
            $this->title = $title;
            $this->css_path = $css_path;
            $this->js_path = $js_path;
            $this->icon_path = $icon_path;
        }        
    }
