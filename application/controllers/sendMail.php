#!/usr/bin/php
<?php

include "forTest.php";

class sendMail{

  public $dataFromForTest;
  public $dateFromCheckDate;
  public $dateToMail;
  public $pvToMail;
  public $uuToMail;
  public $cvrToMail;

  public function __construct(){
    $this->dataFromForTest = new forTest();
    $this->dateFromCheckDate = new checkDate();
    $this->dateToMail = $this->dateFromCheckDate->getYesterDay();
  }

  public function makeFile(){
    //weekend
    if($this->dateToMail === "weekend"){
      return;
    }
    $pvuuArr = $this->dataFromForTest->countPV();
    $this->cvrToMail = $this->dataFromForTest->countCVR();
    $this->pvToMail = $pvuuArr['pv'];
    $this->uuToMail = $pvuuArr['uu'];

    $directory = "/var/www/html/report";
    if(!file_exists($directory)){
      umask(0);
      mkdir($directory, 0777);
    }

    file_put_contents($directory."/reportfile".$this->dateToMail, $this->pvToMail);
  }

  public function sendingMail(){
    $pvuuArr = $this->dataFromForTest->countPV();
    $cvrToMail = $this->dataFromForTest->countCVR();
    $ranking = $this->dataFromForTest->rankingProduct();
    $this->pvToMail = $pvuuArr['pv'];
    $this->uuToMail = $pvuuArr['uu'];
    $cvr = $cvrToMail['cvr'];
    $order = $cvrToMail['totalOrder'];
    $first = $ranking[0];
    $second = $ranking[1];

    $mailTo = "hwjeon6669@gmail.com, hwjeon297@naver.com";
    $title = "ヒョ茶のレポート";
    $content = "";
    $content .= "お疲れ様です 。ジョンヒョウォンです 。ヒョ茶のレポートをお送りいたします。";
    $content .= "日付: $this->dateToMail";
    $content .= "pv: $this->pvToMail uu: $this->uuToMail";
    $content .= "cvr: $cvr order: $order 回";
    $content .= "$this->dateToMail よく売れている商品: 1.$first 2.$second";
    $content .= "ご確認の程よろしくお願い致します。";
    mail($mailTo, $title, $content);
  }
}

$sendMail = new sendMail();
$sendMail->makeFile();
$sendMail->sendingMail();
?>
