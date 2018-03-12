<?php

namespace FormularioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class FormController extends Controller
{   
  /*revisar video 06, minuto 20:49*/
    public function indexfAction()
        {
          $em = $this->getDoctrine()->getMAnager();
          $solicitudes = $em->getRepository('FormularioBundle:Solicitudes')->findAll();
          $facturaciones = $em->getRepository('FormularioBundle:Facturacion')->findAll();
          $lugares = $em->getRepository('FormularioBundle:Lugares')->findAll();
          $servicios = $em->getRepository('FormularioBundle:Servicios')->findAll();
          $SerSolicitados = $em->getRepository('FormularioBundle:ServiciosSolicitados')->findAll();
          $solicitantes = $em->getRepository('FormularioBundle:Solicitante')->findAll(); 
          
          return $this->render('@Formulario/Form/indexf.html.twig', array('servicios'=> $servicios, 'solicitudes'=> $solicitudes, 'facturaciones'=> $facturaciones, 'lugares'=> $lugares, 'SerSolicitados'=> $SerSolicitados, 'solicitantes'=> $solicitantes));

        }

    public function viewAction ()
        {   
          
            /*
            */
        }

   public function addfAction()
      {   
        /*return new Response ('hola');*/
        return $this ->render('@Formulario/Form/addf.html.twig');
      }

