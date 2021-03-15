<?php


namespace Application\Service;

use Application\Entity\Message;

class MessageManager
{

    private $entityManager;

    // Конструктор, используемый для внедрения зависимостей в сервис.
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function addNewMessage($data)
    {
        // Создаем новую сущность Message.
        $message = new Message();
        $message->setEmail($data['email']);
        $message->setBody($data['body']);
        $currentDate = date('Y-m-d H:i:s');
        $message->setDateCreated($currentDate);

        // Добавляем сущность в менеджер сущностей.
        $this->entityManager->persist($message);

        // Применяем изменения к базе данных.
        $this->entityManager->flush();
    }
}