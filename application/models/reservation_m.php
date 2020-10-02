<?php

class Reservation_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_available_rooms($room_type, $checkin_date, $checkout_date, $type_rental)
    {
        $query = $this->db->query("CALL get_available_rooms('$room_type','$checkin_date','$checkout_date',$type_rental)");
        
        $this->db->reconnect();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
        }
        if(count($data))
            return $data;
        return false;
    }

    public function add_reservation($data, $date=NULL)
    {
        //$data['reservation_date'] = $date;
        $query = $this->db->insert('reservation', $data);
//        return $query->affected_rows();
    }

    //Nuevas funciones para combos

    function get_reservation_status()
    {
        $query = $this->db->get('reservation_status');
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

    function get_reservation_type_pay()
    {
        $query = $this->db->get('reservation_type_pay');
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

    function get_report_reservation($checkin_date_from, $checkin_date_to, $status)
    {
        $query = $this->db->query("CALL get_report_reservation('$checkin_date_from', '$checkin_date_to', $status)");
        
        $this->db->reconnect();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
        }
        //if(count($data))
            return $data;
        //return false;
    }

    function get_reservation_ID($reservation_id)
    {
        $query = $this->db->get_where('reservation', array('reservation_id' => $reservation_id));
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

    public function upd_reservation($data, $reservation_id)
    {
        $this->db->where('reservation_id', $reservation_id);
        $query = $this->db->update('reservation', $data);
//        return $query->affected_rows();
    }

    public function report($id){

    }
}
