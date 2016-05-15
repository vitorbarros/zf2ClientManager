<?php
namespace Ead\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Ead\Entity\Repository\InscriptionRepository")
 */
class Inscription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="inscription_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $inscriptionId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscription_created_at", type="datetime", nullable=false)
     */
    private $inscriptionCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscription_updated_at", type="datetime", nullable=false)
     */
    private $inscriptionUpdatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscription_expiration_date", type="datetime", nullable=false)
     */
    private $inscriptionExpirationDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="inscription_status", type="boolean", nullable=false)
     */
    private $inscriptionStatus;

    /**
     * @var Student
     *
     * @ORM\ManyToOne(targetEntity="Student")
     * @ORM\JoinColumn(name="student", referencedColumnName="student_id")
     */
    private $student;

    /**
     * @var Course
     *
     * @ORM\ManyToOne(targetEntity="Course")
     * @ORM\JoinColumn(name="course", referencedColumnName="course_id")
     */
    private $course;

    public function __construct(array $options = array())
    {
        (new Hydrator\ClassMethods())->hydrate($options, $this);
        $this->inscriptionCreatedAt = new \DateTime("now");
        $this->inscriptionUpdatedAt = new \DateTime("now");
    }

    /**
     * @return int
     */
    public function getInscriptionId()
    {
        return $this->inscriptionId;
    }

    /**
     * @param int $inscriptionId
     * @return Inscription
     */
    public function setInscriptionId($inscriptionId)
    {
        $this->inscriptionId = $inscriptionId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getInscriptionCreatedAt()
    {
        return $this->inscriptionCreatedAt;
    }

    /**
     * @return \DateTime
     */
    public function getInscriptionUpdatedAt()
    {
        return $this->inscriptionUpdatedAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setInscriptionUpdatedAt()
    {
        $this->inscriptionUpdatedAt = new \DateTime("now");
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getInscriptionExpirationDate()
    {
        return $this->inscriptionExpirationDate;
    }

    /**
     * @param \DateTime $inscriptionExpirationDate
     * @return Inscription
     */
    public function setInscriptionExpirationDate($inscriptionExpirationDate)
    {
        $this->inscriptionExpirationDate = $inscriptionExpirationDate;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getInscriptionStatus()
    {
        return $this->inscriptionStatus;
    }

    /**
     * @param boolean $inscriptionStatus
     * @return Inscription
     */
    public function setInscriptionStatus($inscriptionStatus)
    {
        $this->inscriptionStatus = $inscriptionStatus;
        return $this;
    }

    /**
     * @return Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @param Student $student
     * @return Inscription
     */
    public function setStudent($student)
    {
        $this->student = $student;
        return $this;
    }

    /**
     * @return Course
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param Course $course
     * @return Inscription
     */
    public function setCourse($course)
    {
        $this->course = $course;
        return $this;
    }
}

