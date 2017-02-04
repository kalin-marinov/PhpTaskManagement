<?php

   include('data\models\ModelBase.php');

    class Task extends ModelBase{

        /**
         * The task key - unique for each task
         * @var string
         **/
        public $key;

         /**
         * The task name
         * @var string
         **/
        public $name;

        /**
        * A description of the task
        * @var string
        **/
        public $description;
    }

?>