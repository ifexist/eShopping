<?php

namespace Eshop\ShopBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * GProductcat1ru
 *
 * @ORM\Table(name="product_cat1_gg_ru")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\GProductcat1ruRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class GProductcat1ru
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
     * @return GProductcat1ru
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
     * @return GProductcat1ru
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
