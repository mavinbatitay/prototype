<?php 
	/**
	 * 
	 */
	class profile_m extends CI_Model
	{
		function updateuser_m($userid,$values){
			$this->db->where("mluser_id",$userid);
			$this->db->update("tblmlwuser",$values);

			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
?>