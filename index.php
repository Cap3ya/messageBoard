<?php
require_once './utilitaires/config.php';
require_once './entity/Message.php';
require_once './pdo/MessagePDO.php';
require_once './pdo/connexion.php';

// Define variables to hold the submitted values
$firstName = $lastName = $email = $message = "";

//onPost
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $isValid = true;

    // Validate firstName
    $firstName = $_POST['firstName'];
    if (!preg_match("/^[a-zA-Z]+$/", $firstName)) {
        $isValid = false;
    }
    // Validate lastName
    $lastName = $_POST['lastName'];
    if (!preg_match("/^[a-zA-Z]+$/", $lastName)) {
        $isValid = false;
    }
    // Validate email
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
    }
    // Validate message
    $message = $_POST['message'];
    if (!preg_match("/^[\s\S]{10,140}$/", $message)) {
        $isValid = false;
    }
    // Populate Database 
    if ($isValid) {
        MessagePDO::addOne($firstName, $lastName, $email, $message);
    } else {
        echo "Error: Failed to add message.";
    }
}

echo $twig->render(
    'index.html.twig',
    [
        'messages' => MessagePDO::getAll(),
    ]
);
