<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/homepage.css">
	<link rel="stylesheet" href="../css/signup.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="http://dinbror.dk/bpopup/assets/jquery.bpopup-0.9.4.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script type="text/javascript">
			function product_clickk(pcode){
				var num = pcode;
				location.href = "/project/Home/product?pcode="+num;
			}
		</script>
</head>
<body>
<script src="../../js/basic.js"></script>

<? include "public/header.html" ?>

<? include "public/topnav.html" ?>

<div class="row">

<? include "public/side.html" ?>

<div class="column middle">
 <div class="main">
     <img src="../img/main.jpg" alt="" class="mainimg">
     <div class="centered">Make your own tapioca</div>
 </div>
  <? foreach($kkk as $value) { ?>
    <div class="gallery" id="product_click" onclick="product_clickk('<?=$value['product_code']?>')">
        <a　href="">
          <img src="<?=$value['product_m_image']?>" alt="bbb" width="600" height="400">
        </a>
        <div class="desc"><?=$value['product_name']?><br><?=$value['product_price']?>円</div>
    </div>
    <? } ?>
</div>

</div>


<? include "public/signup.html" ?>

<? include "public/login.html" ?>



<? include "public/footer.html" ?>

<script>
        window.onscroll = function() {sticker()};

        var topnav = document.getElementById("ttopnav");
        var sticky = topnav.offsetTop;

        function sticker(){

            if(window.pageYOffset > sticky) {
                topnav.classList.add("sticky");
            } else {
                topnav.classList.remove("sticky");
            }
        }
</script>


</body>
</html>
