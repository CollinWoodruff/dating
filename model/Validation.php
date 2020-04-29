<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 3/2/2019
 * Time: 4:46 PM
 */
print_r($_POST);
global $isValid;
$fname = $lname = $age = $sex = $phone = "";
if(!empty($_POST['submit'])) {

    $isValid=true;
   // $isValid ['firstName'] = true;

    if (!empty($_POST['firstName'])) {
        $fname = $_POST['firstName'];
        $_SESSION['firstName'] = $fname;
    } else {
        $errorName = "Please enter a name";
       // $isValid['firstName'] = false;
    }

    if (!empty($_POST['lastName'])) {
        $lname = $_POST['lastName'];
        $_SESSION['lastName'] = $lname;
    } else {
        $errorName = "Please enter a name";
        $isValid = false;
    }

    if (!empty($_POST['age'])) {
        $age = $_POST['age'];
        $_SESSION['age'] = $age;
    } else {
        $errorAge = "Please enter a name";
        $isValid = false;
    }

    if (!empty($_POST['sex'])) {
        $sex = $_POST['sex'];
        $_SESSION['sex'] = $sex;
    } else {
        $errorSex = "Please enter a name";
        $isValid = false;
    }

    if (!empty($_POST['phone'])) {
        $phone = $_POST['phone'];
        $_SESSION['phone'] = $phone;
    } else {
        $errorPhone = "Please enter a name";
        $isValid = false;
    }
    //$isValid =true;
    //return $isValid;
}

if ($isValid == true)
{
    echo "<p>Is valid</p>";
}else {
    echo "<p>Is not valid</p>";
}

print_r($_SESSION);