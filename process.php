<?php 
include('config/connect.php');
session_start();
//mysql_select_db("spm");

//Get values from login.php
$id = $_POST['id'];
$password = $_POST['pass'];


//Preventing the system from SQL Injection
$id = htmlspecialchars($id);
$password = htmlspecialchars($password);

//Query the db
$reg_login = "SELECT * FROM register_login WHERE user_id_reg = '$id' AND password = '$password'";
$school_login = "SELECT * FROM school_login WHERE user_id_school = '$id' AND password = '$password'";
$dept_login = "SELECT * FROM dept_login WHERE user_id_dept = '$id' AND password = '$password'";
$high_login = "SELECT * FROM higherauthority_login WHERE user_id_higherAuthority = '$id' AND password = '$password'";

$reg_result = mysqli_query($conn, $reg_login);
$school_result = mysqli_query($conn, $school_login);
$dept_result = mysqli_query($conn, $dept_login);
$high_result = mysqli_query($conn, $high_login);


$reg_row = mysqli_fetch_array($reg_result);
$school_row = mysqli_fetch_array($school_result);
$dept_row = mysqli_fetch_array($dept_result);
$high_row = mysqli_fetch_array($high_result);

if($reg_row['user_id_reg'] == $id && $reg_row['password'] == $password)
{   $_SESSION['id'] = $id;
    $_SESSION['password'] = $password;

    header("Location: http://localhost/RRAS/dashboard.php ");
}

else if ($school_row['user_id_school'] == $id && $school_row['password']) {
    $_SESSION['id'] = $id;
    $_SESSION['password'] = $password;
    header("Location: http://localhost/RRAS/dashboard.php ");
}
else if ($dept_row['user_id_dept'] == $id && $dept_row['password']) {
    $_SESSION['id'] = $id;
    $_SESSION['password'] = $password;
    header("Location: http://localhost/RRAS/dashboard.php ");
}
else if ($dept_row['user_id_higherAuthority'] == $id && $dept_row['password']) {
    $_SESSION['id'] = $id;
    $_SESSION['password'] = $password;
    header("Location: http://localhost/RRAS/dashboard.php ");
}
//need to impletent this part
else{
     echo "Login failed";
}

mysqli_close($conn);