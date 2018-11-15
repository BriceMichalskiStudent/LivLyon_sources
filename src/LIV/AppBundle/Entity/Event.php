<?php

namespace LIV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="LIV\AppBundle\Repository\EventRepository")
 */
class Event
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
     * @var \DateTime
     *
     * @ORM\Column(name="stratAt", type="datetime")
     */
    private $startFrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finishAt", type="datetime")
     */
    private $finishtAt;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;


    /**
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="events")
     */
    private $place;

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
     * Set description
     *
     * @param string $description
     *
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Event
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set startFrom
     *
     * @param \DateTime $startFrom
     *
     * @return Event
     */
    public function setStartFrom($startFrom)
    {
        $this->startFrom = $startFrom;

        return $this;
    }

    /**
     * Get startFrom
     *
     * @return \DateTime
     */
    public function getStartFrom()
    {
        return $this->startFrom;
    }

    /**
     * Set finishtAt
     *
     * @param \DateTime $finishtAt
     *
     * @return Event
     */
    public function setFinishtAt($finishtAt)
    {
        $this->finishtAt = $finishtAt;

        return $this;
    }

    /**
     * Get finishtAt
     *
     * @return \DateTime
     */
    public function getFinishtAt()
    {
        return $this->finishtAt;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }
}
