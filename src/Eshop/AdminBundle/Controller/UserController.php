<?php

namespace Eshop\AdminBundle\Controller;

use Eshop\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ads controller.
 *
 * @Route("/admin/user")
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     * @Route("/", name="admin_user_list")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $userRepository = $em->getRepository('UserBundle:User');
        $paginator = $this->get('knp_paginator');

        $qb = $userRepository->getAllUsersAdminQB();
        $limit = $this->getParameter('admin_users_pagination_count');

        $entities = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            $limit
        );

        return array(
            'entities' => $entities
        );
    }

    /**
     * Edit user info
     * 
     * @Route("/edit/{id}", name="admin_user_edit")
     * 
     * @Method("GET")
     * @Template()
     */
    public function editAction(Request $request, User $user)
    {    
        $em = $this->getDoctrine()->getManager();
        
        $editForm = $this->createForm('Eshop\ShopBundle\Form\Type\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('admin_user_info', array('id' => $user->getId()));
        }
        
        return array(
            'user'      => $user,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
     * Shows user info
     *
     * @Route("/user/{id}", name="admin_user_info")
     * @Method("GET")
     * @Template()
     */
    public function showUserInfoAction(User $user)
    {
        return array('user' => $user);
    }

    /**
     * Shows users orders
     *
     * @Route("/user/{id}/orders", name="admin_user_orders")
     * @Method("GET")
     * @Template()
     */
    public function showUserOrdersAction(Request $request, User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $ordersRepository = $em->getRepository('ShopBundle:Orders');
        $paginator = $this->get('knp_paginator');

        $qb = $ordersRepository->getUserOrdersAdminQB($user);
        $limit = $this->getParameter('admin_user_orders_pagination_count');

        $orders = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            $limit
        );

        return array(
            'user' => $user,
            'orders' => $orders,
        );
    }
    

    protected function getRoles() 
    {
        $roles = array();
        
        foreach ($this->container->getParameter('security.role_hierarchy.roles') as $name => $rolesHierarchy) {
            $roles[$name] = $name;
        
            foreach ($rolesHierarchy as $role) {
                if (!isset($roles[$role])) {
                    $roles[$role] = $role;
                }
            }
        }
        
        return $roles;
    }
}
