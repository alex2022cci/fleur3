<?php

namespace App\Controller\Http;

use App\Repository\ProductRepository;
use App\Services\AddtocartServices;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ModalController extends AbstractController
{
    private  AddtocartServices $AddtocartServices ;
    public function __construct(AddtocartServices $AddtocartServices)
    {
        $this->AddtocartServices = $AddtocartServices ;
    }

    #[Route('/ajax/addtocart', name: 'app_modal_addtocart')]
    public function index(Request $request, ProductRepository $productRepository)
    {
        $id = $request->query->get('id');

         //$ModalAddToCart = $this->getDoctrine()->getRepository(Product::class)->find($id);
         
         if($request->isXmlHttpRequest() == true )
        {
            $ModalAddToCart = $productRepository->find($id);

            $this->AddtocartServices->add($id);

             $donneesEnvoyeesALaModal = [
                'image' => $ModalAddToCart->getPictures()->getValues()[0]->getImageName(),
                'Titre' => $ModalAddToCart->getTitle(),
                'Slug'  => $ModalAddToCart->getSlug(),
             ];
           //  dd(new JsonResponse($donneesEnvoyeesALaModal));
        }
        // TEST AJAX
        return $productRepository;
    }
}
