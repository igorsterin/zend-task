<?php
namespace Application\Form;

use Zend\Form\Form;

// Модель формы обратной связи
class GuestForm extends Form
{
    // Конструктор.
    public function __construct()
    {
        // Определяем имя формы
        parent::__construct('guest-form');

        // Устанавливаем метод POST для этой формы
        $this->setAttribute('method', 'post');

        // Добавляем элементы формы
        $this->addElements();
    }

    private function addElements()
    {
        // Добавляем поле "email"
        $this->add([
                       'type'  => 'text',
                       'name' => 'email',
                       'attributes' => [
                           'id' => 'email'
                       ],
                       'options' => [
                           'label' => 'Your E-mail',
                       ],
                   ]);

        // Добавляем поле "subject"
        $this->add([
                       'type'  => 'text',
                       'name' => 'subject',
                       'attributes' => [
                           'id' => 'subject'
                       ],
                       'options' => [
                           'label' => 'Subject',
                       ],
                   ]);

        // Добавляем поле "body"
        $this->add([
                       'type'  => 'text',
                       'name' => 'body',
                       'attributes' => [
                           'id' => 'body'
                       ],
                       'options' => [
                           'label' => 'Message Body',
                       ],
                   ]);

        // Добавляем кнопку отправки формы
        $this->add([
                       'type'  => 'submit',
                       'name' => 'submit',
                       'attributes' => [
                           'value' => 'Submit',
                       ],
                   ]);

    }
}