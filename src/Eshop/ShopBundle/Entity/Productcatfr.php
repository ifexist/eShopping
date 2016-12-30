<?php

namespace Eshop\ShopBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Productcatfr
 *
 * @ORM\Table(name="product_cat_fr")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\ProductcatfrRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Productcatfr
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
     * @var parentid
     *
     * @ORM\Column(name="parentid", type="integer", length=8, nullable=true)
     */
    private $parentid;
    
    /**
     * @var categoryid
     *
     * @ORM\Column(name="categoryid", type="integer", length=8,nullable=true)
     */
    private $categoryid;

    /**
     * @var string
     *
     * @ORM\Column(name="cat1", type="string", length=50, nullable=false, nullable=true)
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
     * @return Productcatfr
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
     * Set parentid
     *
     * @param integer $parentid
     * @return Productcatfr
     */
    function setParentid($parentid) {
        $this->parentid = $parentid;
    }
    
    /**
     * Get parentid
     *
     * @return integer
     */
    function getParentid() {
        return $this->parentid;
    }

    /**
     * Set categoryid
     *
     * @param integer $categoryid
     * @return Productcatfr
     */
    function setCategoryid($categoryid) {
        $this->categoryid = $categoryid;
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
     * @return Productcatfr
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
     * @return Productcatfr
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
     * @return Productcatfr
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
     * @return Productcatfr
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
     * @return Productcatfr
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
     * @return Productcatfr
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
}
