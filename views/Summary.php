<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 4/29/2020
 * Time: 11:47 AM
 */
session_start();
include("../model/Validation.php");
include("../index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dating Site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet"
          href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
</head>
<body>
<div id="colorlib-about">
    <div class="container">
        <div class="row text-center">
            <h2 class="bold">About</h2>
        </div>
        <div class="row">
            <div class="col-md-5 animate-box">
                <div class="owl-carousel3">
                    <div class="item">
                        <img class="img-responsive about-img" src="images/about.jpg" alt="html5 bootstrap template by colorlib.com">
                    </div>
                    <div class="item">
                        <img class="img-responsive about-img" src="images/about-2.jpg" alt="html5 bootstrap template by colorlib.com">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-push-1 animate-box">
                <div class="about-desc">
                    <div class="owl-carousel3">
                        <div class="item">
                            <h2><span><?php echo $fname; ?></span><span><?php echo $_SESSION['lastName']; ?></span></h2>
                        </div>
                        <div class="item">
                            <h2><span>I'm</span><span>A Designer</span></h2>
                        </div>
                    </div>
                    <div class="desc">
                        <div class="rotate">
                            <h2 class="heading">About</h2>
                        </div>
                        <p>A small river named Duden <a href="#">flows by their place</a> and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
                        <p class="colorlib-social-icons">
                            <a href="#"><i class="icon-facebook4"></i></a>
                            <a href="#"><i class="icon-twitter3"></i></a>
                            <a href="#"><i class="icon-googleplus"></i></a>
                            <a href="#"><i class="icon-dribbble2"></i></a>
                        </p>
                        <p><a href="#" class="btn btn-primary btn-outline">Contact Me!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
print_r($_SESSION);
?>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>