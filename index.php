<?PHP

/*if ($_POST["hidSubmit"]=="Y")*/
if (isset($_POST["firstName"]) 
	&& isset($_POST["lastName"]) 
    && isset($_POST["theCompany"]) 
	&&isset($_POST["thePhone"])
	&&isset($_POST["theEmail"])
	&&isset($_POST["theMessage"])
	){

$errors = array();
// on some servers you need to add this code in order to work without problems
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$theCompany = $_POST["theCompany"];
$thePhone = $_POST["thePhone"];
$theEmail = $_POST["theEmail"];
$theMessage = $_POST["theMessage"];


//---Error message if Required questions are left blank---

if (empty($_POST["firstName"])==true||empty($_POST["lastName"])==true||empty($_POST["theEmail"])==true||empty($_POST["thePhone"])==true) { 

		$errors[] = 'REQUIRE: Name, Email, Phone Number';}
		
//---First Name Validation---

		else{ if(ctype_alpha($_POST["firstName"])==false) {

                    $errors[] = 'Fist Name MUST only contain letters';}
					
//---Last Name Validation---

		  if(ctype_alpha($_POST["lastName"])==false) {

                    $errors[] = 'Last Name MUST only contain letters';}
							
//---Email Validation---	

		  



}if(empty($errors)===true){
	

$to = "bethuelcorrea@gmail.com";//this is the email you what to send info
$subject = "Contact Form";
$message = "First Name: " . $firstName;
$message .= "\nLast Name: " . $lastName;
$message .= "\nCompany: " . $theCompany;
$message .= "\nPhone Number: " . $thePhone;
$message .= "\nEmail: " . $theEmail;
$message .= "\nIP Adress: " . $_SERVER['REMOTE_ADDR'];
$message .= "\nBrowser: " . $_SERVER['HTTP_USER_AGENT'];
$message .= "\n\nMessage: " . $theMessage;
$headers = "From: $theEmail";
$headers .= "\nReply-To: $theEmail";


$sentOk = mail($to,$subject,$message,$headers);

echo "sentOk=" . $sentOk;
//this is code to redirect to index page
echo "Thank you for your interest in escooterstogo.com ";

  $url = 'http://www.escooterstogo.com/';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';  
	
}

}
?> 





<html>
<head><title>Contact:escooterstogo:Power wheelchair & scooter repair Services</title>

<link rel="shortcut icon" href="http://www.escooterstogo.com/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">


<meta name=viewport content="width=device-width, initial-scale=.5">

<link rel="stylesheet" type="text/css" href="css/main.css">
<meta name="description" content="escooterstogo services, repairs and refurbish wheelchair scooters. We do onsite repairs and provide loaner chairs if needed. Your scooter source. We take Medicare cash or credit card">
<meta name="keywords" content="scooters repair, wheelchair repair, replace parts, replace batteries, replace chargers, wheels, DFW, Dallas Fort Worth, medicare cash or credit ">
<meta name="author" content="Bet Bethuel Correa">
<meta charset="UTF-8">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style type="text/css">
<!--
p{
	color: #FFFFFF;
}
-->
.image
 {
	background-image:url(image/fortworth.jpg);
	background-color:#FFFFFF;
	background-repeat:no-repeat;
	background-position: center center;
	 background-attachment: fixed;
	  -webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;
	
	padding-top:-10px;	
 } 
.tablehead{
	background-color: #333;
	color: #FFFFFF;
}
label{background-color:grey;}

</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style3 {font-size: 24px}
-->
</style>
</head>
<body>
<div id="contain" class="image">
<h1></h1>
<div id="menubar1">
<a href="#">Home</a>
<a href="#">About us</a>
<a href="#">Service</a>
<a href="#">Schedule Repair</a>
<a href="#">Service Fees</a>
<a href="#">Contact</a>




</div><br><br><br><br>
<!--this is the start of the contact form -->
<table width="35%" border="4" align="center" cellpadding="5" bordercolor="yellow" bgcolor="#FFFFFF" style="background-color:transparent;color:yellow;font-size: 17px;">
  <tr>
    <td valign="top">    
<div style="color: red" align="left">
<?php 
if (empty($errors) === false){
	echo '<ul>';
	foreach($errors as $error){
		echo '<li>', $error, '</li>';
		}
	echo '</ul>';	
}
?>  
</div>

<div class="tablehead"><img src="eslogo.png" width="80" height="60"/><span class="style3">Schedule your scooter repair!!! <br>
We service DFW and the MetroPlex</span></div>
<form action="" method="post" id="myForm"><br/>
<input type="hidden" id="hidSubmit" name="hidSubmit" value="Y"/>
<label>&nbsp;FirstName:</label><br/>
<span id="sprytextfield1">
<input class="input" id="firstName" type="text" size="40" maxlength="25" name="firstName"/>
<span class="textfieldRequiredMsg">A value is required.</span></span>*<br/>
<br/>
<label>&nbsp;LastName:</label><br/>
<span id="sprytextfield2">
<input class="input" id="lastName" type="text" size="40" maxlength="25" name="lastName" />
<span class="textfieldRequiredMsg">A value is required.</span></span>*<br/>
<br/>
<label>&nbsp;Address:</label><br/>
<input class="input" id="theCompany" type="text"  size="40" Maxlenght="25" name="theCompany"/><br/><br/>
<label>&nbsp;PhoneNumber:</label><br/>
<span id="sprytextfield3">
<input class="input" id="thePhone" type="text" size="40" maxlenght="25" name="thePhone"/>
<span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>*<br/>
<br/>
<label>&nbsp;Email:</label><br/>
<span id="sprytextfield4">
<input class="input" id="theEmail" type="text" size="40" maxlenght="25" name="theEmail"/>
<span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>*<br/>
<br/>
<label>&nbsp;Repairs needed:</label><br/>
<textarea id="theMessage" cols="50" rows="5" name="theMessage" size="30" maxlenght="200"><?php if (isset($_POST['theMessage']) === true){echo  filter_var($theMessage,FILTER_SANITIZE_SPECIAL_CHARS);}?></textarea><br><br>
&nbsp;&nbsp;<input name="submit" type="submit" value="Submit" /><br/>
</form>    </td>
  </tr>
</table><br><br><br><br><br><br>

<!--footer div -->
<div id="footer">
<hr>
	<h2>3301 S. Grove St.&nbsp; | &nbsp;Ft. Worth, TX 76110&nbsp; | &nbsp;<a href="tel:18003101819"><img src="image/phone.png" alt="call" width="30" height="30" style="border-style: none"></a></h2>
</div>

<!--close container div -->       
</div>
<!--  
<p>escooterstogo services, repairs and refurbish wheelchair scooters . We do onsite repairs and provide loaner chairs if needed. Your scooter source. Located in Fort Worth TX.
We take Medicare cash or credit card. Servicing DFW and MetroPlex.</p>
-->

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "phone_number", {useCharacterMasking:true});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email");
//-->
</script>
</body>



</html>