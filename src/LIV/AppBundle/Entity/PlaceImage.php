<?php

namespace LIV\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaceImage
 *
 * @ORM\Table(name="place_image")
 * @ORM\Entity(repositoryClass="LIV\AppBundle\Repository\PlaceImageRepository")
 */
class PlaceImage
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
     * @var Place
     *
     * @ORM\ManyToOne(targetEntity="LIV\AppBundle\Entity\Place", inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $place;


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
     * @return placeImage
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
     * @return placeImage
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

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function getFile()
    {
        return $this->file;
    }

    // file manipulation
    public function upload()
    {
        $originalName= $this->file->getClientOriginalName();
        $name= uniqid('PLACE').str_replace(' ', '-', $originalName);

        $this->file->move($this->getUploadRootDir(), $name);

        $this->imageName = $name;
        $this->alt = $name;
    }

    public function getUploadDir()
    {
        return 'img/place';
    }

    protected function getUploadRootDir()
    {
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    /**
     * Set place
     *
     * @param \LIV\AppBundle\Entity\Place $place
     *
     * @return PlaceImage
     */
    public function setPlace(\LIV\AppBundle\Entity\Place $place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return \LIV\AppBundle\Entity\Place
     */
    public function getPlace()
    {
        return $this->place;
    }
}
