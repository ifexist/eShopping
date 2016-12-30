<?php
namespace Eshop\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Quotation
 *
 * @ORM\Table(name="contact_quotation")
 * @ORM\Entity(repositoryClass="Eshop\ContactBundle\Repository\QuotationRepository")
 * 
 * @ORM\HasLifecycleCallbacks()
 */
class Quotation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="subject", type="string", length=255, nullable=true)
     */
    protected $subject;
    
    /**
     * @ORM\Column(name="title", type="string", length=10, nullable=true)
     */
    protected $title; 

    /**
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    protected $firstname;

    /**
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    protected $lastname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="namets", type="string", length=150, nullable=true)
     */
    private $namets; 
    
    /**
     * @ORM\Column(name="zipcode", type="string", length=35, nullable=true)
     */
    private $zipcode;  
    
    /**
     * @ORM\Column(name="city", type="string", length=100, nullable=true)
     */
    private $city; 
    
    /**
     * @ORM\Column(name="region", type="string", length=100, nullable=true)
     */
    private $region;
    
    /**
     * @ORM\Column(name="country", type="string", length=100, nullable=true)
     */
    private $country; 

    /**
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    protected $email;

    /**
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    protected $phone;

    
    /**
     * @ORM\Column(name="typesite", type="string", length=25, nullable=true)
     */
    protected $typesite; 

    /**
     * @ORM\Column(name="project", type="text", nullable=true)
     */
    protected $project;

    /**
     * @ORM\Column(name="budget", type="string", length=255, nullable=true)
     */
    protected $budget;

    /**
     * @ORM\Column(name="currency", type="string", length=5, nullable=true)
     */
    private $currency;

    /**
     * @ORM\Column(name="lang", type="string", length=5, nullable=true)
     */
    private $lang;


    /**
     * @ORM\Column(name="web", type="string", length=255, nullable=true)
     */
    protected $web;


    /**
     * @ORM\Column(name="webmodel", type="string", length=255, nullable=true)
     */
    protected $webmodel;


    /**
     * @ORM\Column(name="captcha", type="string", length=15, nullable=true)
     */
    protected $captcha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    protected $createdAt;
    

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }
    

    /**
     * Set id
     *
     * @param integer $id
     * @return Quotation
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
     * Set subject
     *
     * @param string $subject
     * @return Quotation
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }
    

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * Set firstname
     *
     * @param string $firstname
     * @return Quotation
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Quotation
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set namets
     *
     * @param string $namets
     * @return Quotation
     */
    public function setNamets($namets)
    {
        $this->namets = $namets;

        return $this;
    }

    /**
     * Get namets
     *
     * @return string 
     */
    public function getNamets()
    {
        return $this->namets;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * Get zipcode
     *
     * @return string 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }
    
    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * Set region
     *
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }
    
    /**
     * Set country
     *
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Quotation
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Quotation
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Set typesite
     *
     * @param string $typesite
     */
    public function setTypesite($typesite)
    {
        $this->typesite = $typesite;
    }

    /**
     * Get typesite
     *
     * @return string 
     */
    public function getTypesite()
    {
        return $this->typesite;
    }

    /**
     * Set project
     *
     * @param string $project
     * @return Quotation
     */
    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return string 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set budget
     *
     * @param string $budget
     * @return Quotation
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return string 
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return Quotation
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }
    /**
     * 
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set lang
     *
     * @param string $lang
     * @return Quotation
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }
    /**
     * 
     * Get lang
     *
     * @return string 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set web
     *
     * @param string $web
     * @return Quotation
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }
    /**
     * 
     * Get web
     *
     * @return string 
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set webmodel
     *
     * @param string $webmodel
     * @return Quotation
     */
    public function setWebmodel($webmodel)
    {
        $this->webmodel = $webmodel;

        return $this;
    }
    /**
     * 
     * Get webmodel
     *
     * @return string 
     */
    public function getWebmodel()
    {
        return $this->webmodel;
    }

    /**
     * Set captcha
     *
     * @param string $captcha
     */
    function setCaptcha($captcha) {
        $this->captcha = $captcha;
    }

    /**
     * Get captcha
     *
     * @return string 
     */
    function getCaptcha() {
        return $this->captcha;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Quotation
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }



}