    /*Pruebas con las tablas:*/
    public function tablasAction()
        {
           $em = $this->getDoctrine()->getMAnager();
          

           $facturaciones = $em->getRepository('FormularioBundle:Facturacion')->findAll();

           $lugares = $em->getRepository('FormularioBundle:Lugares')->findAll();

           $servicios = $em->getRepository('FormularioBundle:Servicios')->findAll();

           $SerSolicitados = $em->getRepository('FormularioBundle:ServiciosSolicitados')->findAll();

           $solicitantes = $em->getRepository('FormularioBundle:Solicitante')->findAll();

           $solicitudes = $em->getRepository('FormularioBundle:Solicitudes')->findAll();

           if(true)//facturacion
           {
               $color=true;
               $res = '</br><table width="90%" border="6px"><tr BGCOLOR=#4A235A>
                            <td><font color=\'white\'>Id:</font></td>
                            <td><font color=\'white\'>Empresa:</font></td>
                            <td><font color=\'white\'>CIF / NIF:</font></td>
                            <td><font color=\'white\'>Telf.:</font></td>
                            <td><font color=\'white\'>E-mail:</font></td>
                            <td><font color=\'white\'>Contacto:</font></td>
                        </tr>'; 
                foreach ($facturaciones as $facturacion) 
                {
                        # code...               
                        if ($color) {
                            # code...
                            $res .= '<tr BGCOLOR=#000000>';
                            $res .= '<td><font color=\'pink\'>' . $facturacion->getId() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $facturacion->getNombreEmpresa() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $facturacion->getCIFNIF() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $facturacion->getTlfEmpresa() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $facturacion->getEmailEmpresa() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $facturacion->getUsrContacto() . '</font></td>'; 
                            $res .= '</tr>';
                        } else {
                            # code...

                             $res .= '<tr BGCOLOR=#626567>';
                             $res .= '<td><font color=\'cyan\'>' . $facturacion->getId() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $facturacion->getNombreEmpresa() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $facturacion->getCIFNIF() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $facturacion->getTlfEmpresa() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $facturacion->getEmailEmpresa() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $facturacion->getUsrContacto() . '</font></td>';
                             $res .= '</tr>';
                        }
                        $color=(!$color);
               }

               $res.='</table>';
           }

           if(true)//lugares
           {
               $color=(!$color);
               $res .= '</br><table width="90%" border="5px"><tr BGCOLOR=#4A235A>
                            <td><font color=\'white\'>Id lugar:</font></td>
                            <td><font color=\'white\'>Campus:</font></td>
                            <td><font color=\'white\'>Aula:</font></td>
                        </tr>'; 
                        $aux='';
                foreach ($lugares as $lugar) {
                           # code... 
                        if ($aux != $lugar->getCampus()) {
                            # code...
                           $color=(!$color);
                        }                
                        if ($color) {
                            # code...
                            $res .= '<tr BGCOLOR=#000000>';
                            $res .= '<td><font color=\'pink\'>' . $lugar->getId() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $lugar->getCampus() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $lugar->getAula() . '</font></td>'; 
                            $res .= '</tr>';
                        } else {
                            # code...
                             $res .= '<tr BGCOLOR=#626567>';
                             $res .= '<td><font color=\'cyan\'>' . $lugar->getId() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $lugar->getCampus() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $lugar->getAula() . '</font></td>';
                             $res .= '</tr>';
                        }
                    $aux = $lugar->getCampus();
               }

               $res.='</table>';
           }

           if(true)//servicios
           {
               $color=(!$color);
               $res .= '</br><table width="90%" border="4px"><tr BGCOLOR=#4A235A>
                            <td><font color=\'white\'>Id:</font></td>
                            <td><font color=\'white\'>Servicio:</font></td>
                            <td><font color=\'white\'>Importe:</font></td>
                        </tr>'; 
                        $aux='';
                foreach ($servicios as $servicio) {
                        # code...              
                        if ($color) {
                            # code...
                            $res .= '<tr BGCOLOR=#000000>';
                            $res .= '<td><font color=\'pink\'>' . $servicio->getId() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $servicio->getNombreServicio() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $servicio->getImporteServicio() . ' € </font></td>'; 
                            $res .= '</tr>';
                        } else {
                            # code...
                             $res .= '<tr BGCOLOR=#626567>';
                             $res .= '<td><font color=\'cyan\'>' . $servicio->getId() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $servicio->getNombreServicio() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $servicio->getImporteServicio() . ' € </font></td>';
                             $res .= '</tr>';
                        }
                        $color=(!$color);
               }
               $res.='</table>';
           }
           
           if(true)//srv solicitados
           {
               $color=(!$color);
               $res .= '</br><table width="90%" border="3px"><tr BGCOLOR=#4A235A>
                            <td><font style="background-color:#4A235A;" color=\'white\'>Id:</font></td>
                            <td><font style="background-color:#4A235A;" color=\'white\'>Num. Solicitud:</font></td>
                            <td><font style="background-color:#4A235A;" color=\'white\'>Num Servicio:</font></td>
                            <td><font style="background-color:#4A235A;" color=\'white\'>Importe:</font></td>
                        </tr>'; 
                        $aux='';
                foreach ($SerSolicitados as $SerSolicitado) {
                           # code... 
                        if ($color) {
                            # code...
                            $res .= '<tr BGCOLOR=#000000>';
                            $res .= '<td><font color=\'pink\'>' . $SerSolicitado->getId() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $SerSolicitado->getidSolicitudes() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $SerSolicitado->getIdServicio() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $SerSolicitado->getImporteServicio() . '</font></td>'; 
                            $res .= '</tr>';
                        } else {
                            # code...
                             $res .= '<tr BGCOLOR=#626567>';
                             $res .= '<td><font color=\'cyan\'>' . $SerSolicitado->getId() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $SerSolicitado->getIdSolicitudes() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $SerSolicitado->getIdServicio() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $SerSolicitado->getImporteServicio() . '</font></td>';
                             $res .= '</tr>';
                        }
                        $color=(!$color);
               }

               $res.='</table>';
           }

           if(true)//solicitante
           {
                $color=(!$color);
                $res .= '</br><table width="90%" border="2px"><tr BGCOLOR=#4A235A>
                          <td><font color=\'white\'>Id:</font></td>
                          <td><font color=\'white\'>Nombre:</font></td>
                          <td><font color=\'white\'>Primer apellido:</font></td>
                          <td><font color=\'white\'>Segundo Apellido:</font></td>
                          <td><font color=\'white\'>Telf.:</font></td>
                          <td><font color=\'white\'>E-mail:</font></td>
                        </tr>'; 
                foreach ($solicitantes as $solicitante)
                {
                      # code...                
                      if ($color) {
                            # code...
                            $res .= '<tr BGCOLOR=#000000>';
                            $res .= '<td><font color=\'pink\'>' . $solicitante->getId() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $solicitante->getNombreSolicitante() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $solicitante->getApellido1Solicitante() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $solicitante->getApellido2Solicitante() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $solicitante->getTelfSolicitante() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $solicitante->getEmailSolicitante() . '</font></td>';
                            $res .= '</tr>';
                      } else {
                           # code...
                           $res .= '<tr BGCOLOR=#626567>';
                           $res .= '<td><font color=\'cyan\'>' . $solicitante->getId() . '</font></td>'; 
                           $res .= '<td><font color=\'cyan\'>' . $solicitante->getNombreSolicitante() . '</font></td>';
                           $res .= '<td><font color=\'cyan\'>' . $solicitante->getApellido1Solicitante() . '</font></td>';
                           $res .= '<td><font color=\'cyan\'>' . $solicitante->getApellido2Solicitante() . '</font></td>';
                           $res .= '<td><font color=\'cyan\'>' . $solicitante->getTelfSolicitante() . '</font></td>';
                           $res .= '<td><font color=\'cyan\'>' . $solicitante->getEmailSolicitante() . '</font></td>';
                           $res .= '</tr>';
                      }
                      $color=(!$color);
                }
                $res.='</table>';
           }

           if(true)//solicitudes
           {
               $color=(!$color);
               $res .= '</br><table width="90%" border="1px"><tr BGCOLOR=#4A235A>
                            <td><font color=\'white\'>Id solicitud:</font></td>
                            <td><font color=\'white\'>Num. solicitante:</font></td>
                            <td><font color=\'white\'>CIF/NIF Factura:</font></td>
                            <td><font color=\'white\'>Id lugar:</font></td>
                            <td><font color=\'white\'>Total c/iva:</font></td>
                            <td><font color=\'white\'>Total s/iva:</font></td>
                        </tr>'; 
                foreach ($solicitudes as $solicitud) {
                           # code...                
                        if ($color) {
                            # code...
                            $res .= '<tr BGCOLOR=#000000>';
                            $res .= '<td><font color=\'pink\'>' . $solicitud->getId() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $solicitud->getIdSolicitante() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $solicitud->getCIFNIFFactura() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $solicitud->getIdLugar() . '</font></td>'; 
                            $res .= '<td><font color=\'pink\'>' . $solicitud->getTotalCiva() . ' € </font></td>';
                            $res .= '<td><font color=\'pink\'>' . $solicitud->getTotalSiva() . ' € </font></td>';
                            $res .= '</tr>';
                        } else {
                            # code...
                             $res .= '<tr BGCOLOR=#626567>';
                             $res .= '<td><font color=\'cyan\'>' . $solicitud->getId() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $solicitud->getIdSolicitante() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $solicitud->getCIFNIFFactura() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $solicitud->getIdLugar() . '</font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $solicitud->getTotalCiva() . ' € </font></td>';
                             $res .= '<td><font color=\'cyan\'>' . $solicitud->getTotalSiva() . ' € </font></td>';
                             $res .= '</tr>';
                        }
                        $color=(!$color);
               }

               $res.='</table>';
           }

           return new Response ($res);
        }

