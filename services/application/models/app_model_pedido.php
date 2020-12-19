<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class App_model_pedido extends CI_Model
{
    public function get_pedidos() {

        $this->db->select('*');
        $this->db->from('pedido');
        $result = $this->db->get();

        return ($result != '') ? $result->result_array() : false;
    }

    public function get_detalles_pedidos_mozo() { 

        $this->db->select('pedido_detalle.idDetallePedido, pedido_detalle.producto, pedido_detalle.menu, pedido_detalle.cantidad, estado.nombre as estado');
        $this->db->from('pedido_detalle');
        $this->db->join('estado', 'estado.idEstado = pedido_detalle.idEstado');
        $this->db->where('pedido_detalle.idEstado', 1);
        $this->db->order_by('pedido_detalle.idMozo', 'ASC'); //ver cual es bien aca la relacion
        $result = $this->db->get();

        return ($result != '') ? $result->result_array() : false;
    }
    public function get_detalles_pedidos_seccion() { 

        $this->db->select('pedido_detalle.idDetallePedido, pedido_detalle.producto, pedido_detalle.menu, pedido_detalle.cantidad, estado.nombre as estado');
        $this->db->from('pedido_detalle');
        $this->db->join('estado', 'estado.idEstado = pedido_detalle.idEstado');
        $this->db->where('pedido_detalle.idEstado', 1);
        $this->db->order_by('pedido_detalle.idSeccion', 'ASC'); //ver cual es bien aca la relacion
        $result = $this->db->get();

        return ($result != '') ? $result->result_array() : false;
    }
    
    public function get_detalles_pedidos_mesa() { 

        $this->db->select('pedido_detalle.idDetallePedido, pedido_detalle.producto, pedido_detalle.menu, pedido_detalle.cantidad, estado.nombre as estado');
        $this->db->from('pedido_detalle');
        $this->db->join('estado', 'estado.idEstado = pedido_detalle.idEstado');
        $this->db->where('pedido_detalle.idEstado', 1);
        $this->db->order_by('pedido_detalle.idDetallePedido', 'ASC');
        $result = $this->db->get();

        return ($result != '') ? $result->result_array() : false;
    }


    public function get_detalles_pedidos_espera() {

        $this->db->select('pedido_detalle.idDetallePedido, pedido_detalle.producto, pedido_detalle.menu, pedido_detalle.cantidad, estado.nombre as estado');
        $this->db->from('pedido_detalle');
        $this->db->join('estado', 'estado.idEstado = pedido_detalle.idEstado');
        $this->db->where('pedido_detalle.idEstado', 1);
        $this->db->order_by('pedido_detalle.fechaEspera', 'ASC');
        $result = $this->db->get();

        return ($result != '') ? $result->result_array() : false;
    }


    public function get_detalles_pedidos() {

        $this->db->select('pedido_detalle.idDetallePedido, pedido_detalle.producto, pedido_detalle.menu, pedido_detalle.cantidad, estado.nombre as estado');
        $this->db->from('pedido_detalle');
        $this->db->join('estado', 'estado.idEstado = pedido_detalle.idEstado');
        $this->db->where('pedido_detalle.idEstado', 1);
        
        $result = $this->db->get();

        return ($result != '') ? $result->result_array() : false;
    }

    public function get_detalle_pedidos($idPedido) {

        $this->db->select('pedido_detalle.idDetallePedido, pedido_detalle.producto, pedido_detalle.menu, pedido_detalle.cantidad, estado.nombre as estado');
        $this->db->from('pedido_detalle');
        $this->db->join('estado', 'estado.idEstado = pedido_detalle.idEstado');
        $this->db->where('pedido_detalle.idPedido', $idPedido);
        $this->db->where('pedido_detalle.idEstado', 1);
        $this->db->order_by('pedido_detalle.fechaEspera', 'ASC');
        $result = $this->db->get();

        return ($result != '') ? $result->result_array() : false;
    }

    public function get_detalle_pedidos2($idPedido) {

        $this->db->select('pedido_detalle.idDetallePedido, pedido_detalle.producto, pedido_detalle.menu, pedido_detalle.cantidad, estado.nombre as estado');
        $this->db->from('pedido_detalle');
        $this->db->join('estado', 'estado.idEstado = pedido_detalle.idEstado');
        $this->db->where('pedido_detalle.idPedido', $idPedido);
        $this->db->where('pedido_detalle.idEstado', 1);
        $this->db->order_by('seccion.nombre', 'ASC');
        $result = $this->db->get();

        return ($result != '') ? $result->result_array() : false;
    }

    public function get_detalles_pedidos_finalizados() {

        $this->db->select('*');
        $this->db->from('pedido_detalle');
        $this->db->join('estado', 'estado.idEstado = pedido_detalle.idEstado');
        $this->db->where('pedido_detalle.idEstado', 3);
        $this->db->order_by('pedido_detalle.fechaEspera', 'ASC');
        $result = $this->db->get();

        return ($result != '') ? $result->result_array() : false;
    }

    public function get_mesa_detalle_pedido($idDetallePedido) {

        $this->db->select('mesa_x_detalle_pedido.idMesa');
        $this->db->from('mesa_x_detalle_pedido');
        $this->db->where('mesa_x_detalle_pedido.idDetallePedido', $idDetallePedido);
        $result = $this->db->get();

        return ($result != '') ? $result->result_array() : false;
    }

    public function set_estado_listo_para_servir($idDetallePedido) {
        $values = array(
            'idEstado' => 2
        );

        $this->db->where('idDetallePedido', $idDetallePedido);
        $result = $this->db->update('pedido_detalle', $values);

        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function set_estado_notificado($idDetallePedido) {
        $values = array(
            'idEstado' => 3
        );

        $this->db->where('idDetallePedido', $idDetallePedido);
        $result = $this->db->update('pedido_detalle', $values);

        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_cantidad_productos($idDetallePedido) {
        $this->db->select('cantidad');
        $this->db->from('pedido_detalle');
        $this->db->where('idDetallePedido', $idDetallePedido);
        $result = $this->db->get();

        return ($result != '') ? $result->result_array() : false;
    }

    public function get_mesas($idDetallePedido) {
        $this->db->select('idMesa');
        $this->db->from('mesa_x_detalle_pedido');
        $this->db->where('idDetallePedido', $idDetallePedido);
        $result = $this->db->get();

        return ($result != '') ? $result->result_array() : false;
    }
}