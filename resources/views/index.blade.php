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
</head>
<body>

<div class="container">
 
  <form action="/savenumber" name="mobilenum" id="mobilenum" class="needs-validation" method="get" novalidate style="margin-top: 100px;">
      {{csrf_field()}}
      <div class="form-group" id="mobi">
    <div class="form-group">
      <label for="mobile">Mobile Number:</label>
      <input type="number" class="form-control col-md-4" id="mobile" placeholder="Enter Mobile Number" name="mobile" required>
    </div>
    <button type="button" onclick="phonenumber(document.mobilenum.mobile)" class="btn btn-primary">Get OTP</button>
  
</div>
<div class="container hide" id="otp_submit">

    <div class="form-group ">
      <label for="otp">OTP Code:</label>
      <input type="number" class="form-control col-md-4" id="otp" placeholder="Enter OTP Number" name="otp" required>
    </div>
    <button type="button" onclick="otpsub()" class="btn btn-primary">Verify</button>
  </div>
     <div class="col-12">
        <div class="alert alert-success col-12 mb-3 hideMe" id="message_correct" style="display:none">Check your sms inbox for varification code. !</div>
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
  </form>
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