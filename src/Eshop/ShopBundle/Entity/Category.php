<?php

namespace Eshop\ShopBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Gedmo\Mapping\Annotation as Gedmo;

use Eshop\ShopBundle\Classes\KeywordGenerator\AutoKeyword;
/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\CategoryRepository")
 * @UniqueEntity("slug"),
 *     errorPath="slug",
 *     message="This slug is already in use."
 * @ORM\HasLifecycleCallbacks()
 */
class Category
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     * 
     *
     * @ORM\Column(name="meta_keys", type="string", length=500, nullable=true)
     */
    private $metaKeys;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="string", length=255, nullable=true)
     */
    private $metaDescription;

    /**
     * @ORM\ManyToOne(targetEntity="Catparent", inversedBy="category")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

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
     * Image path
     *
     * @var string
     *
     * @ORM\Column(type="text", length=255, nullable=true)
     */
    protected $path;

    /**
     * Image file
     *
     * @var File
     *
     * @Assert\File(
     *     maxSize = "5M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *     maxSizeMessage = "The maximum allowed file size is 5MB.",
     *     mimeTypesMessage = "Only the file types image are allowed."
     * )
     */
    protected $file;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     **/
    private $products;

    public function __construct()
    {
        $this->dateCreated = new \DateTime();
        $this->dateUpdated = $this->dateCreated;
        $this->products = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
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
     * Set name
     *
     * @param string $name
     * @return Category
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
     * Set description
     *
     * @param string $description
     * @return Category
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
     * Add products
     *
     * @param \Eshop\ShopBundle\Entity\Product $products
     * @return Category
     */
    public function addProduct(\Eshop\ShopBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Eshop\ShopBundle\Entity\Product $products
     */
    public function removeProduct(\Eshop\ShopBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Called before saving the entity
     *
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename . '.' . $this->file->guessExtension();
        }
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
     * Called before entity removal
     *
     * @ORM\PreRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir() . '/' . $this->path;
    }

    /**
     * Called after entity persistence
     *
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        // The file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }

        // Use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->file->move(
            $this->getUploadRootDir(),
            $this->path
        );

        // Clean up the file property as you won't need it anymore
        $this->file = null;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/images';
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Category
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */

    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     * @return Category
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
     * Set metaKeys
     *
     * @param string $metaKeys
     * @return Category
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

    
    public function addMetaKeys($description) 
    {
        $params['content'] = $description; //page content
        //set the length of keywords you like
        $params['min_word_length'] = 5;  //minimum length of single words
        $params['min_word_occur'] = 2;  //minimum occur of single words

        $params['min_2words_length'] = 3;  //minimum length of words for 2 word phrases
        $params['min_2words_phrase_length'] = 10; //minimum length of 2 word phrases
        $params['min_2words_phrase_occur'] = 2; //minimum occur of 2 words phrase

        $params['min_3words_length'] = 3;  //minimum length of words for 3 word phrases
        $params['min_3words_phrase_length'] = 10; //minimum length of 3 word phrases
        $params['min_3words_phrase_occur'] = 2; //minimum occur of 3 words phrase

        $keyword = new AutoKeyword($params, "iso-8859-1");

        return $keyword->parse_words();
    } 

    /**
     * Set slug
     *
     * @param string $slug
     * @return Category
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
     * Set parent
     *
     * @param \Eshop\ShopBundle\Entity\Catparent $parent
     * @return Category
     */
    public function setParent(\Eshop\ShopBundle\Entity\Catparent $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Eshop\ShopBundle\Entity\Catparent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Category
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
     * @return Category
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
}
