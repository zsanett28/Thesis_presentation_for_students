<?php

class Tema
{
    public $kod;
    public $nev;
    public $ev;
    public $tanarEmail;

    function __construct($nev=null, $tanarEmail=null) {
        $this->kod = null;
        $this->nev = $nev;
        $this->ev = date("Y");
        $this->tanarEmail = $tanarEmail;
    }
}
    
?>