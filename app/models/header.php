<?php
    class Header
    {
        private $title;
        private $css_path;
        private $js_path;
        private $icon_path;

        public function __construct($title, $css_path, $js_path, $icon_path)
        {
            $this->title = $title;
            $this->css_path = $css_path;
            $this->js_path = $js_path;
            $this->icon_path = $icon_path;
        }

        public function get_title()
        {
            return $this->title;
        }
        public function get_css_path()
        {
            return $this->css_path;
        }
        public function get_js_path()
        {
            return $this->js_path;
        }
        public function get_icon_path()
        {
            return $this->icon_path;
        }
    }