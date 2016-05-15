<?php
namespace Ead\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * CourseType
 *
 * @ORM\Table(name="course_type")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Ead\Entity\Repository\CourseTypeRepository")
 */
class CourseType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="course_type_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $courseTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="course_type_name", type="string", length=255, nullable=false)
     */
    private $courseTypeName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="course_type_created_at", type="datetime", nullable=false)
     */
    private $courseTypeCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="course_type_updated_at", type="datetime", nullable=false)
     */
    private $courseTypeUpdatedAt;

    public function __construct(array $options = array())
    {
        (new Hydrator\ClassMethods())->hydrate($options, $this);
        $this->courseTypeCreatedAt = new \DateTime("now");
        $this->courseTypeUpdatedAt = new \DateTime("now");
    }

    /**
     * @return int
     */
    public function getCourseTypeId()
    {
        return $this->courseTypeId;
    }

    /**
     * @param int $courseTypeId
     * @return CourseType
     */
    public function setCourseTypeId($courseTypeId)
    {
        $this->courseTypeId = $courseTypeId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCourseTypeName()
    {
        return $this->courseTypeName;
    }

    /**
     * @param string $courseTypeName
     * @return CourseType
     */
    public function setCourseTypeName($courseTypeName)
    {
        $this->courseTypeName = $courseTypeName;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCourseTypeCreatedAt()
    {
        return $this->courseTypeCreatedAt;
    }

    /**
     * @return \DateTime
     */
    public function getCourseTypeUpdatedAt()
    {
        return $this->courseTypeUpdatedAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setCourseTypeUpdatedAt()
    {
        $this->courseTypeUpdatedAt = new \DateTime("now");
        return $this;
    }
}

