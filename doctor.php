<?php

    class Doctor{
        public $id;
        public $name;

        public function __construct($id,$name){
            $this->id = $id;
            $this->name = $name;
        }

        public function info(){
            echo " Id = ".$this->id." , Name = ".$this->name;
        }

    }
