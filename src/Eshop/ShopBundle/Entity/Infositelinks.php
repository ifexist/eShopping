<?php

namespace Eshop\ShopBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="infos_site_links")
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\InfositelinksRepository")
 */
class Infositelinks
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    

    /**
     * @var integer mediatitle1
     *
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $mediatitle1;

    /**
     * @var integer mediatitle2
     *
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $mediatitle2;

    /**
     * @var integer mediatitle3
     *
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $mediatitle3;

    /**
     * @var integer mediatitle4
     *
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $mediatitle4;

    /**
     * @var integer mediatitle5
     *
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $mediatitle5;

    /**
     * @var integer mediatitle6
     *
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $mediatitle6;

    /**
     * @var integer mediatitle7
     *
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $mediatitle7;

    /**
     * @var integer mediatitle8
     *
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $mediatitle8;

    /**
     * @var integer mediatitle9
     *
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $mediatitle9;

    /**
     * @var integer mediatitle10
     *
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $mediatitle10;
    
    /**
     * @var string $medialink1
     *
     * @ORM\Column(name="medialink1", type="string", length=255, nullable=true)
     */
    private $medialink1;
    
    /**
     * @var string $medialink2
     *
     * @ORM\Column(name="medialink2", type="string", length=255, nullable=true)
     */
    private $medialink2;
    
    /**
     * @var string $medialink3
     *
     * @ORM\Column(name="medialink3", type="string", length=255, nullable=true)
     */
    private $medialink3;
    
    
    /**
     * @var string $medialink4
     *
     * @ORM\Column(name="medialink4", type="string", length=255, nullable=true)
     */
    private $medialink4;
    
    /**
     * @var string $medialink5
     *
     * @ORM\Column(name="medialink5", type="string", length=255, nullable=true)
     */
    private $medialink5;
    
    /**
     * @var string $medialink6
     *
     * @ORM\Column(name="medialink6", type="string", length=255, nullable=true)
     */
    private $medialink6;
    
    /**
     * @var string $medialink7
     *
     * @ORM\Column(name="medialink7", type="string", length=255, nullable=true)
     */
    private $medialink7;
    
    /**
     * @var string $medialink8
     *
     * @ORM\Column(name="medialink8", type="string", length=255, nullable=true)
     */
    private $medialink8;
    
    /**
     * @var string $medialink9
     *
     * @ORM\Column(name="medialink9", type="string", length=255, nullable=true)
     */
    private $medialink9;
    
    /**
     * @var string $medialink10
     *
     * @ORM\Column(name="medialink10", type="string", length=255, nullable=true)
     */
    private $medialink10;
    
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
     * Get weblink
     *
     * @return string 
     */
    public function getWeblink() {
        return $this->weblink;
    }

    /**
     * Set weblink
     *
     * @param string $weblink
     */
    public function setWeblink($weblink) {
        $this->weblink = $weblink;
    }
    
    function getMediatitle1() {
        return $this->mediatitle1;
    }

    function getMediatitle2() {
        return $this->mediatitle2;
    }

    function getMediatitle3() {
        return $this->mediatitle3;
    }

    function getMedialink1() {
        return $this->medialink1;
    }

    function getMedialink2() {
        return $this->medialink2;
    }

    function getMedialink3() {
        return $this->medialink3;
    }

    function setMediatitle1($mediatitle1) {
        $this->mediatitle1 = $mediatitle1;
    }

    function setMediatitle2($mediatitle2) {
        $this->mediatitle2 = $mediatitle2;
    }

    function setMediatitle3($mediatitle3) {
        $this->mediatitle3 = $mediatitle3;
    }

    function setMedialink1($medialink1) {
        $this->medialink1 = $medialink1;
    }

    function setMedialink2($medialink2) {
        $this->medialink2 = $medialink2;
    }

    function setMedialink3($medialink3) {
        $this->medialink3 = $medialink3;
    }


    function getMediatitle4() {
        return $this->mediatitle4;
    }

    function getMediatitle5() {
        return $this->mediatitle5;
    }

    function getMediatitle6() {
        return $this->mediatitle6;
    }

    function getMedialink4() {
        return $this->medialink4;
    }

    function getMedialink5() {
        return $this->medialink5;
    }

    function getMedialink6() {
        return $this->medialink6;
    }

    function setMediatitle4($mediatitle4) {
        $this->mediatitle4 = $mediatitle4;
    }

    function setMediatitle5($mediatitle5) {
        $this->mediatitle5 = $mediatitle5;
    }

    function setMediatitle6($mediatitle6) {
        $this->mediatitle6 = $mediatitle6;
    }

    function setMedialink4($medialink4) {
        $this->medialink4 = $medialink4;
    }

    function setMedialink5($medialink5) {
        $this->medialink5 = $medialink5;
    }

    function setMedialink6($medialink6) {
        $this->medialink6 = $medialink6;
    }

    function getMedialink7() {
        return $this->medialink7;
    }

    function setMedialink7($medialink7) {
        $this->medialink7 = $medialink7;
    }

    function getMediatitle7() {
        return $this->mediatitle7;
    }

    function setMediatitle7($mediatitle7) {
        $this->mediatitle7 = $mediatitle7;
    }
    
    function getMediatitle8() {
        return $this->mediatitle8;
    }

    function getMediatitle9() {
        return $this->mediatitle9;
    }

    function getMediatitle10() {
        return $this->mediatitle10;
    }

    function getMedialink8() {
        return $this->medialink8;
    }

    function getMedialink9() {
        return $this->medialink9;
    }

    function getMedialink10() {
        return $this->medialink10;
    }

    function setMediatitle8($mediatitle8) {
        $this->mediatitle8 = $mediatitle8;
    }

    function setMediatitle9($mediatitle9) {
        $this->mediatitle9 = $mediatitle9;
    }

    function setMediatitle10($mediatitle10) {
        $this->mediatitle10 = $mediatitle10;
    }

    function setMedialink8($medialink8) {
        $this->medialink8 = $medialink8;
    }

    function setMedialink9($medialink9) {
        $this->medialink9 = $medialink9;
    }

    function setMedialink10($medialink10) {
        $this->medialink10 = $medialink10;
    }



    
}
