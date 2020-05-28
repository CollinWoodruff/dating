<?php

class User
{
    //Declare instance variables
    private $_first;
    private $_last;
    private $_age;
    private $_phone;
    private $_email;
    private $_indoor;
    private $_outdoor;

    /** Default constructor
     * @param $food the food
     * @param $meal the meal
     * @param $condiments the condiments
     */
    public function __construct($_first,$_last,$_age,$_phone,$_email,$_indoor,$_outdoor)
    {
        $this->setFirst($_first);
        $this->setLast($_last);
        $this->setAge($_age);
        $this->setPhone($_phone);
        $this->setEmail($_email);
        $this->setIndoor($_indoor);
        $this->setOutdoor($_outdoor);
    }

    /** Set first
     *  @param
     */
    public function setFirst($_first)
    {
        $this->_first = $_first;
    }

    /**
     * @return string first
     */
    public function getFirst()
    {
        return $this->_first;
    }

    /** Set first
     *  @param
     */
    public function setLast($_last)
    {
        $this->_last = $_last;
    }

    /**
     * @return string first
     */
    public function getLast()
    {
        return $this->_last;
    }

    /** Set first
     *  @param
     */
    public function setAge($_age)
    {
        $this->_age = $_age;
    }

    /**
     * @return string first
     */
    public function getAge()
    {
        return $this->_age;
    }

    /** Set first
     *  @param
     */
    public function setPhone($_phone)
    {
        $this->_phone = $_phone;
    }

    /**
     * @return string first
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /** Set first
     *  @param
     */
    public function setEmail($_email)
    {
        $this->_email = $_email;
    }

    /**
     * @return string first
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /** Set first
     *  @param
     */
    public function setIndoor($_indoor)
    {
        $this->_indoor = $_indoor;
    }

    /**
     * @return string first
     */
    public function getIndoor()
    {
        return $this->_indoor;
    }

    /** Set first
     *  @param
     */
    public function setOutdoor($_outdoor)
    {
        $this->_outdoor = $_outdoor;
    }

    /**
     * @return string first
     */
    public function getOutdoor()
    {
        return $this->_outdoor;
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