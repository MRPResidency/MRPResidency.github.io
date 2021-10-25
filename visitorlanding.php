<!DOCTYPE html>
<html>
<head>
<title>VisitorPage</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style type="text/css">
	#otpdiv{

		display: none;
	}
	#verifyotp{

		display: none;
		
	}
	
	#submitform{

		display: none;
		
	}
	
	#resend_otp{
		display: none;
	}

	.countdown{
		display: table;
		width: 100%;
		text-align: left;
		font-size: 15px;

	}

	#resend_otp:hover{

		text-decoration:underline;
		

	}
	.wa{
	position:fixed;
	left:10px;
	bottom:10px;
	border-radius:50px;
}

</style>
</head>
<body>

		<!--html part start-->
		
		<div class="container-fluid" >
			<div class="row justify-content-center">
				<div  class="col-6 shadow-lg p-4 mt-5" >
					<div class="otp_msg" ></div>
					<h3 class="text-danger text-center" >Visitor Form</h3>
			<form class="row"  method="post" style="margin-top: 30px;" action="./db.php">
			<div class="form-group col-md-12">
                    <label for="inputname" class="form-label">Name</label>
                    <input type="text" class="form-control mb-2" id="nam" placeholder="Enter Name" autofocus name="name">
					<small>Enter First & Last Name Only</small>
                </div>
				
				<div class="form-group col-md-8">
                    <label for="inputemail" class="form-label">Email</label>
                    <input type="text" class="form-control mb-2" id="mail" placeholder="Enter email" name="email">
                </div>
				
			  <div class="form-group col-md-6">
			    <label for="mobile">Enter Mobile Number</label>
			    <input type="text" class="form-control mb-2" id="mob"  placeholder="Enter mobile" name="mobile">
			  </div>
			  
			  <div class="form-group col-md-6">
                    <label for="inputcity" class="form-label ">City</label>
                    <input type="text" class="form-control mb-2" id="cit" placeholder="Enter your city" name="city">
                </div>
				
				<div class="form-group col-md-12">
                    <label for="inputmessage" class="form-label">Description</label>
                    <textarea class="form-control" id="descrip"  placeholder="Enter Your Message" cols="10" rows="4" maxlength="2000" name="description"></textarea>
                </div>
				
			  <div class="form-group col-md-6" id="otpdiv">
			    <label for="otp verification">Enter OTP</label>
			    <input type="text" class="form-control" id="otp" placeholder="Enter OTP" name="OTPs">   
			    <br>
				<div id="count">
			  <div class="countdown"></div>	
			  <a href="#" id="resend_otp" type="button">Resend</a>
				</div>
			  </div>
			  <a href="index.php" type="button" id="goback" class="btn btn-primary">Go Back</a>
			  <button type="button" id="sendotp" class="btn btn-primary  mx-4">Send OTP</button>
			      <br>
			<div>
			  <button type="button" id="verifyotp" style="margin-top: 31px;" class="btn btn-primary">Verify OTP</button>
			 </div>
			 
			 <div>
			  <button type="submit" id="submitform" style="margin-top: 31px;" name="submit" class="btn btn-primary">Submit</button>
			 </div>
	
			</form>
				</div>

			
			
			</div>

			
		</div>

		<!-- html part ends-->

		<script type="text/javascript">
			
			$(document).ready(function(){

 //Function of validate_mobile

				function validate_mobile(mob){

					var pattern =  /^[6-9]\d{9}$/;

					if (mob == '') {

						return false;
					}else if (!pattern.test(mob)) {

						return false;
					}else{

						return true;
					}
				}
				
				
// Function of validate_name-->				
				function validate_name(nam){

					var pattern =  /^[A-Za-z]+ [A-Za-z]+$/;

					if (nam == '') {

						return false;
					}else if (!pattern.test(nam)) {

						return false;
					}else{

						return true;
					}
				}
				
// Function of validate_email-->				
				function validate_email(mail){

					var pattern =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

					if (mail == '') {

						return false;
					}else if (!pattern.test(mail)) {

						return false;
					}else{

						return true;
					}
				}
				
//Function of validate_city-->					
				function validate_city(cit){

					var pattern =  /^[A-Za-z]+$/;


					if (cit == '') {

						return false;
					}else if (!pattern.test(cit)) {

						return false;
					}else{

						return true;
					}
				}
				
					

				//send otp function
				function send_otp(mob){

						var ch = "send_otp";
							
							$.ajax({

							url: "otp_process.php",
							method: "post",
							data: {mob:mob,ch:ch},
							dataType: "text",
							success: function(data){

								if (data == 'success') {

									$('#otpdiv').css("display","block");
									$('#sendotp').css("display","none");
									$('#goback').css("display","none");
									$('#verifyotp').css("display","block");
									document.getElementById('mob').readOnly = true;
									document.getElementById('nam').readOnly = true;
									document.getElementById('mail').readOnly = true;
									document.getElementById('cit').readOnly = true;
									document.getElementById('descrip').readOnly = true;
									
									
									
									timer();
									$('.otp_msg').html('<div class="alert alert-success" style="position:absolute">OTP sent successfully</div>').fadeOut(800);
										
										window.setTimeout(function(){
										$('.otp_msg').fadeOut();
									},1000)
										

								}else{

									$('.otp_msg').html('<div class="alert alert-danger" style="position:absolute">Error in sending OTP</div>').fadeOut(800);
										
																		
								}
							}

						});
				}
				//end of send otp function


				//send otp function

				$('#sendotp').click(function()
				{
					var mob = $('#mob').val();
                    var nam = $('#nam').val();
					var mail = $('#mail').val();
					var cit = $('#cit').val();
					
					
                  if (validate_name(nam) == false) $('.otp_msg').html('<div class="alert alert-danger" style="position:absolute">Please Enter Your Name</div>').fadeIn(400);
				  else if (validate_email(mail) == false) $('.otp_msg').html('<div class="alert alert-danger" style="position:absolute">Please Enter Valid Email-Id</div>').fadeIn(400); 
				  else if (validate_mobile(mob) == false) $('.otp_msg').html('<div class="alert alert-danger" style="position:absolute">Please Enter Valid Mobile Number</div>').fadeIn(400); 
				  else if (validate_city(cit) == false) $('.otp_msg').html('<div class="alert alert-danger" style="position:absolute">Please Enter Your City</div>').fadeIn(400); 
				
	
						
				 else 	send_otp(mob);
		
				window.setTimeout(function(){
							$('.otp_msg').fadeOut();
						},1000)
					
					});

				//end of send otp function


				//resend otp function
				$('#resend_otp').click(function(){

					var mob = $('#mob').val();
					
					send_otp(mob);
						$(this).hide();
				});
				//end of resend otp function


			//verify otp function starts

			$('#verifyotp').click(function(){

						
						var ch = "verify_otp";
						var otp = $('#otp').val();

						$.ajax({

							url: "otp_process.php",
							method: "post",
							data: {otp:otp,ch:ch},
							dataType: "text",
							success: function(data){

									if (data == "success") {
										$('#verifyotp').css("display","none");
										$('#submitform').css("display","block");
										$('#otpdiv').css("display","none");
										
										

										$('.otp_msg').html('<div class="alert alert-success" style="position:absolute">OTP Verified successfully</div>').show().fadeOut(800);
										// window.location.reload()
																				
									}else{

										$('.otp_msg').html('<div class="alert alert-danger " style="position:absolute">OTP Did Not Match</div>').show().fadeOut(800);
                                 
									}
							}
						});
								

				});

			//end of verify otp function


			//start of timer function

			function timer(){

					var timer2 = "00:31";
					var interval = setInterval(function() {


					  var timer = timer2.split(':');
					  //by parsing integer, I avoid all extra string processing
					  var minutes = parseInt(timer[0], 10);
					  var seconds = parseInt(timer[1], 10);
					  --seconds;
					  minutes = (seconds < 0) ? --minutes : minutes;
					  
					  seconds = (seconds < 0) ? 30 : seconds;
					  seconds = (seconds < 10) ? '0' + seconds : seconds;
					  //minutes = (minutes < 10) ?  minutes : minutes;
					  $('.countdown').html("Resend otp in:  <b class='text-primary'>"+ minutes + ':' + seconds + " seconds </b>");
					  //if (minutes < 0) clearInterval(interval);
					  if ((seconds <= 0) && (minutes <= 0)){
					  	clearInterval(interval);
					  	$('.countdown').html('');
					  	$('#resend_otp').css("display","block");
					  }
					  
					  timer2 = minutes + ':' + seconds;
					}, 1000);

				}

				//end of timer


			});
		</script>
	
		
		
	
</body>
</html>