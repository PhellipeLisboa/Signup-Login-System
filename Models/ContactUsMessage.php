<?php

class Message
{
    private $table_name;
    private $conn;

    private $message_id;
    private $user_id;
    private $user_name;
    private $user_full_name;
    private $user_email;
    private $user_tel;
    private $message_text;

    function __construct($db_conn)
    {
        $this->conn = $db_conn;
        $this->table_name = "contactMessage";
    }

    function init($message_id)
    {
        try {
            $sql = 'SELECT * FROM ' . $this->table_name . ' WHERE message_id=?';
            $stmt = $this->conn->prepare($sql);
            $res = $stmt->execute([$message_id]);
            if ($stmt->rowCount() == 1) {
                $message = $stmt->fetch();
                $this->message_id = $message['message_id'];
                $this->user_name = $message['user_name'];
                $this->user_id = $message['user_id'];
                $this->user_email = $message['user_email'];
                $this->user_full_name = $message['user_full_name'];
                $this->user_tel = $message['user_tel'];
                $this->message_text = $message['message_text'];
                return 1;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            return 0;
        }
    }

    function insert($message)
    {
        try {
            $sql = 'INSERT INTO ' . $this->table_name . '(user_name, user_id, user_email, user_full_name, user_tel, message_text) VALUES(?,?,?,?,?,?)';
            $stmt = $this->conn->prepare($sql);
            $res = $stmt->execute($message);
            return $res;
        } catch (PDOException $e) {
            return 0;
        }
    }

    function getMessage()
    {
        $message = array(
            'message_id' => $this->message_id,
            'user_name' => $this->user_name,
            'user_id' => $this->user_id,
            'user_email' => $this->user_email,
            'full_name' => $this->user_full_name,
            'user_tel' => $this->user_tel,
            'message_text' => $this->message_text
        );
        return $message;
    }
}
