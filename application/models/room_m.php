<?php

class Room_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_room_types()
    {
        $query = $this->db->get('room_type');
        $data = array();

        if($query)
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
        if(count($data))
            return $data;
        return false;
    } 
    function get_rooms()
    {
        $query = $this->db->order_by('room_id')->get('room');
        $data = array();

        $i=-1;
        foreach (@$query->result() as $row)
        {
            if($i==-1 || $data[$i]->room_type != $row->room_type || $data[$i]->max_id+1!=$row->room_id) {
                $i++;
                if(!is_object($row))
                {
                    $row = new stdClass;
                }
                $data[$i]->room_type = $row->room_type;
                $data[$i]->min_id = intval($row->room_id);
                $data[$i]->max_id = intval($row->room_id);

                $queryA = $this->db->get_where('room_type_rental', array('room_id >=' => $row->room_id, 
                                                'room_id <=' => $row->room_id));
                foreach (@$queryA->result() as $rowA){
                    if($rowA->type_rental_id == HORAS)
                    $data[$i]->precio_hora = intval($rowA->room_price);
                    if($rowA->type_rental_id == DIAS)
                    $data[$i]->precio_dia = intval($rowA->room_price);                
                }

                if($queryA->num_rows() == 0){
                    $data[$i]->precio_hora = 0;
                    $data[$i]->precio_dia = 0;
                }
                
            } else {
                $data[$i]->max_id ++;
            }
        }
        if(count($data))
            return $data;
        return false;
    }

    function addRoomType($type, $price, $details, $quantity)
    {
        $data = array('room_type' => $type, 'room_price' => $price, 'room_details' => $details, 'room_quantity' => $quantity);
        $this->db->insert('room_type', $data);
        return $this->db->affected_rows();
    }

    function deleteRoomType($room_type)
    {
        $this->db->delete('room_type', array('room_type' => $room_type));
        return $this->db->affected_rows();
    }

    function getRoomType($room_type)
    {
        $query = $this->db->get_where('room_type', array('room_type' => $room_type));
        return $query->result();
    }

    function editRoomType($type, $price, $details, $quantity)
    {
        $data = array('room_type' => $type, 'room_price' => $price, 'room_details' => $details, 'room_quantity' => $quantity);

        $this->db->where('room_type', $type);
        $this->db->update('room_type', $data); 
    }

    function getRoom($room_type)
    {
        $query = $this->db->get_where('room', array('room_type' => $room_type));
        return $query->result();
    }

    function isAvailRange($room_type, $min_id, $max_id) {
        $query = $this->db->get_where('room', array('room_type !=' => $room_type, 'room_id >=' => $min_id, 'room_id <=' => $max_id));
        return $query->result();
    }
    function getRoomRange($room_type, $min_id, $max_id) {
        $query = $this->db->get_where('room', array('room_id >=' => $min_id, 'room_id <=' => $max_id));
        return $query->result();
    }
    function deleteRoomRange($min_id, $max_id) {
        $this->db->delete('room', array('room_id >=' => $min_id, 'room_id <=' => $max_id));
        return $this->db->affected_rows();
    }

    function deleteRoomRangeTypeRental($min_id, $max_id) {
        $this->db->delete('room_type_rental', array('room_id >=' => $min_id, 'room_id <=' => $max_id));
        return $this->db->affected_rows();
    }

    function addRoomRange($room_type, $min_id, $max_id, $precio_hora, $precio_dia) {
        $data = array();
        for($i = $min_id; $i<=$max_id; ++$i) {
            $data[] = array('room_type' => $room_type, 'room_id' => $i);
        }
        $this->db->insert_batch('room', $data);

        $data = array();

        if(floatval($precio_hora) > 0){
            for($i = $min_id; $i<=$max_id; ++$i) {
                $data[] = array('type_rental_id' => HORAS, 'room_id' => $i, 'room_price' => $precio_hora);
            }
            $this->db->insert_batch('room_type_rental', $data);
        }

        $data = array();

        if(floatval($precio_dia) > 0){
            for($i = $min_id; $i<=$max_id; ++$i) {
                $data[] = array('type_rental_id' => DIAS, 'room_id' => $i, 'room_price' => $precio_dia);
            }
            $this->db->insert_batch('room_type_rental', $data);
        }

        return $this->db->affected_rows();
    }

    function add_room_sale($data) {
        // $query = $this->db->join("room_type","room_type.room_type = room.room_type", "left")->get_where("room", array('room_id' => $data['room_id']));
        // if(!$query || $query->num_rows() == 0) {
        //     return false;
        // }
        // $price = $query->result();
        //$data['room_sales_price'] = $price[0]->room_price;
        $data['total_service_price'] = 0;
        $this->db->insert('room_sales', $data);
    }

    //Nuevas funciones para combos

    function get_type_rental()
    {
        $query = $this->db->get('type_rental');
        $data = array();

        if($query)
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
        if(count($data))
            return $data;

        return false;
    }

    function get_type_rental_ID($type_rental_id)
    {
        $query = $this->db->get_where('type_rental', array('type_rental_id' => $type_rental_id));
        $data = array();

        if($query)
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
        if(count($data))
            return $data;

        return false;
    }

    function get_contact_channel()
    {
        $query = $this->db->get('contact_channel');
        $data = array();

        if($query)
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
        if(count($data))
            return $data;

        return false;
    }

    function get_contact_channel_ID($contact_channel_id)
    {
        $query = $this->db->get_where('contact_channel', array('contact_channel_id' => $contact_channel_id));
        $data = array();

        if($query)
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
        if(count($data))
            return $data;

        return false;
    }

    function get_room_type_rental($type_rental_id, $room_id) {
        $query = $this->db->get_where('room_type_rental', array('room_id =' => $room_id, 'type_rental_id =' => $type_rental_id));
        //return $query->result();
        $data = array();

        if($query)
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
        if(count($data))
            return $data;

        return false;
    }

    function get_Room_ID($room_id)
    {
        $query = $this->db->get_where('room', array('room_id' => $room_id));
        $data = array();

        if($query)
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
        if(count($data))
            return $data;

        return false;
    }

}
