<?php

namespace Eshop\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="taxonomy_terms")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\TagTermsRepository")
 */
class TagTerms
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=50, nullable=true)
     */
    private $code;
    
    /**
     * @var string
     *
     * @ORM\Column(name="codeicon", type="string", length=50, nullable=true)
     */
    private $codeicon;
    
    /**
     * @var string
     *
     * @ORM\Column(name="bgcolor", type="string", length=25, nullable=true)
     */
    private $bgcolor;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="cId", type="integer", length=11, nullable=true)
     */
    private $cid;



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
     * @return Docs
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
     * @return Terms
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
     * Set code
     *
     * @param string $code
     * @return Terms
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set codicon
     *
     * @param string $codicon
     * @return Terms
     */
    public function setCodicon($codicon)
    {
        $this->codicon = $codicon;

        return $this;
    }

    /**
     * Get codicon
     *
     * @return string 
     */
    public function getCodicon()
    {
        return $this->codicon;
    }

    /**
     * Set bgcolor
     *
     * @param string $bgcolor
     * @return Terms
     */
    public function setBgcolor($bgcolor)
    {
        $this->bgcolor = $bgcolor;

        return $this;
    }

    /**
     * Get bgcolor
     *
     * @return string 
     */
    public function getBgcolor()
    {
        return $this->bgcolor;
    }

    /**
     * Set cid
     *
     * @param \Eshop\ShopBundle\Entity\TagCategories $cid
     * @return Terms
     */
    public function setCid(\Eshop\ShopBundle\Entity\TagCategories $cid = null)
    {
        $this->cid = $cid;

        return $this;
    }

    /**
     * Get cid
     *
     * @return \Eshop\ShopBundle\Entity\TagCategories 
     */
    public function getCid()
    {
        return $this->cid;
    }
}


