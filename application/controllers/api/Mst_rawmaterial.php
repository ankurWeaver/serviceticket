<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Mst_rawmaterial extends REST_Controller {
    
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
	public function index_get($mrm_id = 0)
	{
        if(!empty($mrm_id)){
            $data = $this->db->get_where("mst_raw_material", ['mrm_id' => $mrm_id])->row_array();
        }else{
            $data = $this->db->get("mst_raw_material")->result();
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
        $this->db->insert('mst_raw_material',$input);
     
        $this->response(['Item created successfully.','201'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($mrm_id)
    {
        $input = $this->put();
        $this->db->update('mst_raw_material', $input, array('mrm_id'=>$mrm_id));
     
        $this->response(['Item updated successfully.','201'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($mrm_id)
    {
        $this->db->delete('mst_raw_material', array('mrm_id'=>$mrm_id));
       
        $this->response(['Item deleted successfully.','201'], REST_Controller::HTTP_OK);
    }
    	
}