<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Explosion extends MY_Controller {

	
	public function index()
	{            
            $this->load->view('home', $this->data);
	}

	public function dateRange($begin, $end, $interval = null)
	{
		  $begin = new DateTime($begin);
		  $end = new DateTime($end);

		  $end = $end->modify('+1 day');
		  $interval = new DateInterval($interval ? $interval : 'P1D');

		  return iterator_to_array(new DatePeriod($begin, $interval, $end));
	}

	public function startsWith ($string, $startString) 
	{ 
	    $len = strlen($startString); 
	    return (substr($string, 0, $len) === $startString); 
	} 

	public function getDays() {		

        if ($_POST) {

        	 // $dates = $this->dateRange('2018-03-01', '2018-03-31');
            $dates = $this->dateRange($_POST['fdate'], $_POST['ldate']);

            
            $daylist = $this->input->post('daylist');
            

            // $this->data['sundays'] = count($sundays);
				// $this->data['mondays'] = count($mondays);
				// $this->data['tuesdays'] = count($tuesdays);
				// $this->data['wednesdays'] = count($wednesdays);
				// $this->data['thursdays'] = count($thursdays);
				// $this->data['fridays'] = count($fridays);
				// $this->data['saturndays'] = count($saturndays);

            if ($this->startsWith(strtolower($daylist),'all') == 'all') {
                  $daylist = "sun,mon,tue,wed,thu,fri,sat"; 
            }
            $arrDays = explode(",",$daylist);

            foreach ($arrDays as $k1 => $k1value) {
               if ($this->startsWith(strtolower($k1value),'sun') == 'sun') {
                   /* define sundays */
					$sundays = array_filter($dates, function ($date) {
					  return $date->format("N") === '7';
					});
					foreach ($sundays as $date) {
					   // echo $date->format("D Y-m-d") . "</br>";
					   $sql = "INSERT INTO `trn_agent_workday` (`taw_id`, `taw_mu_id`, `taw_msc_id`, `taw_tsbd_id`, `taw_workday`, `taw_worktime`, `taw_duty_duration`, `taw_part_qty`, `taw_duty_desc`, `taw_is_started`, `taw_duty_comment`, `taw_coordinate_json`, `taw_images_json`, `taw_completion_time`, `taw_material_json`) VALUES (NULL, '1', '1', '1', '{$date->format("Y-m-d")}', '1000', '90', '2000', 'NA', '0', 'NA', 'NA', 'NA', NULL, NULL)";

					   $this->db->query($sql);
					}
					$this->data['sundays'] = count($sundays);
               }

               if ($this->startsWith(strtolower($k1value),'mon') == 'mon') {
                   /* define sundays */
					$mondays = array_filter($dates, function ($date) {
					  return $date->format("N") === '1';
					});
					foreach ($mondays as $date) {
					   // echo $date->format("D Y-m-d") . "</br>";
					   $sql = "INSERT INTO `trn_agent_workday` (`taw_id`, `taw_mu_id`, `taw_msc_id`, `taw_tsbd_id`, `taw_workday`, `taw_worktime`, `taw_duty_duration`, `taw_part_qty`, `taw_duty_desc`, `taw_is_started`, `taw_duty_comment`, `taw_coordinate_json`, `taw_images_json`, `taw_completion_time`, `taw_material_json`) VALUES (NULL, '1', '1', '1', '{$date->format("Y-m-d")}', '1000', '90', '2000', 'NA', '0', 'NA', 'NA', 'NA', NULL, NULL)";

					   $this->db->query($sql);
					}
					$this->data['mondays'] = count($mondays);
               }

               if ($this->startsWith(strtolower($k1value),'tue') == 'tue') {
                   /* define sundays */
					$tuesdays = array_filter($dates, function ($date) {
					  return $date->format("N") === '2';
					});
					foreach ($tuesdays as $date) {
					   echo $date->format("D Y-m-d") . "</br>";
					   $sql = "INSERT INTO `trn_agent_workday` (`taw_id`, `taw_mu_id`, `taw_msc_id`, `taw_tsbd_id`, `taw_workday`, `taw_worktime`, `taw_duty_duration`, `taw_part_qty`, `taw_duty_desc`, `taw_is_started`, `taw_duty_comment`, `taw_coordinate_json`, `taw_images_json`, `taw_completion_time`, `taw_material_json`) VALUES (NULL, '1', '1', '1', '{$date->format("Y-m-d")}', '1000', '90', '2000', 'NA', '0', 'NA', 'NA', 'NA', NULL, NULL)";

					   $this->db->query($sql);
					}
					$this->data['tuesdays'] = count($tuesdays);
               }

               if ($this->startsWith(strtolower($k1value),'wed') == 'wed') {
                   /* define sundays */
					$wednesdays = array_filter($dates, function ($date) {
					  return $date->format("N") === '3';
					});
					foreach ($wednesdays as $date) {
					   echo $date->format("D Y-m-d") . "</br>";
					   $sql = "INSERT INTO `trn_agent_workday` (`taw_id`, `taw_mu_id`, `taw_msc_id`, `taw_tsbd_id`, `taw_workday`, `taw_worktime`, `taw_duty_duration`, `taw_part_qty`, `taw_duty_desc`, `taw_is_started`, `taw_duty_comment`, `taw_coordinate_json`, `taw_images_json`, `taw_completion_time`, `taw_material_json`) VALUES (NULL, '1', '1', '1', '{$date->format("Y-m-d")}', '1000', '90', '2000', 'NA', '0', 'NA', 'NA', 'NA', NULL, NULL)";

					   $this->db->query($sql);
					}
					$this->data['wednesdays'] = count($wednesdays);
               }

               if ($this->startsWith(strtolower($k1value),'thu') == 'thu') {
                   /* define sundays */
					$thursdays = array_filter($dates, function ($date) {
					  return $date->format("N") === '4';
					});
					foreach ($thursdays as $date) {
					   echo $date->format("D Y-m-d") . "</br>";
					   $sql = "INSERT INTO `trn_agent_workday` (`taw_id`, `taw_mu_id`, `taw_msc_id`, `taw_tsbd_id`, `taw_workday`, `taw_worktime`, `taw_duty_duration`, `taw_part_qty`, `taw_duty_desc`, `taw_is_started`, `taw_duty_comment`, `taw_coordinate_json`, `taw_images_json`, `taw_completion_time`, `taw_material_json`) VALUES (NULL, '1', '1', '1', '{$date->format("Y-m-d")}', '1000', '90', '2000', 'NA', '0', 'NA', 'NA', 'NA', NULL, NULL)";

					   $this->db->query($sql);
					}
					$this->data['thursdays'] = count($thursdays);
               }

               if ($this->startsWith(strtolower($k1value),'fri') == 'fri') {
                   /* define sundays */
					$fridays = array_filter($dates, function ($date) {
					  return $date->format("N") === '5';
					});
					foreach ($fridays as $date) {
					   echo $date->format("D Y-m-d") . "</br>";
					   $sql = "INSERT INTO `trn_agent_workday` (`taw_id`, `taw_mu_id`, `taw_msc_id`, `taw_tsbd_id`, `taw_workday`, `taw_worktime`, `taw_duty_duration`, `taw_part_qty`, `taw_duty_desc`, `taw_is_started`, `taw_duty_comment`, `taw_coordinate_json`, `taw_images_json`, `taw_completion_time`, `taw_material_json`) VALUES (NULL, '1', '1', '1', '{$date->format("Y-m-d")}', '1000', '90', '2000', 'NA', '0', 'NA', 'NA', 'NA', NULL, NULL)";

					   $this->db->query($sql);
					}
					$this->data['fridays'] = count($fridays);
               }

               if ($this->startsWith(strtolower($k1value),'sat') == 'sat') {
                   /* define sundays */
					$saturndays = array_filter($dates, function ($date) {
					  return $date->format("N") === '6';
					});
					foreach ($saturndays as $date) {
					   echo $date->format("D Y-m-d") . "</br>";
					   $sql = "INSERT INTO `trn_agent_workday` (`taw_id`, `taw_mu_id`, `taw_msc_id`, `taw_tsbd_id`, `taw_workday`, `taw_worktime`, `taw_duty_duration`, `taw_part_qty`, `taw_duty_desc`, `taw_is_started`, `taw_duty_comment`, `taw_coordinate_json`, `taw_images_json`, `taw_completion_time`, `taw_material_json`) VALUES (NULL, '1', '1', '1', '{$date->format("Y-m-d")}', '1000', '90', '2000', 'NA', '0', 'NA', 'NA', 'NA', NULL, NULL)";

					   $this->db->query($sql);
					}
					$this->data['saturndays'] = count($saturndays);
               }



               
            }

            
           
			// /* define mondays */
			// $mondays = array_filter($dates, function ($date) {
			//   return $date->format("N") === '1';
			// });

	  //       /* define tuesdays */
			// $tuesdays = array_filter($dates, function ($date) {
			//   return $date->format("N") === '2';
			// });

			// /* define wednesdays */
			// $wednesdays = array_filter($dates, function ($date) {
			//   return $date->format("N") === '3';
			// });


	  //       /* define thursdays */
			// $thursdays = array_filter($dates, function ($date) {
			//   return $date->format("N") === '4';
			// });

			// /* define fridays */
			// $fridays = array_filter($dates, function ($date) {
			//   return $date->format("N") === '5';
			// });
	    
	  //       /* define saturndays */
			// $saturndays = array_filter($dates, function ($date) {
			//   return $date->format("N") === '6';
			// });

			// /* define sundays */
			// $sundays = array_filter($dates, function ($date) {
			//   return $date->format("N") === '7';
			// });

			// $this->data['sundays'] = count($sundays);
			// $this->data['mondays'] = count($mondays);
			// $this->data['tuesdays'] = count($tuesdays);
			// $this->data['wednesdays'] = count($wednesdays);
			// $this->data['thursdays'] = count($thursdays);
			// $this->data['fridays'] = count($fridays);
			// $this->data['saturndays'] = count($saturndays);


			// /* sundays output */
			// foreach ($sundays as $date) {
			//    echo $date->format("D Y-m-d") . "</br>";
			// }

			// echo "sunday :".count($sundays);
			// echo "mondays :".count($mondays);
			// echo "tuesdays :".count($tuesdays);
			// echo "wednesdays :".count($wednesdays);
			// echo "thursdays :".count($thursdays);
			// echo "fridays :".count($fridays);
			// echo "saturndays :".count($saturndays);

			// return;
		}	

		$this->load->view('explosion/getDays', $this->data);	

		

		
	} // END public function getDays() {
	
}
