<?php
session_start();
include('Database.php');

if (isset($_SESSION['user_id'])) {
        ?>
        <a href="actions.php?action=logout">LogOut</a>
        <?php
    if($_SESSION["profession_id"] == 2){
        ?>
        <a href="teachers_room.php">Teachers room</a>
        <a href="view_students.php">View students</a>
        <?php
    }else{ ?>
        <a href="students_room.php">Students room</a>
    <?php }
}else{
    ?>
    <a href="registration.php">Registration</a>
    <a href="login.php">Login</a>
    <?php
}