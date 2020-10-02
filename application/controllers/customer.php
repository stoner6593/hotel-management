<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function check_login()
	{
		if(!UID)
			redirect("login");
	} 

	public function add($ref="")
	{
		// 	customer_id	customer_firstname	customer_lastname	customer_TCno	customer_city	customer_country	customer_telephone	customer_email
		$data = $this->input->post();
		$selectCustomer=$this->customer_m->get_customer($data["customer_TCno"]);
		$viewdata = array('reference' => '');

		if($data["customer_TCno"])
		{
			
			if($selectCustomer){
			
				$this->session->set_flashdata('customer','El DNI: '.$selectCustomer[0]->customer_TCno.' - '.$selectCustomer[0]->customer_firstname .' ya está registrado, por favor verifique..!'); 
				$viewdata = array('reference' => '');
				redirect('customer/add');
				//print_r($selectCustomer[0]->customer_TCno);
				
			}else{
				$this->customer_m->add_customer($data);
				$viewdata = array('reference' => 'reservation');
				redirect("/reservation");
				
			}
		}
		
		
		$data = array('title' => 'Add Customer - DB Hotel Management System', 'page' => 'customer');
		$this->load->view('header', $data);
		$this->load->view('customer/add',$viewdata);
		$this->load->view('footer');
	}

	public function index()
	{
		$employees = $this->customer_m->get_customers();

		$viewdata = array('customers' => $employees);

		$data = array('title' => 'Customers - DB Hotel Management System', 'page' => 'customer');
		$this->load->view('header', $data);
		$this->load->view('customer/list',$viewdata);
		$this->load->view('footer');
	}

	public function edit($customer_id)
	{
		if($this->input->post("TCno") && $this->input->post("firstname") && $this->input->post("lastname"))
		{
			$TCno = $this->input->post("TCno");
			//$password = $this->input->post("password");
			$firstname = $this->input->post("firstname");
			$lastname = $this->input->post("lastname");
			$telephone = $this->input->post("telephone");
			$email = $this->input->post("email");
			//$department_id = $this->input->post("department_id");
			$city = $this->input->post("city");
			$country = $this->input->post("country");
			//$hiring_date = $this->input->post("hiring_date");
			
			$this->customer_m->editCustomer($customer_id, $TCno, //$password, 
										$firstname, $lastname, $telephone, $email, //$department_id, 
										$city, $country);
			redirect("/customer");
		}
		
		$data = array('title' => 'Edit Customer - DB Hotel Management System', 'page' => 'customer');
		$this->load->view('header', $data);

		//$departments = $this->employee_m->getDepartments();
		$employee = $this->customer_m->getCustomerId($customer_id);
		
		$viewdata = array('customer'  => $employee[0]);
		$this->load->view('customer/edit',$viewdata);

		$this->load->view('footer');
	}

	function delete($customer_id)
	{
		$this->customer_m->deleteCustomer($customer_id);
		redirect("/customer");
	}

	function searchCustomer($number){
		/*
		//$this->load->library('guzzle');

		# guzzle client define
		$client = new \GuzzleHttp\Client();

		#This url define speific Target for guzzle
		$url        = 'https://apiperu.dev';

		#guzzle
		try {
			# guzzle post request example with form parameter
			$parameters = [
				'http_errors' => false,
				'connect_timeout' => 5,
				'headers' => [
					'Authorization' => 'Bearer '.$token,
					'Accept' => 'application/json',
				],
			];
	
			$response = $client->request('GET', '/api/'.$type.'/'.$number, $parameters);
			#guzzle repose for future use
			echo $response->getStatusCode(); // 200
			echo $response->getReasonPhrase(); // OK
			echo $response->getProtocolVersion(); // 1.1
			echo $response->getBody();
		} catch (GuzzleHttp\Exception\BadResponseException $e) {
			#guzzle repose for future use
			$response = $e->getResponse();
			$responseBodyAsString = $response->getBody()->getContents();
			print_r($responseBodyAsString);
		}*/
	}
/*
	function delete($employee_id)
	{
		$this->employee_m->deleteEmployee($employee_id);
		redirect("/employee");
	}

	public function edit($employee_id)
	{
		if($this->input->post("username") && $this->input->post("password") && $this->input->post("email"))
		{
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$firstname = $this->input->post("firstname");
			$lastname = $this->input->post("lastname");
			$telephone = $this->input->post("telephone");
			$email = $this->input->post("email");
			$department_id = $this->input->post("department_id");
			$type = $this->input->post("type");
			$salary = $this->input->post("salary");
			$hiring_date = $this->input->post("hiring_date");
			
			$this->employee_m->editEmployee($employee_id, $username, $password, $firstname, $lastname, $telephone, $email, $department_id, $type, $salary, $hiring_date);
			redirect("/employee");
		}
		
		$data = array('title' => 'Edit Employee - DB Hotel Management System', 'page' => 'employee');
		$this->load->view('header', $data);

		$departments = $this->employee_m->getDepartments();
		$employee = $this->employee_m->getEmployee($employee_id);
		
		$viewdata = array('departments' => $departments, 'employee'  => $employee[0]);
		$this->load->view('employee/edit',$viewdata);

		$this->load->view('footer');
	}

	public function index()
	{
		$this->check_login();
		
		$room_types = $this->room_m->getRoomTypes();
		$viewdata = array('room_types' => $room_types);
		$data = array('title' => 'Reservation - DB Hotel Management System', 'page' => 'reservation');
		$this->load->view('header', $data);
		$this->load->view('reservation/add', $viewdata);
		$this->load->view('footer');
	}
	public function make($year, $month, $day)
	{
		$data = array('title' => 'Reservation - DB Hotel Management System', 'page' => 'reservation');
		$this->load->view('header', $data);
		echo $year." ".$month." ".$day;
		// $this->load->view('reservation/make');
		$this->load->view('footer');
	}*/
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */