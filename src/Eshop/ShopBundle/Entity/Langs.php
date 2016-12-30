<?php

namespace Eshop\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="langs")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\LangsRepository")
 */
class Langs
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
     * @ORM\Column(name="code", type="string", length=15, nullable=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=45, nullable=true)
     */
    private $lang;

    /**
     * @var string
     *
     * @ORM\Column(name="langen", type="string", length=45, nullable=true)
     */
    private $langen;

    /**
     * @var string
     *
     * @ORM\Column(name="align", type="string", length=12, nullable=true)
     */
    private $align;



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
     * @return Langs
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
     * Set code
     *
     * @param string $code
     * @return Langs
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
     * Set lang
     *
     * @param string $lang
     * @return Langs
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return string 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set langen
     *
     * @param string $langen
     * @return Langs
     */
    public function setLangen($langen)
    {
        $this->langen = $langen;

        return $this;
    }

    /**
     * Get langen
     *
     * @return string 
     */
    public function getLangen()
    {
        return $this->langen;
    }

    /**
     * Set align
     *
     * @param string $align
     * @return Langs
     */
    public function setAlign($align)
    {
        $this->align = $align;

        return $this;
    }

    /**
     * Get align
     *
     * @return string 
     */
    public function getAlign()
    {
        return $this->align;
    }
}
