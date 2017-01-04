<?php
namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eshop\ShopBundle\Entity\Countries;

/**
 * Country controller.
 *
 * @Route("/admin/country")
 */
class CountryController extends Controller
{
    /**
     * Lists all Countries entities.
     *
     * @Route("/list", name="admin_countries_list")
     * @Method("GET")
     * @Template()
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $countriesRepository = $em->getRepository('ShopBundle:Countries');

        $countryList = $countriesRepository->findBy(
                array(),
                array('country' => 'ASC')
        );

        return array(
            'countryList' => $countryList,
        );
    }

    /**
     * Displays a form to edit an existing Countries entity.
     *
     * @Route("/edit", name="admin_countries_edit")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $countries = $em->getRepository('ShopBundle:Countries');
        $cntLangCountryCode = "";
        $langCountryCode = "";
        $langsCode = "";
        if($request->getMethod() == "POST" && $request->get('id') != "" && $request->get('langCountryCode') != ""){
            $id = $request->get('id');
            $langCountryCode = $request->get('langCountryCode');
            $langsCode = $request->get('langsCode');
            
            $countries = $em->getRepository('ShopBundle:Countries')->find($id);
            $cntLangCountryCode = COUNT($countries->getLangCountryCode());
            
            
            $countries->setLangCountryCode($langCountryCode);
            $countries->setLangsCode($langsCode);
            
            $em->persist($countries);
            $em->flush();

            return $this->redirectToRoute('admin_countries_edit', array('id' => $request->get('id')));
        }
        $countryList = $countries->findBy(
                array(),
                array('country' => 'ASC')
        );

        return array(
            'entity' => $countries,
            'countryList' => $countryList,
            'langCountryCode' => $langCountryCode,
            'cntLangCountryCode' => $cntLangCountryCode,
            'langsCode' => $langsCode
        );
    }
}
