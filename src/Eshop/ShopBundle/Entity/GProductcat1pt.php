<?php

namespace Eshop\ShopBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * GProductcat1pt
 *
 * @ORM\Table(name="product_cat1_gg_pt")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\GProductcat1ptRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class GProductcat1pt
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
     * @var boolean
     *
     * @ORM\Column(name="enable", type="boolean", nullable=true)
     */
    private $enable;

    /**
     * @var string
     *
     * @ORM\Column(name="cat1", type="string", length=150, nullable=false, nullable=true)
     */

    private $cat1;

    /**
     * @var string
     *
     * @ORM\Column(name="cat2", type="string", length=150, nullable=true)
     */
    private $cat2;

    /**
     * @var string
     *
     * @ORM\Column(name="cat3", type="string", length=150, nullable=true)
     */
    private $cat3;

    /**
     * @var string
     *
     * @ORM\Column(name="cat4", type="string", length=150, nullable=true)
     */
    private $cat4;

    /**
     * @var string
     *
     * @ORM\Column(name="cat5", type="string", length=150, nullable=true)
     */
    private $cat5;

    /**
     * @var string
     *
     * @ORM\Column(name="cat6", type="string", length=150, nullable=true)
     */
    private $cat6;

    /**
     * @var string
     *
     * @ORM\Column(name="cat7", type="string", length=150, nullable=true)
     */
    private $cat7;
    
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
     * @return GProductcat1pt
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
     * Set name
     *
     * @param string $cat1
     * @return GProductcat1pt
     */
    public function setCat1($cat1)
    {
        $this->cat1 = $cat1;

        return $this;
    }

    /**
     * Get cat1
     *
     * @return string
     */
    public function getCat1()
    {
        return $this->cat1;
    }
}
