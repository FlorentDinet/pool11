<?php

abstract class CMS {
    
    // GETTERS SETTERS
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id=$id;
    }
    
    public function getDate()
    {
        return $this->date;
    }
    
    public function setDate($date)
    {
        $this->date = $date;
    }

    abstract function formatterDate($date,$langue);

}



?>