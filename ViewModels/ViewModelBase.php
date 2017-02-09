<?php

require_once(__DIR__."\..\Data\Models\ModelBase.php");

class ViewModelBase extends ModelBase{

    public $viewPath;

    function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
    }


}