<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../css/homepage.css">
	<link rel="stylesheet" href="../../css/signup.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="http://dinbror.dk/bpopup/assets/jquery.bpopup-0.9.4.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
</head>
<body>

<script src="../../js/basic.js"></script>

<? include_once  APPPATH ."views/public/header.html"; ?>

<? include_once  APPPATH ."views/public/topnav.html"; ?>
<div class="row">

<? include_once  APPPATH ."views/public/side.html"; ?>



</div>


<? include_once  APPPATH ."views/public/signup.html"; ?>

<? include_once  APPPATH ."views/public/login.html"; ?>



<? include_once  APPPATH ."views/public/footer.html"; ?>

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
