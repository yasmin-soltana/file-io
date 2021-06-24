<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Form Submission</title>
</head>
<body>
  <h1>File I/O</h1>

  <?php
   define("filepath", "data.txt");

  $firstname= $lastname = $gender = $dob = $religion = $emaiL = $username = $password ="";
  $firstnameErr = $lastnameErr = $genderErr = $dobErr = $religionErr = $emaiLErr = $usernameErr = $passwordErr = "";
  $successfulMessage = $errorMessage = "";
  $flag = false;

  if($_SERVER['REQUEST_METHOD'] ==="POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $err_gender="";
            $dob  = $err_dob= "";
            $religion =  $err_religion="";
            $email = $err_email="";
            $username = $err_username="";
            $password = $err_password="";
    

    if(empty($firstname)) {
      $firstnameErr = "Empty!";
    
    $flag = true;

  }
   if(empty($lastname)) {
    $lastnameErr = "Empty!";
    $flag = true;
  }

 

  if(empty($username)) {
    $usernameErr = "Empty!";
    $flag = true;
  }

if(empty($password)) {
    $passwordErr = "Empty!";
    $flag = true;
  }


  if(!$flag){
   $firstName = test_input($firstName);
    $lastName = test_input($lastName);
    $gender = test_input($gender);
    $dob = test_input($dob);
    $religion = test_input($religion);
    $emaiL = test_input($emaiL);
    $userName = test_input($userName);
    $passWord = test_input($passWord);

    $data = array("$firstName" => $firstName, "lastName" => $lastName,"gender" => $gender, "dob" => $dob, "religion" => $religion, "emaiL" => $emaiL, "userName" => $userName, "passWord" => $passWord);
    $data_encode = json_encode($data);

    $result1 = write($data_encode);

    $result1 = write($data_encode);
if($result1){
   $successfulMessage = "Successfully saved!";
 }
 else{
  $errorMessage = "Error while saving!";
     }
   }
 }
  function write($content){
    $resource = fopen(filepath, "a");
      $fw = fwrite($resource, $content . "\n");
      fclose($resource);
      return $fw;
  }


  function test_input($data) {
         $data =trim($data);
         $data =stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       } 

?>



<fieldset>
   <legend><h2>Basic Information:</h2></legend>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

 
   <br> <label for="firstname">First Name <span style="color: red;">*</span>:</label>
        <input type="text" id="firstname" name="firstname"> <span style="color: red;"><?php echo $firstnameErr; ?></span>
        <br><br>


        <label for="lastname">Last Name <span style="color: red;">*</span>:</label>
        <input type="text" id="lastname" name="lastname"> <span style="color: red;"><?php echo $lastnameErr; ?></span>
        <br><br>

<span>Gender</span>
        <td>:<input type="radio" value="<?php echo $Gender;?>" name="Gender">Male<input type="radio" value="<?php echo $Gender;?>" name="Gender">Female
            
            <br><br>



<label for="dob">Enter your date of birth:<span style="color: red;"></span>:</label>
    <input type="date" id="dob" name="dob"><br><br>

<label>Religion</label>
    <select name="Religion">
        <option>Muslim</option>
        <option>Hindu</option>
        <option>Chiristian</option>
        <option>Budda</option>
    </select>
        <br><br>


</fieldset>



<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
  <fieldset>
    <legend><h2>Contact Information:</h2></legend>

  <br><label for="paddress">Present address:</label>
        <input type="textarea" id="paddress" name="paddress"><br><br>

   <label for="address">Permanent address:</label>
        <input type="textarea" id="address" name="address"><br><br>


    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone"><br><br>

     <label for="email">Email<span style="color: red;">*</span>:</label>
    <input type="email" id="email" name="email"><br><br>
<label for="personal website">personal website :</label>
    <a href="url">https://github.com/yasmin-soltana"</a>
    <br><br>
<form action="/action_page.php">
  <fieldset>
    <legend><h2>Account Information:</h2></legend>

    
<label for="username">username:</label>
         <td>:<input type="text" placeholder="Username" value="<?php echo $username;?>" name="username">
         
          <br><br>

          <label for="upassword">password:</label>
          <td>:<input type="password" placeholder="Password" value="<?php echo $password;?>" name="pass">
         
          <br><br>

 </fieldset>

 <br><br>
 <input type="submit" name="submit" value="REGISTER">
</form>

<br>
<br>


<span style ="color:green;"><?php echo $successfulMessage; ?></span>
<span style ="color:red;"><?php echo $errorMessage; ?></span>

  
<p>Back to<a href="login-form.php">LOGIN</a></p>
</body>
</html>