<?php
namespace Eshop\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailTemplate
 *
 * @ORM\Table(name="mailing_template")
 * 
 * @ORM\Entity(repositoryClass="Eshop\ShopBundle\Repository\EmailTemplateRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class EmailTemplate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="template", type="text")
     */
    protected $template;

    /**
     * @ORM\ManyToOne(targetEntity="Langs", inversedBy="mailing_template")
     * @ORM\JoinColumn(name="lang_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $lang;


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
     * Set title
     *
     * @param string $title
     * @return EmailTemplate
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
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
     * Set lang
     *
     * @param \Eshop\ShopBundle\Entity\Langs $lang
     * @return EmailTemplate
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

    /**
     * Set template
     *
     * @param string $template
     * @return EmailTemplate
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    
        return $this;
    }

    /**
     * Get template
     *
     * @return string 
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Default string value of EmailTemplate is the title
     */
    public function __toString()
    {
        return (string)$this->getTitle();
    }
}
