<?php

namespace LIV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventImage
 *
 * @ORM\Table(name="event_image")
 * @ORM\Entity(repositoryClass="LIV\AppBundle\Repository\EventImageRepository")
 */
class EventImage
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
     * @var string
     *
     * @ORM\Column(name="imageName", type="string", length=255)
     */
    private $imageName;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    /**
     * @var Event
     *
     * @ORM\ManyToOne(targetEntity="LIV\AppBundle\Entity\Event", inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $event;


    private $file;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return EventImage
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return EventImage
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set event
     *
     * @param \LIV\AppBundle\Entity\Event $event
     *
     * @return EventImage
     */
    public function setEvent(\LIV\AppBundle\Entity\Event $event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \LIV\AppBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    // file manipulation
    public function upload()
    {
        $originalName= $this->file->getClientOriginalName();
        $name= uniqid('EVENT').str_replace(' ', '-', $originalName);

        $this->file->move($this->getUploadRootDir(), $name);

        $this->imageName = $name;
        $this->alt = $name;
    }

    public function getUploadDir()
    {
        return 'img/event';
    }

    protected function getUploadRootDir()
    {
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
}
