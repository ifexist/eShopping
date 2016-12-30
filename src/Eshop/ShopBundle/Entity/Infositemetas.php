<?php

namespace Eshop\ShopBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="infos_site_meta_tag")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\InfositemetasRepository")
 */
class Infositemetas
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
     * @ORM\Column(name="meta_title", type="string", length=80, nullable=true)
     */
    private $metaTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="mata_contentlanguage", type="string", length=10, nullable=true)
     */
    private $metaContentlanguage;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="meta_contentype", length=45, nullable=true)
     */
    protected $metaContentype;

    /**
     * @var text
     *
     * @ORM\Column(type="text", name="meta_description", nullable=true)
     */
    protected $metaDescription;

    /**
     * @var text
     *
     * @ORM\Column(type="text", name="meta_keyword", nullable=true)
     */
    protected $metaKeyword;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="meta_copyright", length=35, nullable=true)
     */
    protected $metaCopyright;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="meta_author", length=35, nullable=true)
     */
    protected $metaAuthor;

    /**
     * @var string
     *
     * @ORM\Column(type="string",  name="meta_publisher", length=35, nullable=true)
     */
    protected $metaPublisher;

    /**
     * @var string
     *
     * @ORM\Column(type="string",  name="meta_imagelink", length=255, nullable=true)
     */
    protected $metaImagelink;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, name="meta_revisitafter", nullable=true)
     */
    protected $metaRevisitafter;
    
    

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, name="meta_replyto", nullable=true)
     */
    protected $metaReplyto;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, name="meta_robots", nullable=true)
     */
    protected $metaRobots;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, name="meta_rating", nullable=true)
     */
    protected $metaRating;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, name="meta_distribution", nullable=true)
     */
    protected $metaDistribution;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, name="meta_geography", nullable=true)
     */
    protected $metaGeography;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, name="meta_category", nullable=true)
     */
    protected $metaCategory;


    /**
     * Set id
     *
     * @param integer $id
     * @return Infositemetas
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
     * Set metaTitle
     *
     * @param string $metaTitle
     * @return Infositemetas
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    /**
     * Get metaTitle
     *
     * @return string 
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Set langcode
     *
     * @param string $metaContentlanguage
     * @return Infositemetas
     */
    public function setMetaContentlanguage($metaContentlanguage)
    {
        $this->metaContentlanguage = $metaContentlanguage;

        return $this;
    }

    /**
     * Get metaContentlanguage
     *
     * @return string 
     */
    public function getMetaContentlanguage()
    {
        return $this->metaContentlanguage;
    }

    /**
     * Set metaContentype
     *
     * @param string $metaContentype
     * @return Infositemetas
     */
    public function setMetaContentype($metaContentype)
    {
        $this->metaContentype = $metaContentype;

        return $this;
    }

    /**
     * Get metaContentype
     *
     * @return string 
     */
    public function getMetaContentype()
    {
        return $this->metaContentype;
    }

    /**
     * Set metaKeyword
     *
     * @param string $metaKeyword
     * @return Infositemetas
     */
    public function setMetaKeyword($metaKeyword)
    {
        $this->metaKeyword = $metaKeyword;

        return $this;
    }

    /**
     * Get metaKeyword
     *
     * @return string 
     */
    public function getMetaKeyword()
    {
        return $this->metaKeyword;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     * @return Infositemetas
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set metaCopyright
     *
     * @param string $metaCopyright
     * @return Infositemetas
     */
    public function setMetaCopyright($metaCopyright)
    {
        $this->metaCopyright = $metaCopyright;

        return $this;
    }

    /**
     * Get metaCopyright
     *
     * @return string 
     */
    public function getMetaCopyright()
    {
        return $this->metaCopyright;
    }

    /**
     * Set metaAuthor
     *
     * @param string $metaAuthor
     * @return Infositemetas
     */
    public function setMetaAuthor($metaAuthor)
    {
        $this->metaAuthor = $metaAuthor;

        return $this;
    }

    /**
     * Get metaAuthor
     *
     * @return string 
     */
    public function getMetaAuthor()
    {
        return $this->metaAuthor;
    }

    /**
     * Set metaPublisher
     *
     * @param string $metaPublisher
     * @return Infositemetas
     */
    public function setMetaPublisher($metaPublisher)
    {
        $this->metaPublisher = $metaPublisher;

        return $this;
    }

    /**
     * Get metaPublisher
     *
     * @return string 
     */
    public function getMetaPublisher()
    {
        return $this->metaPublisher;
    }
    /**
     * Set metaImagelink
     *
     * @param string $metaImagelink
     * @return Infositemetas
     */
    public function setMetaImagelink($metaImagelink)
    {
        $this->metaImagelink = $metaImagelink;

        return $this;
    }

    /**
     * Get metaImagelink
     *
     * @return string 
     */
    public function getMetaImagelink()
    {
        return $this->metaImagelink;
    }

    /**
     * Set metaReplyto
     *
     * @param string $metaReplyto
     * @return Infositemetas
     */
    public function setMetaReplyto($metaReplyto)
    {
        $this->metaReplyto = $metaReplyto;

        return $this;
    }

    /**
     * Get metaReplyto
     *
     * @return string 
     */
    public function getMetaReplyto()
    {
        return $this->metaReplyto;
    }

    /**
     * Set metaRevisitafter
     *
     * @param string $metaRevisitafter
     * @return Infositemetas
     */
    public function setMetaRevisitafter($metaRevisitafter)
    {
        $this->metaRevisitafter = $metaRevisitafter;

        return $this;
    }

    /**
     * Get metaRevisitafter
     *
     * @return string 
     */
    public function getMetaRevisitafter()
    {
        return $this->metaRevisitafter;
    }

    /**
     * Set metaRobots
     *
     * @param string $metaRobots
     * @return Infositemetas
     */
    public function setMetaRobots($metaRobots)
    {
        $this->metaRobots = $metaRobots;

        return $this;
    }

    /**
     * Get metaRobots
     *
     * @return string 
     */
    public function getMetaRobots()
    {
        return $this->metaRobots;
    }

    /**
     * Set metaRating
     *
     * @param string $metaRating
     * @return Infositemetas
     */
    public function setMetaRating($metaRating)
    {
        $this->metaRating = $metaRating;

        return $this;
    }

    /**
     * Get metaRating
     *
     * @return string 
     */
    public function getMetaRating()
    {
        return $this->metaRating;
    }

    /**
     * Set metaDistribution
     *
     * @param string $metaDistribution
     * @return Infositemetas
     */
    public function setMetaDistribution($metaDistribution)
    {
        $this->metaDistribution = $metaDistribution;

        return $this;
    }

    /**
     * Get metaDistribution
     *
     * @return string 
     */
    public function getMetaDistribution()
    {
        return $this->metaDistribution;
    }

    /**
     * Set metaGeography
     *
     * @param string $metaGeography
     * @return Infositemetas
     */
    public function setMetaGeography($metaGeography)
    {
        $this->metaGeography = $metaGeography;

        return $this;
    }

    /**
     * Get metaGeography
     *
     * @return string 
     */
    public function getMetaGeography()
    {
        return $this->metaGeography;
    }

    /**
     * Set metaCategory
     *
     * @param string $metaCategory
     * @return Infositemetas
     */
    public function setMetaCategory($metaCategory)
    {
        $this->metaCategory = $metaCategory;

        return $this;
    }

    /**
     * Get metaCategory
     *
     * @return string 
     */
    public function getMetaCategory()
    {
        return $this->metaCategory;
    }
    
    


}

