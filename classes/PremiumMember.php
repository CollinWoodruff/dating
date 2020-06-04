<?php
/**
 * Created by PhpStorm.
 * User: Collin Woodruff
 * Date: 4/29/2020
 * Time: 10:43 PM
 */

class PremiumMember extends member
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
    private  $_inDoorInterests;
    private $_outDoorInterests;

    function __construct($_fname, $_lname, $_age, $_email, $_phone,$_state, $_gender, $_seeking,$_bio,
                         $_inDoorInterests, $_outDoorInterests)
    {
        parent::__construct($_fname, $_lname, $_age, $_email, $_phone,$_state, $_gender, $_seeking,$_bio);
        $this->setIndoor($_inDoorInterests);
        $this->setOutdoor($_outDoorInterests);
    }

    function setinDoor($inDoorInterests)
    {
        $this->inDoorInterests = $inDoorInterests;
    }

    function getinDoor()
    {
        return $this->inDoorInterests;
    }

    function setoutDoor($outDoorInterests)
    {
        $this->outDoorInterests = $outDoorInterests;
    }

    function getLName()
    {
        return $this->outDoorInterests;
    }

    /** toString() returns a String representation
     *  of an order object
     *  @return string
     */
    public function toString()
    {
        $out = $this->_fname . ", ";
        $out .= $this->_lname . ", ";
        $out .= $this->_age . ", ";
        $out .= $this->_phone . ", ";
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