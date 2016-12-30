<?php

namespace Eshop\ShopBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Prodexistin
 *
 * @ORM\Table(name="product_existin")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\ProdexistinRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Prodexistin
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
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="fieldtype", type="string", length=10, nullable=true)
     */
    private $fieldtype;

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
     * @return Prodexistin
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
     * @param string $name
     * @return Prodexistin
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
     * Set fieldtype
     *
     * @param string $fieldtype
     * @return Prodexistin
     */
    public function setFieldtype($fieldtype)
    {
        $this->fieldtype = $fieldtype;

        return $this;
    }

    /**
     * Get fieldtype
     *
     * @return string
     */
    public function getFieldtype()
    {
        return $this->fieldtype;
    }
}
