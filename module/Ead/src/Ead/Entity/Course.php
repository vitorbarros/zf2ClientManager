<?php
namespace Ead\Entity;

use Client\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Ead\Entity\Repository\CourseRepository")
 */
class Course
{
    /**
     * @var integer
     *
     * @ORM\Column(name="course_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $courseId;

    /**
     * @var string
     *
     * @ORM\Column(name="course_name", type="string", length=255, nullable=false)
     */
    private $courseName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="course_created_at", type="datetime", nullable=false)
     */
    private $courseCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="course_updated_at", type="datetime", nullable=false)
     */
    private $courseUpdatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="course_status", type="boolean", nullable=false)
     */
    private $courseStatus;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Client\Entity\User")
     * @ORM\JoinColumn(name="user", referencedColumnName="user_id")
     */
    private $user;

    /**
     * @var CourseType
     *
     * @ORM\ManyToOne(targetEntity="CourseType")
     * @ORM\JoinColumn(name="course_type", referencedColumnName="course_type_id")
     */
    private $courseType;

    public function __construct(array $options = array())
    {
        (new Hydrator\ClassMethods())->hydrate($options, $this);
        $this->courseCreatedAt = new \DateTime("now");
        $this->courseUpdatedAt = new \DateTime("now");
    }

    /**
     * @return int
     */
    public function getCourseId()
    {
        return $this->courseId;
    }

    /**
     * @param int $courseId
     * @return Course
     */
    public function setCourseId($courseId)
    {
        $this->courseId = $courseId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCourseName()
    {
        return $this->courseName;
    }

    /**
     * @param string $courseName
     * @return Course
     */
    public function setCourseName($courseName)
    {
        $this->courseName = $courseName;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCourseCreatedAt()
    {
        return $this->courseCreatedAt;
    }

    /**
     * @return \DateTime
     */
    public function getCourseUpdatedAt()
    {
        return $this->courseUpdatedAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setCourseUpdatedAt()
    {
        $this->courseUpdatedAt = new \DateTime("now");
        return $this;
    }

    /**
     * @return boolean
     */
    public function getCourseStatus()
    {
        return $this->courseStatus;
    }

    /**
     * @param boolean $courseStatus
     * @return Course
     */
    public function setCourseStatus($courseStatus)
    {
        $this->courseStatus = $courseStatus;
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
     * @return Course
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return CourseType
     */
    public function getCourseType()
    {
        return $this->courseType;
    }

    /**
     * @param CourseType $courseType
     * @return Course
     */
    public function setCourseType($courseType)
    {
        $this->courseType = $courseType;
        return $this;
    }
}

