<?php

namespace App\Services;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AddtocartServices
{
    private RequestStack $requestStack;
    private EntityManagerInterface $em;

    public function __construct(RequestStack $requestStack, EntityManagerInterface $em)
    {
        $this->requestStack = $requestStack;
        $this->em = $em ;
    }

    public function add(int $id)
    {
        $cart = $this->requestStack->getSession()->get('cart', []);
        if (!empty($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }
        $this->getSession()->set('cart', $cart);
            // Penser à mettre en BDD le panier de l'utilisateur
    }

    public function getFullCart(): array
    {
        $cart = $this->getSession()->get('cart');

       
        $cartData = [];

        foreach ($cart as $id => $quantity)
        {
            $product = $this->em->getRepository(Product::class)->findOneBy(['id' => $id]);
            if (!$product) 
            {
                // condition en cas d'erreur
                // par exemple, le produit n'existe pas
                // produit n est plus en stock dans les secondes qui suivent l'ajout au panier
                // etc.
            }	
            
            $cartData[] = [
                'produit' => $product,
                'quantity' => $quantity,
            ];
        }
        return $cartData ;
    }

    public function getTotal(): float
    {
        $total = 0 ;

        foreach($this->getFullCart() as $items )
        {
            // ToDo prévoir les discount et promotions
            $total += $items['produit']->getPrice() * $items['quantity'];
        }
        return $total ;
    }

    private function getSession(): SessionInterface
    {
        return $this->requestStack->getSession();
    }
}