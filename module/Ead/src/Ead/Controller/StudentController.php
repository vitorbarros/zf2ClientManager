<?php
namespace Ead\Controller;

use Doctrine\ORM\EntityManager;
use Ead\Form\StudentForm;
use Ead\Service\StudentService;

class StudentController extends AbstractCrudController
{
    /**
     * StudentController constructor.
     * @param EntityManager $em
     * @param StudentService $service
     * @param StudentForm $form
     */
    public function __construct(
        EntityManager $em,
        StudentService $service,
        StudentForm $form
    )
    {
        parent::__construct($em, $service, $form);
    }
}