<?php
namespace Ead\Entity;

use Client\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Ead\Entity\Repository\StudentRepository")
 */
class Student
{
    /**
     * @var integer
     *
     * @ORM\Column(name="student_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $studentId;

    /**
     * @var string
     *
     * @ORM\Column(name="student_name", type="string", length=255, nullable=false)
     */
    private $studentName;

    /**
     * @var string
     *
     * @ORM\Column(name="student_email", type="string", length=255, nullable=false)
     */
    private $studentEmail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="student_created_at", type="datetime", nullable=false)
     */
    private $studentCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="student_updated_at", type="datetime", nullable=false)
     */
    private $studentUpdatedAt;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Client\Entity\User")
     * @ORM\JoinColumn(name="user", referencedColumnName="user_id")
     */
    private $user;

    public function __construct(array $options = array())
    {
        (new Hydrator\ClassMethods())->hydrate($options, $this);
        $this->studentCreatedAt = new \DateTime("now");
        $this->studentUpdatedAt = new \DateTime("now");
    }

    /**
     * @return int
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * @param int $studentId
     * @return Student
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
        return $this;
    }

    /**
     * @return string
     */
    public function getStudentName()
    {
        return $this->studentName;
    }

    /**
     * @param string $studentName
     * @return Student
     */
    public function setStudentName($studentName)
    {
        $this->studentName = $studentName;
        return $this;
    }

    /**
     * @return string
     */
    public function getStudentEmail()
    {
        return $this->studentEmail;
    }

    /**
     * @param string $studentEmail
     * @return Student
     */
    public function setStudentEmail($studentEmail)
    {
        $this->studentEmail = $studentEmail;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStudentCreatedAt()
    {
        return $this->studentCreatedAt;
    }

    /**
     * @return \DateTime
     */
    public function getStudentUpdatedAt()
    {
        return $this->studentUpdatedAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setStudentUpdatedAt()
    {
        $this->studentUpdatedAt = new \DateTime("now");
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
     * @return Student
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'student_id' => $this->getStudentId(),
            'student_name' => $this->getStudentName(),
            'student_email' => $this->getStudentEmail(),
            'student_created_at' => $this->getStudentCreatedAt()->format('Y-m-d H:i:s'),
            'student_updated_at' => $this->getStudentUpdatedAt()->format('Y-m-d H:i:s')
        );
    }
}

