<html>
<head>
<style>
</style>
</head>
<body bgcolor="Lightskyblue">

<?php

$nameErr = $nameErr2 = $emailErr = $genderErr = $phoneErr = "";
$name = $name2 = $email = $gender = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
    $nameErr = "First Name is required";
 } else {
    $name = test_input($_POST["fname"]);
    if (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
        $nameErr = "Only alphabets and whitespace are allowed.";
        $name = "Invalid";
    }
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lname"])) {
      $nameErr2 = "Last Name is required";
    } else {
      $name2 = test_input($_POST["lname"]);
      if (!preg_match ("/^[a-zA-z]*$/", $name2) ) {  
        $nameErr2 = "Only alphabets and whitespace are allowed.";
        $name2 = "Invalid";
        }
    }
  
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["date"])) {
      $dateErr = "Date is Blank";
    } else {
      $date = test_input($_POST["date"]);
    }
  
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["gender"])) {
      $genderErr = "Gander is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }
  
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["phone"])) {
      $phoneErr = "Phone Number is required";
    } else {
      $phone = test_input($_POST["phone"]);
      if (!preg_match ("/^[0-9]*$/", $phone) ){  
        $phoneErr = "Only numeric value is allowed.";  
        $phone = "Invalid";
      }
    }
  
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
      $emailErr = "email is required";
    } else {
      $email = test_input($_POST["email"]);
      $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
        if (!preg_match ($pattern, $email) ){  
        $emailErr = "Email is not valid. Put ***@###.com";
        $email= "Invalid";  
        }
    }
  
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["password"]) && ($_POST["confirm_password"])) {
      $passErr = "password is required";
    } 
    else {
      $pass = test_input($_POST["password"]);
      $cpassword = test_input($_POST["confirm_password"]);
      if (strlen($pass) <= '8') {
        $passErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$pass)) {
        $passErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$pass)) {
        $passErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$pass)) {
        $passErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    } else {
        $passErr = "Please Check You've Entered Or Confirmed Your Password!";
    }

    }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  First Name: <input type="text" name="fname">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  Last Name: <input type="text" name="lname">
  <span class="error"> <?php echo $nameErr2;?></span>
  <br><br>
  D.O.B: <input type="date" name="date">
  <span class="error"> <?php echo $dateErr;?></span>
  <br><br>
  Gender :  
</label><br>  
    <input type="radio" name="gender" value="male" /> Male <br>  
    <input type="radio" name="gender" value="female" /> Female <br>  
    <input type="radio" name="gender" value="other" /> Other  
    <span class="error"> <?php echo $genderErr;?></span>
  <br><br>
  Contact No :   
    <input type="text" name="country code"  value="+91" size="2"/>   
    <input type="text" name="phone" size="10"/> 
    <span class="error"> <?php echo $phoneErr;?></span>
    <br> <br> 
  E-mail: <input type="text" name="email">
  <span class="error"> <?php echo $emailErr;?></span>
  <br><br>
  Password: <input type="text" name="password">
  <span class="error"> <?php echo $passErr;?></span>
  <br><br>
  Re-type Password: <input type="text" name="confirm_password">
  <span class="error"> <?php echo $passErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo $name;
echo "<br>";
echo $name2;
echo "<br>";
echo $gender;
echo "<br>";
echo $phone;
echo "<br>";
echo $email;
echo "<br>";
echo $pass;
?>

</body>
</html>
