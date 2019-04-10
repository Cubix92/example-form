<?php

namespace Application\Form;

use Zend\Form\Element\Csrf;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class PersonForm extends Form
{
    public function init()
    {
        $this->setAttribute('method', 'POST');

        $this->add([
            'name' => 'id',
            'type' => Hidden::class,
        ]);

        $this->add([
            'name' => 'name',
            'type' => Text::class,
        ]);

        $this->add([
            'name' => 'age',
            'type' => Text::class,
        ]);

        $this->add([
            'name' => 'csrf',
            'type' => Csrf::class,
            'options' => [
                'csrf_options' => [
                    'timeout' => 600,
                ],
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
        ]);
    }
}