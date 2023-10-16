<?php

namespace App\Controller;

use App\Entity\Poubelle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(EntityManagerInterface $entityManagerInterface): Response
    {
        $repoPoubelle = $entityManagerInterface->getRepository(Poubelle::class);
        $poubelles = $repoPoubelle->findAll();
        return $this->render('admin/index.html.twig', [
            'poubelles' => $poubelles   
        ]);
    }

    #[Route('/admin/remove/{id}', name: 'supprime-alerte', requirements:
    ["id"=>"\d+"])]
    public function supprimeProprietaire(Request $request, int $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $repoPoubelle = $this->getDoctrine()->getRepository(Poubelle::class);
        $poubelles = $repoPoubelle->findById($id)[0];

        foreach($poubelles->getAlertes() as $alert){
            $em->remove($alert);
            $em->flush();
        }

       
        return $this->redirectToRoute('app_admin');
    }
}
