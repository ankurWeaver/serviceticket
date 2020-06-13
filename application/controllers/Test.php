<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {

	
	public function index()
	{            
            $this->load->view('home', $this->data);
	}

	// Array ( [0] => Array ( [asda_status] => Work-In-Progress [asda_timestamp] => 2020-06-12 15:05:51 ) [1] => Array ( [asda_status] => Hold [asda_timestamp] => 2020-06-09 21:05:02 ) [2] => Array ( [asda_status] => Work-In-Progress [asda_timestamp] => 2020-06-09 21:53:22 ) [3] => Array ( [asda_status] => Resolved [asda_timestamp] => 2020-06-09 21:56:20 ) )

	public function diffTimestamp($date1,$date2)
	{
		
         
         $date1 = strtotime($date1);
         // $date1 = date('d/M/Y H:i:s', $date1);

         $date2 = strtotime($date2);
         // $date2 = date('d/M/Y H:i:s', $date2);

         $diff = $date2 - $date1;

         $diff = abs($diff/60);

         return $diff;

		// $datetime1 = new DateTime($date1);//start time
		// $datetime2 = new DateTime($date2);//end time
		// $interval = $datetime1->diff($datetime2);


		// return $interval;
	}


	public function printArr () {
		$stageData = array(
			       
			        array( 
			       	    "asda_status"=>"Work-In-Progress", 
			            "asda_timestamp"=>"2020-06-12 15:05:51" 
			       	),
			       	array( 
			       	    "asda_status"=>"Hold", 
			            "asda_timestamp"=>"2020-06-09 21:05:02" 
			       	),
			       	array( 
			       	    "asda_status"=>"Work-In-Progress", 
			            "asda_timestamp"=>"2020-06-09 21:53:22" 
			       	),
			       	array( 
			       	    "asda_status"=>"Resolved", 
			            "asda_timestamp"=>"2020-06-09 21:56:20" 
			       	),
			   );
        
        $stack = array();
        $stackData = array();

		foreach ($stageData as$k1 => $k1value) {
		    
		    if ($k1 > 0) {
                $noOfMinite =  $this->diffTimestamp($stageData[$k1-1]['asda_timestamp'],$stageData[$k1]['asda_timestamp']);
                $stageData[$k1]['noOfMinite'] = $noOfMinite; 
                $stageData[$k1]['prevStatus'] = $stageData[$k1-1]['asda_status']; 
                array_push($stack,$stageData[$k1]['prevStatus']);

                array_push( 
                	$stackData,
                	array(
                		'stage' => $stageData[$k1]['prevStatus'],
                		'noOfMinite' => $stageData[$k1]['noOfMinite']
                	)
                );
		    }
		}

		$stack = array_unique($stack);
		$stackListRefined = array();

		foreach ($stack as $k1 => $k1value) {
			array_push( 
            	$stackListRefined,
            	array(
            		'stage' => $k1value,
            		'noOfMinite' => 0
            	)
            );
		}

        foreach ($stackListRefined as $k1 => $k1value) {
        	foreach ($stackData as $k2 => $k2value) {
        		if ($k1value['stage'] == $k2value['stage']) {
        			echo $k1value['stage'];
	        		echo $k2value['stage'];
	        		echo "<br>";
	        		$stackListRefined[$k1]['noOfMinite'] = $stackListRefined[$k1]['noOfMinite'] + $k2value['noOfMinite'];
        		}
        		
        	}	
		}

		print("<pre>");
		print_r($stackListRefined);
		print("<pre>");

		print("<pre>");
		print_r($stackData);
		print("<pre>");

	}

	
}
