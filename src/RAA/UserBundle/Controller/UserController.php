<?php

namespace RAA\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\HttpFoundation\Request;

use RAA\UserBundle\Entity\Usuario;

use RAA\UserBundle\Entity\Publicacion;

use RAA\UserBundle\Form\PublicacionType;

use Doctrine\ORM\Query\ResultSetMapping;


class UserController extends Controller


{
    
    
public function verDonarPageAction()
{
   
        
         return    $this->render('RAAUserBundle:User:lugaresDonar.html.twig',array('ok'=>0));
        
} 

public function verPaginaLugaresMasAction($id)
{
   
        $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:Publicacion');
        $confi=$repository->find($id);    
        return    $this->render('RAAUserBundle:User:lugaresTuristicosMas.html.twig',array('confi'=>$confi));
        
}  
   
public function enviarCorreoAction(Request $request)
{
           $correo=$request->get('correo');
           $tel=$request->get('tel');
           $cantidad=$request->get('cantidad');
           $comen=$request->get('comen');
    
        $message = \Swift_Message::newInstance()
        ->setSubject('Nuevo Pedido')
        ->setFrom('sonrieamaguana@gmail.com')
        ->setTo($correo)
        ->setBody(
            "<h5>Nuevo Pedido<h5> \n
            Correo: ".$correo."\n".
            "Telefono:".$tel."\n".
            "Contidad:".$cantidad."\n".
            "comentario:".$comen
             
        )
    ;
    $this->get('mailer')->send($message);
        
          return    $this->render('RAAUserBundle:User:lugaresDonarExito.html.twig',array('ok'=>1));
        
}

// mensaje de contacto
public function enviarCorreoReinaAction(Request $request)
{
           $correo=$request->get('correo');
           $tel=$request->get('tel');
           $cantidad=$request->get('nombre');
           $comen=$request->get('mensaje');
    
        $message = \Swift_Message::newInstance()
        ->setSubject('Mensaje de Comentario ')
        ->setFrom('sonrieamaguana@gmail.com')
        ->setTo($correo)
        ->setBody(
            "<h5>Comentario enviado desde pagina Web<h5> \n
            Correo: ".$nombre."\n".
            "Telefono:".$correo."\n".
            "Contidad:".$tel."\n".
            "comentario:".$comen
             
        )
    ;
    $this->get('mailer')->send($message);
        
            return $this->redirect($this->generateUrl('raa_user_entradapage'));
        
}



//ruta configuracion


public function verConfiguracionAction()
{
        
        
         return    $this->render('RAAUserBundle:User:configuracion.html.twig');
        
}

public function verAddGaleriaAction()
{
        
        
         return    $this->render('RAAUserBundle:User:addgaleria.html.twig');
        
}


public function verCrearNuevousuarioAction()
{
        
        
         return    $this->render('RAAUserBundle:User:nuevoUsuario.html.twig');
        
}

//logica para rutas del menu principal
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------

    public function verLugaresVideosAction(Request $request)
    {
        
         
         return    $this->render('RAAUserBundle:User:videos.html.twig');
        
    }
    
    public function verLugaresEventosAction(Request $request)
    {
        
          $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
        
        
          $turismos=$repository->findByTipo(array('tipo' => 1),array('idPublicaion' => 'DESC'));
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $turismos,$request->query->getInt('page',1),
             6
          );
         
         return    $this->render('RAAUserBundle:User:lugaresEventos.html.twig',array('pagination'=>$pagination));
        
    }
    
    
    
    public function verLugaresTuristicosAction(Request $request)
    {
        
          $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
        
        
          $turismos=$repository->findByTipo(0);
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $turismos,$request->query->getInt('page',1),
             3
          );
         
         return    $this->render('RAAUserBundle:User:lugaresTuristicos.html.twig',array('pagination'=>$pagination));
        
    }
    
    
    public function verLugaresGaleriaAction(Request $request)
    {
        
          $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
        
        
          $galeria=$repository->findByTipo(8);
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $galeria,$request->query->getInt('page',1),
             6
          );
         
         return    $this->render('RAAUserBundle:User:galeria.html.twig',array('pagination'=>$pagination));
        
    }
    
    public function verLugaresGastronomiaAction(Request $request)
    {
        $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
        
        
          $turismos=$repository->findByTipo(4);
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $turismos,$request->query->getInt('page',1),
             3
          );
        return $this->render('RAAUserBundle:User:lugaresGastronomia.html.twig',array('pagination'=>$pagination)); 
    }
    
    public function verLugaresFiestasTradicionalesAction(Request $request)
    {
        $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
        
        
          $turismos=$repository->findByTipo(5);
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $turismos,$request->query->getInt('page',1),
             3
          );
        
        return $this->render('RAAUserBundle:User:lugaresFiestasTradicionales.html.twig',array('pagination'=>$pagination)); 
    }
    
    public function verLugaresReinasAmaguanaAction(Request $request)
    {
        $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
        
        
          $turismos=$repository->findByTipo(3);
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $turismos,$request->query->getInt('page',1),
             3
          );
        
        return $this->render('RAAUserBundle:User:reinasAmaguana.html.twig',array('pagination'=>$pagination)); 
    }

     public function verLugaresOrganizacionAction()
    {
        $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:ConfiguracionGeneral');
        $confi=$repository->find(3);
        return $this->render('RAAUserBundle:User:organizacion.html.twig',array('confi' => $confi)); 
    }

