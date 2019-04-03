<?php

namespace LIV\AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event",indexes={@Index(name="event_search_idx", columns={"name","slug"})})
 * @ORM\Entity(repositoryClass="LIV\AppBundle\Repository\EventRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="startingDate", type="datetime")
     */
    private $startingDate;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="endingDate", type="datetime")
     */
    private $endingDate;

    /**
     * @var string
     *
     * @ORM\Column(name="shortDescription", type="string", length=255, nullable=true)
     */
    private $shortDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="fullDescription", type="text")
     */
    private $fullDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="linkTicketing", type="string", length=255, nullable=true)
     */
    private $linkTicketing;

    /**
     * @var string
     *
     * @ORM\Column(name="linkOrganiser", type="string", length=255, nullable=true)
     */
    private $linkOrganiser;

    /**
     * @ORM\ManyToMany(targetEntity="EventCategory", inversedBy="events")
     * @ORM\JoinTable(name="mapping_events_categories")
     */
    private $categories;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="LIV\AppBundle\Entity\EventImage", mappedBy="event", cascade={"persist", "remove"})
     */
    private $images;

    /**
     * @var string
     *
     * @ORM\Column(name="videoUrl", type="string", length=255, nullable=true)
     */
    private $video;

    /**
     * @ORM\ManyToOne(targetEntity="LIV\AppBundle\Entity\Address", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $address;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="events",cascade={"persist"})
     * @ORM\JoinTable(name="event_tag")
     */
    private $tags;

    /**
     * @ORM\PrePersist
     */
    public function prepersistFunction()
    {
        $this->createdAt = new \DateTime("now");
        $this->setUpdatedAtValue();
        $this->slug = str_replace(' ', '-', $this->name);
    }
    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updatedAt = new \DateTime("now");
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set startingDate
     *
     * @param \DateTime $startingDate
     *
     * @return Event
     */
    public function setStartingDate($startingDate)
    {
        $this->startingDate = $startingDate;

        return $this;
    }

    /**
     * Get startingDate
     *
     * @return \DateTime
     */
    public function getStartingDate()
    {
        return $this->startingDate;
    }

    /**
     * Set endingDate
     *
     * @param \DateTime $endingDate
     *
     * @return Event
     */
    public function setEndingDate($endingDate)
    {
        $this->endingDate = $endingDate;

        return $this;
    }

    /**
     * Get endingDate
     *
     * @return \DateTime
     */
    public function getEndingDate()
    {
        return $this->endingDate;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     *
     * @return Event
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set fullDescription
     *
     * @param string $fullDescription
     *
     * @return Event
     */
    public function setFullDescription($fullDescription)
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    /**
     * Get fullDescription
     *
     * @return string
     */
    public function getFullDescription()
    {
        return $this->fullDescription;
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
     * Add category
     *
     * @param \LIV\AppBundle\Entity\EventCategory $category
     *
     * @return Event
     */
    public function addCategory(\LIV\AppBundle\Entity\EventCategory $category)
    {
        $this->categories[] = $category;
        return $this;
    }

    /**
     * Remove category
     *
     * @param \LIV\AppBundle\Entity\EventCategory $category
     */
    public function removeCategory(\LIV\AppBundle\Entity\EventCategory $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Event
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Event
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Event
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Add image
     *
     * @param \LIV\AppBundle\Entity\EventImage $image
     *
     * @return Event
     */
    public function addImage(EventImage $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \LIV\AppBundle\Entity\EventImage $image
     */
    public function removeImage(EventImage $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set linkTicketing
     *
     * @param string $linkTicketing
     *
     * @return Event
     */
    public function setLinkTicketing($linkTicketing)
    {
        $this->linkTicketing = $linkTicketing;

        return $this;
    }

    /**
     * Get linkTicketing
     *
     * @return string
     */
    public function getLinkTicketing()
    {
        return $this->linkTicketing;
    }

    /**
     * Set linkOrganiser
     *
     * @param string $linkOrganiser
     *
     * @return Event
     */
    public function setLinkOrganiser($linkOrganiser)
    {
        $this->linkOrganiser = $linkOrganiser;

        return $this;
    }

    /**
     * Get linkOrganiser
     *
     * @return string
     */
    public function getLinkOrganiser()
    {
        return $this->linkOrganiser;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Event
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Event
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set address
     *
     * @param \LIV\AppBundle\Entity\Address $address
     *
     * @return Event
     */
    public function setAddress(\LIV\AppBundle\Entity\Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \LIV\AppBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add tag
     *
     * @param \LIV\AppBundle\Entity\Tag $tag
     *
     * @return Event
     */
    public function addTag(\LIV\AppBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Get video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set video
     *
     * @param string $video
     *
     * @return Event
     */
    public function setVideo(string $video)
    {
        $this->video = $video;

        return $this;
    }



    /**
     * Remove tag
     *
     * @param \LIV\AppBundle\Entity\Tag $tag
     */
    public function removeTag(\LIV\AppBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }
}
