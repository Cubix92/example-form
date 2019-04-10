<?php

namespace Application\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\Filter\ToNull;
use Zend\InputFilter\InputFilter;
use Zend\Validator\Digits;
use Zend\Validator\GreaterThan;
use Zend\Validator\LessThan;
use Zend\Validator\StringLength;
use Zend\Validator\Uuid;

class PersonInputFilter extends InputFilter
{
    public function init()
    {
        $this->add([
            'name' => 'id',
            'required' => false,
            'validators' => [
                [
                    'name' => Uuid::class
                ],
            ],
            'filters' => [
                ['name' => ToNull::class]
            ],
        ]);

        $this->add([
            'name' => 'name',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'min' => 6,
                        'max' => 120
                    ],
                ],
            ],
        ]);

        $this->add([
            'name' => 'age',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
            'validators' => [
                ['name' => Digits::class],
                [
                    'name' => LessThan::class,
                    'options' => [
                        'max' => 128
                    ]
                ],
                [
                    'name' => GreaterThan::class,
                    'options' => [
                        'min' => 18,
                        'inclusive' => true
                    ]
                ],
            ],
        ]);
    }
}