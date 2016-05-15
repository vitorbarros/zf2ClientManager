<?php
namespace Ead\Controller;

use Doctrine\ORM\EntityManager;
use Ead\Service\InterfaceService;
use Ead\Traits\FormAlert;
use Ead\Traits\FormFields;
use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class AbstractCrudController extends AbstractActionController
{
    /**
     * Traits
     */
    use FormAlert;
    use FormFields;

    /**
     * @var EntityManager
     */
    private $em;
    /**
     * @var InterfaceService
     */
    private $service;
    /**
     * @var Form
     */
    private $form;

    public function __construct(
        EntityManager $em,
        InterfaceService $service,
        Form $form = null
    )
    {
        $this->em = $em;
        $this->service = $service;
        $this->form = $form;
    }

    /**
     * @return ViewModel
     */
    public function createAction()
    {
        return new ViewModel(array(
            'form' => $this->form
        ));
    }

    /**
     * @return JsonModel
     */
    public function storeAction()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();
        $messages = null;

        if ($request->isPost()) {
            $data = $request->getPost()->toArray();
            if ($this->form) {
                $this->form->setData($data);
                if ($this->form->isValid()) {
                    try {
                        $this->service->store($data);
                        return new JsonModel(array(
                            'messages' => 'Cadastro realizdo com sucesso'
                        ));
                    } catch (\Exception $e) {
                        $response->setStatusCode(400);
                        return new JsonModel(array(
                            'messages' => $e->getMessage()
                        ));
                    }
                }
                $response->setStatusCode(400);
                return new JsonModel(array(
                    'messages' => $this->formatAlert($this->form->getMessages()),
                    'fields' => $this->fields($this->form->getMessages())
                ));
            }
            try {
                $this->service->store($data);
                return new JsonModel(array(
                    'messages' => 'Cadastro realizdo com sucesso'
                ));
            } catch (\Exception $e) {
                $response->setStatusCode(400);
                return new JsonModel(array(
                    'messages' => $e->getMessage()
                ));
            }
        }
    }
}