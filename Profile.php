<?php 
	/**
	 * 
	 */
	class Profile extends CI_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->model("profile_m");
		}

		function index(){
			$this->load->view("common/header");
			$this->load->view("common/navbar");
			$this->load->view("profile_v");
			$this->load->view("common/footer");
		}

		function updateuser_c(){
			$data["success"] = false;

			$userid = $this->input->post("txtnmUserID");
			$values = array(
				'firstname' => $this->input->post("txtnmPostedfirstname"),
				'lastname' => $this->input->post("txtnmPostedlastname")
			);

			$response = $this->profile_m->updateuser_m($userid,$values);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function updateimg_c(){
			$data["success"] = false;

			$userid = $this->input->post("txtnmUserID");
			$values = array(
				'imguser' => $this->input->post("txtnmPostedimg")
			);

			$response = $this->profile_m->updateuser_m($userid,$values);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function view_c(){
			if(isset($_FILES['file']['name'])){

			   /* Getting file name */   $filename = $_FILES['file']['name'];

			   /* Location */   $location = "../MLWT/userimg/".$filename;
			   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
			   $imageFileType = strtolower($imageFileType);

			   /* Valid extensions */   $valid_extensions = array("jpg","jpeg","png");

			   $response = 0;
			   /* Check file extension */   if(in_array(strtolower($imageFileType), $valid_extensions)) {
			      /* Upload file */      if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
			         $response = $location;
			      }
			   }

			   echo $response;
			   exit;
			}

			echo 0;
		}
	}
?>