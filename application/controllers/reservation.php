<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservation extends CI_Controller {

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

	public function check($ref="") {
		$post = $this->input->post();

		$customer = $this->customer_m->get_customer($post['customer_TCno']);
		$viewdata = array();

		$data = array('title' => 'Add Customer - DB Hotel Management System', 'page' => 'reservation');
		$this->load->view('header', $data);

		if(!$customer) {
			$viewdata['error'] = "El cliente no existe";
		} else {
			$rooms = $this->reservation_m->get_available_rooms($post['room_type'], 
					$post['checkin_date'], $post['checkout_date'], $post['type_rental']);
			if(!$rooms) {
				$viewdata['error'] = "No hay habitaciones disponibles";
			}
		}
		if(isset($viewdata['error'])){
			$room_types = $this->room_m->get_room_types();
			$type_rental = $this->room_m->get_type_rental();
			$contact_channel = $this->room_m->get_contact_channel();
			$list_customers = $this->customer_m->get_list_customers();
			$viewdata['room_types'] = $room_types;
			$viewdata['type_rental'] = $type_rental;
			$viewdata['contact_channel'] = $contact_channel;
			$viewdata['list_customers'] = $list_customers;
			/*$viewdata = array('room_types' => $room_types, 'type_rental' => $type_rental, 
							'contact_channel' => $contact_channel,
							'list_customers' => $list_customers);*/
			$this->load->view('reservation/add',$viewdata);
		} else {
			$viewdata['rooms'] = $rooms;
			$viewdata['customer_TCno'] = $post['customer_TCno'];
			$viewdata['checkin_date'] = $post['checkin_date'];
			$viewdata['checkout_date'] = $post['checkout_date'];
			$viewdata['room_type'] = $post['room_type'];

			$customer = $this->customer_m->get_Customer_NroDoc($post['customer_TCno']);
			$viewdata['customer'] = $customer;

			$viewdata['type_rental'] = $post['type_rental'];
			$viewdata['checkin_hour'] = $post['checkin_hour'];
			$viewdata['checkout_hour'] = $post['checkout_hour'];
			$viewdata['contact_channel'] = $post['contact_channel'];

			$type_rental_obj = $this->room_m->get_type_rental_ID($post['type_rental']);
			$viewdata['type_rental_obj'] = $type_rental_obj;

			$contact_channel_obj = $this->room_m->get_contact_channel_ID($post['contact_channel']);
			$viewdata['contact_channel_obj'] = $contact_channel_obj;

			$viewdata['nro_days'] = 0;
			$viewdata['nro_hours'] = 0;

			if($post['type_rental'] == DIAS){
				$now = strtotime($post['checkout_date']); // or your date as well
				$your_date = strtotime($post['checkin_date']);
				$datediff = $now - $your_date;

				$viewdata['nro_days'] = round($datediff / (60 * 60 * 24));
			}

			if($post['type_rental'] == HORAS){
				$start_t = new DateTime($post['checkin_hour']);
				$current_t = new DateTime($post['checkout_hour']);
				$difference = $start_t ->diff($current_t );
				//$viewdata['nro_hours'] = $difference ->format('%H:%I:%S');
				$viewdata['nro_hours'] = $difference ->format('%H');
			}

//			echo "<pre>";
//			var_dump($viewdata);return;echo "</pre>";
			$this->load->view('reservation/list',$viewdata);
		}

		$this->load->view('footer');
	}

	public function index()
	{
		$this->check_login();

		$room_types = $this->room_m->get_room_types();
		$type_rental = $this->room_m->get_type_rental();
		$contact_channel = $this->room_m->get_contact_channel();
		$list_customers = $this->customer_m->get_list_customers();

		$viewdata = array('room_types' => $room_types, 'type_rental' => $type_rental, 
							'contact_channel' => $contact_channel,
							'list_customers' => $list_customers);
		$data = array('title' => 'Reservation - DB Hotel Management System', 'page' => 'reservation');
		$this->load->view('header', $data);
		$this->load->view('reservation/add', $viewdata);
		$this->load->view('footer');
	}
	public function make()
	{
		$post = $this->input->post();

		$customer = $this->customer_m->get_customer($post['customer_TCno']);
		$customer = $customer[0];
		$viewdata = array();
		$data = array();
		$data['customer_id'] = $customer->customer_id;
		$data['room_id'] = $post['room_id'];
		$data['checkin_date'] = $post['checkin_date'];
		$data['checkout_date'] = $post['checkout_date'];
		$data['employee_id'] = UID;

		//$data['customer'] = $customer;
		$data['type_rental_id'] = $post['type_rental'];
		$data['start_time'] = $post['checkin_hour'];
		$data['end_time'] = $post['checkout_hour'];
		$data['contact_channel_id'] = $post['contact_channel'];
		$data['observacion'] = $post['observacion'];
		//$data['nro_days'] = $post['nro_days'];
		//$data['nro_hours'] = $post['nro_hours'];

		$nro_days = $post['nro_days'];
		$nro_hours = $post['nro_hours'];
		$type_rental_id = $post['type_rental'];		
		$room_type_rental_price = 0.00;
		$room_total_price = 0.00;

		$ar_rental_price = $this->room_m->get_room_type_rental($type_rental_id, $post['room_id']);
		foreach ($ar_rental_price as $k=>$rt) {
			$room_type_rental_price = $rt->room_price;
		}

		if(intval($type_rental_id) == DIAS){
			if(intval($nro_days) > 0){			
				$room_total_price = intval($nro_days) * $room_type_rental_price;
			}
		}

		if(intval($type_rental_id) == HORAS){
			if(intval($nro_hours) > 0){			
				//$room_total_price = intval($nro_hours) * $room_type_rental_price;
				$room_total_price = intval(1) * $room_type_rental_price;
			}
			$data['checkout_date'] = $post['checkin_date'];
		}
		$data['reservation_price'] = $room_total_price;

		$date = new DateTime();
		$date_s = $date->format('Y-m-d');
		if($date_s>$data['checkin_date']) {
			$viewdata['error'] = "El registro no puede ser antes de hoy";
		} else {
			$this->reservation_m->add_reservation($data);
			
			$dataSales = array();
			$dataSales['room_id'] = $post['room_id'];
			$dataSales['checkin_date'] = $post['checkin_date'];
			$dataSales['checkout_date'] = $post['checkout_date'];
			$dataSales['room_sales_price'] = $room_total_price;
			$dataSales['employee_id'] = UID;
			$this->room_m->add_room_sale($dataSales);
			$viewdata['success'] = 'Reserva realizada con éxito';
		}

		$room_types = $this->room_m->get_room_types();
		$type_rental = $this->room_m->get_type_rental();
		$contact_channel = $this->room_m->get_contact_channel();
		$list_customers = $this->customer_m->get_list_customers();
		$viewdata['room_types'] = $room_types;
		$viewdata['type_rental'] = $type_rental;
		$viewdata['contact_channel'] = $contact_channel;
		$viewdata['list_customers'] = $list_customers;

		$data = array('title' => 'Reservation - DB Hotel Management System', 'page' => 'reservation');
		$this->load->view('header', $data);
		$this->load->view('reservation/add', $viewdata);
		$this->load->view('footer');
	}

	public function list_report($ref="")
	{
		$post = $this->input->post();
		$checkin_date_from = (new DateTime())->format('Y-m-d');
		$checkin_date_to = (new DateTime())->format('Y-m-d');
		$reservation_status = "0";

		if(isset($post["checkin_date_from"]) && isset($post["checkin_date_to"])
				&& isset($post["reservation_status"])){

			$checkin_date_from = $this->input->post("checkin_date_from");
			$checkin_date_to = $this->input->post("checkin_date_to");
			$reservation_status = $this->input->post("reservation_status");
		}

		//$checkin_date_from = $this->input->post("checkin_date_from");

		$departments = $this->departments_m->get_departments();

		$list_report = $this->reservation_m->get_report_reservation($checkin_date_from, $checkin_date_to, intval($reservation_status));
		$list_reservation_status = $this->reservation_m->get_reservation_status();
		$viewdata = array('departments' => $departments, 
							'list_report' => $list_report,
							'list_reservation_status' => $list_reservation_status,
							'checkin_date_from' => $checkin_date_from,
							'checkin_date_to' => $checkin_date_to,
							'reservation_status' => $reservation_status
						);

		if($ref == "1"){
			$viewdata['success'] = 'Reserva modificada con éxito';
		}

		$data = array('title' => 'Reporte Reservaciones - DB Hotel Management System', 'page' => 'reservation');
		$this->load->view('header', $data);
		$this->load->view('reservation/list_report',$viewdata);
		$this->load->view('footer');
	}

	public function edit($reservation_id)
	{
		$post = $this->input->post();

		$reservation = $this->reservation_m->get_reservation_ID($reservation_id);

		$customer = $this->customer_m->getCustomerId($reservation[0]->customer_id);
		//$customer = $customer[0];

		$viewdata = array();
		//$data = array();
		$viewdata['customer'] = $customer;
		$viewdata['customer_TCno'] = $customer[0]->customer_TCno;
		$viewdata['reservation_id'] = $reservation_id;
		$viewdata['customer_id'] = $reservation[0]->customer_id;
		$viewdata['room_id'] = $reservation[0]->room_id;
		$viewdata['checkin_date'] = $reservation[0]->checkin_date;
		$viewdata['checkout_date'] = $reservation[0]->checkout_date;
		$viewdata['employee_id'] = UID;

		//$data['customer'] = $customer;
		$viewdata['type_rental_id'] = $reservation[0]->type_rental_id;
		$viewdata['start_time'] = $reservation[0]->start_time;
		$viewdata['end_time'] = $reservation[0]->end_time;
		$viewdata['contact_channel_id'] = $reservation[0]->contact_channel_id;
		$viewdata['observacion'] = $reservation[0]->observacion;
		$viewdata['status'] = $reservation[0]->status;
		$viewdata['type_pay'] = $reservation[0]->type_pay;
		//$data['nro_days'] = $post['nro_days'];
		//$data['nro_hours'] = $post['nro_hours'];
		$room = $this->room_m->get_Room_ID($reservation[0]->room_id);
		$viewdata['room_type'] = $room[0]->room_type;


		$nro_days = 0;
		$nro_hours = 0;
		$type_rental_id = $reservation[0]->type_rental_id;		

		$viewdata['nro_days'] = 0;
		$viewdata['nro_hours'] = 0;

			if($type_rental_id == DIAS){
				$now = strtotime($reservation[0]->checkout_date); // or your date as well
				$your_date = strtotime($reservation[0]->checkin_date);
				$datediff = $now - $your_date;

				$viewdata['nro_days'] = round($datediff / (60 * 60 * 24));
			}

			if($type_rental_id == HORAS){
				$start_t = new DateTime($reservation[0]->start_time);
				$current_t = new DateTime($reservation[0]->end_time);
				$difference = $start_t ->diff($current_t );
				//$viewdata['nro_hours'] = $difference ->format('%H:%I:%S');
				$viewdata['nro_hours'] = $difference ->format('%H');
			}

		$room_type_rental_price = 0.00;
		$room_total_price = 0.00;

		// $ar_rental_price = $this->room_m->get_room_type_rental($type_rental_id, $post['room_id']);
		// foreach ($ar_rental_price as $k=>$rt) {
		// 	$room_type_rental_price = $rt->room_price;
		// }

		// if(intval($type_rental_id) == DIAS){
		// 	if(intval($nro_days) > 0){			
		// 		$room_total_price = intval($nro_days) * $room_type_rental_price;
		// 	}
		// }

		// if(intval($type_rental_id) == HORAS){
		// 	if(intval($nro_hours) > 0){			
		// 		$room_total_price = intval($nro_hours) * $room_type_rental_price;
		// 	}
		// 	$data['checkout_date'] = $post['checkin_date'];
		// }
		$viewdata['reservation_price'] = $reservation[0]->reservation_price;

		// $date = new DateTime();
		// $date_s = $date->format('Y-m-d');
		// if($date_s>$data['checkin_date']) {
		// 	$viewdata['error'] = "El registro no puede ser antes de hoy";
		// } else {
		// 	$this->reservation_m->add_reservation($data);
			
		// 	$dataSales = array();
		// 	$dataSales['room_id'] = $post['room_id'];
		// 	$dataSales['checkin_date'] = $post['checkin_date'];
		// 	$dataSales['checkout_date'] = $post['checkout_date'];
		// 	$dataSales['room_sales_price'] = $room_total_price;
		// 	$dataSales['employee_id'] = UID;
		// 	$this->room_m->add_room_sale($dataSales);
		// 	$viewdata['success'] = 'Reserva realizada con éxito';
		// }

		$room_types = $this->room_m->get_room_types();
		$type_rental = $this->room_m->get_type_rental();
		$contact_channel = $this->room_m->get_contact_channel();
		$list_customers = $this->customer_m->get_list_customers();
		$list_status = $this->reservation_m->get_reservation_status();
		$list_type_pay = $this->reservation_m->get_reservation_type_pay();
		$viewdata['room_types'] = $room_types;
		$viewdata['type_rental'] = $type_rental;
		$viewdata['contact_channel'] = $contact_channel;
		$viewdata['list_customers'] = $list_customers;
		$viewdata['list_status'] = $list_status;
		$viewdata['list_type_pay'] = $list_type_pay;		

		$data = array('title' => 'Editar - DB Hotel Management System', 'page' => 'reservation');
		$this->load->view('header', $data);
		$this->load->view('reservation/edit', $viewdata);
		$this->load->view('footer');
	}

	public function saveedit()
	{
		$post = $this->input->post();

		//$customer = $this->customer_m->get_customer($post['customer_TCno']);
		//$customer = $customer[0];
		$viewdata = array();
		$data = array();
		//$data['customer_id'] = $customer->customer_id;
		//$data['reservation_id'] = $post['reservation_id'];
		// $data['checkin_date'] = $post['checkin_date'];
		// $data['checkout_date'] = $post['checkout_date'];
		$data['employee_id'] = UID;

		//$data['customer'] = $customer;
		// $data['type_rental_id'] = $post['type_rental'];
		// $data['start_time'] = $post['checkin_hour'];
		// $data['end_time'] = $post['checkout_hour'];
		$data['contact_channel_id'] = $post['contact_channel'];
		$data['observacion'] = $post['observacion'];
		$data['status'] = $post['status'];
		$data['type_pay'] = $post['type_pay'];
		//$data['nro_days'] = $post['nro_days'];
		//$data['nro_hours'] = $post['nro_hours'];

		// $nro_days = $post['nro_days'];
		// $nro_hours = $post['nro_hours'];
		// $type_rental_id = $post['type_rental'];		
		// $room_type_rental_price = 0.00;
		// $room_total_price = 0.00;

		// $ar_rental_price = $this->room_m->get_room_type_rental($type_rental_id, $post['room_id']);
		// foreach ($ar_rental_price as $k=>$rt) {
		// 	$room_type_rental_price = $rt->room_price;
		// }

		// if(intval($type_rental_id) == DIAS){
		// 	if(intval($nro_days) > 0){			
		// 		$room_total_price = intval($nro_days) * $room_type_rental_price;
		// 	}
		// }

		// if(intval($type_rental_id) == HORAS){
		// 	if(intval($nro_hours) > 0){			
		// 		$room_total_price = intval($nro_hours) * $room_type_rental_price;
		// 	}
		// 	$data['checkout_date'] = $post['checkin_date'];
		// }
		// $data['reservation_price'] = $room_total_price;

		// $date = new DateTime();
		// $date_s = $date->format('Y-m-d');
		// if($date_s>$data['checkin_date']) {
		// 	$viewdata['error'] = "El registro no puede ser antes de hoy";
		// } else {
		// 	$this->reservation_m->add_reservation($data);
			
		// 	$dataSales = array();
		// 	$dataSales['room_id'] = $post['room_id'];
		// 	$dataSales['checkin_date'] = $post['checkin_date'];
		// 	$dataSales['checkout_date'] = $post['checkout_date'];
		// 	$dataSales['room_sales_price'] = $room_total_price;
		// 	$dataSales['employee_id'] = UID;
		// 	$this->room_m->add_room_sale($dataSales);
		// 	$viewdata['success'] = 'Reserva realizada con éxito';
		// }

		$this->reservation_m->upd_reservation($data, $post['reservation_id']);
		$viewdata['success'] = 'Reserva modificada con éxito';

		// $room_types = $this->room_m->get_room_types();
		// $type_rental = $this->room_m->get_type_rental();
		// $contact_channel = $this->room_m->get_contact_channel();
		// $list_customers = $this->customer_m->get_list_customers();
		// $viewdata['room_types'] = $room_types;
		// $viewdata['type_rental'] = $type_rental;
		// $viewdata['contact_channel'] = $contact_channel;
		// $viewdata['list_customers'] = $list_customers;

		// $data = array('title' => 'Reservation - DB Hotel Management System', 'page' => 'reservation');
		// $this->load->view('header', $data);
		// $this->load->view('reservation/list_report', $viewdata);
		// $this->load->view('footer');
		//return list_report("1");
		return redirect('reservation/list_report/1'); 
	}

	public function print($reservation_id)
	{
		$post = $this->input->post();

		$reservation = $this->reservation_m->get_reservation_ID($reservation_id);

		$customer = $this->customer_m->getCustomerId($reservation[0]->customer_id);
		//$customer = $customer[0];

		$viewdata = array();
		//$data = array();
		$viewdata['customer'] = $customer;
		$viewdata['customer_TCno'] = $customer[0]->customer_TCno;
		$viewdata['reservation_id'] = $reservation_id;
		$viewdata['customer_id'] = $reservation[0]->customer_id;
		$viewdata['room_id'] = $reservation[0]->room_id;
		$viewdata['checkin_date'] = $reservation[0]->checkin_date;
		$viewdata['checkout_date'] = $reservation[0]->checkout_date;
		$viewdata['employee_id'] = UID;

		//$data['customer'] = $customer;
		$viewdata['type_rental_id'] = $reservation[0]->type_rental_id;
		$viewdata['start_time'] = $reservation[0]->start_time;
		$viewdata['end_time'] = $reservation[0]->end_time;
		$viewdata['contact_channel_id'] = $reservation[0]->contact_channel_id;
		$viewdata['observacion'] = $reservation[0]->observacion;
		$viewdata['status'] = $reservation[0]->status;
		$viewdata['type_pay'] = $reservation[0]->type_pay;
		//$data['nro_days'] = $post['nro_days'];
		//$data['nro_hours'] = $post['nro_hours'];
		$room = $this->room_m->get_Room_ID($reservation[0]->room_id);
		$viewdata['room_type'] = $room[0]->room_type;


		$nro_days = 0;
		$nro_hours = 0;
		$type_rental_id = $reservation[0]->type_rental_id;		

		$viewdata['nro_days'] = 0;
		$viewdata['nro_hours'] = 0;

			if($type_rental_id == DIAS){
				$now = strtotime($reservation[0]->checkout_date); // or your date as well
				$your_date = strtotime($reservation[0]->checkin_date);
				$datediff = $now - $your_date;

				$viewdata['nro_days'] = round($datediff / (60 * 60 * 24));
			}

			if($type_rental_id == HORAS){
				$start_t = new DateTime($reservation[0]->start_time);
				$current_t = new DateTime($reservation[0]->end_time);
				$difference = $start_t ->diff($current_t );
				//$viewdata['nro_hours'] = $difference ->format('%H:%I:%S');
				$viewdata['nro_hours'] = $difference ->format('%H');
			}

		$room_type_rental_price = 0.00;
		$room_total_price = 0.00;

		$viewdata['reservation_price'] = $reservation[0]->reservation_price;

		$room_types = $this->room_m->get_room_types();
		$type_rental = $this->room_m->get_type_rental();
		$contact_channel = $this->room_m->get_contact_channel();
		$list_customers = $this->customer_m->get_list_customers();
		$list_status = $this->reservation_m->get_reservation_status();
		$list_type_pay = $this->reservation_m->get_reservation_type_pay();
		$viewdata['room_types'] = $room_types;
		$viewdata['type_rental'] = $type_rental;
		$viewdata['contact_channel'] = $contact_channel;
		$viewdata['list_customers'] = $list_customers;
		$viewdata['list_status'] = $list_status;
		$viewdata['list_type_pay'] = $list_type_pay;		

		$data = array('title' => ' Rpte - DB Hotel Management System', 'page' => 'reservation');
		$this->load->view('header', $data);
		$this->load->view('reservation/print', $viewdata);
		$this->load->view('footer');
	}

	public function report($reservation_id){

	

		$reservation = $this->reservation_m->get_reservation_ID($reservation_id);

		$customer = $this->customer_m->getCustomerId($reservation[0]->customer_id);
		//$customer = $customer[0];

		$viewdata = array();
		//$data = array();
		$viewdata['customer'] = $customer;
		$viewdata['customer_TCno'] = $customer[0]->customer_TCno;
		$viewdata['reservation_id'] = $reservation_id;
		$viewdata['customer_id'] = $reservation[0]->customer_id;
		$viewdata['room_id'] = $reservation[0]->room_id;
		$viewdata['checkin_date'] = $reservation[0]->checkin_date;
		$viewdata['checkout_date'] = $reservation[0]->checkout_date;
		$viewdata['employee_id'] = UID;

		//$data['customer'] = $customer;
		$viewdata['type_rental_id'] = $reservation[0]->type_rental_id;
		$viewdata['start_time'] = $reservation[0]->start_time;
		$viewdata['end_time'] = $reservation[0]->end_time;
		$viewdata['contact_channel_id'] = $reservation[0]->contact_channel_id;
		$viewdata['observacion'] = $reservation[0]->observacion;
		$viewdata['status'] = $reservation[0]->status;
		$viewdata['type_pay'] = $reservation[0]->type_pay;
		//$data['nro_days'] = $post['nro_days'];
		//$data['nro_hours'] = $post['nro_hours'];
		$room = $this->room_m->get_Room_ID($reservation[0]->room_id);
		$viewdata['room_type'] = $room[0]->room_type;


		$nro_days = 0;
		$nro_hours = 0;
		$type_rental_id = $reservation[0]->type_rental_id;		

		$viewdata['nro_days'] = 0;
		$viewdata['nro_hours'] = 0;

			if($type_rental_id == DIAS){
				$now = strtotime($reservation[0]->checkout_date); // or your date as well
				$your_date = strtotime($reservation[0]->checkin_date);
				$datediff = $now - $your_date;

				$viewdata['nro_days'] = round($datediff / (60 * 60 * 24));
			}

			if($type_rental_id == HORAS){
				$start_t = new DateTime($reservation[0]->start_time);
				$current_t = new DateTime($reservation[0]->end_time);
				$difference = $start_t ->diff($current_t );
				//$viewdata['nro_hours'] = $difference ->format('%H:%I:%S');
				$viewdata['nro_hours'] = $difference ->format('%H');
			}

		$room_type_rental_price = 0.00;
		$room_total_price = 0.00;

		$viewdata['reservation_price'] = $reservation[0]->reservation_price;

		$room_types = $this->room_m->get_room_types();
		$type_rental = $this->room_m->get_type_rental();
		$contact_channel = $this->room_m->get_contact_channel();
		$list_customers = $this->customer_m->get_list_customers();
		$list_status = $this->reservation_m->get_reservation_status();
		$list_type_pay = $this->reservation_m->get_reservation_type_pay();
		$viewdata['room_types'] = $room_types;
		$viewdata['type_rental'] = $type_rental;
		$viewdata['contact_channel'] = $contact_channel;
		$viewdata['list_customers'] = $list_customers;
		$viewdata['list_status'] = $list_status;
		$viewdata['list_type_pay'] = $list_type_pay;	
		$viewdata['title'] = "Hotel Management System";	
		$viewdata['document'] = "Documento de reservación";	
			

		$html = $this->load->view('pdf_exports/genera_pdf', $viewdata, TRUE);

		// Cargamos la librería
		$this->load->library('pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'comprobante_pago';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		
		$this->pdfgenerator->generate($html, $filename, true, 'Letter', 'portrait');

		
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */