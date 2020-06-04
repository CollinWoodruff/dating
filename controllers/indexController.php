<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 5/27/2020
 * Time: 7:54 PM
 */

class indexController
{
    private $_f3; //router
    private $_validator; //validation object

    /**
     * Controller constructor.
     * @param $f3
     * @param $validator
     */
    public function __construct($f3, $validator)
    {
        $this->_f3 = $f3;
        $this->_validator = $validator;
    }

    /**
     * Display the default route
     */
    public function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    /**
     * Process the order route
     */
    public function date()
    {
        $_SESSION = array();
        //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Validate firstName
            if ($this->_validator->validName($_POST['firstName'])) {
                $_SESSION['firstName'] = $_POST['firstName'];
                $this->_f3->set('first', $_SESSION['firstName']);
            }else if(($this->_validator->validName($_POST['firstName']))!==false){
                $this->_f3->set('errors["first"]','Please enter a name!');
            }else{
                $this->_f3->set('errors["first"]','Please enter only letters!');
            }

            //Validate lastName
            if ($this->_validator->validName($_POST['lastName'])) {
                $_SESSION['lastName'] = $_POST['lastName'];
                $this->_f3->set('last', $_SESSION['lastName']);
            } else if(($this->_validator->validName($_POST['lastName']))!==false){
                $this->_f3->set('errors["last"]','Please enter a name!');
            }else{
                $this->_f3->set('errors["last"]','Please enter only letters!');
            }

            //Validate lastName
            if ($this->_validator->validAge($_POST['age'])) {
                $_SESSION['age'] = $_POST['age'];
                $this->_f3->set('age', $_SESSION['age']);
            } else if(($this->_validator->validAge($_POST['age']))!==false){
                $this->_f3->set('errors["age"]','Please enter an age');
            }else {
                //Set an error variable in the F3 hive
                $this->_f3->set("errors['age']", "Age has to be 18-118!");
            }

            //Validate lastName
            if ($this->_validator->validPhone($_POST['phone'])) {
                $_SESSION['phone'] = $_POST['phone'];
                $this->_f3->set('phone', $_SESSION['phone']);

            } else if(($this->_validator->validPhone($_POST['phone']))!==false){
                //Set an error variable in the F3 hive
                $this->_f3->set('errors["phone"]', "Please enter a phone number");
            }else {
                //Set an error variable in the F3 hive
                $this->_f3->set("errors['phone']", "Please number must be 10 digits");
            }

            if(!empty($_POST['sex'])){
                $this->_f3->set("sex", $_POST['sex']);
                $_SESSION['sex'] = $_POST['sex'];
            }

            if(!empty($_POST['premiumMember'])){
                $this->_f3->set("premium", $_POST['premiumMember']);
                $_SESSION['premium'] = $_POST['premiumMember'];
            }

            if (empty($this->_f3->get('errors'))) {
                //Redirect to Order 2 page
                $this->_f3->reroute('date2');
            }

        }

