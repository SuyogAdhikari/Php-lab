<?php 

    class BaseController
    {
        public $view;
        public function loadModel($model)
        {
            $modelClass=ucfirst($model)."Model";
            require_once "../Models/{$modelClass}.php";
            $modelObject = new $modelClass();
            var_dump($modeObect);
            return $modelObject;
        }

        protected function display($data)
        {
            extract($data);
            require_once("view/{$this->view}.php");
        }
    }

    $object = new BaseController;
    $object -> loadModel("base");
?>