<?php
    class Service {
        private $professional;
        private $time_remaining;
        private $title;
        private $description;
        private $is_visible;

        public function setProfessional($professional) {
            $this->professional = $professional;
        }

        public function getProfessional() {
            return $this->professional;
        }

        public function setTimeRemaining($time_remaining) {
            $this->time_remaining = $time_remaining;
        }

        public function getTimeRemaining() {
            return $this->time_remaining;
        }

        public function setTitle($title) {
            $this->title = $title;
        }

        public function getTitle() {
            return $this->title;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getDescription() {
            return $this->description;
        }

        public function setIsVisible($is_visible) {
            $this->is_visible = $is_visible;
        }

        public function getIsVisible() {
            return $this->is_visible;
        }

    }

?>