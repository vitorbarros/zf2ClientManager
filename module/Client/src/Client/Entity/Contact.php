<?php
namespace Client\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Client\Entity\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="contact_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contactId;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_name", type="string", length=255, nullable=false)
     */
    private $contactName;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_phone_1", type="string", length=255, nullable=false)
     */
    private $contactPhone1;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_phone_2", type="string", length=255, nullable=true)
     */
    private $contactPhone2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="contact_created_at", type="datetime", nullable=false)
     */
    private $contactCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="contact_updated_at", type="datetime", nullable=false)
     */
    private $contactUpdatedAt;

    public function __construct(array $options = array())
    {
        (new Hydrator\ClassMethods())->hydrate($options, $this);
        $this->contactCreatedAt = new \DateTime("now");
        $this->contactUpdatedAt = new \DateTime("now");
    }

    /**
     * @return int
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * @param int $contactId
     * @return Contact
     */
    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * @param string $contactName
     * @return Contact
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactPhone1()
    {
        return $this->contactPhone1;
    }

    /**
     * @param string $contactPhone1
     * @return Contact
     */
    public function setContactPhone1($contactPhone1)
    {
        $this->contactPhone1 = $contactPhone1;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactPhone2()
    {
        return $this->contactPhone2;
    }

    /**
     * @param string $contactPhone2
     * @return Contact
     */
    public function setContactPhone2($contactPhone2)
    {
        $this->contactPhone2 = $contactPhone2;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getContactCreatedAt()
    {
        return $this->contactCreatedAt;
    }

    /**
     * @param \DateTime $contactCreatedAt
     * @return Contact
     */
    public function setContactCreatedAt($contactCreatedAt)
    {
        $this->contactCreatedAt = $contactCreatedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getContactUpdatedAt()
    {
        return $this->contactUpdatedAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setContactUpdatedAt()
    {
        $this->contactUpdatedAt = new \DateTime("now");
        return $this;
    }
}

