<?php

namespace Eshop\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="countries")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\CountriesRepository")
 */
class Countries
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
    private $enable = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="countryCode", type="string", length=2, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="countryName", type="string", length=45, nullable=false)
     */
    private $countryname;

    /**
     * @var string
     *
     * @ORM\Column(name="currencyCode", type="string", length=3, nullable=true)
     */
    private $currencycode;

    /**
     * @var string
     *
     * @ORM\Column(name="population", type="string", length=20, nullable=true)
     */
    private $population;

    /**
     * @var string
     *
     * @ORM\Column(name="fipsCode", type="string", length=2, nullable=true)
     */
    private $fipscode;

    /**
     * @var string
     *
     * @ORM\Column(name="isoNumeric", type="string", length=4, nullable=true)
     */
    private $isonumeric;

    /**
     * @var string
     *
     * @ORM\Column(name="north", type="string", length=30, nullable=true)
     */
    private $north;

    /**
     * @var string
     *
     * @ORM\Column(name="south", type="string", length=30, nullable=true)
     */
    private $south;

    /**
     * @var string
     *
     * @ORM\Column(name="east", type="string", length=30, nullable=true)
     */
    private $east;

    /**
     * @var string
     *
     * @ORM\Column(name="west", type="string", length=30, nullable=true)
     */
    private $west;

    /**
     * @var string
     *
     * @ORM\Column(name="capital", type="string", length=30, nullable=true)
     */
    private $capital;

    /**
     * @var string
     *
     * @ORM\Column(name="continentName", type="string", length=15, nullable=true)
     */
    private $continentname;

    /**
     * @var string
     *
     * @ORM\Column(name="continent", type="string", length=2, nullable=true)
     */
    private $continent;

    /**
     * @var string
     *
     * @ORM\Column(name="areaInSqKm", type="string", length=20, nullable=true)
     */
    private $areainsqkm;

    /**
     * @var string
     *
     * @ORM\Column(name="languages", type="string", length=30, nullable=true)
     */
    private $languages;

    /**
     * @var string
     *
     * @ORM\Column(name="isoAlpha3", type="string", length=3, nullable=true)
     */
    private $isoalpha3;

    /**
     * @var integer
     *
     * @ORM\Column(name="geonameId", type="integer", nullable=true)
     */
    private $geonameid;



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
     * @return Countries
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
     * Set country
     *
     * @param string $country
     * @return Countries
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
     * Set countryname
     *
     * @param string $countryname
     * @return Countries
     */
    public function setCountryname($countryname)
    {
        $this->countryname = $countryname;

        return $this;
    }

    /**
     * Get countryname
     *
     * @return string 
     */
    public function getCountryname()
    {
        return $this->countryname;
    }

    /**
     * Set currencycode
     *
     * @param string $currencycode
     * @return Countries
     */
    public function setCurrencycode($currencycode)
    {
        $this->currencycode = $currencycode;

        return $this;
    }

    /**
     * Get currencycode
     *
     * @return string 
     */
    public function getCurrencycode()
    {
        return $this->currencycode;
    }

    /**
     * Set population
     *
     * @param string $population
     * @return Countries
     */
    public function setPopulation($population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * Get population
     *
     * @return string 
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set fipscode
     *
     * @param string $fipscode
     * @return Countries
     */
    public function setFipscode($fipscode)
    {
        $this->fipscode = $fipscode;

        return $this;
    }

    /**
     * Get fipscode
     *
     * @return string 
     */
    public function getFipscode()
    {
        return $this->fipscode;
    }

    /**
     * Set isonumeric
     *
     * @param string $isonumeric
     * @return Countries
     */
    public function setIsonumeric($isonumeric)
    {
        $this->isonumeric = $isonumeric;

        return $this;
    }

    /**
     * Get isonumeric
     *
     * @return string 
     */
    public function getIsonumeric()
    {
        return $this->isonumeric;
    }

    /**
     * Set north
     *
     * @param string $north
     * @return Countries
     */
    public function setNorth($north)
    {
        $this->north = $north;

        return $this;
    }

    /**
     * Get north
     *
     * @return string 
     */
    public function getNorth()
    {
        return $this->north;
    }

    /**
     * Set south
     *
     * @param string $south
     * @return Countries
     */
    public function setSouth($south)
    {
        $this->south = $south;

        return $this;
    }

    /**
     * Get south
     *
     * @return string 
     */
    public function getSouth()
    {
        return $this->south;
    }

    /**
     * Set east
     *
     * @param string $east
     * @return Countries
     */
    public function setEast($east)
    {
        $this->east = $east;

        return $this;
    }

    /**
     * Get east
     *
     * @return string 
     */
    public function getEast()
    {
        return $this->east;
    }

    /**
     * Set west
     *
     * @param string $west
     * @return Countries
     */
    public function setWest($west)
    {
        $this->west = $west;

        return $this;
    }

    /**
     * Get west
     *
     * @return string 
     */
    public function getWest()
    {
        return $this->west;
    }

    /**
     * Set capital
     *
     * @param string $capital
     * @return Countries
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get capital
     *
     * @return string 
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set continentname
     *
     * @param string $continentname
     * @return Countries
     */
    public function setContinentname($continentname)
    {
        $this->continentname = $continentname;

        return $this;
    }

    /**
     * Get continentname
     *
     * @return string 
     */
    public function getContinentname()
    {
        return $this->continentname;
    }

    /**
     * Set continent
     *
     * @param string $continent
     * @return Countries
     */
    public function setContinent($continent)
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * Get continent
     *
     * @return string 
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * Set areainsqkm
     *
     * @param string $areainsqkm
     * @return Countries
     */
    public function setAreainsqkm($areainsqkm)
    {
        $this->areainsqkm = $areainsqkm;

        return $this;
    }

    /**
     * Get areainsqkm
     *
     * @return string 
     */
    public function getAreainsqkm()
    {
        return $this->areainsqkm;
    }

    /**
     * Set languages
     *
     * @param string $languages
     * @return Countries
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * Get languages
     *
     * @return string 
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set isoalpha3
     *
     * @param string $isoalpha3
     * @return Countries
     */
    public function setIsoalpha3($isoalpha3)
    {
        $this->isoalpha3 = $isoalpha3;

        return $this;
    }

    /**
     * Get isoalpha3
     *
     * @return string 
     */
    public function getIsoalpha3()
    {
        return $this->isoalpha3;
    }

    /**
     * Set geonameid
     *
     * @param integer $geonameid
     * @return Countries
     */
    public function setGeonameid($geonameid)
    {
        $this->geonameid = $geonameid;

        return $this;
    }

    /**
     * Get geonameid
     *
     * @return integer 
     */
    public function getGeonameid()
    {
        return $this->geonameid;
    }
}
