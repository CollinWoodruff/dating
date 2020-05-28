<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 5/27/2020
 * Time: 7:41 PM
 */

class validator
{
    function validName($name)
    {
        if(empty($name))
        {
            return "0";
        }
        $name = str_replace(' ', '', $name);
        if(!ctype_alpha($name))
        {
            return false;
        }
        return true;
    }

    function validAge($age)
    {
        if(empty($age))
        {
            return "0";
        }
        return($age>=18&&$age<=118);
    }

    function validPhone($phone)
    {
        if(empty($phone))
        {
            return "0";
        }
        if(strlen((string) $phone) === 10) {
            // $phone is valid if there are 9 digits
            return true;
        }
        return false;
    }

    function validEmail($email)
    {
        if(empty($email))
        {
            return "0";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    function validOutdoor($outdoor)
    {
        $outdoors = getOutdoors();
        return(!in_array($outdoor, $outdoors));
    }

    function validIndoor($indoor)
    {
        $indoors = getIndoors();
        return !in_array($indoor, $indoors);
    }
}