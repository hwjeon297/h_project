#!/usr/bin/php
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "forTest.php";
include "/var/www/html/project/PHPMailer-master/src/PHPMailer.php";
include "/var/www/html/project/PHPMailer-master/src/SMTP.php";
include "/var/www/html/project/PHPMailer-master/src/Exception.php";
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

    $content = "";
    $content .= "お疲れ様です 。ジョンヒョウォンです 。<br>ヒョ茶のレポートをお送りいたします。<br>";
    $content .= "------------------------------------------------------------------------------<br>";
    $content .= "日付: $this->dateToMail <br>";
    $content .= "PV: $this->pvToMail UU: $this->uuToMail <br>";
    $content .= "CVR: $cvr%  注文数: $order 件 <br>";
    $content .= "$this->dateToMail によく売れている商品: 1.$first 2.$second <br>";
    $content .= "------------------------------------------------------------------------------<br>";
    $content .= "ご確認の程よろしくお願い致します。";

    // $mailTo = "hwjeon6669@gmail.com, hwjeon297@naver.com";
    // $title = "ヒョ茶のレポート";
    //
    // mail($mailTo, $title, $content);

    $mail = new PHPMailer(true);
    $mail->isSMTP();

    $mail->Host = 'smtp.naver.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hwjeon297@naver.com';
    $mail->Password = '9058504h?';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->CharSet = 'utf-8';

    $mail->setFrom('hwjeon297@naver.com');
    $mail->addAddress('h-jeon@estore.co.jp');
    $mail->addAddress('takai@estore.co.jp');
    $mail->addAddress('y-ito@estore.co.jp');
    $mail->addAddress('f-maeda@estore.co.jp');
    $mail->addAddress('yagi@estore.co.jp');
    $mail->addAddress('kumamimi@estore.co.jp');
    $mail->addAddress('m-park@estore.co.jp');
    $mail->addAddress('mi-kim@estore.co.jp');
    $mail->isHTML(true);
    $mail->Subject = "$this->dateToMail ヒョ茶のレポート";
    $mail->Body = "$content";
    $mail->Send();
  }
}

$sendMail = new sendMail();
$sendMail->makeFile();
$sendMail->sendingMail();
?>
