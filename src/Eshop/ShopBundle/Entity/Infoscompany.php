<?php

namespace Eshop\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="infos_company")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\InfoscompanyRepository")
 */
class Infoscompany
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
     * @ORM\Column(name="namets", type="string", length=150, nullable=true)
     */
    private $namets;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=250, nullable=true)
     */
    private $email;
       
    
    /**
     * @ORM\Column(name="phone", type="string", length=25, nullable=true)
     */
    protected $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="register", type="string", length=150, nullable=true)
     */
    private $register;
    
    /**
     * @ORM\Column(name="street_number", type="string", length=25, nullable=true)
     */
    private $streetnum;
    
    /**
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;  
    
    /**
     * @ORM\Column(name="zipcode", type="string", length=35, nullable=true)
     */
    private $zipcode;  
       
    
    /**
     * @ORM\Column(name="city", type="string", length=100, nullable=true)
     */
    private $city; 
       
    
    /**
     * @ORM\Column(name="department", type="string", length=100, nullable=true)
     */
    private $department; 
       
    
    /**
     * @ORM\Column(name="region", type="string", length=100, nullable=true)
     */
    private $region;
       
    
    /**
     * @var string $latitude
     * 
     * @ORM\Column(name="latitude", type="string", length=120, nullable=true)
     */
    private $latitude;
       
    
    /**
     * @var string $longitude
     * 
     * @ORM\Column(name="longitude", type="string", length=120, nullable=true)
     */
    private $longitude; 

    /**
     * @var string
     *
     * @ORM\Column(name="vat", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $vat; 
    
    /**
     * @var string $country
     * 
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content; 

    /**
     * @ORM\ManyToOne(targetEntity="Currency", inversedBy="infos_company")
     * @ORM\JoinColumn(name="currency_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $currencycode;

    /**
     * @ORM\ManyToOne(targetEntity="Langs", inversedBy="infos_company")
     * @ORM\JoinColumn(name="lancode_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $langcode;

    /**
     * @ORM\ManyToOne(targetEntity="GProductcat1en", inversedBy="infos_company")
     * @ORM\JoinColumn(name="prodtype_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $prodtype;

    /**
     * @ORM\ManyToOne(targetEntity="Activity", inversedBy="infos_company")
     * @ORM\JoinColumn(name="activity_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $activity;
    

    public function __toString() {
        //return $this->name;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Infoscompany
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set namets
     *
     * @param string $namets
     * @return Infoscompany
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
    
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    function getPhone() {
        return $this->phone;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    /**
     * Set register
     *
     * @param string $register
     * @return Infoscompany
     */
    public function setRegister($register)
    {
        $this->register = $register;

        return $this;
    }

    /**
     * Get register
     *
     * @return string 
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * Set streetnum
     *
     * @param string $streetnum
     */
    public function setStreetnum($streetnum)
    {
        $this->streetnum = $streetnum;
    }

    /**
     * Get streetnum
     *
     * @return string 
     */
    public function getStreetnum()
    {
        return $this->streetnum;
    }

    /**
     * Set address
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
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
     * Set department
     *
     * @param string $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    /**
     * Get department
     *
     * @return string 
     */
    public function getDepartment()
    {
        return $this->department;
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
        
    function getLatitude() {
        return $this->latitude;
    }

    function getLongitude() {
        return $this->longitude;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    function setLongitude($longitude) {
        $this->longitude = $longitude;
    }
    
    /**
     * Set vat
     *
     * @param string $vat
     * 
     */
    public function setVat($vat)
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * Get vat
     *
     * @return string 
     */
    public function getVat()
    {
        return $this->vat;
    } 
    
    /**
     * Set country
     *
     * @param string $country
     * 
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
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
     * Set content
     *
     * @param string $content
     * @return Infoscompany
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
    

    /**
     * Set langcode
     *
     * @param \Eshop\ShopBundle\Entity\Langs $langcode
     * @return Infoscompany
     */
    public function setLangcode(\Eshop\ShopBundle\Entity\Langs $langcode = null)
    {
        $this->langcode = $langcode;

        return $this;
    }

    /**
     * Get langcode
     *
     * @return \Eshop\ShopBundle\Entity\Langs
     */
    public function getLangcode()
    {
        return $this->langcode;
    }

    /**
     * Set currencycode
     *
     * @param \Eshop\ShopBundle\Entity\Currency $currencycode
     * @return Infoscompany
     */
    public function setCurrencycode(\Eshop\ShopBundle\Entity\Currency $currencycode = null)
    {
        $this->currencycode = $currencycode;

        return $this;
    }

    /**
     * Get currencycode
     *
     * @return \Eshop\ShopBundle\Entity\Currency
     */
    public function getCurrencycode()
    {
        return $this->currencycode;
    }  

    /**
     * Set prodtype
     *
     * @param \Eshop\ShopBundle\Entity\GProductcat1en $prodtype
     * @return Infoscompany
     */
    public function setProdtype(\Eshop\ShopBundle\Entity\GProductcat1en $prodtype = null)
    {
        $this->prodtype = $prodtype;

        return $this;
    }

    /**
     * Get prodtype
     *
     * @return \Eshop\ShopBundle\Entity\GProductcat1en
     */
    public function getProdtype()
    {
        return $this->prodtype;
    }  

    /**
     * Set activity
     *
     * @param \Eshop\ShopBundle\Entity\Activity $activity
     * @return Infoscompany
     */
    public function setActivity(\Eshop\ShopBundle\Entity\Activity $activity = null)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return \Eshop\ShopBundle\Entity\Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }
    
}
