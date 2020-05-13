<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 5/11/2020
 * Time: 2:57 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
Dating Website
Author: Collin Woodruff
Date:   4/22/2020

Filename: home.html
-->
    <meta charset="UTF-8">
    <title>Dating Site</title>
    <link href="/328X2/dating/styles/styles.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet"
          href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
</head>
<body class="bg-info">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar position-absolute bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><strong>Obeagle</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-primary" href="#">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="#">Profile</a>
                    </li>
                </ul>
                <form class="form-inline">
                    <div class="md-form my-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    </div>
                </form>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <h2>Profile</h2><hr>
    <form action="#" method="post" class="form-horizontal">
        <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label class="col-md-5 col-lg-8 control-label" for="email">Email: <br></label>
                <div class="inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-user-alt"></i></span>
                        <input class="form-control mx-sm-2" type="text" name="email" id="email"
                               size="20" required />
                        <span  class="err" id="err-lname"><?php echo $lNameError ?></span>
</div>
</div>
</div>

<div class="form-group">
    <label class="col-md-5 col-lg-8 control-label" for="{{ @state }}">State</label>
    <div class="inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-key"></i></span>
            <select  name="{{ @state }}" id="{{ @state }}">
                <repeat>
                    <option value='{{ @states }}' name="{{ @state }}" id="{{ @state }}">{{ @state }}</option>
                </repeat>
            </select>
            <span  class="err" id="err-Age"><?php echo $passwordError ?></span>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-5 col-lg-8 control-label">Seeking</label>
    <div class=" text-dark" >
        <div class="radio" >
            <label class="mr-3">
                <input type="radio" name="flight" value="M" id="flightYes"/> Male
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="flight" value="F" id="flightNo"/> Female
            </label>
        </div>
    </div>
</div>
</div>
<div class="col-6">
    <label class="form-control-label">
        <br />Biography:<br />
        <textarea class="form-control" id="comments" rows="5" name="comments"></textarea>
    </label><br />

    <button class='btns' type='submit' name="submit2" value="submit">What are your interests?</button>
</div>
</div>
</form>
</div>
</body>
</html>