        $view = new Template();
        echo $view->render('views/registration.html');
    }

    /**
     *
     */
    public function date2()
    {
        $this->_f3->set('states',getStates());
        //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //Validate lastName
            if ($this->_validator->validEmail($_POST['email'])) {
                $_SESSION['email'] = $_POST['email'];
                $this->_f3->set('email', $_SESSION['email']);

            }else if(($this->_validator->validEmail($_POST['email']))!==false){
                //Set an error variable in the F3 hive
                $this->_f3->set('errors["email"]', "Please enter an email");
            }else {
                //Set an error variable in the F3 hive
                $this->_f3->set('errors["email"]', "Must be in email format");
            }

            if(!empty($_POST['state'])){
                $this->_f3->set("state", $_POST['state']);
                $_SESSION['state'] = $_POST['state'];
            }

            if(!empty($_POST['seeking'])){
                $this->_f3->set("seeking", $_POST['seeking']);
                $_SESSION['seeking'] = $_POST['seeking'];
            }

            if(!empty($_POST['comments'])){
                $this->_f3->set("bio", $_POST['comments']);
                $_SESSION['bio'] = $_POST['comments'];
            }

                if(!empty($_SESSION['premium']))
                {
                    //Redirect to Order 2 page
                    $this->_f3->reroute('date3');
                }else {
                    //Data is valid
                    if (empty($this->_f3->get('errors'))) {

                        $_first = $_SESSION['firstName'];
                        $_last = $_SESSION['lastName'];
                        $_age = $_SESSION['age'];
                        $_phone = $_SESSION['phone'];
                        $_email = $_SESSION['email'];
                        $_state = $_SESSION['state'];
                        $_sex = $_SESSION['sex'];
                        $_seeking =$_SESSION['seeking'];
                        $_bio = $_SESSION['bio'];

                        //Create an order object
                        $date = new member($_first,$_last,$_age,$_phone,$_email,$_state,$_sex,$_seeking,$_bio);

                        //Store the object in the session array
                        $_SESSION['date'] = $date;

                        $this->_f3->reroute('summary');
                }

            }
        }

        $template = new Template();
        echo $template->render('views/profile.html');
    }

    /**
     *
     */
    public function date3()
    {
        $this->_f3->set('indoors',getIndoors());
        $this->_f3->set('outdoors',getOutdoors());

        if(isset($_POST['submit'])) {
            //Validate lastName
            if ($this->_validator->validOutdoor($_POST['outdoor'])) {
                $_SESSION['outdoors'] = $_POST['outdoor'];
                $this->_f3->set('outdoor', $_SESSION['outdoors']);

            }else {
                //Set an error variable in the F3 hive
                $this->_f3->set('errors["outdoor"]', "Please select a valid outdoor activity");
            }

            //Validate lastName
            if ($this->_validator->validIndoor($_POST['indoor'])) {
                $_SESSION['indoors'] = $_POST['indoor'];
                $this->_f3->set('indoor', $_SESSION['indoors']);
            } else {
                //Set an error variable in the F3 hive
                $this->_f3->set('errors["indoor"]', "Please select a valid indoor activity");
            }

            //Data is valid
            if (empty($this->_f3->get('errors'))) {

                $_first = $_SESSION['firstName'];
                $_last = $_SESSION['lastName'];
                $_age = $_SESSION['age'];
                $_phone = $_SESSION['phone'];
                $_email = $_SESSION['email'];
                $_state = $_SESSION['state'];
                $_sex = $_SESSION['sex'];
                $_seeking =$_SESSION['seeking'];
                $_bio = $_SESSION['bio'];
                $_indoor = $_SESSION['indoor'];
                $_outdoor = $_SESSION['outdoor'];
                //Create an order object
                $date = new PremiumMember($_first, $_last, $_age, $_phone,
                    $_email,$_state,$_sex,$_seeking,$_bio,$_indoor,$_outdoor);

                //Store the object in the session array
                $_SESSION['date'] = $date;

                //Redirect to summary
                $this->_f3->reroute('summary');
            }
        }

        $template = new Template();
        echo $template->render('views/interests.html');
    }

    /**
     *
     */
    public function summary()
    {
        print_r($_SESSION);
        $this->_f3->set('first',$_SESSION['firstName']);
        $this->_f3->set('last',$_SESSION['lastName']);
        $this->_f3->set('sex',$_SESSION['sex']);
        $this->_f3->set('state',$_SESSION['state']);
        $this->_f3->set('phone',$_SESSION['phone']);
        $this->_f3->set('bio',$_SESSION['bio']);
        $this->_f3->set('email',$_SESSION['email']);
        $this->_f3->set('seeking',$_SESSION['seeking']);
        if(!empty($_SESSION['indoors']))
        {
            $this->_f3->set('indoor',implode(" ",$_SESSION['indoors']));
        }
        if(!empty($_SESSION['outdoors']))
        {
            $this->_f3->set('outdoor',implode(" ",$_SESSION['outdoors']));
        }

        $template = new Template();
        echo $template->render('views/summary.html');
        session_destroy();
    }
}