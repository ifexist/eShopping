<?php

namespace Eshop\ShopBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Prodcolor
 *
 * @ORM\Table(name="product_existin_color")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\ProdcolorRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Prodcolor
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
     * @ORM\ManyToOne(targetEntity="Prodexistin", inversedBy="prodcolor")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enable", type="boolean", nullable=true)
     */
    private $enable;
    
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=30, nullable=true)
     */
    private $title;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=25, nullable=true)
     */
    private $name;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="code1", type="string", length=15, nullable=true)
     */
    private $code1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="code2", type="string", length=15, nullable=true)
     */
    private $code2;

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
     * Set parent
     *
     * @param \Eshop\ShopBundle\Entity\Prodexistin $parent
     * @return Prodcolor
     */
    public function setParent(\Eshop\ShopBundle\Entity\Prodexistin $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Eshop\ShopBundle\Entity\Prodexistin
     */
    public function getParent()
    {
        return $this->parent;
    }


    /**
     * Set enable
     *
     * @param boolean $enable
     * @return Prodcolor
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
     * Set title
     *
     * @param string $title
     * @return Prodcolor
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Prodcolor
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
     * Set code1
     *
     * @param string $code1
     * @return Prodcolor
     */
    public function setCode1($code1)
    {
        $this->code1 = $code1;

        return $this;
    }

    /**
     * Get code1
     *
     * @return string
     */
    public function getCode1()
    {
        return $this->code1;
    }

    /**
     * Set code2
     *
     * @param string $code2
     * @return Prodcolor
     */
    public function setCode2($code2)
    {
        $this->code2 = $code2;

        return $this;
    }

    /**
     * Get code2
     *
     * @return string
     */
    public function getCode2()
    {
        return $this->code2;
    }
}
