<?php

namespace Eshop\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="site_themes")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\ThemesRepository")
 */
class Themes
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enable", type="boolean", nullable=true)
     */
    private $enable;
    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=35, nullable=true)
     */
    private $name;

    /**
     * @var string $linkimage
     *
     * @ORM\Column(name="linkimage", type="string", length=150, nullable=true)
     */
    private $linkimage;


    /**
     * Set id
     *
     * @param integer $id
     */
    public function setId()
    {
        return $this->id;
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
     * Set enable
     *
     * @param boolean $enable
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;

        return $this;
    }

    /**
     * Get enable
     *
     * @return boolean 
     */
    public function getEnable()
    {
        return $this->enable;
    }

    /**
     * Set linkimage
     *
     * @param string $linkimage
     */
    public function setLinkimage($linkimage)
    {
        $this->linkimage = $linkimage;
    }

    /**
     * Get linkimage
     *
     * @return string 
     */
    public function getLinkimage()
    {
        return $this->linkimage;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
    
}