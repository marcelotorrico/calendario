<?php

class Timestamp{
    
    private $day;
    private $month;
    private $year;
    private $hour;
    private $minute;
    private $second;
    private $time_zone;
    
    function __construct($date, $time = NULL, $zone = "+00"){
        
        if ($time == NULL){
            $this->construct_from_timestamp($date);
        } else {
            $this->construct_from($date, $time, $zone);
        }
    }
    
    function construct_from_timestamp($timestamp){
        $data = explode(' ', $timestamp);
        $date = explode('-', $data[0]);
        
        $time = explode(':', substr($data[1], 0, -3));
        $zone = substr($data[1], -3);
        
        $this->day      = $date[2];
        $this->month    = $date[1];
        $this->year     = $date[0];
        
        $this->set_time_and_zone($time, $zone);
    }
    
    function construct_from($date, $time, $zone){
        $date = explode('/', $date);
        $time = explode(':', $time);
        
        $this->day      = $date[1];
        $this->month    = $date[0];
        $this->year     = $date[2];
        
        $time[] = "00.000000";
        
        $this->set_time_and_zone($time, $zone);
    }
    
    private function set_time_and_zone($time, $zone){
        $this->hour         = $time[0];
        $this->minute       = $time[1];
        $this->second       = $time[2];
        $this->time_zone    = $zone;
    }
    
    public function __toString(){
        return "$this->year-$this->month-$this->day $this->hour:$this->minute:$this->second".$this->time_zone;
    }
}

?>