    public function tablaMezclasAction()
        {       
            $em = $this->getDoctrine()->getMAnager();
          $solicitudes = $em->getRepository('FormularioBundle:Solicitudes')->findAll();
          $facturaciones = $em->getRepository('FormularioBundle:Facturacion')->findAll();
          $lugares = $em->getRepository('FormularioBundle:Lugares')->findAll();
          $servicios = $em->getRepository('FormularioBundle:Servicios')->findAll();
          $SerSolicitados = $em->getRepository('FormularioBundle:ServiciosSolicitados')->findAll();
          $solicitantes = $em->getRepository('FormularioBundle:Solicitante')->findAll(); 
          
          return $this->render('@Formulario/Form/indexf.html.twig', array('servicios'=> $servicios, 'solicitudes'=> $solicitudes, 'facturaciones'=> $facturaciones, 'lugares'=> $lugares, 'SerSolicitados'=> $SerSolicitados, 'solicitantes'=> $solicitantes));

        }

    public function tablaFacturacionAction()
        {
           $em = $this->getDoctrine()->getMAnager();
          $facturaciones = $em->getRepository('FormularioBundle:Facturacion')->findAll();
         
          return $this->render('@Formulario/Form/facturacion.html.twig', array('facturaciones'=> $facturaciones));
        }

