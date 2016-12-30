<?php

namespace Eshop\ShopBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\ProductRepository")
 * @UniqueEntity("slug"),
 *     errorPath="slug",
 *     message="This slug is already in use."
 * @ORM\HasLifecycleCallbacks()
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=45)
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="prodkey", type="string", length=45)
     */
    private $prodkey;

    /**
     * @var string
     * 
     * @Gedmo\Slug(fields={"name"})
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false, unique=true)
     */

    private $slug;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @var string $existin1
     *
     * @ORM\Column(name="existin1", type="string", length=350, nullable=true)
     */
    private $existin1;
    
    /**
     * @var string $existin2
     *
     * @ORM\Column(name="existin2", type="string", length=350, nullable=true)
     */
    private $existin2;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="delivery", type="boolean", length=1)
     */
    private $delivery;

    /**
     * @var float
     *
     * @ORM\Column(name="oldprice", type="float")
     */
    private $oldprice;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="deliveryprice", type="float")
     */
    private $deliveryprice = '0';

    /**
     * @ORM\ManyToOne(targetEntity="Currency", inversedBy="products")
     * @ORM\JoinColumn(name="currency_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_keys", type="text", nullable=true)
     */
    private $metaKeys;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="text", nullable=true)
     */
    private $metaDescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_updated", type="datetime")
     */
    private $dateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Must be at least {{ limit }}",
     * )
     */
    private $quantity;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=false)
     */
    private $deleted;

    /**
     * @var integer
     *
     * @ORM\Column(name="measure_quantity", type="integer", nullable=true)
     * @Assert\Range(
     *      min = 0,
     *      minMessage = "Must be at least {{ limit }}",
     * )
     */
    private $measureQuantity;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="Manufacturer", inversedBy="products")
     * @ORM\JoinColumn(name="manufacturer_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $manufacturer;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="product", cascade={"remove"})
     **/
    private $images;

    /**
     * @ORM\OneToMany(targetEntity="OrderProduct", mappedBy="product")
     **/
    private $productOrders;

    /**
     * @ORM\ManyToOne(targetEntity="Measure", inversedBy="products")
     * @ORM\JoinColumn(name="measure_id", referencedColumnName="id")
     **/
    private $measure;

    /**
     * @ORM\OneToMany(targetEntity="Favourites", mappedBy="product")
     **/
    private $favourites;

    /**
     * @ORM\OneToOne(targetEntity="Featured", mappedBy="product")
     */
    private $featured;

    public function __construct()
    {
        $this->dateCreated = new \DateTime();
        $this->dateUpdated = $this->dateCreated;
        $this->productOrders = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->favourites = new ArrayCollection();
        $this->quantity = 1;
        $this->deleted = false;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Called before saving the entity
     *
     * @ORM\PreUpdate()
     */
    public function preUpdate()
    {
        $this->dateUpdated = new \DateTime();
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
     * Set prodkey
     *
     * @param text $prodkey
     * @return Product
     */
    public function setProdkey($prodkey)
    {
        $this->prodkey = $prodkey;

        return $this;
    }

    /**
     * Get prodkey
     *
     * @return text 
     */
    public function getProdkey()
    {
        return $this->prodkey;
    }

    /**
     * Set ref
     *
     * @param text $ref
     * @return Product
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return text 
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
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
     * Set existin1
     *
     * @param string $existin1
     * @return Product
     */
    public function setExistin1($existin1)
    {
        $this->existin1 = $existin1;

        return $this;
    }

    /**
     * Get existin1
     *
     * @return string
     */
    public function getExistin1()
    {
        return $this->existin1;
    }

    /**
     * Set existin2
     *
     * @param string $existin2
     * @return Product
     */
    public function setExistin2($existin2)
    {
        $this->existin2 = $existin2;

        return $this;
    }

    /**
     * Get existin2
     *
     * @return string
     */
    public function getExistin2()
    {
        return $this->existin2;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set delivery
     *
     * @param boolean $delivery
     * @return Countries
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * Get delivery
     *
     * @return boolean 
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Set oldprice
     *
     * @param float $oldprice
     * @return Product
     */
    public function setOldprice($oldprice)
    {
        $this->oldprice = $oldprice;

        return $this;
    }

    /**
     * Get oldprice
     *
     * @return float
     */
    public function getOldprice()
    {
        return $this->oldprice;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set deliveryprice
     *
     * @param float $deliveryprice
     * @return Product
     */
    public function setDeliveryprice($deliveryprice)
    {
        $this->deliveryprice = $deliveryprice;

        return $this;
    }

    /**
     * Get deliveryprice
     *
     * @return float
     */
    public function getDeliveryprice()
    {
        return $this->deliveryprice;
    }

    /**
     * Set category
     *
     * @param \Eshop\ShopBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\Eshop\ShopBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Eshop\ShopBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set currency
     *
     * @param \Eshop\ShopBundle\Entity\Currency $currency
     * @return Product
     */
    public function setCurrency(\Eshop\ShopBundle\Entity\Currency $currency = null)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return \Eshop\ShopBundle\Entity\Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set manufacturer
     *
     * @param \Eshop\ShopBundle\Entity\Manufacturer $manufacturer
     * @return Product
     */
    public function setManufacturer(\Eshop\ShopBundle\Entity\Manufacturer $manufacturer = null)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return \Eshop\ShopBundle\Entity\Manufacturer
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Add images
     *
     * @param \Eshop\ShopBundle\Entity\Image $images
     * @return Product
     */
    public function addImage(\Eshop\ShopBundle\Entity\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \Eshop\ShopBundle\Entity\Image $images
     */
    public function removeImage(\Eshop\ShopBundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Add productOrders
     *
     * @param \Eshop\ShopBundle\Entity\OrderProduct $productOrders
     * @return Product
     */
    public function addProductOrder(\Eshop\ShopBundle\Entity\OrderProduct $productOrders)
    {
        $this->productOrders[] = $productOrders;

        return $this;
    }

    /**
     * Remove productOrders
     *
     * @param \Eshop\ShopBundle\Entity\OrderProduct $productOrders
     */
    public function removeProductOrder(\Eshop\ShopBundle\Entity\OrderProduct $productOrders)
    {
        $this->productOrders->removeElement($productOrders);
    }

    /**
     * Get productOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductOrders()
    {
        return $this->productOrders;
    }

    /**
     * Set metaKeys
     *
     * @param string $metaKeys
     * @return Product
     */
    public function setMetaKeys($metaKeys)
    {
        $this->metaKeys = $metaKeys;

        return $this;
    }

    /**
     * Get metaKeys
     *
     * @return string
     */
    public function getMetaKeys()
    {
        return $this->metaKeys;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     * @return Product
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
     * Set quantity
     *
     * @param integer $quantity
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set measureQuantity
     *
     * @param integer $measureQuantity
     * @return Product
     */
    public function setMeasureQuantity($measureQuantity)
    {
        $this->measureQuantity = $measureQuantity;

        return $this;
    }

    /**
     * Get measureQuantity
     *
     * @return integer
     */
    public function getMeasureQuantity()
    {
        return $this->measureQuantity;
    }

    /**
     * Set measure
     *
     * @param \Eshop\ShopBundle\Entity\Measure $measure
     * @return Product
     */
    public function setMeasure(\Eshop\ShopBundle\Entity\Measure $measure = null)
    {
        $this->measure = $measure;

        return $this;
    }

    /**
     * Get measure
     *
     * @return \Eshop\ShopBundle\Entity\Measure
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Product
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Product
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     * @return Product
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime 
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * Add favourites
     *
     * @param \Eshop\ShopBundle\Entity\Favourites $favourites
     * @return Product
     */
    public function addFavourite(\Eshop\ShopBundle\Entity\Favourites $favourites)
    {
        $this->favourites[] = $favourites;

        return $this;
    }

    /**
     * Remove favourites
     *
     * @param \Eshop\ShopBundle\Entity\Favourites $favourites
     */
    public function removeFavourite(\Eshop\ShopBundle\Entity\Favourites $favourites)
    {
        $this->favourites->removeElement($favourites);
    }

    /**
     * Get favourites
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFavourites()
    {
        return $this->favourites;
    }

    /**
     * Set featured
     *
     * @param \Eshop\ShopBundle\Entity\Featured $featured
     * @return Product
     */
    public function setFeatured(\Eshop\ShopBundle\Entity\Featured $featured = null)
    {
        $this->featured = $featured;

        return $this;
    }

    /**
     * Get featured
     *
     * @return \Eshop\ShopBundle\Entity\Featured 
     */
    public function getFeatured()
    {
        return $this->featured;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     * @return Product
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
}
