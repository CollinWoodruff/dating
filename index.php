<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 4/29/2020
 * Time: 10:10 AM
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload
require_once('vendor/autoload.php');

session_start();

//Create an instance of the Base Class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function() {

    $view = new View;
    echo $view->render('views/home.html');
});


//Define a form1 route
$f3->route('GET|POST /date', function($f3) {
    $_SESSION = array();
    global $isValid;

    if(isset($_POST['submit']))
    {
        $isValid=true;

        if (!empty($_POST['firstName'])) {
            $_SESSION['firstName'] = $_POST['firstName'];
        } else {
            $f3->set("errors['first']", "Please enter a first name");
            $isValid= false;
        }

        if (!empty($_POST['lastName'])) {
            $_SESSION['lastName'] = $_POST['lastName'];
        } else {
            $f3->set("errors['last']", "Please enter a last name");
            $isValid = false;
        }

        if (!empty($_POST['age'])) {
            $age = $_POST['age'];
            $_SESSION['age'] = $age;
        } else {
            $f3->set("errors['age']", "Please enter an age");
            $isValid = false;
        }

        if (!empty($_POST['sex'])) {
            $sex = $_POST['sex'];
            $_SESSION['sex'] = $sex;
        } else {
            $f3->set("errors['sex']", "Please enter a sex");
            $isValid = false;
        }

        if (!empty($_POST['phone'])) {
            $phone = $_POST['phone'];
            $_SESSION['phone'] = $phone;
        } else {
            $f3->set("errors['phone']", "Please enter a phone number");
            $isValid = false;
        }

        if ($isValid)
        {
            $f3->reroute('date2');
        }
    }

    $template = new Template();
    echo $template->render('views/Registration.php');
});

//Define a form2 route
$f3->route('GET|POST /date2', function($f3) {

    //print_r($_SESSION);
    global $isValid;
    $f3->set('states', array('AL','AK','AZ','AR','CA','CO','CT','DE','FL','GA','HI','ID','IL',
        'IN','IA','KS','KY','LA','ME','MD','MA', 'MI','MN','MS','MO','MT','NE','NV',
        'NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT',
        'VT','VA','WA','WI','WY'));

    if(isset($_POST['email']))
    {
        $isValid=true;
        // $isValid ['firstName'] = true;

        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
            $_SESSION['email'] = $email;
        } else {
            $f3->set("errors['phone']", "Please enter a phone number");
            // $isValid['firstName'] = false;
        }

        if (!empty($_POST['state'])) {
            $lname = $_POST['lastName'];
            $_SESSION['lastName'] = $lname;
        } else {
            $f3->set("errors['phone']", "Please enter a phone number");
            $isValid = false;
        }

        if (!empty($_POST['age'])) {
            $age = $_POST['age'];
            $_SESSION['age'] = $age;
        } else {
            $f3->set("errors['phone']", "Please enter a phone number");
            $isValid = false;
        }

        if (!empty($_POST['sex'])) {
            $sex = $_POST['sex'];
            $_SESSION['sex'] = $sex;
        } else {
            $f3->set("errors['phone']", "Please enter a phone number");
            $isValid = false;
        }

        if (!empty($_POST['phone'])) {
            $phone = $_POST['phone'];
            $_SESSION['phone'] = $phone;
        } else {
            $f3->set("errors['phone']", "Please enter a phone number");
            $isValid = false;
        }
        if ($isValid)
        {
            $f3->reroute('date3');
        }
    }

    $template = new Template();
    echo $template->render('views/profile.html');
});

//Define a form3 route
$f3->route('GET|POST /date3', function($f3) {

    if(isset($_POST['color']))
    {
        $color = $_POST['color'];
        if (validColor($color))
        {
            $_SESSION['color'] = $color;
            $f3->reroute('results');
        }
        else
        {
            $f3->set("errors['color']", "Please choose a color.");
        }
    }

    $template = new Template();
    echo $template->render('views/Interests.html');
});

//Define a form4 route
$f3->route('GET|POST /date4', function($f3) {
    print_r($_SESSION);

    $template = new Template();
    echo $template->render('views/Summary.php');
});

//Run fat free
$f3->run();