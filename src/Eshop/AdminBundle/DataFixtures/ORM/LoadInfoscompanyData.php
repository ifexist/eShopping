<?php
namespace Eshop\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Eshop\ShopBundle\Entity\Infoscompany;

class LoadInfoscompanyData implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {     
        $infoscompany = new Infoscompany();
            $infoscompany->setId(1);
            $infoscompany->setNamets('Name of company');
            $infoscompany->setActivity('8211Z');
            $infoscompany->setEmail('example@sitename.com');
            $infoscompany->setPhone('123456789');
            $infoscompany->setRegister('554kkujh68954');
            $infoscompany->setAddress('1 Pastor Avenu');
            $infoscompany->setzipcode('55246p');
            $infoscompany->setCity('My City');
            $infoscompany->setDepartment('My County');
            $infoscompany->setRegion('New State');
            $infoscompany->setLatitude('11');
            $infoscompany->setLongitude('11');
            $infoscompany->setVat('15,4');
            $infoscompany->setCurrencycode('USD');
            $infoscompany->setCountry('USA');
            $infoscompany->setLangcode('EN');
            $infoscompany->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. One more time!
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.');
            $manager->persist($infoscompany);

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}