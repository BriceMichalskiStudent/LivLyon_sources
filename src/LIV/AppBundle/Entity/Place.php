<?php

namespace LIV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

/**
 * Place
 *
 * @ORM\Table(name="place",indexes={@Index(name="place_search_idx", columns={"name","slug"})})
 * @ORM\Entity(repositoryClass="LIV\AppBundle\Repository\PlaceRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Place
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
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="link",type="string", nullable=true)
     */
    private $link;

    /**
     * @var int
     *
     * @ORM\Column(name="rating", type="smallint", nullable=true)
     */
    private $rating;

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
     * @ORM\OneToOne(targetEntity="LIV\AppBundle\Entity\Address", cascade={"persist","persist"})
     * @ORM\JoinColumn(nullable=false)
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
     * @var string
     *
     * @ORM\Column(name="information", type="string", length=255)
     */
    private $information;

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
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="places",cascade={"persist"})
     * @ORM\JoinTable(name="place_tag")
     */
    private $tags;

    /**
     * @ORM\ManyToMany(targetEntity="PlaceCategory", inversedBy="places")
     * @ORM\JoinTable(name="mapping_places_categories")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity="LIV\AppBundle\Entity\PlaceImage", mappedBy="place", cascade={"persist"})
     */
    private $images;

    /**
     * @var string
     *
     * @ORM\Column(name="videoUrl", type="string", length=255, nullable=true)
     */
    private $video;

    // METHOD
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
        $this->slug = str_replace(' ', '-', $this->name);
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     *  Get video
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
     * @return Place
     */
    public function setVideo(string $video)
    {
        $this->video = $video;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }


    // GETTER AND SETTER
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
     * @return Place
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
     * Set rating
     *
     * @param integer $rating
     *
     * @return Place
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     *
     * @return Place
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
     * @return Place
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
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Place
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
     * @return Place
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
     * Set information
     *
     * @param string $information
     *
     * @return Place
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return string
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
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

    /**
     * Add tag
     *
     * @param \LIV\AppBundle\Entity\Tag $tag
     *
     * @return Place
     */
    public function addTag(\LIV\AppBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

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

    /**
     * Set address
     *
     * @param \LIV\AppBundle\Entity\Address $address
     *
     * @return Place
     */
    public function setAddress(\LIV\AppBundle\Entity\Address $address = null)
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
     * Add category
     *
     * @param \LIV\AppBundle\Entity\PlaceCategory $category
     *
     * @return Place
     */
    public function addCategory(\LIV\AppBundle\Entity\PlaceCategory $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \LIV\AppBundle\Entity\PlaceCategory $category
     */
    public function removeCategory(\LIV\AppBundle\Entity\PlaceCategory $category)
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
     * @return Place
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
     * Set link
     *
     * @param string $link
     *
     * @return Place
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
     * Add image
     *
     * @param \LIV\AppBundle\Entity\PlaceImage $image
     *
     * @return Place
     */
    public function addImage(\LIV\AppBundle\Entity\PlaceImage $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \LIV\AppBundle\Entity\PlaceImage $image
     */
    public function removeImage(\LIV\AppBundle\Entity\PlaceImage $image)
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
}
