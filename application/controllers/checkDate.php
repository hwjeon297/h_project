<?php

class checkDate{

  public $weekOfDay;
  public $today;

  public function __construct(){
    $this->weekOfDay = date("w");
    $this->today = date("Ymd");
  }

  public function getYesterDay(){

    //weekend
    if($this->weekOfDay === "0" or $this->weekOfDay === "6"){
      return "weekend";
    }else if($this->weekOfDay === "1"){ //monday
      return date("Ymd",strtotime("-3 days"));
    }else{ //tue, wed, thurs, fri
      return date("Ymd", strtotime($this->today."-1 day"));
    }

  }

}
