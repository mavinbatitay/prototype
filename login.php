<?php
	/**
	 * 
	 */
	class login extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->model("login_m");
		}

		function index(){
			$this->load->view("common/header_v");
			$this->load->view("login_v");
			$this->load->view("common/footer_v");
		}

		function userdepartment_c(){
			$data["success"] = false;

			$username = $this->input->post("txtnmUsername");
			$password = $this->input->post("txtnmPassword");

			$data["data"] = $this->login_m->userdepartment_m($username,$password);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function userlogin_c(){
			$data["success"] = false;

			$username = $this->input->post("txtnmUsername");
			$password = $this->input->post("txtnmPassword");

			$response = $this->login_m->userlogin_m($username,$password);

			if(count($response)>0){
				$data["success"] = true;
				$this->session->set_userdata($response);
			}
			echo json_encode($data);
		}
	}
?>