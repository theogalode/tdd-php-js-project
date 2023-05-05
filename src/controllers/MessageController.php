<?php
require 'src/model/Message.php';

class MessageController
{
    protected $messageModel;

    public function __construct()
    {
        $this->messageModel = new Message();
    }

    public function index()
    {
        $messages = $this->messageModel->getAllMessages();
        require 'src/views/Messages.php';
    }

    public function view($id)
    {
        $message = $this->messageModel->getMessage($id);
        require 'src/views/Message.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->messageModel->createMessage($_POST['content'], $_POST['subject'], $_POST['userId']);
            header('Location: /messages');
        } else {
            require 'src/views/CreateMessage.php';
        }
    }

    // Similar methods for update and delete...
}
