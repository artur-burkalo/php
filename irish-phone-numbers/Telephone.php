<?php 

// declare(strict_types = 1);

class Telephone {


    public $irish_phone_extension = "353";
    public $number;

    public function __construct($number) {
        $this->number = $number;
    }

    function numbers() {

        $link_number = "+" . $this->irish_phone_extension . (int)$this->number;

        // start point for formating international numbers
        $inter_number = "+" . $this->irish_phone_extension;
        // we can remove the (0) from here, and just have the space if needed... so number will be like +353 87 234 567
        $inter_number .= (substr($this->number, 0, 4) != "1800") ? " (0) " : " ";

        // Mobile Number
        if (strlen($this->number) == 10 && substr($this->number, 0, 2) == "08" && substr($this->number, 0, 4) != "0818") {
            $inter_number .= substr($this->number, 1, 2). " " .substr($this->number, 3, 3) . " " .substr($this->number, 6);
            $standard_number = substr($this->number, 0, 3). " " .substr($this->number, 3, 3) . " " .substr($this->number, 6);
            $numbers = ['inter'     => $inter_number, 
            'link'      => $link_number, 
            'standard'  => $standard_number,];
        }

        // Dublin number 01 XXX XXXX
        elseif (strlen($this->number) == 9 && substr($this->number, 0, 2) == "01") {
            $standard_number = substr($this->number, 0, 2). " " .substr($this->number, 2, 3) . " " .substr($this->number, 5);
            $inter_number .= substr($this->number, 1, 1). " " .substr($this->number, 2, 3) . " " . substr($this->number, 5);
            $numbers = ['inter'     => $inter_number, 
            'link'      => $link_number, 
            'standard'  => $standard_number,];
        }

        // 7 and 6 digit areas 0XX XXX XXXX & 0XX XXX XXX
        elseif (substr($this->number, 0, 1) === "0" && substr($this->number, 0, 4) != "0818" && strlen($this->number) == 10 || strlen($this->number) == 9 && substr($this->number, 2, 1) != "0") {
            $standard_number = substr($this->number, 0, 3). " " .substr($this->number, 2, 3) . " " .substr($this->number, 5);
            $inter_number .=substr($this->number, 1, 2). " " .substr($this->number, 2, 3) . " " . substr($this->number, 5);
            $numbers = ['inter'     => $inter_number, 
            'link'      => $link_number, 
            'standard'  => $standard_number,];
        }

        // 5 digit areas 0XX XXXXX, they all changed to 7-digit numbers, no need to add this... 

        // 5 digit areas 0X0X XXXXX
        elseif (strlen($this->number) == 9 && substr($this->number, 0, 1) == "0" && substr($this->number, 2, 1) == "0"){
            $standard_number = substr($this->number, 0, 4). " " .substr($this->number, 4);
            $inter_number .=  substr($this->number, 1, 3). " " .substr($this->number, 4);
            $numbers = ['inter'     => $inter_number, 
            'link'      => $link_number, 
            'standard'  => $standard_number,];
        }

        // Freephone/Toll Free 1800 XXX XXX and Non Geagraphic 0818 XXX XXX
        elseif (strlen($this->number) == 10 && substr($this->number, 0, 4) == "1800" || substr($this->number, 0, 4) == "0818"){
            $standard_number = substr($this->number, 0, 4). " " .substr($this->number, 4, 3) . " " .substr($this->number, 7);
            // $inter_number .= substr($this->number, 0, 4). " " .substr($this->number, 4, 3) . " " . substr($this->number, 7);
            $inter_number .= (substr($this->number, 0, 4) == "0818") ? substr($this->number, 1, 3) : substr($this->number, 0, 4);
            $inter_number .= " " .substr($this->number, 4, 3) . " " .substr($this->number, 7);
            $numbers = ['inter'     => $inter_number, 
            'link'      => $link_number, 
            'standard'  => $standard_number,];
        }

        else {
            $udefined = "Irish Number Not Recognised";
            $numbers = ['inter'     =>  $udefined, 
                        'link'      =>  $udefined, 
                        'standard'  =>  $udefined,];
        }
       
        return $numbers;
    } 
}

?>