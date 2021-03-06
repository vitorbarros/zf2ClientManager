<?php
namespace Client\Service;

use Doctrine\ORM\EntityManager;

class ClientService extends AbstractService
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->em = $em;
    }

    public function store(array $data, $flush = true)
    {
        //verificando s senha
        if ($data['user_password'] != $data['user_password_confirm']) {
            throw new \Exception("<b>'Senha'</b> e <b>'Confirmar senha'</b> não podem ser diferentes");
        }

        //verificando se o cpf ou o cnpj estão preenchidos
        if ($data['client_cpf'] == null && $data['client_cnpj'] == null) {
            throw new \Exception("Informe o <b>'CPF'</b> ou o <b>'CNPJ'</b>");
        }

        //verificando a duplicidade do cpf
        if ($data['client_cpf'] != null) {
            $cpfFormated = str_replace("-", "", str_replace("/", "", str_replace(".", "", $data['client_cpf'])));
            $clientCpf = $this->em->getRepository('Client\Entity\Client')->findOneByClientCpf($cpfFormated);
            if ($clientCpf) {
                throw new \Exception("Já existe um cadastro com o CPF <b>'{$data['client_cpf']}'</b>");
            }
        }

        //verificando a duplicidade do cnpj
        if ($data['client_cnpj'] != null) {
            $cnpjFormated = str_replace("-", "", str_replace("/", "", str_replace(".", "", $data['client_cnpj'])));
            $clientCnpj = $this->em->getRepository('Client\Entity\Client')->findOneByClientCnpj($cnpjFormated);
            if ($clientCnpj) {
                throw new \Exception("Já existe um cadastro com o CNPJ <b>'{$data['client_cnpj']}'</b>");
            }
        }

        //verificando d duplicidade do email
        $clientEmail = $this->em->getRepository('Client\Entity\Client')->findOneByClientEmail($data['client_email']);
        if ($clientEmail) {
            throw new \Exception("Já existe um cadastro com o E-mail <b>'{$data['client_email']}'</b>");
        }

        //verificando o login
        $userLogin = $this->em->getRepository('Client\Entity\User')->findOneByUserUsername($data['user_username']);
        if ($userLogin) {
            throw new \Exception("Já existe um cadastro com o Login <b>'{$data['user_username']}'</b>");
        }

        //iniciando a transação com o banco de dados
        $this->em->getConnection()->beginTransaction();

        //criação do usuário
        $this->entity = 'Client\Entity\User';
        $data['role'] = $this->em->getRepository('Client\Entity\Role')->findOneByRoleName('client');
        $user = parent::store($data, false);

        //criação do endereço
        $this->entity = 'Client\Entity\Address';
        $address = parent::store($data, false);

        //criação do contato
        $this->entity = 'Client\Entity\Contact';
        $contact = parent::store($data, false);

        //criação do client
        $this->entity = 'Client\Entity\Client';
        $data['user'] = $user;
        $data['address'] = $address;
        $data['contact'] = $contact;

        $client = parent::store($data, false);

        try {
            $this->em->flush();
            $this->em->getConnection()->commit();
            return $client;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}