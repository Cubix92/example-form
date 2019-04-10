<?php

namespace Application\Factory;

use Application\Controller\IndexController;
use Application\Form\PersonForm;
use Interop\Container\ContainerInterface;

class IndexControllerFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): IndexController
    {
        $personForm = $container->get('FormElementManager')->get(PersonForm::class);

        return new IndexController($personForm);
    }
}