<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="../../css/homepage.css">
	<link rel="stylesheet" href="../../css/signup.css">
    <link rel="stylesheet" href="../../css/cart.css">
    <link rel="stylesheet" href="../../css/order.css">
    <script>
       $( function() {
        $( "#tabs" ).tabs();
      } );
    </script>
    <style>
    .button1 {
      background-color: #f1f1f1; /* Green */
      border: none;
      color: white;
      padding: 16px 70px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
      cursor: pointer;
      margin-left: 250px;
    }

    .button11 {
      background-color: white;
      color: black;
      border: 2px solid #f1f1f1;
    }

    .button11:hover {
      background-color: #f1f1f1;
      color: black;
    }
    </style>
    <title>Order</title>
</head>
<body>

<script src="../../js/basic.js"></script>

<? include_once  APPPATH ."views/public/header.html"; ?>

<div class="topnav" id="ttopnav">
	<a href="/project/Home">Home</a>
</div>

<div class="row">

<? include_once  APPPATH ."views/public/side.html"; ?>

<div class="column middle" style="padding: 50px">

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">購入情報</a></li>
    <li><a href="#tabs-2">お届け先</a></li>
    <li><a href="#tabs-3">購入方法</a></li>
  </ul>

<form action="payment" method="post">
<input type=hidden name="ITEMS" value="<?=$_GET["ITEMS"]?>">

<div id="tabs-1">
<?
    $no = 0;
    foreach($items as  $each_item){
        $no++;
        $each_item_arr = explode("IVV", $each_item);

        $item_code = $each_item_arr[0];
        $item_qty = $each_item_arr[1];
        $each_item_total = $each_item_arr[2];
        $item_total = $each_item_arr[3];

        $item_row = $controller->getiteminfo($item_code);

?>
   <div class="shopping-cart-reform">
     <input type="hidden" name="pname" value="<?=$item_row->product_name?>">
      <div class="item">
        <input type="hidden" id="">
        <input type="hidden" value="">

        <div class="image">
          <img src="<?=$item_row->product_m_image?>" alt="" style="width:110px"/>
        </div>

        <div class="description">
          <p name="orderproductname" class="pn"><?=$item_row->product_name?></p>
        </div>

        <div name="orderproduct_price" class="total-price"><?=$item_row->product_price?>円</div>
        <div name="orderproduct_qty" class="total-price"><?=$item_qty?>個</div>
        <div name="orderproduct_totalprice" class="each-price"><?=$each_item_total?>円</div>
      </div>
    </div>
<? } ?>
<div class="shopping-cart-total" style="width:1000px">
  <div class="item">
    <div class="total-price" style="padding:10px; width:100%; text-align:right">商品合計：<?=$item_total?>円</div>
  </div>
</div>
</div>


<div id="tabs-2">
<div class="container">
  <div class="form-part">
    <h2>購入者の情報</h2>
    <div class="form-inputs">
      <div class="sqr-input">
        <div class="text-input margin-bottom-zero">
          <div class="sqr-input">
            <div class="text-input">
              <label for="fname">名前</label>
              <input type="text" name="ordername" id="ordername" style="width:220px">
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="text-input">
          <label for="phone">電話番号</label>
          <input type="text" name="orderphone" id="orderphone">
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="text-input">
        <label for="email">Email</label>
        <input type="text" name="orderemail" id="orderemail">
      </div>

      <div class="text-input">
        <label for="address">郵便番号</label>
        <input type="text" name="orderpost" id="orderpost">
      </div>

      <div class="text-input">
        <label for="country">都道府県</label>
        <select name="add">
            <option value="" selected>選択してください。</option>
            <option value="北海道">北海道</option>
            <option value="青森県">青森県</option>
            <option value="岩手県">岩手県</option>
            <option value="宮城県">宮城県</option>
            <option value="秋田県">秋田県</option>
            <option value="山形県">山形県</option>
            <option value="福島県">福島県</option>
            <option value="茨城県">茨城県</option>
            <option value="栃木県">栃木県</option>
            <option value="群馬県">群馬県</option>
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="東京都">東京都</option>
            <option value="神奈川県">神奈川県</option>
            <option value="新潟県">新潟県</option>
            <option value="富山県">富山県</option>
            <option value="石川県">石川県</option>
            <option value="福井県">福井県</option>
            <option value="山梨県">山梨県</option>
            <option value="長野県">長野県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
            <option value="三重県">三重県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="京都府">京都府</option>
            <option value="大阪府">大阪府</option>
            <option value="兵庫県">兵庫県</option>
            <option value="奈良県">奈良県</option>
            <option value="和歌山県">和歌山県</option>
            <option value="鳥取県">鳥取県</option>
            <option value="島根県">島根県</option>
            <option value="岡山県">岡山県</option>
            <option value="広島県">広島県</option>
            <option value="山口県">山口県</option>
            <option value="徳島県">徳島県</option>
            <option value="香川県">香川県</option>
            <option value="愛媛県">愛媛県</option>
            <option value="高知県">高知県</option>
            <option value="福岡県">福岡県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="大分県">大分県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
        </select>
      </div>


      <div class="text-input">
        <label for="address">住所</label>
        <input type="text" name="orderaddress" id="orderaddress">
      </div>

      <div class="text-input">
        <label for="message">備考</label>
        <textarea name="ordermessage" id="ordermessage"></textarea>
      </div>




    </div>

  </div>
</div> <!--container-->
</div> <!--tab2-->

  <div id="tabs-3">
    <div class="container">
    <div class="form-part">
     <h2>お支払い方法を選択</h2>
     <table class="type04">
    <tr>
        <td><input type="radio" value="代金引換" name="payck" class="ck" onclick="doOpenCheck(this)">代金引換</td>
    </tr>
    <tr>
        <td class="payment">商品お届けの際、運送会社のドライバーに直接お支払いください。</td>
    </tr>
    <tr>
        <td><input type="radio" value="銀行振込" name="payck" class="ck" onclick="doOpenCheck(this)">銀行振込</td>
    </tr>
     <tr>
        <td class="payment">【振込口座】 ゆうちょ銀行札幌支店　普通0000000　カ）ヤマダコウギョウ</td>
    </tr>
    <tr>
        <td><input type="radio" value="郵便振替" name="payck" class="ck" onclick="doOpenCheck(this)">郵便振替</td>
    </tr>
     <tr>
        <td class="payment">【振替口座】 00000-0-00000　カ）ヤマダコウギョウffff</td>
    </tr>
    </table>

    </div>
        <input type="submit" value="ok" class="button1 button11">
    </div>
  </div><!--tab3-->
</form>
</div><!--tab-->

</div> <!--div column middle-->
</div> <!--div row-->


<? include_once  APPPATH ."views/public/signup.html"; ?>

<? include_once  APPPATH ."views/public/login.html"; ?>


<? include_once  APPPATH ."views/public/footer.html"; ?>

<script>
        function doOpenCheck(chk){
            var obj = document.getElementsByName("ck");
            for(var i=0; i<obj.length; i++){
                if(obj[i] != chk){
                    obj[i].checked = false;
                }
            }
        }

        function addcheck() {
            var addcheck = $("select[name=add]").val();

            var radioVal = $("input[name='ck']:checked").val();

            alert(radioVal);

        }
</script>
</body>
</html>
