<?php

namespace MarketingBundle\Controller;

use MarketingBundle\Entity\Forum;
use MarketingBundle\Form\ForumType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ForumController extends Controller
{
    public  function AjouterAction(Request $request)
    {
        $Forum = new Forum();

        $form = $this->createForm(Forumtype::class,$Forum);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $file=$Forum->getImage();
            $filename= md5(uniqid())   . '.' . $file->guessExtension();
            $file->move($this->getParameter('Photos_directory'),$filename);
            $Forum->setImage($filename);
            $em->persist($Forum);
            $em->flush();
            return $this->redirectToRoute('Affichage_Forum');
        }
        return $this->render('@Marketing/Forum/AjouterF.html.twig',array('form'=> $form->createView()));
    }

    public  function AfficherAction(Request $request)
    {

        $id=$request->get('id');
        $em=$this->getDoctrine()->getManager();
        $Forum=$em->getRepository('MarketingBundle:Forum')->findAll();
        return $this->render('@Marketing/Forum/AfficherF.html.twig',array('Forum'=> $Forum));
    }

    public function SupprimerRAction(Request $request)
    {
        $id= $request->get('id');
        $em=$this->getDoctrine()->getManager();
        $Forum=$em->getRepository('MarketingBundle:Forum')->find($id);
        $em->remove($Forum);
        $em->flush();
        return $this->redirectToRoute('Affichage_Forum');
    }

    public function ModifierRAction(Request $request,$id)
    {

        $em= $this->getDoctrine()->getManager(); // 1  création d'un manager
        $Forum = $em->getRepository('MarketingBundle:Forum')->find($id); // 2 création du CRUD
        $Forum->setNom($Forum->getNom()); // 3 préparation des champs au modifier
        $Forum->setDescription($Forum->getDescription());
        $Forum->setDate($Forum->getDate());
        $form=$this->createForm(ForumType::class , $Forum); // 4 création d'un formulaire = EtudiantType
        $form->handleRequest($request);

        //5 si le formulaire est cliqué

        if($form->isSubmitted() && $form->isValid()){

            $nom=$form['nom']->getData();
            $desc=$form['description']->getData();
            //création d'un entityManager
            $date=$form['date']->getData();
            $em=$this->getDoctrine()->getManager();
            $Forum=$em->getRepository('MarketingBundle:Forum')->find($id);
            $Forum->setNom($nom);
            $Forum->setDescription($desc);
            $Forum->setDate($date);
            $file=$Forum->getImage();
            $filename= md5(uniqid())   . '.' . $file->guessExtension();
            $file->move($this->getParameter('Photos_directory'),$filename);
            $Forum->setImage($filename);
            $em->flush();

            return $this->redirectToRoute('Affichage_Forum');

        }

        return $this->render('@Marketing/Forum/AjouterF.html.twig', array('form' => $form->createView()));
    }


}
