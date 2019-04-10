<?php

namespace Application\Factory;

use Application\DTO\PersonDTO;
use Application\Form\PersonForm;
use Application\Form\PersonInputFilter;
use Application\Form\PersonHydrator;
use Interop\Container\ContainerInterface;

class PersonFormFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): PersonForm
    {
        $personForm = new PersonForm;

        $personForm->setHydrator($container->get('HydratorManager')->get(PersonHydrator::class));
        $personForm->setInputFilter($container->get('InputFilterManager')->get(PersonInputFilter::class));
        $personForm->setObject(new PersonDTO());

        return $personForm;
    }
}