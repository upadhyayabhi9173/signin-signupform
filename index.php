<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Signup Form</title>

  <style>
    *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .signUpForm{
          border-radius: 20px;
          background-color: aquamarine;
            width:350px;
            height:350px;
            border: 5px inset;
            padding: 50px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            
        }
        .signInForm{
          border-radius: 20px;
          background-color: rgb(23, 234, 234);
            width:350px;
            height:300px;
            border: 5px inset;
            padding: 50px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            
            display:none;
            
        }
        label{
            font-size: large;
            font-weight: 800;
        }
        #signup,#signin{
            height: 25px;
            width: 80px;
            border-radius: 5PX;
            cursor: pointer;
        }
        input{
            width: 250px;
            height: 30px;
            border: 2px inset gray;
            border-radius:5px;

        }
  </style>
  
</head>
<body style="background-image: url(Html-background-image.jpg);background-size: cover;">
  
  <div class="signUpForm" id="signUpForm">
    <form action="" method="post"> 
      <!-- $_POST and $_GET are two methods  that are used in which get are unsecured and post is secured
      - $_REQUEST is used to get values if we are unaware of either get or post. 
      -->
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name"><br><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br><br>
    
        <input type="submit" value="Sign Up" name="signup" id="signup">
    <!-- <input type="submit" value="Sign In" name="signin" id="signin">-->

        <p style="margin-top: 10px;">Already Hve an Account ? <a href="#" onclick="signinForm()" style="text-decoration: none;font-weight: 600;">Sign In</a></p>
    </form>
  </div>
    
  <!-- sign in form after clicking on sign in  -->

  <div class="signInForm" id="signInForm">
      <form action="" method="post">

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br><br>
  
        <input type="submit" value="Sign In" name="signin" id="signin">

        <p style="margin-top: 10px;">Don't Have Account ? <a href="#" onclick="signupForm()" style="text-decoration: none;font-weight: 600;">Sign Up</a></p>
      </form>
  </div>

   
 
  <?php
    if(isset($_POST['signup']))
    {
        //to get value from input boxes and store it to different varibales as soon as sign up button clicked

        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['password'];

        //connect with mysql server and then database  
        $mycon=mysqli_connect('localhost','root','','dataline');

        //it is the query to store the information in q variable
        $q="insert into users values ('$name','$email','$pass')";

        //execute the query written above to insert the value in database
        $res=mysqli_query($mycon,$q);
        echo $res."Sigup Successfull";

    }

    if(isset($_POST['signin']))
    {
      
      $email=$_POST['email'];
      $pass=$_POST['password'];

        $myconn=mysqli_connect('localhost','root','','dataline');

        $inf="select *from users where email='$email' and password='$pass'";

        $res=mysqli_query($myconn,$inf);
        // echo "<pre>";
        // print_r($res);
        // echo "</pre>";
        if(mysqli_num_rows($res)>0)
        {
            echo "Login!";
        }
        else{
            echo "login Fail because invalid email or password!";
        }
    }

    
  ?>
  <script>
    function signinForm() {
      document.getElementById("signUpForm").style.display = "none";
      document.getElementById("signInForm").style.display = "block";
    }

     function signupForm() {
      document.getElementById("signUpForm").style.display = "block";
      document.getElementById("signInForm").style.display = "none";
    }
  </script>

  
</body>
</html>