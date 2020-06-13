<?php
class RawMaterial
{		


    function __construct()
    {

        $this->rawMaterialAddUrl = 'http://localhost/serviceticket/api/mst_rawmaterial';
        $this->rawMaterialListingUrl = 'http://localhost/serviceticket/api/mst_rawmaterial';

    }

    public function addMaterials($data)
    {


        $params = [
                'mrm_raw_material_name' => $data['mrm_raw_material_name'],
                'mrm_desc' => $data['mrm_desc'],
                'mrm_type' => $data['mrm_type'],
                'mrm_unit' => $data['mrm_unit']			
        ];

        $query = http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->rawMaterialAddUrl);                
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "POST");         
        curl_setopt($ch, CURLOPT_POST, count($params)); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // execute post
        $result = curl_exec($ch);
        // close connection
        curl_close($ch);
        return json_decode($result);
    }
    
    //Get meterial Listing
    public function getMaterialsById($id)
    {
        $recordsByIdURL = $this->rawMaterialListingUrl."/$id";        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $recordsByIdURL);                
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "GET"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // execute post
        $result = curl_exec($ch);        
        // close connection
        curl_close($ch);
        return json_decode($result);
    }
    
    //Get meterial Listing
    public function getMaterialsListing()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->rawMaterialListingUrl);                
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "GET"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // execute post
        $result = curl_exec($ch);       
        // close connection
        curl_close($ch);
        return json_decode($result);
    }
    //Edit records
    public function editMaterials($data, $id=0)
    {
        
        $recordsByIdURL = $this->rawMaterialListingUrl."/$id"; 
        $params = [
                'mrm_raw_material_name' => $data['mrm_raw_material_name'],
                'mrm_desc' => $data['mrm_desc'],
                'mrm_type' => $data['mrm_type'],
                'mrm_unit' => $data['mrm_unit']			
        ];        

        $query = http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $recordsByIdURL);                
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST , "PUT");         
        curl_setopt($ch, CURLOPT_POST, count($params)); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // execute post
        $result = curl_exec($ch);
        // close connection
        curl_close($ch);
        return json_decode($result);
    }
	
}


