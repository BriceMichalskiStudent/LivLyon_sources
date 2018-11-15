<?php

namespace LIV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventCategory
 *
 * @ORM\Table(name="event_category")
 * @ORM\Entity(repositoryClass="LIV\AppBundle\Repository\EventCategoryRepository")
 */
class EventCategory
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
     * @return EventCategory
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
     * Set slug
     *
     * @param string $slug
     *
     * @return EventCategory
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Set slug
     *
     * @return EventCategory
     */

    publiv function setSlug

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug = ;
    }

    /**
     * @ORM\PrePersist
     */
    public function setSlugable(){
        $this->slug = str_replace(' ','-',$this->name);
    }


}

