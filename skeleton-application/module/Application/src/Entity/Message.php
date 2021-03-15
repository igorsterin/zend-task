<?php


namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *  Сообщения в гостевой книге.
 * @ORM\Entity
 * @ORM\Table(name="message")
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="email")
     */
    protected $email;

    /**
     * @ORM\Column(name="body")
     */
    protected $body;

    /**
     * @ORM\Column(name="date_created")
     */
    protected $dateCreated;

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }
}