    public function tablaLugaresAction()
        {
          $em = $this->getDoctrine()->getMAnager();
          $lugares = $em->getRepository('FormularioBundle:Lugares')->findAll();
         
          return $this->render('@Formulario/Form/lugares.html.twig', array('lugares'=> $lugares));
        }

    public function tablaServiciosAction()
        {
          $em = $this->getDoctrine()->getMAnager();
          $servicios = $em->getRepository('FormularioBundle:Servicios')->findAll();
         
          return $this->render('@Formulario/Form/servicios.html.twig', array('servicios'=> $servicios));
        }

    public function tablaServiciosSolicitadosAction()
        {
          $em = $this->getDoctrine()->getMAnager();
          $serSolicitados = $em->getRepository('FormularioBundle:ServiciosSolicitados')->findAll();
         
          return $this->render('@Formulario/Form/serSolicitados.html.twig', array('serSolicitados'=> $serSolicitados));

        }

    public function tablaSolicitanteAction()
        {
             $em = $this->getDoctrine()->getMAnager();
          $solicitantes = $em->getRepository('FormularioBundle:Solicitante')->findAll(); 
         
          return $this->render('@Formulario/Form/solicitante.html.twig', array('solicitantes'=> $solicitantes));
        }

    public function tablasolicitudesAction()
        {
           $em = $this->getDoctrine()->getMAnager();
          $solicitudes = $em->getRepository('FormularioBundle:Solicitudes')->findAll();
         
          return $this->render('@Formulario/Form/solicitudes.html.twig', array('solicitudes'=> $solicitudes));

        }

    /* ejemplos de pruebas */
    public function ejemploAction ($page)
        {
            if ($page==0) {
                $res = '<h1><font style="background-color:#DBA901;" color=#FFFFFF>No ha indicado ningun ejemplo válido.</font></h1>';
            } else {
                
                if (($page%2)==0) {
                    # code...
                    /*$res .= '<font style="background-color:#4A235A;" color=\'white\'>No ha indicado ningun ejemplo válido.</font>';*/
                    $res = '<h1><font style="background-color:#B40486;" color=#F5F6CE>Esto es el ejemplo numero:</font>';
                    $res .= '<font style="background-color:#F5F6CE;" color=#B40486> ' . $page . '.</font></h1>';
                } else {
                    # code...
                    $res = '<h1><font style="background-color:#F5F6CE;" color=#B40486>Esto es el ejemplo numero:</font>';
                    $res .= '<font style="background-color:#B40486;" color=#F5F6CE> ' . $page . '.</font></h1>';
                }
                
                
            }

            return new Response ($res);
        }

    public function ejemplo2Action ()
        {   
            $em = $this->getDoctrine()->getMAnager();

            $servicios = $em->getRepository('FormularioBundle:Servicios')->findAll();

            $res='Lista de servicios: </br>';
            foreach ($servicios as $servicio)
            {
                $res.= $servicio->getNombreServicio() . '</br>';
            }

            return new Response ($res);
        }

}