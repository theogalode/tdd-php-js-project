<?php

class Message
{
    protected $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', 'tddproject');

        if ($this->db->connect_error) {
            die('Connect Error (' . $this->db->connect_errno . ') ' . $this->db->connect_error);
        }
    }

    public function getAllMessages()
    {
        $result = $this->db->query('SELECT message.id, subject, content, user.username as username, createdAt, updatedAt  FROM message INNER JOIN user ON message.userId = user.id');

        $messages = [];
        while ($message = $result->fetch_assoc()) {
            $messages[] = $message;
        }

        return $messages;
    }

    public function getMessage($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM message WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $message = $result->fetch_assoc();

        return $message;
    }

    public function createMessage($content, $subject, $userId)
    {
        $stmt = $this->db->prepare('INSERT INTO message (content, subject, userId) VALUES (?, ?, ?)');
        $stmt->bind_param('ssi', $content, $subject, $userId);
        $stmt->execute();
    }

    public function updateMessage($id, $content, $subject, $userId)
    {
        $stmt = $this->db->prepare('UPDATE message SET title = ?, content = ?, userId = ? WHERE id = ?');
        $stmt->bind_param('ssi', $content, $subject, $userId, $id);
        $stmt->execute();
    }

    public function deleteMessage($id)
    {
        $stmt = $this->db->prepare('DELETE FROM message WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