//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
//direcciones panel de control 
    public function verEditReinaActualAction()
    {
        $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:ConfiguracionGeneral');
        $confi=$repository->find(2);
        return $this->render('RAAUserBundle:User:editReinaActual.html.twig',array('confi' => $confi)); 
    }
    
    public function verEditOrganizacionAction()
    {
        $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:ConfiguracionGeneral');
        $confi=$repository->find(3);
        return $this->render('RAAUserBundle:User:editOrganizacion.html.twig',array('confi' => $confi)); 
    }

    public function verEditEventoAction()
    {
        
        return $this->render('RAAUserBundle:User:evento.html.twig'); 
    }
    
    public function verEditFiestaAction()
    {
        
        return $this->render('RAAUserBundle:User:fiesta.html.twig'); 
    }

    public function verEditReinaAction()
    {
        
        return $this->render('RAAUserBundle:User:reina.html.twig'); 
    }
    public function verEditPlatoAction()
    {
        
        return $this->render('RAAUserBundle:User:plato.html.twig'); 
    }

//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------

    public function homeAction()
    {
        //return new Response('saludos desde el controlador');
        return $this->render('RAAUserBundle:User:home.html.twig'); 
    }
    
    public function reinaActualAction()
    {
        $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:ConfiguracionGeneral');
        $confi=$repository->find(2);
        
        return $this->render('RAAUserBundle:User:reinaActual.html.twig',array('confi'=>$confi)); 
    }
    
    public function verLoginAction()
    {
        
        return $this->render('RAAUserBundle:User:login.html.twig'); 
    }


    //control de acceso de usuarios al sistema 
    public function LoginAction(Request $request)
    {
        
         if($request->getMethod()=='POST'){
            
           $usuario=$request->get('user');
           $password=$request->get('pass');
            
            
        }
        
       
        
        $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:Usuario');
        
        
        $user=$repository->findOneBy(array('nick'=>$usuario,'pass'=>$password));
        $this->usuario1=$user;
        
        
        if($user){
             
             //iniciar sesion--------
            // $session = new Session();
            
            $this->get('session')->set('user1',$user);
             
            // $session->set('user1', $user);
                   
             if(1){         
             
           
             return    $this->render('RAAUserBundle:User:panel.html.twig',array('user' => $user));
             
             }
             else{
                 
                return new Response('No implemntado vista de usuario comun');
             }
  
        }
        else{
            
          return    $this->render('RAAUserBundle:User:login.html.twig',array('user' => $user));
             
            
        }
        
    }
    
    
    
    public function usuarioPanelAction()
    {
        
        return $this->render('RAAUserBundle:User:panel.html.twig'); 
    }
    
    
    
    
    //redireccionar para editar
    //###########################################
    //###########################################
    
     public function editarCronogramaAction($id)
    {
       $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:Publicacion');
        $cronograma=$repository->find($id);
        
        //controlar futuramente las excepciones
        
        // $form = $this->crearEditForm($turismo);
        
        // return $this->render('RAAUserBundle:User:ediciones.html.twig', array('turismo' => $turismo, 'form' => $form->createView()));
        return $this->render('RAAUserBundle:User:edicionescronograma.html.twig', array('cronograma' => $cronograma));
    }
    
     public function editarEventoAction($id)
    {
       $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:Publicacion');
        $evento=$repository->find($id);
        
        //controlar futuramente las excepciones
        
        // $form = $this->crearEditForm($turismo);
        
        // return $this->render('RAAUserBundle:User:ediciones.html.twig', array('turismo' => $turismo, 'form' => $form->createView()));
        return $this->render('RAAUserBundle:User:edicionesevento.html.twig', array('evento' => $evento));
    }
    
    
    
    public function editarPlatoAction($id)
    {
       $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:Publicacion');
        $plato=$repository->find($id);
        
        //controlar futuramente las excepciones
        
        // $form = $this->crearEditForm($turismo);
        
        // return $this->render('RAAUserBundle:User:ediciones.html.twig', array('turismo' => $turismo, 'form' => $form->createView()));
        return $this->render('RAAUserBundle:User:edicionesplatos.html.twig', array('plato' => $plato));
    }
    
    
     public function editarturimosAction($id)
    {
       $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:Publicacion');
        $turismo=$repository->find($id);
        
        //controlar futuramente las excepciones
        
        // $form = $this->crearEditForm($turismo);
        
        // return $this->render('RAAUserBundle:User:ediciones.html.twig', array('turismo' => $turismo, 'form' => $form->createView()));
        return $this->render('RAAUserBundle:User:ediciones.html.twig', array('turismo' => $turismo));
    }
    
    
     public function editarfiestasAction($id)
    {
       $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:Publicacion');
        $fiesta=$repository->find($id);
        
        //controlar futuramente las excepciones
        
        // $form = $this->crearEditForm($turismo);
        
        // return $this->render('RAAUserBundle:User:ediciones.html.twig', array('turismo' => $turismo, 'form' => $form->createView()));
        return $this->render('RAAUserBundle:User:edicionesfiestas.html.twig', array('fiesta' => $fiesta));
    }
    
    
      public function editarReinaAction($id)
    {
       $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:Publicacion');
        $reina=$repository->find($id);
        
        //controlar futuramente las excepciones
        
        // $form = $this->crearEditForm($turismo);
        
        // return $this->render('RAAUserBundle:User:ediciones.html.twig', array('turismo' => $turismo, 'form' => $form->createView()));
        return $this->render('RAAUserBundle:User:edicionesreinas.html.twig', array('reina' => $reina));
    }
    
    
     public function editarUsuarioAction($id)
    {
        $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:Usuario');
        $usuario=$repository->find($id);
        
        //controlar futuramente las excepciones
        
        // $form = $this->crearEditForm($turismo);
        
        // return $this->render('RAAUserBundle:User:ediciones.html.twig', array('turismo' => $turismo, 'form' => $form->createView()));
        return $this->render('RAAUserBundle:User:edicionesusuarios.html.twig', array('usuario' => $usuario));
    }
    
    
     private function crearEditForm(publicacion $entity)
    {
        $form = $this->createForm(new PublicacionType(), $entity, array('action' => $this->generateUrl('raa_user_hacerEditarTurismo', array('idPublicacion' => $entity->getIdPublicaion())), 'method' => 'PUT'));
        
        return $form;
        
    }
    
    
    //eliminar usuario >>-------------------------->
     public function eliminarUsuarioAction($id)
    {
          //buscar publicacion
          $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Usuario');
          $user=$repository->find($id);
          $em->remove($user);
          $em->flush();
           
          return $this->redirect($this->generateUrl('raa_user_listUsuarios'));
    
    }
    
    
    //eliminar publicacion >>-------------------------->
     public function eliminarPublicacionAction($id)
    {
          //buscar publicacion
          $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
          $turismo=$repository->find($id);
          $tipo=$turismo->getTipo();
          
          if($tipo==0){
              
               //eliminar imagen
               $ruta=$this->getParameter('brochures_directory_turismo')."/".$turismo->getFoto();
               if($turismo->getFoto()!="")  unlink($ruta);
               //borrar entidad 
               $em->remove($turismo);
               $em->flush();
               return $this->redirect($this->generateUrl('raa_user_listTurismo'));
              
          }
          if($tipo==1){
              
               //eliminar imagen
               $ruta=$this->getParameter('brochures_directory_eventos')."/".$turismo->getFoto();
               if($turismo->getFoto()!="")  unlink($ruta);
               //borrar entidad 
               $em->remove($turismo);
               $em->flush();
               
              
          }
          if($tipo==2){
              
               //eliminar imagen
               $ruta=$this->getParameter('brochures_directory_cronograma')."/".$turismo->getFoto();
               if($turismo->getFoto()!="")  unlink($ruta);
               //borrar entidad 
               $em->remove($turismo);
               $em->flush();
               return $this->redirect($this->generateUrl('raa_user_listCronograma'));
          }
          
          if($tipo==3){
              
               //eliminar imagen
               $ruta=$this->getParameter('brochures_directory_reinas')."/".$turismo->getFoto();
               if($turismo->getFoto()!="")  unlink($ruta);
               //borrar entidad 
               $em->remove($turismo);
               $em->flush();
                return $this->redirect($this->generateUrl('raa_user_listReinas'));
              
          }
          
           if($tipo==4){
              
               //eliminar imagen
               $ruta=$this->getParameter('brochures_directory_platos')."/".$turismo->getFoto();
               if($turismo->getFoto()!="") unlink($ruta);
               //borrar entidad 
               $em->remove($turismo);
               $em->flush();
                return $this->redirect($this->generateUrl('raa_user_listPlatos'));
              
          }
          
          if($tipo==5){
              
               //eliminar imagen
               $ruta=$this->getParameter('brochures_directory_fiestas')."/".$turismo->getFoto();
               if($turismo->getFoto()!="") unlink($ruta);
               //borrar entidad 
               $em->remove($turismo);
               $em->flush();
                return $this->redirect($this->generateUrl('raa_user_listFiestas'));
              
          }
          
          if($tipo==8){
              
               //eliminar imagen
               $ruta=$this->getParameter('brochures_directory_galeria')."/".$turismo->getFoto();
               if($turismo->getFoto()!="") unlink($ruta);
               //borrar entidad 
               $em->remove($turismo);
               $em->flush();
                return $this->redirect($this->generateUrl('raa_user_listGaleria'));
              
          }
          
    
         return $this->redirect($this->generateUrl('raa_user_listCronograma'));
    }
      
      public function actualizarPublicacionAction(Request $request)
    {
        //buscar publicacion
         $em=$this->getDoctrine()->getEntityManager();
         $repository=$em->getRepository('RAAUserBundle:Publicacion');
         
         $id=$request->get('idp');
         $turismo=$repository->find($id);
         //recuperar campos 
         $titulo=$request->get('titulo');
         $texto=$request->get('texto');
         
         $adicional=$request->get('adicional');
         
         //poner nuevos valores en la entidad
         $turismo->setTitulo($titulo);  
         $turismo->setTexto($texto);
         
         $tipo=$turismo->getTipo();
         
         
         
         //recuperacion de nuevo archivo
         $imagen1=$request->files->get('foto');
         
         
         //obtener redes sociales
         $face=$request->get('face');
         $twit=$request->get('twit');
         $inst=$request->get('inst');
         
         
         if($tipo==0){
               if($imagen1){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                      $imagen1->move(
                           $this->getParameter('brochures_directory_turismo'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory_turismo')."/".$turismo->getFoto();
                       if($turismo->getFoto()!="")  unlink($ruta);
                       $turismo->setFoto($fileNameimg1);
           
               }
               $turismo->setAdicional($adicional);
               $turismo->setFaceBook($face);
         }
         if($tipo==1){
             if($imagen1){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                      $imagen1->move(
                           $this->getParameter('brochures_directory_eventos'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory_eventos')."/".$turismo->getFoto();
                       if($turismo->getFoto()!="") unlink($ruta);
                       $turismo->setFoto($fileNameimg1);
           
               }
               $turismo->setAdicional($adicional);
               
             
         }
         if($tipo==2){
             if($imagen1){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                      $imagen1->move(
                           $this->getParameter('brochures_directory_cronograma'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory_cronograma')."/".$turismo->getFoto();
                       if($turismo->getFoto()!="")  unlink($ruta);
                       $turismo->setFoto($fileNameimg1);
           
               }
               
               $turismo->setAdicional($adicional);
             
         }
         if($tipo==3){
             if($imagen1){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                      $imagen1->move(
                           $this->getParameter('brochures_directory_reinas'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory_reinas')."/".$turismo->getFoto();
                       if($turismo->getFoto()!="")  unlink($ruta);
                       $turismo->setFoto($fileNameimg1);
           
               }
               
               $turismo->setFaceBook($face);
               $turismo->setTwitter($twit);
               $turismo->setInstagram($inst);
         }
         
         if($tipo==4){
             if($imagen1){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                      $imagen1->move(
                           $this->getParameter('brochures_directory_platos'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory_platos')."/".$turismo->getFoto();
                       if($turismo->getFoto()!="") unlink($ruta);
                       $turismo->setFoto($fileNameimg1);
           
               }
             
         }
         
         if($tipo==5){
             if($imagen1){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                      $imagen1->move(
                           $this->getParameter('brochures_directory_fiestas'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory_fiestas')."/".$turismo->getFoto();
                       if($turismo->getFoto()!="")  unlink($ruta);
                       $turismo->setFoto($fileNameimg1);
           
               }
             
         }
         
         
         
         
         //obtener fecha
         $fecha=$request->get('fecha');
         if($fecha){
             
           $turismo->setFecha(new \DateTime($fecha));
         }
         
         
         
         $em->flush();
         
        if ($turismo->getTipo()==0){
            
            return $this->redirect($this->generateUrl('raa_user_listTurismo'));
        }
        if ($turismo->getTipo()==1){
            
            return $this->redirect($this->generateUrl('raa_user_listEvento'));
        }
        if ($turismo->getTipo()==2){
            
            return $this->redirect($this->generateUrl('raa_user_listCronograma'));
        }
        
         if ($turismo->getTipo()==3){
            
            return $this->redirect($this->generateUrl('raa_user_listReinas'));
        }
        
        if ($turismo->getTipo()==3){
            
            return $this->redirect($this->generateUrl('raa_user_listReinas'));
        }
        
        if ($turismo->getTipo()==5){
            
            return $this->redirect($this->generateUrl('raa_user_listFiestas'));
        }
       
       
       
        
        return $this->redirect($this->generateUrl('raa_user_listPlatos'));
    }
    
    //redireccionar a crear nuevo lugar turistico
    //###########################################
    //###########################################
    
    public function revisarReinasAction()
    {
        
        $publicacion=new Publicacion();
        $form=$this->formarFormularioPublicacion($publicacion);
        return    $this->render('RAAUserBundle:User:reina.html.twig',array('form'=>$form->createView())); 
    }
    
    
     public function revisarCronogramaAction()
    {
        
        $publicacion=new Publicacion();
        $form=$this->formarFormularioPublicacion($publicacion);
        return    $this->render('RAAUserBundle:User:cronograma.html.twig',array('form'=>$form->createView())); 
    }
   
    
     public function revisarTurismoAction()
    {
        $publicacion=new Publicacion();
        $form=$this->formarFormularioPublicacion($publicacion);
        return    $this->render('RAAUserBundle:User:turismo.html.twig',array('form'=>$form->createView()));
    }
    
    //crear formulario publicacion;;;;
      private function formarFormularioPublicacion(Publicacion $entity){
         
         $form=$this->createForm(new PublicacionType,$entity,array(
             'action'=>$this->generateUrl('raa_user_guardarPublicacion'),'method'=>'POST'));
         return $form;     
     }
     
     
    
    //accion de guardar publicacion
     public function guardarPublicacionAction(Request $request)
    {
        //guardar publicacion
        //>>------------------------------------->
       $publicacion=new Publicacion();
       
       $titulo=$request->get('titulo');
       $texto=$request->get('texto');
       $adicional=$request->get('adicional');
       //recuperacion de nuevo archivo
       $imagen1=$request->files->get('foto');
       $tipo=$request->get('idp');
       $fecha=$request->get('fecha');
       
       
       //obtener redes sociales
       $face=$request->get('face');
       $twit=$request->get('twit');
       $inst=$request->get('inst');
       
       
       if($fecha){
         
            $publicacion->setFecha(new \DateTime($fecha));
           //$publicacion->setFecha(\DateTime::createFromFormat('d-m-Y', $tiempo));
       }
       
       
       if($tipo=="0"){
           $publicacion->setTipo(0);
           if($imagen1){
                  $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                  $imagen1->move(
                  $this->getParameter('brochures_directory_turismo'),
                  $fileNameimg1
            );
            $publicacion->setFoto($fileNameimg1);
           }
             $publicacion->setFaceBook($face);
             $publicacion->setAdicional($adicional);
           
       }
       
       
       if($tipo=="1"){
           $publicacion->setTipo(1);
           if($imagen1 ){
                  $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                  $imagen1->move(
                  $this->getParameter('brochures_directory_eventos'),
                  $fileNameimg1
            );
            $publicacion->setFoto($fileNameimg1);
           }
           $publicacion->setAdicional($adicional);
       }
       
       if($tipo=="2"){
           $publicacion->setTipo(2);
           if($imagen1 ){
                  $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                  $imagen1->move(
                  $this->getParameter('brochures_directory_cronograma'),
                  $fileNameimg1
            );
            $publicacion->setFoto($fileNameimg1);
           }
           
            $publicacion->setAdicional($adicional);
       }
       
       if($tipo=="3"){
           $publicacion->setTipo(3);
           if($imagen1 ){
                  $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                  $imagen1->move(
                  $this->getParameter('brochures_directory_reinas'),
                  $fileNameimg1
            );
            $publicacion->setFoto($fileNameimg1);
           }
           
           $publicacion->setFaceBook($face);
           $publicacion->setTwitter($twit);
           $publicacion->setInstagram($inst);
           
       }
       
       if($tipo=="4"){
           $publicacion->setTipo(4);
           if($imagen1 ){
                  $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                  $imagen1->move(
                  $this->getParameter('brochures_directory_platos'),
                  $fileNameimg1
            );
            $publicacion->setFoto($fileNameimg1);
           }
           
       }
       
       if($tipo=="5"){
           $publicacion->setTipo(5);
           if($imagen1 ){
                  $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                  $imagen1->move(
                  $this->getParameter('brochures_directory_fiestas'),
                  $fileNameimg1
            );
            $publicacion->setFoto($fileNameimg1);
           }
           
       }
       //reina actual >>------>
       if($tipo=="6"){
           $publicacion->setTipo(6);
           if($imagen1 ){
                  $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                  $imagen1->move(
                  $this->getParameter('brochures_directory_reinaActual'),
                  $fileNameimg1
            );
            $publicacion->setFoto($fileNameimg1);
           }
           
       }
       
       // >>----------> organizacion
       if($tipo=="7"){
           $publicacion->setTipo(7);
           if($imagen1 ){
                  $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                  $imagen1->move(
                  $this->getParameter('brochures_directory_organizacion'),
                  $fileNameimg1
            );
            $publicacion->setFoto($fileNameimg1);
           }
           
       }
       
       
    
           $publicacion->setTitulo($titulo);
           $publicacion->setTexto($texto);
           
          
          
           $publicacion->setActivo(1);
           
    
           
           $em = $this->getDoctrine()->getManager();
           $em->persist($publicacion);
           $em->flush();
          
        if($tipo=="0"){
            return $this->redirectToRoute('raa_user_listTurismo');
        }  
        
        if($tipo=="1"){
            return $this->redirectToRoute('raa_user_listEvento');
        } 
        
        if($tipo=="2"){
            return $this->redirectToRoute('raa_user_listCronograma');
        } 
         
        if($tipo=="3"){
            return $this->redirectToRoute('raa_user_listReinas');
        }
        
        if($tipo=="4"){
            return $this->redirectToRoute('raa_user_listPlatos');
        }
        
        if($tipo=="5"){
            return $this->redirectToRoute('raa_user_listFiestas');
        } 
        
         if($tipo=="6"){
            return $this->redirectToRoute('raa_user_reinaactuall');
        } 
           
            return $this->redirectToRoute('raa_user_listReinas');
        
    }
    
     public function guardarGaleriaAction(Request $request)
    {
        //guardar publicacion
        //>>------------------------------------->
       
        $em = $this->getDoctrine()->getManager();
       
       //obtener fotos
        $imagen1=$request->files->get('foto1');
        $imagen2=$request->files->get('foto2');
        $imagen3=$request->files->get('foto3');
        $imagen4=$request->files->get('foto4');

       
       
           if($imagen1){
                  $publicacion1=new Publicacion();
                  $publicacion1->setFecha(new \DateTime());
                  $publicacion1->setTipo(8);
                  
                  $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                  $imagen1->move(
                  $this->getParameter('brochures_directory_galeria'),
                  $fileNameimg1
            );
              $publicacion1->setFoto($fileNameimg1);
              $em->persist($publicacion1);
              $em->flush();
            
           }
           
           if($imagen2){
                  $publicacion2=new Publicacion();
                  $publicacion2->setFecha(new \DateTime());
                  $publicacion2->setTipo(8);
                  
                  $fileNameimg1 = md5(uniqid()).'.'.$imagen2->guessExtension(); 
                  $imagen2->move(
                  $this->getParameter('brochures_directory_galeria'),
                  $fileNameimg1
            );
              $publicacion2->setFoto($fileNameimg1);
              $em->persist($publicacion2);
              $em->flush();
           }
           
            if($imagen3){
                  $publicacion3=new Publicacion();
                  $publicacion3->setFecha(new \DateTime());
                  $publicacion3->setTipo(8);
                  
                  $fileNameimg1 = md5(uniqid()).'.'.$imagen3->guessExtension(); 
                  $imagen3->move(
                  $this->getParameter('brochures_directory_galeria'),
                  $fileNameimg1
            );
              $publicacion3->setFoto($fileNameimg1);
              $em->persist($publicacion3);
              $em->flush();
           }
           
            if($imagen4){
                  $publicacion4=new Publicacion();
                  $publicacion4->setFecha(new \DateTime());
                  $publicacion4->setTipo(8);
                  
                  $fileNameimg1 = md5(uniqid()).'.'.$imagen4->guessExtension(); 
                  $imagen4->move(
                  $this->getParameter('brochures_directory_galeria'),
                  $fileNameimg1
            );
              $publicacion4->setFoto($fileNameimg1);
              $em->persist($publicacion4);
              $em->flush();
           }
           
           
            return $this->redirectToRoute('raa_user_listGaleria');
        
    }
    
    
    
     public function guardarUsuarioAction(Request $request)
    {
        //guardar usuario
        //>>------------------------------------->
       $user=new Usuario();
       
       $nombre=$request->get('nombre');
       $apellido=$request->get('apellido');
       $ci=$request->get('ci');
       $nick=$request->files->get('nick');
       $pass=$request->get('pass');
    
           //fijar parametros
           $user->setNombre($nombre);
           $user->setApellido($apellido);
           $user->setCi($ci);
           $user->setNick($nick);
           $user->setPass($pass);
           $user->setConfiguracionConfiguracion(1);
           
           $em = $this->getDoctrine()->getManager();
           $em->persist($user);
           $em->flush();
          
    
        
        
           
            return $this->render('RAAUserBundle:User:panel.html.twig'); 
        
    }
    
    //###########################################
    //###########################################
    //###########################################
    ///en progreso
    public function buscarEnBaseGeneralAction(Request $request)
    {
          $nombre=$request->get('nombre');
          $em=$this->getDoctrine()->getEntityManager();
          
        
          $result = $em->getRepository("RAAUserBundle:Publicacion")->createQueryBuilder('p')
              ->where('p.texto LIKE :product')
                  ->setParameter('product', '%'.$nombre.'%')
                   ->getQuery()
                     ->getResult();
       
          $this->get('session')->set('buscadas',$result);
          
          
          return $this->redirect($this->generateUrl('raa_user_entradapage'));
    }
    
    
    
    
    public function listfiestasAction(Request $request)
    {
          $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
        
        
          $turismos=$repository->findByTipo(array('tipo' => 5),array('idPublicaion' => 'DESC'));
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $turismos,$request->query->getInt('page',1),
             3
          );
        
        return $this->render('RAAUserBundle:User:listfiestas.html.twig',array('pagination'=>$pagination)); 
    }
    
     public function listGaleriaAction(Request $request)
    {
          $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
        
        
          $galeria=$repository->findByTipo(array('tipo' => 8),array('idPublicaion' => 'DESC'));
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $galeria,$request->query->getInt('page',1),
             3
          );
        
        return $this->render('RAAUserBundle:User:listgaleria.html.twig',array('pagination'=>$pagination)); 
    }
    
    public function listPlatosAction(Request $request)
    {
          $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
        
        
          $turismos=$repository->findByTipo(array('tipo' => 4),array('idPublicaion' => 'DESC'));
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $turismos,$request->query->getInt('page',1),
             3
          );
        
        return $this->render('RAAUserBundle:User:listplatos.html.twig',array('pagination'=>$pagination)); 
    }
    
    public function listEventosAction(Request $request)
    {
          $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
        
        
          $turismos=$repository->findByTipo(array('tipo' => 1),array('idPublicaion' => 'DESC'));
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $turismos,$request->query->getInt('page',1),
             3
          );
        
        return $this->render('RAAUserBundle:User:listeventos.html.twig',array('pagination'=>$pagination)); 
    }
    
    public function listReinasAction(Request $request)
    {
          $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
        
        
          $turismos=$repository->findByTipo(array('tipo' => 3),array('idPublicaion' => 'DESC'));
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $turismos,$request->query->getInt('page',1),
             3
          );
        
       
        return $this->render('RAAUserBundle:User:listreinas.html.twig',array('pagination'=>$pagination)); 
    }
    
     public function listCronogramaAction(Request $request)
    {
          $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
        
        
          $turismos=$repository->findByTipo(array('tipo' => 2),array('idPublicaion' => 'DESC'));
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $turismos,$request->query->getInt('page',1),
             3
          );
        
        return $this->render('RAAUserBundle:User:listcronograma.html.twig',array('pagination'=>$pagination)); 
    }
    
     public function listTurismoAction(Request $request)
    {
        
        //return $this->render('RAAUserBundle:User:listturismo.html.twig'); 
        
          $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Publicacion');
        
        
          $turismos=$repository->findByTipo(array('tipo' => 0),array('idPublicaion' => 'DESC'));
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $turismos,$request->query->getInt('page',1),
             3
          );
         
          return    $this->render('RAAUserBundle:User:listturismo.html.twig',array('pagination'=>$pagination));
    }
    
    
     public function listUsuariosAction(Request $request)
    {
        
        //return $this->render('RAAUserBundle:User:listturismo.html.twig'); 
        
          $em=$this->getDoctrine()->getEntityManager();
          $repository=$em->getRepository('RAAUserBundle:Usuario');
        
        
          $usuarios=$repository->findAll();
          $paginator=$this->get('knp_paginator');
          
          $pagination=$paginator->paginate(
             $usuarios,$request->query->getInt('page',1),
             3
          );
         
          return    $this->render('RAAUserBundle:User:listusuarios.html.twig',array('pagination'=>$pagination));
    }
    
     public function revisarPanelAction()
    {
        
        return $this->render('RAAUserBundle:User:panel.html.twig'); 
    }
    
    
    public function actualizarReinaActualAction(Request $request)
    {
         $em=$this->getDoctrine()->getEntityManager();
         $repository=$em->getRepository('RAAUserBundle:ConfiguracionGeneral');
         $configuracion=$repository->findOneBy(array('id'=>2));
         
         
         //obtener datos de formulario
         $p1=$request->get('titulo');
         $p2=$request->get('texto');
         $p3=$request->get('face');
         $p4=$request->get('twit');
         $p5=$request->get('inst');
         $p6=$request->get('tube');
         
         
        
         
         //obtener fotos
         $imagen1=$request->files->get('foto1');
         $imagen2=$request->files->get('foto2');
         $imagen3=$request->files->get('foto3');
         $imagen4=$request->files->get('foto4');
         
         
         //fijar nuevos parametros
         
         $configuracion->setTitulo($p1);
         $configuracion->setTexto($p2);
         $configuracion->setFaceBook($p3);
         $configuracion->setTwitter($p4);
         $configuracion->setInstagram($p5);
         $configuracion->setYoutube($p6);
         
         
         //crear filesystem
         //$fileSystem = new Filesystem();
         
         //fotos
         
         if($imagen1){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                      $imagen1->move(
                           $this->getParameter('brochures_directory_reinaActual'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory_reinaActual')."/".$configuracion->getSlide1();
                       if($configuracion->getSlide1()!="")  unlink($ruta);
                       $configuracion->setSlide1($fileNameimg1);
           
        }
         
         if($imagen2){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen2->guessExtension(); 
                      $imagen2->move(
                           $this->getParameter('brochures_directory_reinaActual'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory_reinaActual')."/".$configuracion->getSlide2();
                       if($configuracion->getSlide2()!="")  unlink($ruta);
                       $configuracion->setSlide2($fileNameimg1);
           
        }
         
         if($imagen3){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen3->guessExtension(); 
                      $imagen3->move(
                           $this->getParameter('brochures_directory_reinaActual'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory_reinaActual')."/".$configuracion->getSlide3();
                       if($configuracion->getSlide3()!="")  unlink($ruta);
                       $configuracion->setSlide3($fileNameimg1);
           
        }
         
          if($imagen4){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen4->guessExtension(); 
                      $imagen4->move(
                           $this->getParameter('brochures_directory_reinaActual'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory_reinaActual')."/".$configuracion->getSlide4();
                       if($configuracion->getSlide4()!="")  unlink($ruta);
                       $configuracion->setSlide4($fileNameimg1);
           
        }
         
         $em->flush();
         
         return $this->render('RAAUserBundle:User:panel.html.twig'); 
    }
    
    public function actualizarOrganizacionAction(Request $request)
    {
         $em=$this->getDoctrine()->getEntityManager();
         $repository=$em->getRepository('RAAUserBundle:ConfiguracionGeneral');
         $configuracion=$repository->findOneBy(array('id'=>3));
         
         
         //obtener datos de formulario
         $p1=$request->get('titulo');
         $p2=$request->get('texto');
         $p3=$request->get('face');
         $p4=$request->get('twit');
         $p5=$request->get('inst');
         $p6=$request->get('tube');
         
         //obtener fotos
         $imagen1=$request->files->get('foto1');
         
         
         
         //fijar nuevos parametros
         
         $configuracion->setTitulo($p1);
         $configuracion->setTexto($p2);
         $configuracion->setFaceBook($p3);
         $configuracion->setTwitter($p4);
         $configuracion->setInstagram($p5);
         $configuracion->setYoutube($p6);
         
         
         //crear filesystem
         //$fileSystem = new Filesystem();
         
         //fotos
         
         
         
         
         if($imagen1){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                      $imagen1->move(
                           $this->getParameter('brochures_directory_organizacion'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory_organizacion')."/".$configuracion->getSlide1();
                       if($configuracion->getSlide1()!="")  unlink($ruta);
                       $configuracion->setSlide1($fileNameimg1);
           
        }
         
         
         
         $em->flush();
         
         return $this->render('RAAUserBundle:User:panel.html.twig'); 
    }
    
    
    public function actualizarUsuarioAction(Request $request)
    {
         $em=$this->getDoctrine()->getEntityManager();
         $repository=$em->getRepository('RAAUserBundle:Usuario');
         
         $id=$request->get('idp');
         $user=$repository->find($id);
         
         
         //obtener datos de formulario
         $p1=$request->get('nombre');
         $p2=$request->get('apellido');
         $p3=$request->get('ci');
         $p4=$request->get('nick');
         $p5=$request->get('pass');
        
     
         
         
         //fijar nuevos parametros
         
         $user->setNombre($p1);
         $user->setApellido($p2);
         $user->setCi($p3);
         $user->setNick($p4);
         $user->setPass($p5);
       
         
         
         
         $em->flush();
         
         return $this->render('RAAUserBundle:User:panel.html.twig'); 
    }
    
    
    public function actualizarSliderAction(Request $request)
    {
        
      
        $em=$this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('RAAUserBundle:ConfiguracionGeneral');
        $configuracion=$repository->findOneBy(array('id'=>1));

        
        
         if($request->getMethod()=='POST'){
            
           
           $imagen1=$request->files->get('file-slider1');
           $imagen2=$request->files->get('file-slider2');
           $imagen3=$request->files->get('file-slider3');
           $imagen4=$request->files->get('file-slider4');
           
       }
       
        
         
         if($imagen1){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen1->guessExtension(); 
                      $imagen1->move(
                           $this->getParameter('brochures_directory'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory')."/".$configuracion->getSlide1();
                       if($configuracion->getSlide1()!="")  unlink($ruta);
                       $configuracion->setSlide1($fileNameimg1);
           
        }
         
         if($imagen2){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen2->guessExtension(); 
                      $imagen2->move(
                           $this->getParameter('brochures_directory'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory')."/".$configuracion->getSlide2();
                       if($configuracion->getSlide2()!="")  unlink($ruta);
                       $configuracion->setSlide2($fileNameimg1);
           
        }
         
         if($imagen3){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen3->guessExtension(); 
                      $imagen3->move(
                           $this->getParameter('brochures_directory'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory')."/".$configuracion->getSlide3();
                       if($configuracion->getSlide3()!="")  unlink($ruta);
                       $configuracion->setSlide3($fileNameimg1);
           
        }
         
         if($imagen4){
                      $fileNameimg1 = md5(uniqid()).'.'.$imagen4->guessExtension(); 
                      $imagen4->move(
                           $this->getParameter('brochures_directory'),
                           $fileNameimg1
                       );
            
                       $ruta=$this->getParameter('brochures_directory')."/".$configuracion->getSlide4();
                       if($configuracion->getSlide4()!="")  unlink($ruta);
                       $configuracion->setSlide4($fileNameimg1);
           
        }
         
         $em->flush();
         
         $this->get('session')->set('general',$configuracion);
         
         
         
        
       return $this->render('RAAUserBundle:User:panel.html.twig'); 
    }
    
    
    
    
    
}
