<?php


namespace LIV\AppBundle\Entity;

use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * InterviewImage
 * @Vich\Uploadable
 * @ORM\Table(name="interviewImage",indexes={@Index(name="place_image_search_idx", columns={"image"})})
 * @ORM\Entity(repositoryClass="LIV\AppBundle\Repository\InterviewRepository")
 */
class InterviewImage
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="interview_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @var interview
     *
     * @ORM\ManyToOne(targetEntity="LIV\AppBundle\Entity\Interview", inversedBy="images")
     */
    private $interview;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    // ...


    // file manipulation
    public function upload($imageFile, $name)
    {
        $name= uniqid('PLACE').str_replace(' ', '-', $name);
        $this->imageFile->move('%app.path.place_images%', $name);
        $this->image = $name;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }


    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function __toString()
    {
        return $this->image;
    }

    /**
     * @return interview
     */
    public function getInterview()
    {
        return $this->interview;
    }

    /**
     * @param Interview $interview
     */
    public function setInterview($interview)
    {
        $this->interview = $interview;
    }
}
