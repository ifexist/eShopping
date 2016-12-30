<?php
namespace Eshop\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailData
 *
 * @ORM\Table(name="mailing_list")
 * 
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\EmailDataRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class EmailData
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    protected $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enable", type="boolean", nullable=true)
     */
    private $enable;
    

    /**
     * @var datetime $date
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="typecompte", type="boolean", nullable=true)
     */
    private $typecompte;
    
    /**
     * @var string $namets
     *
     * @ORM\Column(name="namets", type="string", length=255, nullable=true)
     */
    private $namets;

    /**
     * @var string activity
     *
     * @ORM\Column(name="activity", type="string", length=150, nullable=true)
     */
    private $activity;

    /**
     * @var string typactivity
     *
     * @ORM\Column(name="typactivity", type="string", length=150, nullable=true)
     */
    private $typactivity;

    /**
     * @var string sector
     *
     * @ORM\Column(name="sector", type="string", length=150, nullable=true)
     */
    private $sector;
    
    /**
     * @ORM\Column(name="gender", type="string", length=20, nullable=true)
     */
    protected $gender; 
    
    /**
     * @ORM\Column(name="firstname", type="string", length=150, nullable=true)
     */
    protected $firstname; 
    
    /**
     * @ORM\Column(name="lastname", type="string", length=150, nullable=true)
     */
    protected $lastname; 
    
    /**
     * @ORM\Column(name="zipcode", type="string", length=35, nullable=true)
     */
    private $zipcode;  
    
    /**
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address; 
       
    
    /**
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;
       
    
    /**
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;
       
    
    /**
     * @ORM\Column(name="phone", type="string", length=35, nullable=true)
     */
    protected $phone;
       
    
    /**
     * @ORM\Column(name="mobile", type="string", length=35, nullable=true)
     */
    protected $mobile;
       
    
    /**
     * @ORM\Column(name="fax", type="string", length=35, nullable=true)
     */
    protected $fax;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=TRUE)
     */
    private $email;
    
    /**
     * @ORM\Column(name="web", type="string", length=255, nullable=true)
     */
    protected $web;


    /**
     * @ORM\ManyToOne(targetEntity="Langs", inversedBy="EmailData")
     * @ORM\JoinColumn(name="lang_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $lang;



    
    public function __construct()
    {
        $this->setDate(new \DateTime());
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
     * Set enable
     *
     * @param boolean $enable
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
     * Set date
     *
     * @param datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set typecompte
     *
     * @param boolean $typecompte
     */
    public function setTypecompte($typecompte)
    {
        $this->typecompte = $typecompte;
    }
   
    
    /**
     * Get typecompte
     *
     * @return boolean 
     */
    public function getTypecompte()
    {
        return $this->typecompte;
    }

    /**
     * Set namets
     *
     * @param string $namets
     */
    public function setNamets($namets)
    {
        $this->namets = $namets;
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
     * Set activity
     *
     * @param string $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
    }
    
    /**
     * Get activity
     *
     * @return string 
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Set typactivity
     *
     * @param string $typactivity
     */
    public function setTypactivity($typactivity)
    {
        $this->typactivity = $typactivity;
    }
   
    
    /**
     * Get typactivity
     *
     * @return string 
     */
    public function getTypactivity()
    {
        return $this->typactivity;
    }

    /**
     * Set sector
     *
     * @param string $sector
     */
    public function setSector($sector)
    {
        $this->sector = $sector;
    }
   
    
    /**
     * Get sector
     *
     * @return string 
     */
    public function getSector()
    {
        return $this->sector;
    }

    /**
     * Set gender
     *
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
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
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
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
     * Set phone
     *
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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
     * Set mobile
     *
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set fax
     *
     * @param string $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * Set web
     *
     * @param string $web
     */
    public function setWeb($web)
    {
        $this->web = $web;
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

    public function getZipcode() {
        return $this->zipcode;
    }

    public function setZipcode($zipcode) {
        $this->zipcode = $zipcode;
    }
    
    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

            
    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }
    
    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

        
    /**
     * Get latitude
     *
     * @return decimal 
     */
    public function getLatitude() {
        return $this->latitude;
    }
    
    /**
     * Get longitude
     *
     * @return decimal 
     */
    public function getLongitude() {
        return $this->longitude;
    }
    
    /**
     * Set latitude
     *
     * @param string $latitude
     */
    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }
    
    /**
     * Set longitude
     *
     * @param string $longitude
     */
    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    /**
     * Set lang
     *
     * @param \Eshop\ShopBundle\Entity\Langs $lang
     * @return EmailData
     */
    public function setLang(\Eshop\ShopBundle\Entity\Langs $lang = null)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return \Eshop\ShopBundle\Entity\Langs
     */
    public function getLang()
    {
        return $this->lang;
    }
    
}
