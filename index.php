<?php
function has_max_length($value, $max)//function for checking max length
{
  return strlen($value)<=$max;
}
function has_min_length($value, $min)//function for checking min length
{
  return strlen($value)>=$min;
}

if(isset($_POST['submit']))//checking if form is submitted
{
  //get submitted values
  $userid=$_POST['userid'];
  $passid=$_POST['passid'];
  $username=$_POST['username'];
  $address=$_POST['address'];
  $country=$_POST['country'];
  $zip=$_POST['zip'];
  $email=$_POST['email'];
  $sex=$_POST['sex'];
  $lang=$_POST['lang'];
  $desc=$_POST['desc'];

  if(!$userid || !has_min_length($userid,5) || !has_max_length($userid,12))
  $err_userid="Required and must be of length 5 to 12";

  if(!$passid || !has_min_length($passid,7) || !has_max_length($passid,12))
  $err_passid="Required and must be of length 7 to 12";

  if(!$username || !preg_match('/[A-Za-z]+/', $username))
  $err_username="Required and alphabetical only";

  if(!$address)
  $err_address="Optional";

  if(!$country)
  $err_country="Required. Must select a country";

  if(!$zip || !preg_match('/[0-9]+/', $zip))
  $err_zip="Required. Must be numeric only";

  if(!$email || !filter_var($email, FILTER_VALIDATE_EMAIL))
  $err_email="Required. Must be a valid email.";

  if(!$sex)
  $err_sex="Required.";

  if(!$lang)
  $err_lang="Required.";

  if(!$desc)
  $err_desc="Optional";

}


?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Validation using HTML5</title>
  <style>
  *{
    box-sizing: border-box;
  }
  .body-wrap{
    width: 500px;
    margin: auto;
  }
  .label-wrap{
    width: 20%;
    display: inline-block;
    vertical-align: top;
  }
  .input-wrap{
    width: 78%;
    display: inline-block;
  }
  .error{
    color:red;
  }
  input[type="text"],input[type="password"],textarea{
    width: 100%;
  }
  </style>
</head>
<body onload="document.registration.userid.focus();">
  <div class="body-wrap">
    <h1 style="color: red;">Registration Form Validation</h1>
    <h2>Registration Form</h2>
    <form name='registration' action="#" method="post">
      <div class="label-wrap">
        <label for="userid">User id:</label>
      </div>
      <div class="input-wrap">
        <input type="text" name="userid" placeholder="User ID" />
        <span class="error">
          <?php if(isset($err_userid)) echo $err_userid;?>
        </span>
      </div>
      <br><br>
      <div class="label-wrap">
        <label for="passid">Password:</label>
      </div>
      <div class="input-wrap">
        <input type="password" name="passid" placeholder="Password" />
        <span class="error">
          <?php if(isset($err_passid)) echo $err_passid;?>
        </span>
      </div>
      <br><br>
      <div class="label-wrap">
        <label for="username">Name:</label>
      </div>
      <div class="input-wrap">
        <input type="text" name="username" placeholder="Enter Your Name" />
        <span class="error">
          <?php if(isset($err_username)) echo $err_username;?>
        </span>
      </div>
      <br><br>
      <div class="label-wrap">
        <label for="address">Address:</label>
      </div>
      <div class="input-wrap">
        <input type="text" name="address" />
        <span class="error">
          <?php if(isset($err_address)) echo $err_address;?>
        </span>
      </div>
      <br><br>
      <div class="label-wrap">
        <label for="country">Country:</label>
      </div>
      <div class="input-wrap">
        <select name="country">
          <option selected value="">(Please select a country)</option>
          <option value="AF">UK</option>
          <option value="DZ">India</option>
          <option value="AD">USA</option>
        </select>
        <span class="error">
          <?php if(isset($err_country)) echo $err_country;?>
        </span>
      </div>
      <br><br>
      <div class="label-wrap">
        <label for="zip">ZIP Code:</label>
      </div>
      <div class="input-wrap">
        <input type="text" name="zip" placeholder="Enter Zip Code" />
        <span class="error">
          <?php if(isset($err_zip)) echo $err_zip;?>
        </span>
      </div>
      <br><br>
      <div class="label-wrap">
        <label for="email">Email:</label>
      </div>
      <div class="input-wrap">
        <input type="text" name="email" placeholder="Enter Email" />
        <span class="error">
          <?php if(isset($err_email)) echo $err_email;?>
        </span>
      </div>
      <br><br>
      <div class="label-wrap">
        <label id="gender">Sex:</label>
      </div>
      <div class="input-wrap">
        <input type="radio" name="sex" value="Male" /><span>Male</span>
        <input type="radio" name="sex" value="Female" /><span>Female</span>
        <span class="error">
          <?php if(isset($err_sex)) echo $err_sex;?>
        </span>
      </div>
      <br><br>
      <div class="label-wrap">
        <label>Language:</label>
      </div>
      <div class="input-wrap">
        <input type="checkbox" name="lang" value="en" checked /><span>English</span>
        <input type="checkbox" name="lang" value="noen" /><span>Non English</span>
        <span class="error">
          <?php if(isset($err_lang)) echo $err_lang;?>
        </span>
      </div>
      <br><br>
      <div class="label-wrap">
        <label for="desc">About:</label>
      </div>
      <div class="input-wrap">
        <textarea name="desc" id="desc" placeholder="Tell us about yourself"></textarea>
        <span class="error">
          <?php if(isset($err_desc)) echo $err_desc;?>
        </span>
      </div>
      <br><br>
      <div style="text-align:center">
        <input type="submit" name="submit" value="submit"  />
      </div>
    </form>
  </div>
</body>
</html>
