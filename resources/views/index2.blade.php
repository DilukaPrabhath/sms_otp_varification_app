<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">
    .hide{
      display: none;
    }
  </style>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style type="text/css">
      
    body{background-color: #d7d1c9;}

      *{
        margin: 0px;
        padding: 0px;
        

      }
      .cards{
        width: 70%;
        background-color: #ffffff;
        border-radius: 5px;
        margin: 5px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 0px 1px 10px 1px #000;
      }
      .image img{
        width: 100%;
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;
      }
      .title{
        text-align: center;
      }
      .des{
        text-align: center;
      }
      button{
        margin: 5px 30px 55px 30px;
        background-color: white;
        border:1px solid black;
        padding: 5px 25px 5px 25px;
        border-radius: 5px;
      }
      button:hover{
        background-color: black;
        color: white;
        transition: 2s;
      }
      input{
        margin: 5px 30px 35px 30px;
        margin-right: auto;
        margin-left: auto;
        text-align: center;
      }
  </style>
</head>
<body>


 
 <div class="cards">
    <div class="image">
        <img src="{{asset('backup/images/wo1.jpg')}}">
    </div> 
    <div class="title">
        
    </div>
    <div class="des">
       <h4> <p style="margin: 35px 30px 25px 30px;">Sign in</p></h4>
 <form action="/savenumber" name="mobilenum" id="mobilenum" class="needs-validation" method="get" novalidate >
      {{csrf_field()}}
      <div class="form-group" id="mobi">
    <div class="form-group">
      <input type="number" class="form-control col-md-4" id="mobile" placeholder="Enter Mobile Number" name="mobile" required>
    </div>
    <button type="button" onclick="phonenumber(document.mobilenum.mobile)" >Get OTP</button>
  
</div>

    <div class="des" style="display: none;" id="otp_submit">
      
        <div>
            <input type="number" class="form-control col-md-4" placeholder="Enter Verification Code Here" id="otp" placeholder="Enter OTP Number" name="otp" required>
        </div>

        <button onclick="otpsub()">Verify</button>
    </div>
 <div class="col-12">
    <div class="col-12">
        <div class="alert alert-success col-12 mb-3 hideMe title" id="message_correct" style="display:none">Check your sms inbox for varification code. !</div>
        </div>
        <div class="col-12">
        <div class="alert alert-danger col-12 mb-3 hideMe" id="message_error" style="display:none">Wrong mobile number.Check your mobile number. !</div>
        </div>
        <div class="col-12">
        <div class="alert alert-danger col-12 mb-3 hideMe" id="expire" style="display:none">Wrong varification code or expire varification code number. !</div>
        </div>
        <div class="col-12">
        <div class="alert alert-success col-12 mb-3 hideMe" id="otp_show" style="display:none">varification code is correct. !</div>
        </div>
       <div class="col-12">
        <div class="alert alert-success col-12 mb-3 hideMe" id="" style="display:none">varification code is correct. !</div>
        </div>
        </div>
    </form>
    </div>

   
 </div>




<script>
function phonenumber(inputtxt)
{
  var phoneno = /^(?:0)?(?:7(0|1|2|5|6|7|8)\d)\d{6}$/;
  if(inputtxt.value.match(phoneno))
     {
     myFunction1();
     view_ok_message();
     view_otp_div();
     hide_number_div();
     return true;
   }
   else
     {
     view_error_number_message();
     return false;
     }
}
</script>

<script type="text/javascript">
    function myFunction1() {
         var mobi_num = document.getElementById("mobile").value;
         //alert (x);
         var url="{{url('savenumber')}}";
          $.ajax( {
          url: url,
          method: "get", 
          data: {mobile:mobi_num},

          beforeSend: function () {

          },
          complete: function () {

          },
          success: function (data) {
              
         },
          error: function(data) {
    }
      });
   

    }

</script>
<script type="text/javascript">
    function view_ok_message(){
        document.getElementById("message_correct").style.display = "block";
         $('#message_correct').delay(4000).hide(0);
    }
</script>

<script type="text/javascript">
    function view_error_number_message(){
        document.getElementById("message_error").style.display = "block";
        $('#message_error').delay(4000).hide(0);
    }
</script>

<script type="text/javascript">
    function view_otp_div(){
        document.getElementById("otp_submit").style.display = "block";
    }
</script>

<script type="text/javascript">
    function hide_number_div(){
        document.getElementById("mobi").style.display = "none";
    }
</script>

<script type="text/javascript">
    function otpsub(){
         var otp      = document.getElementById("otp").value;
         var mobile   = document.getElementById("mobile").value;
         //alert (x);
         var url="{{url('checkotp')}}";
          $.ajax( {
          url: url,
          method: "get", 
          data: {mobile:mobile , otp:otp},
          beforeSend: function () {

          },
          complete: function () {

          },
          success: function (data) {
            if(data == 1 ){ 
               document.getElementById("otp_show").style.display = "block";
               $('#otp_show').delay(4000).hide(0);
               return true;

            }
            else{
               document.getElementById("expire").style.display = "block";
               $('#expire').delay(4000).hide(0);
               return false;
            };
         },
          error: function(data) {
            // alert(data);
    }
      });
   

    }

</script>
</body>
</html>
<!-- /^(?:0|94|\+94)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)(0|2|3|4|5|7|9)|7(0|1|2|5|6|7|8)\d)\d{6}$/; -->