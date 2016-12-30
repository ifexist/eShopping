<?php

namespace Eshop\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Filesystem\Filesystem;


/**
 * Translator controller.
 *
 * @Route("/admin/translator")
 */
class TranslatorController extends Controller
{ 
    /**
     *
     * @Route("/trans", name="admin_translator_trans")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function transAction(Request $request) 
    {
        $formFileSelect = $this->createForm('Eshop\ShopBundle\Form\Type\TranslatorType');
        $formFileSelect->handleRequest($request);
        
        return array(
            'form_file_select' => $formFileSelect->createView(),
        );
    }
    
    
    /**
     *
     * @Route("/lang/nodes/select", name="admin_translator_lang_nodes_select")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function langNodesSelectAction(Request $request) 
    { 
        $formFileSelect = $this->createForm('Eshop\ShopBundle\Form\Type\TranslatorType');
        $formFileSelect->handleRequest($request);
        
        $dirTranslation = 'Resources/translations';
        $root = $_SERVER['DOCUMENT_ROOT'];
        $rootExpl = explode("/web", $root);
        $rootSrc = $rootExpl[0];


        $bundle = $request->get('bundle');
        $prefix = $request->get('prefix');
        $lang = $request->get('lang');

        //$filename = $this->get('templating.helper.assets')->getUrl('src/Api/'.$bundle. '/' . $dirTranslation . '/messages.'.$lang.'.xliff'); 
        $filename = $rootSrc . '/src/Eshop/' . $bundle . 'Bundle/' . $dirTranslation . '/' . $prefix . '.' . $lang . '.xliff';
        //$filename = substr($_SERVER['DOCUMENT_ROOT'], 0, -3) . 'src/Api/' .$bundle. '/' . $dirTranslation . '/messages.'.$lang.'.xliff';
        if (file_exists($filename)) {
            $doc = new \DOMDocument;
            $doc->load($filename);
            $upNodes = array();
//                $dlNodes = array();

            $searchNode = $doc->getElementsByTagName("trans-unit");
            $i = 1;
            foreach ($searchNode as $searchNode) {
                $num = $i++;

                $sources = $searchNode->getElementsByTagName("source");
                $valueSources = $sources->item(0)->nodeValue;

                $targets = $searchNode->getElementsByTagName("target");
                $valueTargets = $targets->item(0)->nodeValue;
    
                $upNodes[] = 
                        '
                            <input type="hidden" name="prefix" value="' . $prefix . '">
                            <input type="hidden" name="num" value="' . $num . '">
                            <td class="col-md-1">
                                <h1 style="font-size:14px;" id="'.$request->get('newTarget').'">' . $num . '</h1>
                            </td>
                            <td class="col-md-6">    
                                <input type="hidden" name="oldTarget" value="' . $valueTargets . '">
                                <span style="font-size:16px;">' . $valueTargets . '</span>
                            </td>
                            <td class="col-md-5">
                                <textarea name="newTarget" class="col-md-12">' . $valueTargets . '</textarea>
                            </td>
                            '
                ;
            }
        } else {
            $upNodes = "";
            $num = "";
        }

        $random = $this->random_string('40');

        return array(
            'rootSrc' => $rootSrc,
            'lang' => $lang,
            'bundle' => $bundle,
            'prefix' => $prefix,
            'upNodes' => $upNodes,
            'filename' => $filename,
            'random' => $random,
            'num' => $num,
            'form_file_select' => $formFileSelect->createView(),
        );
    }
    
    /**
     *
     * @Route("/update/node", name="admin_translator_updatenode")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function updateNodeAction(Request $request)
    {
//        $bundle = $request->get('bundle');
//        $lang = $request->get('lang');
//        $prefix = $request->get('prefix');
        
        $root = $_SERVER['DOCUMENT_ROOT'];
        $rootExpl = explode("/web", $root);
        $rootSrc = $rootExpl[0];
        
        $fs = new Filesystem();
        //$rootTrans = $fs->mkdir($rootSrc.'/src/Eshop/'.$bundle.'Bundle/Resources/translations', 0777);
        $rootTrans = $rootSrc.'/src/Eshop/'.$request->get('bundle').'Bundle/Resources/translations';
        
        $xliff = html_entity_decode($rootTrans.'/'.$request->get('prefix').'.'.$request->get('lang').".xliff");   

        
        
        
$xml = simplexml_load_file($xliff);
$idOfB = 'first'; // the id of b and I want to modify the children nodes of that

foreach($xml->target as $node) {

    foreach($node->attributes() as $id => $value) {

        if((string)$value == $idOfB) {

            $node->c = 'Nishant';
            $node->d = 'Tyagi';
            // Something there I guess...
                    // I want to change the value of c and d of this node
        }
    }

    //$finobjArr[] = $node;
}
//$xmlobj = $finobjArr;

file_put_contents("testingxml.xml", $xml->saveXML());
        
        
        
        
        
        
        
        
        
        
        $doc = new \DOMDocument;
        $doc->load($xliff);
        
        $file_contents = file_get_contents($xliff);
        $searchNode = $doc->getElementsByTagName("trans-unit");
        
        foreach ($searchNode as $searchNode) 
        { 
            if($searchNode->getElementsByTagName("target")->item(0)->nodeValue == $request->get('oldTarget')){
                $file_contents = str_replace($searchNode->getElementsByTagName("target")->item(0)->nodeValue, $request->get('newTarget'), $file_contents);
                file_put_contents($xliff,$file_contents);
            }
        }
        
        //$posTraget = strpos('<target state="new">'.$request->get('oldTarget').'</target>', $file_contents);
//        
//        if (strpos($file_contents, '<target state="new">'.$request->get('oldTarget').'</target>') !== false) {
//            $file_contents = str_replace('<target state="new">'.$request->get('oldTarget').'</target>', '<target state="new">'.$request->get('newTarget').'</target>',$file_contents);
//        }else{
//            $file_contents = str_replace('<target>'.$request->get('oldTarget').'</target>', '<target>'.$request->get('newTarget').'</target>',$file_contents);
//        }
        
        //$file_contents = str_replace('<target state="new">'.$request->get('oldTarget').'</target>', '<target state="new">'.$request->get('newTarget').'</target>',$file_contents);
        file_put_contents($xliff,$file_contents);
        

        return $this->redirect($this->generateUrl('admin_translator_lang_nodes_select', array(
            'bundle' => $request->get('bundle'),
            'prefix' => $request->get('prefix'),
            'lang' => $request->get('lang'),
            'oldTarget' => $request->get('oldTarget'),
            'newTarget' => $request->get('newTarget'),
            
        )));
    }
    
    /**
     *
     * @Route("/lang/form/select/file", name="admin_form_select-file")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function formSelectFileAction(Request $request) 
    { 
        if($request->get('lang') != ""){
            $lang = $request->get('lang');
        }else{
            $lang = "";
        }
        
        if($request->get('prefix') != ""){
            $prefix = $request->get('prefix');
        }else{
            $prefix = "";
        }
        
        
        if($request->get('bundle') != ""){
            $bundle = $request->get('bundle');
        }else{
            $bundle = "";
        }
        
        $em = $this->getDoctrine()->getManager();
        $languages = $em->getRepository('ShopBundle:Langs')->findBy(
                array('enable' => 1),
                array('code' => 'ASC')
        );

        return array(
            'languages' => $languages,
            'lang' => $lang,
            'bundle' => $bundle,
            'prefix' => $prefix,
        );
    }
    
    
    /**
     *
     * @Route("/lang/activation/deactivation", name="admin_langs_activation")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function activationLangsAction(Request $request) 
    {  
        $em = $this->getDoctrine()->getManager();
        $allLangs = $em->getRepository('ShopBundle:Langs')->findBy(
                array(),
                array('code' => 'ASC')
        );
        
        if ( ($request->getMethod() == "POST") && ($request->get('idLang') != "") ) {
            $langs = $em->getRepository('ShopBundle:Langs')->findOneBy(
                    array('id' => $request->get('idLang'),
            )); 
            $langs->setEnable($request->get('enable'));
            $em->persist($langs);
            $em->flush();
            return $this->redirectToRoute('admin_langs_activation');
        }else{
            $langs = "";
        }

        return array(
            'allLangs' => $allLangs,
            'langs' => $langs,
        );
    }
    
    
    public function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }
}