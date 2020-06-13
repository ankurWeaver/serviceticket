<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class ServiceCatalogue extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($msc_id = 0)
	{
        if(!empty($msc_id)){
            $data = $this->db->get_where("mst_service_catalogue", ['msc_id' => $msc_id])->row_array();
        }else{
            $data = $this->db->get("mst_service_catalogue")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
	
	
	public function detailview_get($mss_createdby_mu_id = 0)
	{
        if(!empty($mss_createdby_mu_id)){
            
			$condQry = "SELECT * FROM `mst_service_catalogue`,mst_users where mss_createdby_mu_id=mu_id and mss_createdby_mu_id='{$mss_createdby_mu_id}'";
			$data = $this->db->query($condQry)->row_array();
			
        }else{
			
			$condQry = "SELECT * FROM `mst_service_catalogue`,mst_users where mss_createdby_mu_id=mu_id";
			$data = $this->db->query($condQry)->result();
           
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
	
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('mst_service_catalogue',$input);
     
        $this->response(['Item created successfully.','201'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($msc_id)
    {
        $input = $this->put();
        $this->db->update('mst_service_catalogue', $input, array('msc_id'=>$msc_id));
     
        $this->response(['Item updated successfully.','201'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($msc_id)
    {
        $this->db->delete('mst_service_catalogue', array('msc_id'=>$msc_id));
       
        $this->response(['Item deleted successfully.','201'], REST_Controller::HTTP_OK);
    }
    	
}