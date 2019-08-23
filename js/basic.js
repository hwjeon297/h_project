        function openMessage(IDS) {
            $('#'+IDS).bPopup();
        }

        function addBoard(){
            openMessage('signup');
        }


        function loginform(){
            openMessage('login');
        }

        function product_click(pcode){
         var num = pcode;
         location.href = "/Home/product?pcode="+num;

        }

        function ggcart() {
            location.href = "/gocart";
        }

        function signin(){
            var id = $('#id').val();
            var pw = $('#pw').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var post = $('#post').val();
            var address = $('#address').val();
            var phone = $('#phone').val();

            var select = document.getElementById('todoadd');
            var a = select.options[select.selectedIndex].value;


            $.ajax({
                type: 'POST',
                url: "/Home/signup",
                data: {id: id, pw: pw, name: name, email: email, post: post, address: address, phone: phone, todoadd: a},
                //dataType: 'json',
                success: function(){
                    alert("会員登録完成");
                    location.reload();
                },
                error: function(request,status,error){
                    location.reload();
                    //console.log(error);

                }
            });

        }

        function gologin(){
            var mid = $('#mid').val();
            var mpw = $('#mpw').val();
            //alert(mid);
            $.ajax({
                type: 'POST',
                url: "/Login/gologin",
                data: {mid: mid, mpw: mpw},
                // dataType: 'json',
                success: function(res){
                    alert("loginok");
                    location.reload();
                },
                error: function(request,status,error){
                  alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
            });
        }

        function logout(){

            $.ajax({
                type: 'POST',
                url: "/Login/logout",
                success: function(){
                    alert("logoutok");
                    location.reload();
                },
                error: function(request,status,error){
                  alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
            });
        }

        function mypage(){
            location.href="/Login/mypageview";
        }

