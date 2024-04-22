<?php
class MessagePDO
{
    static function getAll()
    {
        $query = BDD->prepare("SELECT * FROM messages");
        $query->execute();

        $messages = array();
        while ($data = $query->fetch()) {
            $messages[] = new Message($data['firstName'], $data['lastName'], $data['email'], $data['message']);
        }
        return $messages;
    }
    static function AddOne($firstName, $lastName, $email, $message)
    {
        $sql = "INSERT INTO messages (firstName, lastName, email, message) VALUES (:firstName, :lastName, :email, :message)";
        $query = BDD->prepare($sql);
        $query->bindParam(':firstName', $firstName);
        $query->bindParam(':lastName', $lastName);
        $query->bindParam(':email', $email);
        $query->bindParam(':message', $message);
        $query->execute();
    }
    // static function getOne($id)
    // {
    //     $query = BDD->prepare("SELECT * FROM messages WHERE id = :id");
    //     $query->execute([":id => $id"]);
    //     $data = $query->fetch();

    //     $message = new Message($data['firstName'], $data['lastName'], $data['email'], $data['message']);

    //     return $message;
    // }
}
