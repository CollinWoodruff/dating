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

    $view = new Template();
    echo $view->render('views/home.html');
});


//Define a form1 route
$f3->route('GET|POST /date', function($f3) {
    $_SESSION = array();

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
            $_SESSION['age'] = $_POST['age'];
        } else {
            $f3->set("errors['age']", "Please enter an age");
            $isValid = false;
        }

        if (!empty($_POST['sex'])) {
            $_SESSION['sex'] = $_POST['sex'];
        } else {
            $f3->set("errors['sex']", "Please enter a sex");
            $isValid = false;
        }

        if (!empty($_POST['phone'])) {
            $_SESSION['phone'] = $_POST['phone'];
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
    echo $template->render('views/registration.html');
});

//Define a form2 route
$f3->route('GET|POST /date2', function($f3) {

    $f3->set('states', array('AL'=>"Alabama",
        'AK'=>"Alaska",
        'AZ'=>"Arizona",
        'AR'=>"Arkansas",
        'CA'=>"California",
        'CO'=>"Colorado",
        'CT'=>"Connecticut",
        'DE'=>"Delaware",
        'DC'=>"District Of Columbia",
        'FL'=>"Florida",
        'GA'=>"Georgia",
        'HI'=>"Hawaii",
        'ID'=>"Idaho",
        'IL'=>"Illinois",
        'IN'=>"Indiana",
        'IA'=>"Iowa",
        'KS'=>"Kansas",
        'KY'=>"Kentucky",
        'LA'=>"Louisiana",
        'ME'=>"Maine",
        'MD'=>"Maryland",
        'MA'=>"Massachusetts",
        'MI'=>"Michigan",
        'MN'=>"Minnesota",
        'MS'=>"Mississippi",
        'MO'=>"Missouri",
        'MT'=>"Montana",
        'NE'=>"Nebraska",
        'NV'=>"Nevada",
        'NH'=>"New Hampshire",
        'NJ'=>"New Jersey",
        'NM'=>"New Mexico",
        'NY'=>"New York",
        'NC'=>"North Carolina",
        'ND'=>"North Dakota",
        'OH'=>"Ohio",
        'OK'=>"Oklahoma",
        'OR'=>"Oregon",
        'PA'=>"Pennsylvania",
        'RI'=>"Rhode Island",
        'SC'=>"South Carolina",
        'SD'=>"South Dakota",
        'TN'=>"Tennessee",
        'TX'=>"Texas",
        'UT'=>"Utah",
        'VT'=>"Vermont",
        'VA'=>"Virginia",
        'WA'=>"Washington",
        'WV'=>"West Virginia",
        'WI'=>"Wisconsin",
        'WY'=>"Wyoming"));


    if(isset($_POST['submit']))
    {
        $isValid=true;

        if (!empty($_POST['email'])) {
            $_SESSION['email']  = $_POST['email'];
        } else {
            $f3->set("errors['email']", "Please enter a phone number");
            $isValid = false;
        }

        if (!empty($_POST['state'])) {
            $_SESSION['state'] = $_POST['state'];
        } else {
            $f3->set("errors['state']", "Please enter a state");
            $isValid = false;
        }

        if (!empty($_POST['seeking'])) {
            $_SESSION['seeking'] = $_POST['seeking'];
        } else {
            $f3->set("errors['seeking']", "Please enter a phone number");
            $isValid = false;
        }
        if(isset($_POST['comments']))
        {
            $_SESSION['bio'] = $_POST['comments'];
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

    $f3->set('indoors',array('T.V','Movies','Cooking','Puzzles','Reading','Playing Card','Video Games'));
    $f3->set('outdoors',array('Hiking','Biking','Swimming','Collecting','Walking','Climbing'));

    if(isset($_POST['submit']))
    {
        $isValid=true;

        if (!empty($_POST['indoor'])) {
            $_SESSION['indoors'] = $_POST['indoor'];
        } else {
            $f3->set("errors['indoor']", "Please select an indoor activity");
            $isValid = false;
        }

        if (!empty($_POST['outdoor'])) {
            $_SESSION['outdoors'] = $_POST['outdoor'];
        } else {
            $f3->set("errors['outdoor']", "Please select an outdoor activity");
            $isValid = false;
        }

        if ($isValid)
        {
            $f3->reroute('date4');
        }else{
            echo "Failed";
        }
    }

    $template = new Template();
    echo $template->render('views/interests.html');
});

//Define a form4 route
$f3->route('GET|POST /date4', function($f3) {
    $f3->set('first',$_SESSION['firstName']);
    $f3->set('last',$_SESSION['lastName']);
    $f3->set('sex',$_SESSION['sex']);
    $f3->set('state',$_SESSION['state']);
    $f3->set('phone',$_SESSION['phone']);
    $f3->set('bio',$_SESSION['bio']);
    $f3->set('email',$_SESSION['email']);
    $f3->set('seeking',$_SESSION['seeking']);
    $f3->set('indoor',implode(" ",$_SESSION['indoors']));
    $f3->set('outdoor',implode(" ",$_SESSION['outdoors']));

    $template = new Template();
    echo $template->render('views/summary.html');
});

//Run fat free
$f3->run();