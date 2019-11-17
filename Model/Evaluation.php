<?php

    class Evaluation {
        private $answer_1;
        private $answer_2;
        private $answer_3;
        private $further_information;
        private $stars_rating;

        public function setAnswer1($answer_1) {
            $this->answer_1 = $answer_1;
        }

        public function getAnswer1() {
            return $this->answer_1;
        }

        public function setAnswer2($answer_2) {
            $this->answer_2 = $answer_2;
        }

        public function getAnswer2() {
            return $this->answer_2;
        }

        public function setAnswer3($answer_3) {
            $this->answer_3 = $answer_3;
        }

        public function getAnswer3() {
            return $this->answer_3;
        }

        public function setFurtherInformation($further_information) {
            $this->further_information = $further_information;
        }

        public function getFurtherInformation() {
            return $this->further_information;
        }

        public function setStarsRating($stars_rating) {
            $this->stars_rating = $stars_rating;
        }

        public function getStarsRating() {
            return $this->stars_rating;
        }

    }

?>