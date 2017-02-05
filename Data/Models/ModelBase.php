<?php

class ModelBase{
    public  function fromArray(array $properties=array()){
        foreach($properties as $key => $value){
            $this->{$key}= $value;
        }
    }
    
    public function toArray() : array{
        return get_object_vars($this);
    }
}


?>