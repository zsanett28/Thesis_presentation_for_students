<?php

class Szakdolgozat
{
    public $kod;
    public $cim;
    public $kutatasiterv;
    public $kutatasitervJegy;
    public $tartalom;
    public $ev;
    public $jegy;
    public $tanarEmail;
    public $diakSzemelyiszam;
    public $elkeszitesiHatarido;
    public $elfogadva;

    function __construct($cim=null, $tanarEmail=null, $diakSzemelyiszam=null) {
        $this->kod = null;
        $this->cim = $cim;
        $this->kutatasiterv = null;
        $this->kutatasitervJegy = 0;
        $this->tartalom = null;
        $this->ev = date("Y") + 1;
        $this->jegy = 0;
        $this->tanarEmail = $tanarEmail;
        $this->diakSzemelyiszam = $diakSzemelyiszam;
        $this->elkeszitesiHatarido = (date("Y") + 1).'-06-23';
        $this->elfogadva = 0;
    }
}
    
?>