<?php
namespace Client\Controller;

use Client\Form\ClientForm;
use Client\Service\ClientService;
use Client\Traits\FormAlert;
use Client\Traits\FormFields;
use Doctrine\ORM\EntityManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class ClientController extends AbstractActionController
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
     * @var ClientForm
     */
    private $form;
    /**
     * @var ClientService
     */
    private $service;

    public function __construct(
        EntityManager $em,
        ClientForm $form,
        ClientService $service
    )
    {
        $this->em = $em;
        $this->form = $form;
        $this->service = $service;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }

    /**
     * @return ViewModel
     */
    public function createAction()
    {
        return new ViewModel(array('form' => $this->form));
    }

    /**
     * @return JsonModel
     */
    public function storeAction()
    {
        $request = $this->getRequest();
        $response = $this->getResponse();

        if ($request->isPost()) {
            $data = $request->getPost()->toArray();
            $this->form->setData($data);
            if ($this->form->isValid()) {
                try {
                    $this->service->store($data);
                    return new JsonModel(array('messages' => 'Cadastro realizado com suceso, acesse seu E-mail para confirmar'));
                } catch (\Exception $e) {
                    $response->setStatusCode(400);
                    return new JsonModel(array(
                        'messages' => $e->getMessage()
                    ));
                }
            }
            $response->setStatusCode(400);
            return new JsonModel(array(
                'messages' => 'Preencha os campos em vermelho',
                'fields' => $this->fields($this->form->getMessages())
            ));
        }
    }

    /**
     * @return ViewModel
     */
    public function dashboardAction()
    {
        return new ViewModel();
    }

    public function estimateAction()
    {
        
    }
}