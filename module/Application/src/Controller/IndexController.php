<?php

namespace Application\Controller;

use Application\Form\PersonForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $personForm;

    public function __construct(PersonForm $personForm)
    {
        $this->personForm = $personForm;
    }

    public function indexAction()
    {
        if ($this->getRequest()->isPost()) {
            $this->personForm->setData($this->getRequest()->getPost());

            if ($this->personForm->isValid()) {
                $data = $this->personForm->getData();
                var_dump($data);die;
            }
        }

        return new ViewModel([
            'form' => $this->personForm
        ]);
    }
}
