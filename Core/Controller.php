<?php


class Controller

{

    public function render(string $viewPath, $data = [])
    {

        require_once(ROOT . 'views/' . $viewPath);
    }

    public function loadModel(string $model)
    {
        require_once(ROOT . 'models/' . $model . '.php');
        return $this->$model = new $model();
        //var_dump($this);
    }

}