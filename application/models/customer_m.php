<?php

class Customer_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_customer($TCno)
    {
        $query = $this->db->get_where('customer', array('customer_TCno' => $TCno));
        if($query) {
            return $query->result();
        } else {
            return $query;
        }
    } 
    function add_customer($data)
    {
        $this->db->insert('customer', $data);
//        return $this->db->affected_rows();
    }

    function get_active_customers()
    {
        $date = date('Y-m-d');
        $q = $this->db->query("CALL get_customers('$date')");

        $data = array();
        foreach ($q->result() as $customer) {
            $data[] = $customer;
        }
        return $data;
    }

    function get_customers()
    {
        $query = $this->db->from('customer')->get();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
            // $row->customer_id
            // $row->customer_username
            // $data[0]->customer_id
        }
        if(count($data))
            return $data;
        return false;
    }
    
    function editCustomer($customer_id, $customer_TCno, $firstname, 
                $lastname, $telephone, $email, $customer_city, $customer_country)
    {
        $data = array('customer_TCno' => $customer_TCno, 
                        'customer_firstname' => $firstname, 'customer_lastname' => $lastname, 
                        'customer_telephone' => $telephone, 'customer_email' => $email, 
                        'customer_city' => $customer_city, 'customer_country' => $customer_country);

        $this->db->where('customer_id', $customer_id);
        $this->db->update('customer', $data); 
    }

    function getCustomerId($customer_id)
    {
        $query = $this->db->get_where('customer', array('customer_id' => $customer_id));
        if($query) {
            return $query->result();
        } else {
            return $query;
        }
    }

    function get_list_customers()
    {
        $query = $this->db->order_by('customer_id', 'DESC')->get('customer');
      
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

    function get_Customer_NroDoc($customer_TCno)
    {
        $query = $this->db->get_where('customer', array('customer_TCno' => $customer_TCno));
      
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

    function deleteCustomer($customer_id)
    {
        $query = $this->db->delete('customer', array('customer_id' => $customer_id)); 
        if($query) {
            return true;
        } else {
            return false;
        }
    }

}
