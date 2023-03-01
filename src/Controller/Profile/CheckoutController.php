<?php

namespace App\Controller\Profile;

use App\Entity\Order;
use App\Form\OrderType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CheckoutController extends AbstractController
{
    #[Route('/profile/checkout', name: 'profile_checkout')]
    #[IsGranted('ROLE_USER')]

    public function index(): Response
    {
        // La création du formulaire
        $Order = new Order;
        $form  = $this->createForm(OrderType::class, $Order); 


        return $this->render('profile/checkout/index.html.twig', [
            'Order' => $form->createView(),
        ]);
    }
}
