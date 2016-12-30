<?php

namespace Eshop\ShopBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * GProductcaten
 *
 * @ORM\Table(name="product_gg_cat_en")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\GProductcatenRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class GProductcaten
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
     * @ORM\Column(name="cat2", type="string", length=50, nullable=true)
     */
    private $cat2;

    /**
     * @var string
     *
     * @ORM\Column(name="cat3", type="string", length=50, nullable=true)
     */
    private $cat3;

    /**
     * @var string
     *
     * @ORM\Column(name="cat4", type="string", length=50, nullable=true)
     */
    private $cat4;

    /**
     * @var string
     *
     * @ORM\Column(name="cat5", type="string", length=50, nullable=true)
     */
    private $cat5;

    /**
     * @var string
     *
     * @ORM\Column(name="cat6", type="string", length=50, nullable=true)
     */
    private $cat6;

    /**
     * @var string
     *
     * @ORM\Column(name="cat7", type="string", length=50, nullable=true)
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
     * @return GProductcaten
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
     * Get categoryid
     *
     * @return integer
     */
    function getCategoryid() {
        return $this->categoryid;
    }

    /**
     * Set name
     *
     * @param string $cat1
     * @return GProductcaten
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

    /**
     * Set name
     *
     * @param string $cat2
     * @return GProductcaten
     */
    public function setCat2($cat2)
    {
        $this->cat2 = $cat2;

        return $this;
    }

    /**
     * Get cat2
     *
     * @return string
     */
    public function getCat2()
    {
        return $this->cat2;
    }

    /**
     * Set cat3
     *
     * @param string $cat3
     * @return GProductcaten
     */
    public function setCat3($cat3)
    {
        $this->cat3 = $cat3;

        return $this;
    }

    /**
     * Get cat3
     *
     * @return string
     */
    public function getCat3()
    {
        return $this->cat3;
    }
    
    /**
     * Set cat4
     *
     * @param string $cat4
     * @return GProductcaten
     */
    public function setCat4($cat4)
    {
        $this->cat4 = $cat4;

        return $this;
    }

    /**
     * Get cat4
     *
     * @return string
     */
    public function getCat4()
    {
        return $this->cat4;
    }

    /**
     * Set cat5
     *
     * @param string $cat5
     * @return GProductcaten
     */
    public function setCat5($cat5)
    {
        $this->cat5 = $cat5;

        return $this;
    }

    /**
     * Get cat5
     *
     * @return string
     */
    public function getCat5()
    {
        return $this->cat5;
    }
    
    /**
     * Set cat6
     *
     * @param string $cat6
     * @return GProductcaten
     */
    public function setCat6($cat6)
    {
        $this->cat6 = $cat6;

        return $this;
    }

    /**
     * Get cat6
     *
     * @return string
     */
    public function getCat6()
    {
        return $this->cat6;
    }
    
    /**
     * Set cat7
     *
     * @param string $cat7
     * @return GProductcaten
     */
    public function setCat7($cat7)
    {
        $this->cat7 = $cat7;

        return $this;
    }

    /**
     * Get cat7
     *
     * @return string
     */
    public function getCat7()
    {
        return $this->cat7;
    }
}
