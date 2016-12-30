<?php
namespace Eshop\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Eshop\ShopBundle\Entity\Measure;

class LoadMeasureData implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
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
        $measureArray = array(
            'BAG 15',
            'BAG 25',
            'BAG 50',
            'BARREL',
            'Barrel - Liquid Measure',
            'Batch Lot',
            'Box',
            'Bushel - Dry Measure',
            'CAN',
            'Case',
            'Cello Pack',
            'Centigrams',
            'Centiliters',
            'Centimeters',
            'Chain',
            'CRATE',
            'Cubic Centimeters',
            'Cubic Decimeters',
            'Cubic Feet',
            'Cubic Inches',
            'Cubic Meters',
            'Cubic Millimeters',
            'Cubic Yards',
            'Days',
            'Decigrams',
            'Deciliters',
            'Decimeters',
            'Dozen',
            'Dram',
            'DRUM',
            'Each',
            'Feet',
            'Fluid Ounce ',
            'Gallon - US Liquid Measure',
            'Grains ',
            'Grains - Troy',
            'Grams',
            'Gross',
            'Hundreds',
            'Inches',
            'Kilograms',
            'Kilograms of Force per CM',
            'Kiloliters',
            'Kilometers',
            'Kilowatt Hours',
            'Link',
            'Liters',
            'Long Tons',
            'Meters',
            'Metric Tons',
            'Miles',
            'Milligrams',
            'Milliliters',
            'Millimeters',
            'Other',
            'Ounces - Troy',
            'Pallet',
            'Peck - Dry Measure',
            'Pennyweight - Troy',
            'Person Day',
            'Pint - Dry Measure',
            'Pint - Liquid Measure',
            'Pounds',
            'Pounds - Troy',
            'Quart - Dry Measure',
            'Quart - Liquid Measure',
            'Short Hundred Weight',
            'Short Ton',
            'Short Tons',
            'SLEEVE',
            'Square Centimeters',
            'Square Decimeters',
            'Square Feet',
            'Square Feet',
            'Square Inches',
            'Square Meters',
            'Square Miles',
            'Square Millimeters',
            'Square Yards',
            'Tons',
            'TRUCK LOAD',
            'TUB',
            'Unit',
            'Units',
            'Work Hour',
            'Work Month',
            'Work Week',
            'Yard'
        );

        //create measures
        foreach ($measureArray as $measureName) {
            $measure = new Measure();
            $measure->setName($measureName);
            $manager->persist($measure);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}