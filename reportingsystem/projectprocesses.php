<?php
    session_start();
    require "../includes/projectconnect.php";

    if(isset($_POST["SignUp"])){
        $EmailAddress = $_POST["EmailAddress"];
        $TelephoneNumber = $_POST["TelephoneNumber"];
        $IDNumber = $_POST["IDNumber"];
        $UserName = $_POST["UserName"];
        $Password = $_POST["Password"];
        $ConfirmPassword = $_POST["ConfirmPassword"];
        $SignupType = $_POST["SignupType"];

        if($Password !== $ConfirmPassword){
            header("Location: ../signup.php?signup=Password error");
            exit();
        }
        $hash_pass = password_hash($ConfirmPassword, PASSWORD_DEFAULT);

        $user_insert = "INSERT INTO users(EmailAddress, TelephoneNumber, IDNumber, UserName, Password, ConfirmPassword, SignupType) VALUES ('$EmailAddress','$TelephoneNumber','$IDNumber','$UserName', '$Password', '$hash_pass', '$SignupType')";

        if($conn->query($user_insert) === TRUE){
            header("Location: ../signup.php?signup=success");
            exit();
        } else {
            die("Registration failed: <br /> " .$conn->error);
        }
    }
        if(isset($_POST["Login"])){
            $UserName = mysqli_real_escape_string($conn, $_POST["UserName"]);
            $entered_Password = mysqli_real_escape_string($conn, $_POST["Password"]);
            
            $spot_user = "SELECT * FROM users WHERE UserName = '$UserName' LIMIT 1";
            $spot_user_res = $conn->query($spot_user);
            
            if($spot_user_res->num_rows > 0){
                $_SESSION["control"] = $spot_user_res->fetch_assoc();
            
            $stored_Password = $_SESSION["control"]["ConfirmPassword"];
            $SignupType = $_SESSION["control"]["SignupType"];
            
            if(password_verify($entered_Password, $stored_Password)){
                if($SignupType == "SAdmin"){
                    header("Location: ../systemadminpage.php");
                    exit();
                }else if($SignupType == "HAdmin"){
                    header("Location: ../hospitaladminpage.php");
                    exit();
                }else if($SignupType == "MAdmin"){
                    header("Location: ../morgueadminpage.php");
                    exit();
                }else if($SignupType == "User"){
                    header("Location: ../userpage.php");
                    exit();
                }
            }else{
                unset($_SESSION["control"]);
                header("Location: ../index.html?signup=Credentials error");
                exit();
            }  
        }
    }
    if(isset($_POST["Logout"])){
       echo $_SESSION['UserName'];
       session_destroy();
       header("Location:../index.html");
    }
 if(isset($_POST["save"])){
        $EmailAddress = $_POST["EmailAddress"];
        $TelephoneNumber = $_POST["TelephoneNumber"];
        $IDNumber = $_POST["IDNumber"];
        $UserName = $_POST["UserName"];
        $Password = $_POST["Password"];
        $ConfirmPassword = $_POST["ConfirmPassword"];
        $SignupType = $_POST["SignupType"];

        if($Password !== $ConfirmPassword){
            header("Location: ../signup.php?signup=Password error");
            exit();
        }
        $hash_pass = password_hash($ConfirmPassword, PASSWORD_DEFAULT);

        $user_insert = "INSERT INTO users(EmailAddress, TelephoneNumber, IDNumber, UserName, Password, ConfirmPassword, SignupType) VALUES ('$EmailAddress','$TelephoneNumber','$IDNumber','$UserName', '$Password', '$hash_pass', '$SignupType')";

        if($conn->query($user_insert) === TRUE){
            echo "<p>Member successfully created</p>";
            echo "<a href='../projectcreate.php'><button type='button'>BACK</button></a>";
            echo "<a href='../systemadminpage.php'><button type='button'>HOME</button></a>";
        } else {
            die("Creation failed: <br /> " .$conn->error);
        }
 }
 //READING THE RECORDS FROM THE DATABASE
        $mysqli_result = mysqli_query($conn,"SELECT * FROM users");

//DELETING RECORDS
      if(isset($_GET["del"])){
             $UserID = $_GET["del"]; 
             $rec = mysqli_query($conn, "SELECT * FROM users");
             $record = mysqli_fetch_array($rec);
             if($conn->query($rec) === TRUE){
            echo "<p>Member successfully deleted</p>";
            echo "<a href='../systemadminpage.php'><button type='button'>BACK</button></a>";
        } else {
            die("Deletion failed: <br /> " .$conn->error);
        }
    }
?>