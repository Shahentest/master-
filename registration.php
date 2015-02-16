<?php
include('header.php');
include('users.php');
$user = new Users();
if($_POST){
    
    $add = $user->add($_POST);
    //var_dump($_POST);die;
    if($add){
         header("Location: http://school.dev/login.php?");
    }

}
$professions = $user->getProfessions();

?>

<form id='register' action='registration.php' method='post'  accept-charset='UTF-8'>

        <legend>Register</legend>
        <input type='hidden' name='submitted' id='submitted' value='1'/>

        <label for='name' >Your Name*: </label>
        <input type='text' name='first_name' id='name' maxlength="50" />

        <label for='email' >Last name</label>
        <input type='text' name='last_name' id='name' maxlength="50" />



        <label for='username' >email*:</label>
        <input type='text' name='email' id='email' maxlength="50" />


        <label for='username' >birth date*:</label>
        <input type='text' name='birth_date' id='email' maxlength="50" />

        <label for='password' >Password*:</label>
        <input type='password' name='password' id='password' maxlength="50" />

        <label for='password' >Confirm Password*:</label>
        <input type='password' name='confirm_password' id='password' maxlength="50" />

        <select name="profession_id">
            <?php
            foreach ($professions as $key => $value) {?>
               <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
            <?php } ?>
        </select>

        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <input type='submit' name='Submit' value='Submit' />


</form>
