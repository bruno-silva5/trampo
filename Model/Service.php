<?php
    class Service {
        private $id_occupation_subcategory;
        private $time_remaining;
        private $title;
        private $description;
        private $is_visible;
        private $id_user;

        public function setIdOccupationSubcategory($id_occupation_subcategory) {
            $this->id_occupation_subcategory = $id_occupation_subcategory;
        }

        public function getIdOccupationSubcategory() {
            return $this->id_occupation_subcategory;
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

        public function setIdUser($id_user) {
            $this->id_user = $id_user;
        }

        public function getIdUser() {
            return $this->id_user;
        }

    }

?>