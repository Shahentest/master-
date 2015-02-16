<?php
include('header.php');
include('users.php');

if($_POST){
    $user = new Users();
    $user = $user->login($_POST);
    $_SESSION["user_id"] = $user['id'];
    $_SESSION["profession_id"] = $user['profession_id'];
    $_SESSION["user"] = $user;
    switch ($user['profession_id']) {
        case 2:
           header("Location: http://school.dev/teachers_room.php?teacherId=".$user['id']);
            break;
        case 1:
           header("Location: http://school.dev/students_room.php?studentId=".$user['id']);
            break;
        
        default:
            
            break;
    }
  
    }


?>

<form id='register' action='login.php' method='post'  accept-charset='UTF-8'>

    <legend>Register</legend>

    <label for='username' >email*:</label>
    <input type='text' name='email' id='email' maxlength="50" />

    <label for='password' >Password*:</label>
    <input type='password' name='password' id='password' maxlength="50" />


    <input type='submit' name='Submit' value='Submit' />


</form>
