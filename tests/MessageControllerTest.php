<?php

use PHPUnit\Framework\TestCase;

require_once 'controller/MessageController.php';
require_once 'model/Message.php';

class MessageControllerTest extends TestCase
{
    private $controller;

    protected function setUp(): void
    {
        $this->controller = new MessageController();
    }

    public function testIndex()
    {
        // Ici, vous pourriez vérifier que la méthode index renvoie la bonne vue, 
        // ou que les données renvoyées par la méthode sont correctes.
    }

    public function testView()
    {
        // Créez un nouveau message
        $message = new Message('Test title', 'Test content');
        $this->controller->create($message);

        // Obtenez le dernier message créé
        $lastMessage = $this->controller->getLastMessage();

        // Vérifiez que la vue du message renvoie le bon message
        $viewedMessage = $this->controller->view($lastMessage->getId());
        $this->assertEquals($lastMessage, $viewedMessage);
    }

    public function testCreate()
    {
        // Créez un nouveau message
        $message = new Message('Test title', 'Test content');
        $this->controller->create($message);

        // Vérifiez que le message a été créé
        $lastMessage = $this->controller->getLastMessage();
        $this->assertEquals($message->getTitle(), $lastMessage->getTitle());
        $this->assertEquals($message->getContent(), $lastMessage->getContent());
    }

    public function testEdit()
    {
        // Créez un nouveau message
        $message = new Message('Test title', 'Test content');
        $this->controller->create($message);

        // Obtenez le dernier message créé
        $lastMessage = $this->controller->getLastMessage();

        // Modifiez le message
        $lastMessage->setTitle('Updated title');
        $lastMessage->setContent('Updated content');
        $this->controller->edit($lastMessage);

        // Vérifiez que le message a été modifié
        $updatedMessage = $this->controller->view($lastMessage->getId());
        $this->assertEquals('Updated title', $updatedMessage->getTitle());
        $this->assertEquals('Updated content', $updatedMessage->getContent());
    }

    public function testDelete()
    {
        // Créez un nouveau message
        $message = new Message('Test title', 'Test content');
        $this->controller->create($message);

        // Obtenez le dernier message créé
        $lastMessage = $this->controller->getLastMessage();

        // Supprimez le message
        $this->controller->delete($lastMessage->getId());

        // Vérifiez que le message a été supprimé
        $deletedMessage = $this->controller->view($lastMessage->getId());
        $this->assertNull($deletedMessage);
    }
}
