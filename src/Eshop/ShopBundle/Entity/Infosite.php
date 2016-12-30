<?php

namespace Eshop\ShopBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="infos_site")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\InfositeRepository")
 */
class Infosite
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
     * @var string
     *
     * @ORM\Column(name="added", type="string", length=35, nullable=true)
     */
    private $added;

    /**
     * @var string
     *
     * @ORM\Column(name="updated", type="string", length=35, nullable=true)
     */
    private $updated;

    /**
     * @var string
     *
     * @ORM\Column(name="langcode", type="string", length=10, nullable=true)
     */
    private $langcode;

    /**
     * @var string
     *
     * @ORM\Column(name="namesite", type="string", length=70, nullable=true)
     */
    private $namesite;

    /**
     * @var string
     *
     * @ORM\Column(name="slogan", type="string", length=255, nullable=true)
     */
    private $slogan;

    /**
     * @var string
     *
     * @ORM\Column(name="web", type="string", length=255, nullable=true)
     */
    private $web;

    /**
     * @var text
     *
     * @ORM\Column(name="prodcats", type="text", nullable=true)
     */
    private $prodcats;

    /**
     * @var string
     *
     * @ORM\Column(name="sitestyle", type="string", length=30, nullable=true)
     */
    private $sitestyle;

    /**
     * @var string
     *
     * @ORM\Column(name="adminstyle", type="string", length=30, nullable=true)
     */
    private $adminstyle;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $titleservice1;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $emailservice1;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $phoneservice1;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $contactservice1;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $titleservice2;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $emailservice2;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $phoneservice2;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $contactservice2;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $titleservice3;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $emailservice3;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $phoneservice3;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $contactservice3;



    public function __toString(){
        return $this->getNamesite();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Infosite
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set added
     *
     * @param string $added
     * @return Infosite
     */
    public function setAdded($added)
    {
        $this->added = $added;

        return $this;
    }

    /**
     * Get added
     *
     * @return string 
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * Set updated
     *
     * @param string $updated
     * @return Infosite
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return string 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set langcode
     *
     * @param string $langcode
     * @return Infosite
     */
    public function setLangcode($langcode)
    {
        $this->langcode = $langcode;

        return $this;
    }

    /**
     * Get langcode
     *
     * @return string 
     */
    public function getLangcode()
    {
        return $this->langcode;
    }

    /**
     * Set namesite
     *
     * @param string $namesite
     * @return Infosite
     */
    public function setNamesite($namesite)
    {
        $this->namesite = $namesite;

        return $this;
    }

    /**
     * Get namesite
     *
     * @return string 
     */
    public function getNamesite()
    {
        return $this->namesite;
    }

    /**
     * Set slogan
     *
     * @param string $slogan
     * @return Infosite
     */
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;

        return $this;
    }

    /**
     * Get slogan
     *
     * @return string 
     */
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * Set web
     *
     * @param string $web
     * @return Infosite
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get web
     *
     * @return string 
     */
    public function getWeb()
    {
        return $this->web;
    }

    
    /**
     * Set prodcats
     *
     * @param string $prodcats
     * @return Infosite
     */
    public function setProdcats($prodcats)
    {
        $this->prodcats = $prodcats;

        return $this;
    }

    /**
     * Get prodcats
     *
     * @return string 
     */
    public function getProdcats()
    {
        return $this->prodcats;
    }
    

    /**
     * Set sitestyle
     *
     * @param string $sitestyle
     * @return Infosite
     */
    public function setSitestyle($sitestyle)
    {
        $this->sitestyle = $sitestyle;

        return $this;
    }

    /**
     * Get sitestyle
     *
     * @return string 
     */
    public function getSitestyle()
    {
        return $this->sitestyle;
    }
    

    /**
     * Set adminstyle
     *
     * @param string $adminstyle
     * @return Infosite
     */
    public function setAdminstyle($adminstyle)
    {
        $this->adminstyle = $adminstyle;

        return $this;
    }

    /**
     * Get adminstyle
     *
     * @return string 
     */
    public function getAdminstyle()
    {
        return $this->adminstyle;
    }

    /**
     * Set titleservice1
     *
     * @param string $titleservice1
     * @return Infosite
     */
    public function setTitleservice1($titleservice1)
    {
        $this->titleservice1 = $titleservice1;

        return $this;
    }

    /**
     * Get titleservice1
     *
     * @return string 
     */
    public function getTitleservice1()
    {
        return $this->titleservice1;
    }

    /**
     * Set emailservice1
     *
     * @param string $emailservice1
     * @return Infosite
     */
    public function setEmailservice1($emailservice1)
    {
        $this->emailservice1 = $emailservice1;

        return $this;
    }

    /**
     * Get emailservice1
     *
     * @return string 
     */
    public function getEmailservice1()
    {
        return $this->emailservice1;
    }

    /**
     * Set phoneservice1
     *
     * @param string $phoneservice1
     * @return Infosite
     */
    public function setPhoneservice1($phoneservice1)
    {
        $this->phoneservice1 = $phoneservice1;

        return $this;
    }

    /**
     * Get phoneservice1
     *
     * @return string 
     */
    public function getPhoneservice1()
    {
        return $this->phoneservice1;
    }

    /**
     * Set contactservice1
     *
     * @param string $contactservice1
     * @return Infosite
     */
    public function setContactservice1($contactservice1)
    {
        $this->contactservice1 = $contactservice1;

        return $this;
    }

    /**
     * Get contactservice1
     *
     * @return string 
     */
    public function getContactservice1()
    {
        return $this->contactservice1;
    }

    /**
     * Set titleservice2
     *
     * @param string $titleservice2
     * @return Infosite
     */
    public function setTitleservice2($titleservice2)
    {
        $this->titleservice2 = $titleservice2;

        return $this;
    }

    /**
     * Get titleservice2
     *
     * @return string 
     */
    public function getTitleservice2()
    {
        return $this->titleservice2;
    }

    /**
     * Set emailservice2
     *
     * @param string $emailservice2
     * @return Infosite
     */
    public function setEmailservice2($emailservice2)
    {
        $this->emailservice2 = $emailservice2;

        return $this;
    }

    /**
     * Get emailservice2
     *
     * @return string 
     */
    public function getEmailservice2()
    {
        return $this->emailservice2;
    }

    /**
     * Set phoneservice2
     *
     * @param string $phoneservice2
     * @return Infosite
     */
    public function setPhoneservice2($phoneservice2)
    {
        $this->phoneservice2 = $phoneservice2;

        return $this;
    }

    /**
     * Get phoneservice2
     *
     * @return string 
     */
    public function getPhoneservice2()
    {
        return $this->phoneservice2;
    }

    /**
     * Set contactservice2
     *
     * @param string $contactservice2
     * @return Infosite
     */
    public function setContactservice2($contactservice2)
    {
        $this->contactservice2 = $contactservice2;

        return $this;
    }

    /**
     * Get contactservice2
     *
     * @return string 
     */
    public function getContactservice2()
    {
        return $this->contactservice2;
    }

    /**
     * Set titleservice3
     *
     * @param string $titleservice3
     * @return Infosite
     */
    public function setTitleservice3($titleservice3)
    {
        $this->titleservice3 = $titleservice3;

        return $this;
    }

    /**
     * Get titleservice3
     *
     * @return string 
     */
    public function getTitleservice3()
    {
        return $this->titleservice3;
    }

    /**
     * Set emailservice3
     *
     * @param string $emailservice3
     * @return Infosite
     */
    public function setEmailservice3($emailservice3)
    {
        $this->emailservice3 = $emailservice3;

        return $this;
    }

    /**
     * Get emailservice3
     *
     * @return string 
     */
    public function getEmailservice3()
    {
        return $this->emailservice3;
    }

    /**
     * Set phoneservice3
     *
     * @param string $phoneservice3
     * @return Infosite
     */
    public function setPhoneservice3($phoneservice3)
    {
        $this->phoneservice3 = $phoneservice3;

        return $this;
    }

    /**
     * Get phoneservice3
     *
     * @return string 
     */
    public function getPhoneservice3()
    {
        return $this->phoneservice3;
    }

    /**
     * Set contactservice3
     *
     * @param string $contactservice3
     * @return Infosite
     */
    public function setContactservice3($contactservice3)
    {
        $this->contactservice3 = $contactservice3;

        return $this;
    }

    /**
     * Get contactservice3
     *
     * @return string 
     */
    public function getContactservice3()
    {
        return $this->contactservice3;
    }

}

