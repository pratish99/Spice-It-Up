<?php

session_start();

include('conn.php');


if(isset($_GET['login'])){
    $user = $_GET['userid'];
    $passw = $_GET['passw'];


    $user_search = "SELECT * FROM `regiter_admin` WHERE uname='$user'";
    $result1 = mysqli_query($conn,$user_search);
    
    $user_count = mysqli_num_rows($result1);

    if($user_count){
        $pass_search = "SELECT * FROM `regiter_admin` WHERE password='$passw' ";
        $result2 = mysqli_query($conn,$pass_search);
        $pass_count = mysqli_num_rows($result2);
        if($pass_count){
            $_SESSION['uname'] = $user1;
            
            header('location:admin.php');
            
        }
        else{
            echo "<script>alert('OOPS!!password incorrect')</script>";
        }
    }
    else{
        echo "<script>alert('Seems User does not exist')</script>";
    }
}


?>

<html>
    <head>
        <title>Login/Registration</title>
        <link rel="stylesheet" href="styles.css">
        <script>
            function myfun(){
        var a = document.getElementById("passwords");
        var b = document.getElementById("passwordss");
        var c = document.getElementById("messages");
        if(a==""){
            document.getElementById("messages").innerHTML="Please fill password";
            return false;
        }
        if(a.length < 5){
            c.style.color="red";
            document.getElementById("messages").innerHTML="weak password";
            return false;
        }
        else if(a.length > 5){
            c.style.color="green";
            document.getElementById("messages").innerHTML="strong password";
            return false;
        }
        
    
        if(a!=b){
            document.getElementById("messagess").innerHTML="Password not match";
            return false;
        }
        else{
            c.style.color="green";
            document.getElementById("messagess").innerHTML="Password matched";
            return false;
        }
          
    }
        </script>
    </head>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form id="login" class="input-group" action="" method="GET">
                <input type="text" class="input-field" placeholder="User Name" required name="userid">
                <input type="password" class="input-field" placeholder="Enter Password" required name="passw">
                <button type="submit" class="submit-btn" name="login">Log in</button>
            </form>
            
            <form id="register" class="input-group" action="login.php" method="POST">
                
                <input type="text" class="input-field" placeholder="Name" required name="name">
                <input type="email" class="input-field" placeholder="Email Id" required name="email">
                <input type="text" class="input-field" placeholder="User Name" required name="uid">
                <input type="text" class="input-field" placeholder="Enter Password" required name="password" id="passwords" value="" required  onchange="return myfun() ">
                <input type="text" class="input-field" placeholder="Confirm Password" required name="passw1" id="passwordss" value="" required  onclick="return myfun() ">
                <input type="tel" class="input-field" placeholder="Mobile" required name="mobileno">
                
                <button type="submit" class="submit-btn" name="register">Register</button>
            </form>

            <?php
            include('conn.php');
            if(isset($_POST['register'])){
                $uid = $_POST['uid'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $mobileno = $_POST['mobileno'];
                $password = $_POST['password'];
                $password1 = $_POST['passw1'];
            
                $sql = "SELECT * FROM `regiter_admin` WHERE uname='$uid' AND password='$password'";
                $result = mysqli_query($conn,$sql);
                
                if(!$result->num_rows > 0){
                    $query = "INSERT INTO `regiter_admin`(`name`, `email`, `mobileno`,`uname`, `password`,`confirmpass`) VALUES ('$name','$email','$mobileno','$uid','$password','$password1')";
                    $qresult = mysqli_query($conn,$query);
                    if(!$qresult){
                        echo "<script>alert('Something went wrong')</script>";
                    }
                    else{
                        echo "<script>alert('User Registered')</script>";
                    $uid = "";
                    $name = "";
                    $email = "";
                    $address = "";
                    $mobileno = "";
                    $_POST['password'] = "";
                    
                    }
                }
                else{
                    echo "<script>alert('User already exist')</script>";
                }
            }
            ?>
        </div>
    </div>
    
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>
</body>
</html>