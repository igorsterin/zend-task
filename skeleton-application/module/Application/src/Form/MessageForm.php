<?php
namespace Application\Form;

use Zend\Form\Form;

// Модель формы обратной связи
class MessageForm extends Form
{
    // Конструктор.
    public function __construct()
    {
        // Определяем имя формы
        parent::__construct('message-form');

        // Устанавливаем метод POST для этой формы
        $this->setAttribute('method', 'post');

        // Добавляем элементы формы
        $this->addElements();

        //Правила валидации
        $this->addInputFilter();
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
                           'label' => 'E-mail: ',
                       ],
                   ]);

        $this->add([
                       'type'  => 'textarea',
                       'name' => 'body',
                       'attributes' => [
                           'id' => 'body'
                       ],
                       'options' => [
                           'label' => 'Ваше сообщение: ',
                       ],
                   ]);

        $this->add([
                       'type'  => 'submit',
                       'name' => 'submit',
                       'attributes' => [
                           'value' => 'Отправить',
                       ],
                   ]);

    }

    private function addInputFilter()
    {
        // Используем стандартный InputFilter формы
        $inputFilter = $this->getInputFilter();

        $inputFilter->add(
            [
                'name' => 'email',
                'required' => true,
                'filters' => [
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name' => 'EmailAddress',
                        'options' => [
                            'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                            'useMxCheck' => false,
                        ],
                    ],
                ],
            ]
        );

        $inputFilter->add(
            [
                'name' => 'body',
                'required' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                ],
            ]
        );
    }
}