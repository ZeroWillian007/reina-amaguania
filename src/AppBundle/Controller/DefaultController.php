<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use RAA\UserBundle\Entity\ConfiguracionGeneral;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $session = new Session();
        
        //obtener configuracion general
        $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:ConfiguracionGeneral');
        $configuracion=$repository->findOneBy(array('id'=>1));
        
        
        //obtener publicaciones turismo
        $repository=$em->getRepository('RAAUserBundle:Publicacion');
        $turismos=$repository->findByTipo(0);
        
        
         //obtener publicaciones eventos mas importantes ultimos 6 añadios
         //mediante una consulta nativa
        $repository=$em->getRepository('RAAUserBundle:Publicacion');
        $eventos=$repository->findByTipo(array('tipo' => 1),array('idPublicaion' => 'DESC'),6);
       // $query = $em->createNativeQuery('SELECT id, name FROM cms_users WHERE username = 1');
        //$eventos = $query->getResult();
        
        //································································
        
        
          //obtener publicaciones cronograma
        $repository=$em->getRepository('RAAUserBundle:Publicacion');
        $cronogramas=$repository->findByTipo(2);
        
          //obtener publicaciones ultimas reinas amaguaña
        $repository=$em->getRepository('RAAUserBundle:Publicacion');
        $reinas=$repository->findByTipo(3);
        
        
        
         // definir atrbutos de sesion   
         $session->set('general', $configuracion);
         $session->set('turismos', $turismos);
         $session->set('eventos', $eventos);
         $session->set('cronogramas', $cronogramas);
         $session->set('reinas', $reinas);
        
        
        // primera vista  >>------------------------------> index
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
