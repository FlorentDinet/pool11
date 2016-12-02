<?php
trait EvolQuantite {
    function plusUnQuantite (){
        $this->setQuantite(($this->getQuantite()+1));
    }
    
    function moinsUnQuantite (){
        if($this->getQuantite()>0) {
            $this->setQuantite(($this->getQuantite()-1));
        }
    }
}
?>