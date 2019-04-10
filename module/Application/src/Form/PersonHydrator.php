<?php

namespace Application\Form;

use Application\DTO\PersonDTO;
use Zend\Hydrator\AbstractHydrator;

class PersonHydrator extends AbstractHydrator
{
    /**
     * @param PersonDTO $object
     * @param array $data
     * @return PersonDTO
     */
    public function hydrate(array $data, $object)
    {
        $object->id = $data['id'];
        $object->name = $data['name'];
        $object->age = $data['age'];

        return $object;
    }

    /**
     * @param PersonDTO $object
     * @return array
     */
    public function extract($object)
    {
        return [
            'id' => $object->id,
            'name' => $object->name,
            'age' => $object->age
        ];
    }
}