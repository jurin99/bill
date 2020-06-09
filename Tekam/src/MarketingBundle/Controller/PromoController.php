<?php

namespace MarketingBundle\Controller;


use MarketingBundle\Entity\Promo;
use MarketingBundle\Form\PromoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PromoController extends Controller
{
    public  function AjouterAction(Request $request)
    {
        $Promo = new Promo();

        $form = $this->createForm(Promotype::class,$Promo);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $file=$Promo->getImage();
            $filename= md5(uniqid())   . '.' . $file->guessExtension();
            $file->move($this->getParameter('Photos_directory'),$filename);
            $Promo->setImage($filename);
            $em->persist($Promo);
            $em->flush();
            return $this->redirectToRoute('Affichage_Promo');
        }
        return $this->render('@Marketing/Promo/AjouterP.html.twig',array('form'=> $form->createView()));
    }
    public  function AfficherAction(Request $request)
    {

        $id=$request->get('id');
        $em=$this->getDoctrine()->getManager();
        $Promo=$em->getRepository('MarketingBundle:Promo')->findAll();
        return $this->render('@Marketing/Promo/AfficherP.html.twig',array('Promo'=> $Promo));
    }

    public function SupprimerRAction(Request $request)
    {
        $id= $request->get('id');
        $em=$this->getDoctrine()->getManager();
        $Promo=$em->getRepository('MarketingBundle:Promo')->find($id);
        $em->remove($Promo);
        $em->flush();
        return $this->redirectToRoute('Affichage_Promo');
    }
    public function ModifierRAction(Request $request,$id)
    {

        $em= $this->getDoctrine()->getManager(); // 1  création d'un manager
        $Promo = $em->getRepository('MarketingBundle:Promo')->find($id); // 2 création du CRUD
        $Promo->setNom($Promo->getNom()); // 3 préparation des champs au modifier
        $Promo->setDescription($Promo->getDescription());
        $Promo->setDate($Promo->getDate());
        $Promo->setPrix($Promo->getPrix());
        $form=$this->createForm(PromoType::class , $Promo); // 4 création d'un formulaire = EtudiantType
        $form->handleRequest($request);

        //5 si le formulaire est cliqué

        if($form->isSubmitted() && $form->isValid()){

            $nom=$form['nom']->getData();
            $desc=$form['description']->getData();
            $prix=$form['prix']->getData();
            //création d'un entityManager
            $date=$form['date']->getData();
            $em=$this->getDoctrine()->getManager();
            $Promo=$em->getRepository('MarketingBundle:Promo')->find($id);
            $Promo->setNom($nom);
            $Promo->setDescription($desc);
            $Promo->setDate($date);
            $Promo->setDate($prix);
            $file=$Promo->getImage();
            $filename= md5(uniqid())   . '.' . $file->guessExtension();
            $file->move($this->getParameter('Photos_directory'),$filename);
            $Promo->setDate($date)->setImage($filename);
            $em->flush();

            return $this->redirectToRoute('Affichage_Promo');

        }

        return $this->render('@Marketing/Promo/AjouterP.html.twig', array('form' => $form->createView()));
    }
}
