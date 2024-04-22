<?php

class Message {
    private $firstName;
    private $lastName;
    private $email;
    private $message;

    function __construct($fistName, $lastName, $email, $message)
    {
        $this->firstName = $fistName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->message = $message; 
    }

    function getFullName() {
        return $this->firstName . " " . $this->lastName;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getMessage()
    {
        return $this->message;
    }
}