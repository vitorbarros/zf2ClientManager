<?php
namespace Client\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Client\Entity\Repository\AddressRepository")
 */
class Address
{
    /**
     * @var integer
     *
     * @ORM\Column(name="address_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $addressId;

    /**
     * @var string
     *
     * @ORM\Column(name="address_name", type="string", length=255, nullable=false)
     */
    private $addressName;

    /**
     * @var string
     *
     * @ORM\Column(name="address_zipcode", type="string", length=255, nullable=false)
     */
    private $addressZipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="address_city", type="string", length=255, nullable=false)
     */
    private $addressCity;

    /**
     * @var string
     *
     * @ORM\Column(name="address_state", type="string", length=255, nullable=false)
     */
    private $addressState;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="address_created_at", type="datetime", nullable=false)
     */
    private $addressCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="address_updated_at", type="datetime", nullable=false)
     */
    private $addressUpdatedAt;

    public function __construct(array $options = array())
    {
        (new Hydrator\ClassMethods())->hydrate($options, $this);
        $this->addressCreatedAt = new \DateTime("now");
        $this->addressUpdatedAt = new \DateTime("now");
    }

    /**
     * @return int
     */
    public function getAddressId()
    {
        return $this->addressId;
    }

    /**
     * @param int $addressId
     * @return Address
     */
    public function setAddressId($addressId)
    {
        $this->addressId = $addressId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressName()
    {
        return $this->addressName;
    }

    /**
     * @param string $addressName
     * @return Address
     */
    public function setAddressName($addressName)
    {
        $this->addressName = $addressName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressZipcode()
    {
        return $this->addressZipcode;
    }

    /**
     * @param string $addressZipcode
     * @return Address
     */
    public function setAddressZipcode($addressZipcode)
    {
        $this->addressZipcode = $addressZipcode;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressCity()
    {
        return $this->addressCity;
    }

    /**
     * @param string $addressCity
     * @return Address
     */
    public function setAddressCity($addressCity)
    {
        $this->addressCity = $addressCity;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressState()
    {
        return $this->addressState;
    }

    /**
     * @param string $addressState
     * @return Address
     */
    public function setAddressState($addressState)
    {
        $this->addressState = $addressState;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getAddressCreatedAt()
    {
        return $this->addressCreatedAt;
    }

    /**
     * @param \DateTime $addressCreatedAt
     * @return Address
     */
    public function setAddressCreatedAt($addressCreatedAt)
    {
        $this->addressCreatedAt = $addressCreatedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getAddressUpdatedAt()
    {
        return $this->addressUpdatedAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setAddressUpdatedAt()
    {
        $this->addressUpdatedAt = new \DateTime("now");
        return $this;
    }
}

