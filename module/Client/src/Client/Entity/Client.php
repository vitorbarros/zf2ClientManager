<?php
namespace Client\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Client\Entity\Repository\ClientRepository")
 */
class Client
{
    /**
     * @var integer
     *
     * @ORM\Column(name="client_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $clientId;

    /**
     * @var string
     *
     * @ORM\Column(name="client_name", type="string", length=255, nullable=false)
     */
    private $clientName;

    /**
     * @var string
     *
     * @ORM\Column(name="client_cpf", type="string", length=255, nullable=true)
     */
    private $clientCpf;

    /**
     * @var string
     *
     * @ORM\Column(name="client_cnpj", type="string", length=255, nullable=true)
     */
    private $clientCnpj;

    /**
     * @var string
     *
     * @ORM\Column(name="client_email", type="string", length=255, nullable=false)
     */
    private $clientEmail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="client_created_at", type="datetime", nullable=false)
     */
    private $clientCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="client_updated_at", type="datetime", nullable=false)
     */
    private $clientUpdatedAt;

    /**
     * @var Address
     *
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="address", referencedColumnName="address_id")
     */
    private $address;

    /**
     * @var Contact
     *
     * @ORM\ManyToOne(targetEntity="Contact")
     * @ORM\JoinColumn(name="contact", referencedColumnName="contact_id")
     */
    private $contact;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user", referencedColumnName="user_id")
     */
    private $user;

    public function __construct(array $options = array())
    {
        (new Hydrator\ClassMethods())->hydrate($options, $this);
        $this->clientCreatedAt = new \DateTime("now");
        $this->clientUpdatedAt = new \DateTime("now");
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return Client
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * @param string $clientName
     * @return Client
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientCpf()
    {
        return $this->clientCpf;
    }

    /**
     * @param string $clientCpf
     * @return Client
     */
    public function setClientCpf($clientCpf)
    {
        $this->clientCpf = $clientCpf;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientCnpj()
    {
        return $this->clientCnpj;
    }

    /**
     * @param string $clientCnpj
     * @return Client
     */
    public function setClientCnpj($clientCnpj)
    {
        $this->clientCnpj = $clientCnpj;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientEmail()
    {
        return $this->clientEmail;
    }

    /**
     * @param string $clientEmail
     * @return Client
     */
    public function setClientEmail($clientEmail)
    {
        $this->clientEmail = $clientEmail;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getClientCreatedAt()
    {
        return $this->clientCreatedAt;
    }

    /**
     * @param \DateTime $clientCreatedAt
     * @return Client
     */
    public function setClientCreatedAt($clientCreatedAt)
    {
        $this->clientCreatedAt = $clientCreatedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getClientUpdatedAt()
    {
        return $this->clientUpdatedAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setClientUpdatedAt()
    {
        $this->clientUpdatedAt = new \DateTime("now");
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Client
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return Client
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Client
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

}

