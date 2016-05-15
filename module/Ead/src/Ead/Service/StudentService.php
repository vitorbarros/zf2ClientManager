<?php
namespace Ead\Service;

use Doctrine\ORM\EntityManager;

class StudentService extends AbstractService
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(
        EntityManager $em
    )
    {
        parent::__construct($em);
        $this->entity = 'Ead\Entity\Student';
        $this->em = $em;
    }

    public function store(array $data, $flush = true)
    {
        //verificando o login
        $user = $this->em->getRepository('Client\Entity\User')->findOneByUserUsername($data['user_username']);
        if ($user) {
            throw new \Exception("Já existe um usuário cadastrado com o login <b>{$user->getUserUsername()}</b>");
        }

        //verificando o email
        $student = $this->em->getRepository('Ead\Entity\Student')->findOneByStudentEmail($data['student_email']);
        if ($student) {
            throw new \Exception("Já existe um usuário cadastrado com o email <b>{$student->getStudentEmail()}</b>");
        }

        $this->em->getConnection()->beginTransaction();

        $this->entity = 'Client\Entity\User';
        $data['role'] = $this->em->getRepository('Client\Entity\Role')->findOneByRoleName('student');
        $user = parent::store($data, false);

        $this->entity = 'Ead\Entity\Student';
        $data['user'] = $user;
        $student = parent::store($data, false);

        try {
            $this->em->getConnection()->commit();
            $this->em->flush();

            //TODO implementar ação de envio de email aqui

            return $student;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}