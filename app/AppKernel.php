<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Liip\ImagineBundle\LiipImagineBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Knp\Bundle\TimeBundle\KnpTimeBundle(),
            new Oneup\UploaderBundle\OneupUploaderBundle(),
            new Presta\SitemapBundle\PrestaSitemapBundle(),
            new HappyR\Google\ApiBundle\HappyRGoogleApiBundle(),
            new Cocur\Slugify\Bridge\Symfony\CocurSlugifyBundle(),
            new Debril\RssAtomBundle\DebrilRssAtomBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Genemu\Bundle\FormBundle\GenemuFormBundle(),
            new JMS\I18nRoutingBundle\JMSI18nRoutingBundle(),
            new JMS\TranslationBundle\JMSTranslationBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new Stfalcon\Bundle\TinymceBundle\StfalconTinymceBundle(),
            new Usn\NewsletterBundle\UsnNewsletterBundle(),
            new Eko\GoogleTranslateBundle\EkoGoogleTranslateBundle(),
            new Sg\DatatablesBundle\SgDatatablesBundle(),
            new Lexik\Bundle\TranslationBundle\LexikTranslationBundle(),
            //new Eko\FeedBundle\EkoFeedBundle(),
            //new WebConsul\EbayApiBundle\WebConsulEbayApiBundle(),
            
            new AppBundle\AppBundle(),
            new Eshop\AdminBundle\AdminBundle(),
            new Eshop\ShopBundle\ShopBundle(),
            new Eshop\UserBundle\UserBundle(),
            new Eshop\ContactBundle\ContactBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
