<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pedido extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list_pedidos() {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin,access-control-allow-methods, access-control-allow-headers');

        //--- Guardo ---//
        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $dato = array();

            $result = $this->app_model_pedido->get_pedidos();

            if($result) {

                //--- Reply ---//
                $dato['msg'] = "Listado de pedido obtenido";
                $dato['valid'] = true;
                $dato['pedido'] = $result;
                $dato['count'] = count($result);

            } else {
                $dato['msg'] = "El listado de pedidos no pudo ser obtenido.";
                $dato['valid'] = false;
                $dato['count'] = 0;
            }

        } else {
            $dato['msg'] = "There is not post";
            $dato['valid'] = false;
        }

        echo json_encode($dato);
    }
    public function list_detalle_pedido_mozo() {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin,access-control-allow-methods, access-control-allow-headers');

        //--- Guardo ---//
        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $dato = array();

            //--- Tomamos valores del registro ---//
            //$idPedido = $request->idPedido;

            //--- Validamos que todos los datos esten con un valor ---//
            //if (!empty($idPedido)) {

                //$result = $this->app_model_pedido->get_detalle_pedidos($idPedido);
                $result = $this->app_model_pedido->get_detalles_pedidos_mozo();

                foreach ($result as $key => $detallepedido) {
                    $mesas = "";
                    $mesas_consulta = $this->app_model_pedido->get_mesa_detalle_pedido($detallepedido['idDetallePedido']);
                    foreach ($mesas_consulta as $keys => $mesas_query) {
                        if($keys > 0){
                            $mesas .= ", ";
                        }
                        $mesas .= strval ( $mesas_query['idMesa']);
                    }
                    $result[$key]['mesa'] = $mesas;
                }

                if($result) {
                    //--- Reply ---//
                    $dato['msg'] = "Listado del detalle de pedido obtenido";
                    $dato['valid'] = true;
                    $dato['detallepedido'] = $result;
                    $dato['count'] = count($result);

                } else {
                    $dato['msg'] = "El listado del detalle de pedido no pudo ser obtenido.";
                    $dato['valid'] = false;
                    $dato['count'] = 0;
                }
            /*} else {
                $msg = "Algun dato obligatorio esta faltando ingresar";
                $dato = array("valid" => false, "msg" => $msg);
            }*/
        } else {
            $dato['msg'] = "There is not post";
            $dato['valid'] = false;
        }

        echo json_encode($dato);
    }
    
    public function list_detalle_pedido_seccion() {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin,access-control-allow-methods, access-control-allow-headers');

        //--- Guardo ---//
        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $dato = array();

            //--- Tomamos valores del registro ---//
            //$idPedido = $request->idPedido;

            //--- Validamos que todos los datos esten con un valor ---//
            //if (!empty($idPedido)) {

                //$result = $this->app_model_pedido->get_detalle_pedidos($idPedido);
                $result = $this->app_model_pedido->get_detalles_pedidos_seccion();

                foreach ($result as $key => $detallepedido) {
                    $mesas = "";
                    $mesas_consulta = $this->app_model_pedido->get_mesa_detalle_pedido($detallepedido['idDetallePedido']);
                    foreach ($mesas_consulta as $keys => $mesas_query) {
                        if($keys > 0){
                            $mesas .= ", ";
                        }
                        $mesas .= strval ( $mesas_query['idMesa']);
                    }
                    $result[$key]['mesa'] = $mesas;
                }

                if($result) {
                    //--- Reply ---//
                    $dato['msg'] = "Listado del detalle de pedido obtenido";
                    $dato['valid'] = true;
                    $dato['detallepedido'] = $result;
                    $dato['count'] = count($result);

                } else {
                    $dato['msg'] = "El listado del detalle de pedido no pudo ser obtenido.";
                    $dato['valid'] = false;
                    $dato['count'] = 0;
                }
            /*} else {
                $msg = "Algun dato obligatorio esta faltando ingresar";
                $dato = array("valid" => false, "msg" => $msg);
            }*/
        } else {
            $dato['msg'] = "There is not post";
            $dato['valid'] = false;
        }

        echo json_encode($dato);
    }

    public function list_detalle_pedido_mesa() {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin,access-control-allow-methods, access-control-allow-headers');

        //--- Guardo ---//
        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $dato = array();

            //--- Tomamos valores del registro ---//
            //$idPedido = $request->idPedido;

            //--- Validamos que todos los datos esten con un valor ---//
            //if (!empty($idPedido)) {

                //$result = $this->app_model_pedido->get_detalle_pedidos($idPedido);
                $result = $this->app_model_pedido->get_detalles_pedidos_mesa();

                foreach ($result as $key => $detallepedido) {
                    $mesas = "";
                    $mesas_consulta = $this->app_model_pedido->get_mesa_detalle_pedido($detallepedido['idDetallePedido']);
                    foreach ($mesas_consulta as $keys => $mesas_query) {
                        if($keys > 0){
                            $mesas .= ", ";
                        }
                        $mesas .= strval ( $mesas_query['idMesa']);
                    }
                    $result[$key]['mesa'] = $mesas;
                }

                if($result) {
                    //--- Reply ---//
                    $dato['msg'] = "Listado del detalle de pedido obtenido";
                    $dato['valid'] = true;
                    $dato['detallepedido'] = $result;
                    $dato['count'] = count($result);

                } else {
                    $dato['msg'] = "El listado del detalle de pedido no pudo ser obtenido.";
                    $dato['valid'] = false;
                    $dato['count'] = 0;
                }
            /*} else {
                $msg = "Algun dato obligatorio esta faltando ingresar";
                $dato = array("valid" => false, "msg" => $msg);
            }*/
        } else {
            $dato['msg'] = "There is not post";
            $dato['valid'] = false;
        }

        echo json_encode($dato);
    }


    public function list_detalle_pedido_espera() {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin,access-control-allow-methods, access-control-allow-headers');

        //--- Guardo ---//
        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $dato = array();

            //--- Tomamos valores del registro ---//
            //$idPedido = $request->idPedido;

            //--- Validamos que todos los datos esten con un valor ---//
            //if (!empty($idPedido)) {

                //$result = $this->app_model_pedido->get_detalle_pedidos($idPedido);
                $result = $this->app_model_pedido->get_detalles_pedidos_espera();

                foreach ($result as $key => $detallepedido) {
                    $mesas = "";
                    $mesas_consulta = $this->app_model_pedido->get_mesa_detalle_pedido($detallepedido['idDetallePedido']);
                    foreach ($mesas_consulta as $keys => $mesas_query) {
                        if($keys > 0){
                            $mesas .= ", ";
                        }
                        $mesas .= strval ( $mesas_query['idMesa']);
                    }
                    $result[$key]['mesa'] = $mesas;
                }

                if($result) {
                    //--- Reply ---//
                    $dato['msg'] = "Listado del detalle de pedido obtenido";
                    $dato['valid'] = true;
                    $dato['detallepedido'] = $result;
                    $dato['count'] = count($result);

                } else {
                    $dato['msg'] = "El listado del detalle de pedido no pudo ser obtenido.";
                    $dato['valid'] = false;
                    $dato['count'] = 0;
                }
            /*} else {
                $msg = "Algun dato obligatorio esta faltando ingresar";
                $dato = array("valid" => false, "msg" => $msg);
            }*/
        } else {
            $dato['msg'] = "There is not post";
            $dato['valid'] = false;
        }

        echo json_encode($dato);
    }

    public function list_detalles_listos(){
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin,access-control-allow-methods, access-control-allow-headers');

        //--- Guardo ---//
        $postdata = file_get_contents("php://input");
        //$request  = json_decode($postdata);

        //if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $dato = array();

            //--- Tomamos valores del registro ---//
            //$detallepedido_checkbox = $request->detallepedido_checkbox;

            //--- Validamos que todos los datos esten con un valor ---//
            //if (!empty($detallepedido_checkbox)) {

                $result = $this->app_model_pedido->get_detalles_pedidos_finalizados();
                $cantidad_prodcutos = 0;
                $I = 0;
                /*
$I = 0;
                $cantidad_prodcutos = 0;
                $mesas = "";

                foreach ($detallepedido as $keys => $idDetallePedido) {
                    $cantidad = $this->app_model_pedido->get_cantidad_productos($idDetallePedido);
                    $cantidad_prodcutos += intval($cantidad[0]['cantidad']);

                    $mesa = $this->app_model_pedido->get_mesas($idDetallePedido);
                    foreach ($mesa as $k => $m) {
                        $num_mesa = explode(",", $mesas);
                        if (!in_array($m['idMesa'], $num_mesa)) { 
                            if (strlen($mesas) != 0) { 
                                $mesas .= ', ';
                            }
    
                            $mesas .= $m['idMesa'];
                        }
                    }
                    $this->app_model_pedido->set_estado_listo_para_servir($idDetallePedido);
                    $I += 1;
                }
                */

                foreach ($result as $key => $detallepedido) {
                    $mesas = "";
                    $cantidad = $this->app_model_pedido->get_cantidad_productos($detallepedido['idDetallePedido']);
                    $cantidad_prodcutos += intval($cantidad[0]['cantidad']);
                   // $mesas_consulta = $this->app_model_pedido->get_mesa_detalle_pedido($detallepedido['idDetallePedido']);
                   $mesa = $this->app_model_pedido->get_mesas($detallepedido['idDetallePedido']);
                   foreach ($mesa as $k => $m) {
                    $num_mesa = explode(",", $mesas);
                    if (!in_array($m['idMesa'], $num_mesa)) { 
                        if (strlen($mesas) != 0) { 
                            $mesas .= ', ';
                        }

                        $mesas .= $m['idMesa'];
                    }
                }
                $I += 1;
                 }

            if($I == count($result) ) {

                //--- Reply ---//
                $dato['msg'] = "Se actualizó el estado a listo para servir";
                $dato['valid'] = true;
                $dato['idDetallePedido'] = $detallepedido['idDetallePedido'];
                $dato['mesas'] = $mesas;
                $dato['cantidadProductos'] = $cantidad_prodcutos;

            } else {
                $dato['msg'] = "Error al actualizar el estado a listo para servir";
                $dato['valid'] = false;
            
            }
        echo json_encode($dato);
/*


                    foreach ($mesas_consulta as $keys => $mesas_query) {
                        if($keys > 0){
                            $mesas .= ", ";
                        }
                        $mesas .= strval ( $mesas_query['idMesa']);
                    }
                    $result[$key]['mesa'] = $mesas;
                }
*/
/*
                if($result) {
                    //--- Reply ---//
                    $dato['msg'] = "Listado del detalle de pedido obtenido";
                    $dato['valid'] = true;
                    $dato['detallepedido'] = $result;
                    $dato['count'] = count($result);

                } else {
                    $dato['msg'] = "El listado del detalle de pedido no pudo ser obtenido.";
                    $dato['valid'] = false;
                    $dato['count'] = 0;
                }
            /*} else {
                $msg = "Algun dato obligatorio esta faltando ingresar";
                $dato = array("valid" => false, "msg" => $msg);
            }
        */
    
    

       
         
            //}
    }

    public function list_detalle_pedido() {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin,access-control-allow-methods, access-control-allow-headers');

        //--- Guardo ---//
        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $dato = array();

            //--- Tomamos valores del registro ---//
            //$idPedido = $request->idPedido;

            //--- Validamos que todos los datos esten con un valor ---//
            //if (!empty($idPedido)) {

                //$result = $this->app_model_pedido->get_detalle_pedidos($idPedido);
                $result = $this->app_model_pedido->get_detalles_pedidos();

                foreach ($result as $key => $detallepedido) {
                    $mesas = "";
                    $mesas_consulta = $this->app_model_pedido->get_mesa_detalle_pedido($detallepedido['idDetallePedido']);
                    foreach ($mesas_consulta as $keys => $mesas_query) {
                        if($keys > 0){
                            $mesas .= ", ";
                        }
                        $mesas .= strval ( $mesas_query['idMesa']);
                    }
                    $result[$key]['mesa'] = $mesas;
                }

                if($result) {
                    //--- Reply ---//
                    $dato['msg'] = "Listado del detalle de pedido obtenido";
                    $dato['valid'] = true;
                    $dato['detallepedido'] = $result;
                    $dato['count'] = count($result);

                } else {
                    $dato['msg'] = "El listado del detalle de pedido no pudo ser obtenido.";
                    $dato['valid'] = false;
                    $dato['count'] = 0;
                }
            /*} else {
                $msg = "Algun dato obligatorio esta faltando ingresar";
                $dato = array("valid" => false, "msg" => $msg);
            }*/
        } else {
            $dato['msg'] = "There is not post";
            $dato['valid'] = false;
        }

        echo json_encode($dato);
    }

    public function list_detalle_pedido2() {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin,access-control-allow-methods, access-control-allow-headers');

        //--- Guardo ---//
        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $dato = array();

            //--- Tomamos valores del registro ---//
            //$idPedido = $request->idPedido;

            //--- Validamos que todos los datos esten con un valor ---//
            //if (!empty($idPedido)) {

                //$result = $this->app_model_pedido->get_detalle_pedidos($idPedido);
                $result = $this->app_model_pedido->get_detalles_pedidos2();

                foreach ($result as $key => $detallepedido) {
                    $mesas = "";
                    $mesas_consulta = $this->app_model_pedido->get_mesa_detalle_pedido($detallepedido['idDetallePedido']);
                    foreach ($mesas_consulta as $keys => $mesas_query) {
                        if($keys > 0){
                            $mesas .= ", ";
                        }
                        $mesas .= strval ( $mesas_query['idMesa']);
                    }
                    $result[$key]['mesa'] = $mesas;
                }

                if($result) {
                    //--- Reply ---//
                    $dato['msg'] = "Listado del detalle de pedido obtenido";
                    $dato['valid'] = true;
                    $dato['detallepedido'] = $result;
                    $dato['count'] = count($result);

                } else {
                    $dato['msg'] = "El listado del detalle de pedido no pudo ser obtenido.";
                    $dato['valid'] = false;
                    $dato['count'] = 0;
                }
            /*} else {
                $msg = "Algun dato obligatorio esta faltando ingresar";
                $dato = array("valid" => false, "msg" => $msg);
            }*/
        } else {
            $dato['msg'] = "There is not post";
            $dato['valid'] = false;
        }

        echo json_encode($dato);
    }

    public function finalizar_elaboracion_detalle_pedido() {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin,access-control-allow-methods, access-control-allow-headers');

        //--- Guardo ---//
        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);

        //if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $dato = array();

            //--- Tomamos valores del registro ---//
            $detallepedido_checkbox = $request->detallepedido_checkbox;

            //--- Validamos que todos los datos esten con un valor ---//
            if (!empty($detallepedido_checkbox)) {

                $detallepedido = explode(",", $detallepedido_checkbox);

                $I = 0;
                $cantidad_prodcutos = 0;
                $mesas = "";

                foreach ($detallepedido as $keys => $idDetallePedido) {
                    $cantidad = $this->app_model_pedido->get_cantidad_productos($idDetallePedido);
                    $cantidad_prodcutos += intval($cantidad[0]['cantidad']);

                    $mesa = $this->app_model_pedido->get_mesas($idDetallePedido);
                    foreach ($mesa as $k => $m) {
                        $num_mesa = explode(",", $mesas);
                        if (!in_array($m['idMesa'], $num_mesa)) { 
                            if (strlen($mesas) != 0) { 
                                $mesas .= ', ';
                            }
    
                            $mesas .= $m['idMesa'];
                        }
                    }
                    $this->app_model_pedido->set_estado_listo_para_servir($idDetallePedido);
                    $I += 1;
                }

                if($I == count($detallepedido) ) {

                    //--- Reply ---//
                    $dato['msg'] = "Se actualizó el estado a listo para servir";
                    $dato['valid'] = true;
                    $dato['mesas'] = $mesas;
                    $dato['cantidadProductos'] = $cantidad_prodcutos;

                } else {
                    $dato['msg'] = "Error al actualizar el estado a listo para servir";
                    $dato['valid'] = false;
                }
            } else {
                $msg = "Algun dato obligatorio esta faltando ingresar";
                $dato = array("valid" => false, "msg" => $msg);
            }
        /*} else {
            $dato['msg'] = "There is not post";
            $dato['valid'] = false;
        }*/

        echo json_encode($dato);
    }

    public function notificado_detalle_pedido() {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin,access-control-allow-methods, access-control-allow-headers');

        //--- Guardo ---//
        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $dato = array();

            //--- Tomamos valores del registro ---//
            $detallepedido_checkbox = $request->detallepedido_checkbox;

            //--- Validamos que todos los datos esten con un valor ---//
            if (!empty($detallepedido_checkbox)) {

                $detallepedido = explode(",", $detallepedido_checkbox);

                $I = 0;

                foreach ($detallepedido as $keys => $idDetallePedido) {
                    $this->app_model_pedido->set_estado_notificado($idDetallePedido);
                    $I += 1;
                }

                if($I == count($detallepedido) ) {

                    //--- Reply ---//
                    $dato['msg'] = "Se actualizó el estado a notificado";
                    $dato['valid'] = true;

                } else {
                    $dato['msg'] = "Error al actualizar el estado a notificado";
                    $dato['valid'] = false;
                }
            } else {
                $msg = "Algun dato obligatorio esta faltando ingresar";
                $dato = array("valid" => false, "msg" => $msg);
            }
        } else {
            $dato['msg'] = "There is not post";
            $dato['valid'] = false;
        }

        echo json_encode($dato);
    }
}