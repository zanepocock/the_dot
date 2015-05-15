<?php
// let's initialize vars to be printed to page in the HTML section so our script does not return errors 
// they must be initialized in some server environments
$errorMsg = "";
$firstname = "";
$lastname = "";
$country = "";
$region = "";
$city = "";
$website = "";
$email1 = "";
$email2 = "";
$pass1 = "";
$pass2 = "";

// This code runs only if the form submit button is pressed
if (isset ($_POST['firstname'])){
	
	/* Example of cleaning variables in a loop
	$vars = "";
	foreach ($_POST as $key => $value) {
       $value = stripslashes($value);
       $vars .= "$key = $value<br />";
    }
    print "$vars";
    exit();
	*/
     $firstname = $_POST['firstname'];
     $lastname = $_POST['lastname'];
     $country = $_POST['country'];
     $region = $_POST['region'];
     $city = $_POST['city'];
     $website = $_POST['website'];
     $email1 = $_POST['email1'];
     $email2 = $_POST['email2'];
     $pass1 = $_POST['pass1'];
     $pass2 = $_POST['pass2'];
     $humancheck = $_POST['humancheck'];

     $firstname = stripslashes($firstname);
     $lastname = stripslashes($lastname);
     $region = stripslashes($region);
     $city = stripslashes($city);
     $website = stripslashes($website);
     $email1 = stripslashes($email1); 
     $pass1 = stripslashes($pass1); 
     $email2 = stripslashes($email2);
     $pass2 = stripslashes($pass2); 

     $firstname = strip_tags($firstname);
	 $lastname = strip_tags($lastname);
     $region = strip_tags($region);
     $city = strip_tags($city);
     $website = strip_tags($website);
     $email1 = strip_tags($email1);
     $pass1 = strip_tags($pass1);
     $email2 = strip_tags($email2);
     $pass2 = strip_tags($pass2);

     // Connect to database
     include_once "scripts/connect_to_mysql.php";
     $emailCHecker = mysql_real_escape_string($email1);
	 $emailCHecker = eregi_replace("`", "", $emailCHecker);
     // Database duplicate e-mail check setup for use below in the error handling if else conditionals
     $sql_email_check = mysql_query("SELECT email FROM myMembers WHERE email='$emailCHecker'");
     $email_check = mysql_num_rows($sql_email_check); 

     // Error handling for missing data
     if ((!$firstname) || (!$lastname) || (!$country) || (!$region) || (!$city) || (!$email1) || (!$email2) || (!$pass1) || (!$pass2)) { 

     $errorMsg = 'ERROR: You did not submit the following required information:<br /><br />';
  
     if(!$firstname){ 
       $errorMsg .= ' * First Name<br />';
     } 
	 if(!$lastname){ 
       $errorMsg .= ' * Last Name<br />';
     } 
     if(!$country){ 
       $errorMsg .= ' * Country<br />';
     } 	
	 if(!$region){ 
       $errorMsg .= ' * Region<br />';      
     }
	 if(!$city){ 
       $errorMsg .= ' * City<br />';        
     } 		
	 if(!$email1){ 
       $errorMsg .= ' * Email Address<br />';      
     }
	 if(!$email2){ 
       $errorMsg .= ' * Confirm Email Address<br />';        
     } 	
	 if(!$pass1){ 
       $errorMsg .= ' * Login Password<br />';      
     }
	 if(!$pass2){ 
       $errorMsg .= ' * Confirm Login Password<br />';        
     } 	
	
     } else if ($email1 != $email2) {
              $errorMsg = 'ERROR: Your Email fields below do not match<br />';
     } else if ($pass1 != $pass2) {
              $errorMsg = 'ERROR: Your Password fields below do not match<br />';
     } else if ($humancheck != "") {
              $errorMsg = 'ERROR: The Human Check field must be cleared to be sure you are human<br />';		 
     } else if ($email_check > 0){ 
              $errorMsg = "<u>ERROR:</u><br />Your Email address is already in use inside our database. Please use another.<br />"; 
	   
     } else { // Error handling is ended, process the data and add member to database
     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	 $firstname = mysql_real_escape_string($firstname);
	 $lastname = mysql_real_escape_string($lastname);
     $region = mysql_real_escape_string($region);
     $city = mysql_real_escape_string($city);
     $website = mysql_real_escape_string($website);
     $email1 = mysql_real_escape_string($email1);
     $pass1 = mysql_real_escape_string($pass1);
	 
	 $firstname = eregi_replace("`", "", $firstname);
	 $lastname = eregi_replace("`", "", $lastname);
	 $region = eregi_replace("`", "", $region);
	 $city = eregi_replace("`", "", $city);
	 $website = eregi_replace("`", "", $website);
	 $email1 = eregi_replace("`", "", $email1);
	 $pass1 = eregi_replace("`", "", $pass1);

     $website = eregi_replace("http://", "", $website);
	 
     // Add MD5 Hash to the password variable
     $db_password = md5($pass1); 

     // Add user info into the database table for the main site table(audiopeeps.com)
     $sql = mysql_query("INSERT INTO myMembers (firstname, lastname, country, region, city, email, password, sign_up_date, website) 
     VALUES('$firstname','$lastname','$country','$region','$city','$email1','$db_password', now(),'$website')")  
     or die (mysql_error());
 
     $id = mysql_insert_id();
	 
	 // Create directory(folder) to hold each user's files(pics, MP3s, etc.)		
     mkdir("members/$id", 0755);	

    //!!!!!!!!!!!!!!!!!!!!!!!!!    Email User the activation link    !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $to = "$email1";
										 
    $from = "admin@thedot.co.nz";
    $subject = "Complete Your Registration at The Dot";
    //Begin HTML Email Message
    $message = "Hi $firstname,

   Complete this step to activate your login identity at The Dot.

   Click the line below to activate when ready.

   http://www.thedot.co.nz/activation.php?id=$id&sequence=$db_password
   If the URL above is not an active link, please copy and paste it into your browser address bar

   Login after successful activation using your:  
   E-mail Address: $email1 
   Password: $pass1

   See you on the site!
   admin@thedot.co.nz";
   //end of message
	$headers  = "From: $from\r\n";
    $headers .= "Content-type: text\r\n";

    mail($to, $subject, $message, $headers);
	
   $msgToUser = "<h2>One Last Step - Activate through Email</h2><h4>OK $firstname, one last step to verify your email identity:</h4><br />
   In a moment you will be sent an Activation link to your email address.<br /><br />
   <br />
   <strong><font color=\"#990000\">VERY IMPORTANT:</font></strong> 
   If you check your email with your host providers default email application, there may be issues with seeing the email contents.  If this happens to you and you cannot read the message to activate, download the file and open using a text editor. If you still cannot see the activation link, contact site admin and briefly discuss the issue.<br /><br />
   ";


   include_once 'msgToUser.php'; 

   exit();

   } // Close else after duplication checks

} else { // if the form is not posted with variables, place default empty variables
	  
	  $errorMsg = "Fields marked with an [ * ] are required";
      $firstname = "";
	  $lastname = "";
	  $country = "";
	  $region = "";
	  $city = "";
	  $website = "";
	  $email1 = "";
	  $email2 = "";
	  $pass1 = "";
	  $pass2 = "";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="Description" content="Register for The Dot" />
<meta name="Keywords" content="register, the dot" />
<meta name="rating" content="General" />
<meta name="revisit-after" content="7 days" />
<meta name="ROBOTS" content="All" />
<title>The Dot - Registration</title>
<link href="style/main.css" rel="stylesheet" type="text/css" media="screen" /> 
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=169074863173649";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="exterior">

<div id="wrapper">

<?php include_once "header_template.php"; ?>

<div id="maincontent">

<div id="contentleft"><table width="950" align="center">
  <tr>
    <td width="758">
      <blockquote>
        <h2><br />
          Create Your Account            </h2>
      </blockquote>
      <table width="600" align="center" cellpadding="5">
        <form action="register.php" method="post" enctype="multipart/form-data">
          <tr>
            <td width="125" class="style7"><div align="center"><strong>Please Do First &rarr;</strong></div></td>
            <td width="447" bgcolor="#FFFFFF">Add <a href="mailto:admin@thedot.co.nz"><u>admin@thedot.co.nz</u></a> to your email white list or safe sender list now, or else you might not get the activation email that is necessary for logging in successfully. </td>
          </tr>
          <tr>
            <td colspan="2"><font color="#FF0000"><?php print "$errorMsg"; ?></font></td>
          </tr>
          <tr>
            <td align="right" class="alignRt">First Name:<span class="brightRed"> *</span></td>
            <td><input name="firstname" type="text" class="formFields" id="firstname" value="<?php print "$firstname"; ?>" size="32" maxlength="20" /></td>
          </tr>
          <tr>
            <td align="right" class="alignRt">Last Name:<span class="brightRed"> *</span></td>
            <td><input name="lastname" type="text" class="formFields" id="lastname" value="<?php print "$lastname"; ?>" size="32" maxlength="20" /></td>
          </tr>                    
          <tr>
            <td align="right" class="alignRt">Country:<span class="brightRed"> *</span></td>
            <td>
              <select name="country" class="formFields">
                <option value="<?php print "$country"; ?>"><?php print "$country"; ?></option>
                <option value="New Zealand">New Zealand</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bonaire">Bonaire</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Canary Islands">Canary Islands</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Channel Islands">Channel Islands</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos Island">Cocos Island</option>
                <option value="Columbia">Columbia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Curacao">Curacao</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Ter">French Southern Ter</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Great Britain">Great Britain</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea North">Korea North</option>
                <option value="Korea South">Korea South</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malawi">Malawi</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Midway Islands">Midway Islands</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Nambia">Nambia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherland Antilles">Netherland Antilles</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Nevis">Nevis</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau Island">Palau Island</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn Island">Pitcairn Island</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="St Barthelemy">St Barthelemy</option>
                <option value="St Eustatius">St Eustatius</option>
                <option value="St Helena">St Helena</option>
                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                <option value="St Lucia">St Lucia</option>
                <option value="St Maarten">St Maarten</option>
                <option value="St Pierre and Miquelon">St Pierre and Miquelon</option>
                <option value="St Vincent and Grenadines">St Vincent and Grenadines</option>
                <option value="Saipan">Saipan</option>
                <option value="Samoa">Samoa</option>
                <option value="Samoa American">Samoa American</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tahiti">Tahiti</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Is">Turks and Caicos Is</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States of America">United States of America</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City State">Vatican City State</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (Brit)">Virgin Islands Brit</option>
                <option value="Virgin Islands (USA)">Virgin Islands USA</option>
                <option value="Wake Island">Wake Island</option>
                <option value="Wallis and Futana Is">Wallis and Futana Is</option>
                <option value="Yemen">Yemen</option>
                <option value="Zaire">Zaire</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
              </select>
            </td>
          </tr>
          <tr>
            <td align="right" class="alignRt">Region:<span class="brightRed">*</span></td>
            <td><input name="region" type="text" class="formFields" id="region" value="<?php print "$region"; ?>" size="32" maxlength="36" /></td>
          </tr>
          <tr>
            <td align="right" class="alignRt">City: <span class="brightRed">*</span></td>
            <td><input name="city" type="text" class="formFields" id="city" value="<?php print "$city"; ?>" size="32" maxlength="36" /></td>
          </tr>
          <tr>
            <td align="right" class="alignRt">Website:</td>
            <td><strong>http://</strong>
            <input name="website" type="text" class="formFields" id="website" value="<?php print "$website"; ?>" size="40" maxlength="88" /></td>
          </tr>        
          <tr>
            <td align="right" class="alignRt">Email Address: <span class="brightRed">*</span></td>
            <td><input name="email1" type="text" class="formFields" id="email1" value="<?php print "$email1"; ?>" size="32" maxlength="48" /></td>
          </tr>
          <tr>
            <td align="right" class="alignRt">Confirm Email:<span class="brightRed"> *</span></td>
            <td><input name="email2" type="text" class="formFields" id="email2" value="<?php print "$email2"; ?>" size="32" maxlength="48" /></td>
          </tr>
          <tr>
            <td align="right" class="alignRt">Create Password:<span class="brightRed"> *</span></td>
            <td><input name="pass1" type="password" class="formFields" id="pass1" maxlength="16" />
              <span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></td>
          </tr>
          <tr>
            <td align="right" class="alignRt">Confirm Password:<span class="brightRed"> *</span></td>
            <td><input name="pass2" type="password" class="formFields" id="pass2" maxlength="16" />
            <span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></td>
          </tr>
          <tr>
            <td align="right" class="alignRt"><br />
              Human Check: <span class="brightRed">*</span></td>
            <td><br />
              <input name="humancheck" type="text" class="formFields" id="humancheck" value="Please remove all of this text" size="38" maxlength="32" />
              </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><p><br />
              <input type="submit" name="Submit3" value="Submit Form" />
            </p></td>
          </tr>
        </form>
      </table>
      <br />
      <br /></td>
    <td width="180" valign="top"></td>
  </tr>
</table></div>

<div id="contentright"><?php include_once "right_template.php" ?></div>

</div><!--end main content-->

<?php include_once "footer_template.php"; ?>

</div><!--end wrapper-->
</div><!--end exterior-->
</body>
</html>