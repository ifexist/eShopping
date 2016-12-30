<?php

namespace Eshop\ShopBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Slide
 *
 * @ORM\Table()
 * @ORM\Entity
 * @UniqueEntity("slideOrder")
 * @ORM\HasLifecycleCallbacks()
 */
class Slide
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slidekey", type="string", length=255)
     */
    private $slidekey;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var integer
     *
     * @ORM\Column(name="slide_order", type="integer", unique=true)
     */
    private $slideOrder;
    
    /**
     * description
     *
     * @var text
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;
    

    public function __construct() {
        $this->enabled = true;
    }

    public function __toString(){
        return $this->getName();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Slide
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
     * Set enabled
     *
     * @param boolean $enabled
     * @return Slide
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set slidekey
     *
     * @param text $slidekey
     * @return Slide
     */
    public function setSlidekey($slidekey)
    {
        $this->slidekey = $slidekey;

        return $this;
    }

    /**
     * Get slidekey
     *
     * @return text 
     */
    public function getSlidekey()
    {
        return $this->slidekey;
    }

    /**
     * Set slideOrder
     *
     * @param integer $slideOrder
     * @return Slide
     */
    public function setSlideOrder($slideOrder)
    {
        $this->slideOrder = $slideOrder;

        return $this;
    }

    /**
     * Get slideOrder
     *
     * @return integer 
     */
    public function getSlideOrder()
    {
        return $this->slideOrder;
    }

    /**
     * Set description
     *
     * @param text $description
     * @return Slide
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
