<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 4/29/2020
 * Time: 9:59 PM
 *
 * CREATE TABLE member ( _fname Varchar(15), _lname Varchar(15), _age int, __gender Varchar(10),
 * _phone Varchar(15), _email Varchar(35), _state Varchar(25), _seeking Varchar(10), _bio Varchar(150) )
 */

class member
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;

    function __construct($_fname, $_lname, $_age, $_email, $_phone, $_state, $_gender, $_seeking,$_bio)
    {
        $this->setFName($_fname);
        $this->setLName($_lname);
        $this->setAge($_age);
        $this->setPhone($_phone);
        $this->setEmail($_email);
        $this->setState($_state);
        $this->setGender($_gender);
        $this->setSeeking($_seeking);
        $this->setBio($_bio);
    }

    function setFName($fname)
    {
        $this->fname = $fname;
    }

    function getFName()
    {
        return $this->fname;
    }

    function setLName($lname)
    {
        $this->lname = $lname;
    }

    function getLName()
    {
        return $this->lname;
    }

    function setAge($age)
    {
        $this->age = $age;
    }

    function getAge()
    {
        return $this->age;
    }

    function setGender($gender)
    {
        $this->gender = $gender;
    }

    function getGender()
    {
        return $this->gender;
    }

    function setPhone($phone)
    {
        $this->phone = $phone;
    }

    function getPhone()
    {
        return $this->phone;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setState($state)
    {
        $this->state = $state;
    }

    function getState()
    {
        return $this->state;
    }

    function setSeeking($seeking)
    {
        $this->seeking = $seeking;
    }

    function getSeeking()
    {
        return $this->seeking;
    }

    function setBio($bio)
    {
        $this->bio = $bio;
    }

    function getBio()
    {
        return $this->bio;
    }

    /** toString() returns a String representation
     *  of an order object
     *  @return string
     */
    public function toString()
    {
        $out = $this->_first . ", ";
        $out .= $this->_last . ", ";
        $out .= $this->_age . ", ";
        $out .= $this->_phone . ", ";
        $out .= $this->_first . ", ";
        $out .= $this->_email . ", ";

        if (!empty($this->_indoor)) {
            $out .= implode(" & ", $this->_indoor);
        }
        if (!empty($this->_outdoor)) {
            $out .= implode(" & ", $this->_outdoor);
        }

        return $out;
    }
}