<?php

/*
Plugin Name: DynamicWP Fisheye Menu
Plugin URI: http://www.dynamicwp.net/plugins/dynamicwp-fisheye-menu/
Description: Fisheye menu, from dynamicwp.net
Author: Reza Erauansyah
Version: 1.0
Author URI: http://www.dynamicwp.net
*/

if (!class_exists("DynamicwpFisheye")) {
	class DynamicwpFisheye {
		var $adminOptionsName = "DynamicwpFisheyeAdminOptions";
		function DynamicwpFisheye() { //constructor
			
		}
		function init() {
			$this->getAdminOptions();
		}
		//Returns an array of admin options
		function getAdminOptions() {
			$FisheyeAdminOptions = array(
				'Fisheye1' => '',
				'Fisheye1link' => '',
				'Fisheye2' => '',
				'Fisheye2link' => '',
				'Fisheye3' => '',
				'Fisheye3link' => '',
				'Fisheye4' => '',
				'Fisheye4link' => '',
				'Fisheye5' => '',
				'Fisheye5link' => '',
				'Fisheye6' => '',
				'Fisheye6link' => '',
				'Fisheye7' => '',
				'Fisheye7link' => '',
				'Fisheye8' => '',
				'Fisheye8link' => ''
				);
			$FisheyeOptions = get_option($this->adminOptionsName);
			if (!empty($FisheyeOptions)) {
				foreach ($FisheyeOptions as $key => $option)
					$FisheyeAdminOptions[$key] = $option;
			}				
			update_option($this->adminOptionsName, $FisheyeAdminOptions);
			return $FisheyeAdminOptions;
		}
		
		//Add jquery
		function myFisheyepunct(){
			wp_enqueue_script('jquery');
			}
			
		function myFisheyestyle(){?>
			<style type="text/css">
				.fisheye{ text-align: center; height: 60px; position: relative;	}
				a.fisheyeItem {	text-align: center;	color: #000; font-weight: bold;	text-decoration: none;	width: 40px; position: absolute; display: block; bottom: 0;	}
				.fisheyeItem img {	border: none;	margin: 0 auto 5px auto; width: 100%; }
				.fisheyeItem span {	display: none; }
				.fisheyeContainter { height: 50px;	left: -76px; position: absolute; bottom: 0;	}

			</style>
			
		<?php	}

		//Add Fisheye script
		function myFisheyescript(){
			$FisheyeOptions = $this->getAdminOptions();

			$Fisheye1 = $FisheyeOptions['Fisheye1'];
			$Fisheye1link = $FisheyeOptions['Fisheye1link'];
			$Fisheye2 = $FisheyeOptions['Fisheye2'];
			$Fisheye2link = $FisheyeOptions['Fisheye2link'];
			$Fisheye3 = $FisheyeOptions['Fisheye3'];
			$Fisheye3link= $FisheyeOptions['Fisheye3link'];
			$Fisheye4 = $FisheyeOptions['Fisheye4'];
			$Fisheye4link = $FisheyeOptions['Fisheye4link'];
			$Fisheye5 = $FisheyeOptions['Fisheye5'];
			$Fisheye5link = $FisheyeOptions['Fisheye5link'];
			$Fisheye6 = $FisheyeOptions['Fisheye6'];
			$Fisheye6link = $FisheyeOptions['Fisheye6link'];
			$Fisheye7 = $FisheyeOptions['Fisheye7'];
			$Fisheye7link = $FisheyeOptions['Fisheye7link'];
			$Fisheye8 = $FisheyeOptions['Fisheye8'];
			$Fisheye8link = $FisheyeOptions['Fisheye8link'];			
			$linkss = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
			echo "<script type=\"text/javascript\" charset=\"utf-8\" src=\"".$linkss."interface.js\"></script>";
		?>
		
		<script type="text/javascript">
			<!--

			jQuery(document).ready(
				function()
				{
					jQuery('#fisheye').Fisheye(
								{
								maxWidth: 30,
								items: 'a',
								itemsText: 'span',
								container: '.fisheyeContainter',
								itemWidth: 40,
								proximity: 60,
								alignment : 'left',
								halign : 'center'
								}

					)
				}
			);
			//-->
		</script>

		
		<div id="fisheye" class="fisheye">

				<div class="fisheyeContainter">
					<a href="<?php echo $Fisheye1link; ?>" class="fisheyeItem"><img src="<?php echo $linkss.'images/1.png';?>" width="30" alt="img" /><span><?php echo $Fisheye1; ?></span></a>
					<a href="<?php echo $Fisheye2link; ?>" class="fisheyeItem"><img src="<?php echo $linkss.'images/2.png';?>" width="30" alt="img" /><span><?php echo $Fisheye2; ?></span></a>
					<a href="<?php echo $Fisheye3link; ?>" class="fisheyeItem"><img src="<?php echo $linkss.'images/3.png';?>" width="30" alt="img" /><span><?php echo $Fisheye3; ?></span></a>
					<a href="<?php echo $Fisheye4link; ?>" class="fisheyeItem"><img src="<?php echo $linkss.'images/4.png';?>" width="30" alt="img" /><span><?php echo $Fisheye4; ?></span></a>
					<a href="<?php echo $Fisheye5link; ?>" class="fisheyeItem"><img src="<?php echo $linkss.'images/5.png';?>" width="30" alt="img" /><span><?php echo $Fisheye5; ?></span></a>

					<a href="<?php echo $Fisheye6link; ?>" class="fisheyeItem"><img src="<?php echo $linkss.'images/6.png';?>" width="30" alt="img" /><span><?php echo $Fisheye6; ?></span></a>
					<?php if ($Fisheye7) { ?>
					<a href="<?php echo $Fisheye7link; ?>" class="fisheyeItem"><img src="<?php echo $linkss.'images/7.png';?>" width="30" alt="img" /><span><?php echo $Fisheye7; ?></span></a>
					<?php } ?>
					<?php if ($Fisheye8) { ?>
					<a href="<?php echo $Fisheye8link; ?>" class="fisheyeItem"><img src="<?php echo $linkss.'images/8.png';?>" width="30" alt="img" /><span><?php echo $Fisheye8; ?></span></a>
					<?php } ?>
				</div>

		</div>

		<?php
		}	

		//Prints out the admin page
		function printAdminPage() {
					$FisheyeOptions = $this->getAdminOptions();
										
					if (isset($_POST['update_DynamicwpFisheyeSettings'])) { 
						if (isset($_POST['Fisheye1'])) {
							$FisheyeOptions['Fisheye1'] = $_POST['Fisheye1'];
						}
						if (isset($_POST['Fisheye1link'])) {
							$FisheyeOptions['Fisheye1link'] = $_POST['Fisheye1link'];
						}
						if (isset($_POST['Fisheye2'])) {
							$FisheyeOptions['Fisheye2'] = $_POST['Fisheye2'];
						}
						if (isset($_POST['Fisheye2link'])) {
							$FisheyeOptions['Fisheye2link'] = $_POST['Fisheye2link'];
						}
						if (isset($_POST['Fisheye3'])) {
							$FisheyeOptions['Fisheye3'] = $_POST['Fisheye3'];
						}
						if (isset($_POST['Fisheye3link'])) {
							$FisheyeOptions['Fisheye3link'] = $_POST['Fisheye3link'];
						}
						if (isset($_POST['Fisheye4'])) {
							$FisheyeOptions['Fisheye4'] = $_POST['Fisheye4'];
						}
						if (isset($_POST['Fisheye4link'])) {
							$FisheyeOptions['Fisheye4link'] = $_POST['Fisheye4link'];
						}
						if (isset($_POST['Fisheye5'])) {
							$FisheyeOptions['Fisheye5'] = $_POST['Fisheye5'];
						}
						if (isset($_POST['Fisheye5link'])) {
							$FisheyeOptions['Fisheye5link'] = $_POST['Fisheye5link'];
						}
						if (isset($_POST['Fisheye6'])) {
							$FisheyeOptions['Fisheye6'] = $_POST['Fisheye6'];
						}
						if (isset($_POST['Fisheye6link'])) {
							$FisheyeOptions['Fisheye6link'] = $_POST['Fisheye6link'];
						}
						if (isset($_POST['Fisheye7'])) {
							$FisheyeOptions['Fisheye7'] = $_POST['Fisheye7'];
						}
						if (isset($_POST['Fisheye7link'])) {
							$FisheyeOptions['Fisheye7link'] = $_POST['Fisheye7link'];
						}						
						if (isset($_POST['Fisheye8'])) {
							$FisheyeOptions['Fisheye8'] = $_POST['Fisheye8'];
						}
						if (isset($_POST['Fisheye8link'])) {
							$FisheyeOptions['Fisheye8link'] = $_POST['Fisheye8link'];
						}
						update_option($this->adminOptionsName, $FisheyeOptions);
						
						?>
						
						<div class="updated"><p><strong><?php _e("Settings Updated.", "DynamicwpFisheye");?></strong></p></div>
						
						<?php } ?>
						<div class="wrap">
							<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
							<h2><a href="http://www.dynamicwp.net">DynamicWP</a>Fisheye menu</h2>
							
							<div style="width: 50%; float: left;">
								<b>First Fisheye Menu text : </b><br />
								<input type="text" name="Fisheye1" value="<?php echo $FisheyeOptions['Fisheye1'];?>" style="width: 25%;" /><br />
								<small>Enter link for first menu</small>					

								<br />
								<b>First Fisheye Menu link(use full link, with http://) : </b><br />
								<input type="text" name="Fisheye1link" value="<?php echo $FisheyeOptions['Fisheye1link'];?>" style="width: 70%;" /><br />
								<small>Enter link for first menu</small>					
				
								<br />
								<br />
								<hr />
							</div>
							
							<div style="width: 50%; float: left;">
								<b>Second Fisheye Menu text: </b><br />
								<input type="text" name="Fisheye2" value="<?php echo $FisheyeOptions['Fisheye2'];?>" style="width: 25%;" /><br />
								<small>Enter text for second menu</small>					
				
								<br />
								<b>Second Fisheye Menu link(use full link, with http://) : </b><br />
								<input type="text" name="Fisheye2link" value="<?php echo $FisheyeOptions['Fisheye2link'];?>" style="width: 70%;" /><br />
								<small>Enter link for Second menu</small>					
				
								<br />
								<br />
								<hr />
							</div>
							<div style="clear: both;"></div>
							<div style="width: 50%; float: left;">
									<b>Third Fisheye Menu text: </b><br />
									<input type="text" name="Fisheye3" value="<?php echo $FisheyeOptions['Fisheye3'];?>" style="width: 25%;" /><br />
									<small>Enter text for third menu</small>					
					
									<br />
									<b>Third Fisheye Menu link(use full link, with http://) : </b><br />
									<input type="text" name="Fisheye3link" value="<?php echo $FisheyeOptions['Fisheye3link'];?>" style="width: 70%;" /><br />
									<small>Enter link for Third menu</small>					
					
									<br />
									<br />
									<hr />
							</div>
							<div style="width: 50%; float: left;">
								<b>Fourth Fisheye Menu Text: </b><br />
								<input type="text" name="Fisheye4" value="<?php echo $FisheyeOptions['Fisheye4'];?>" style="width: 25%;" /><br />
								<small>Enter text for fourth menu</small>					
				
								<br />
								<b>Fourth Fisheye Menu link(use full link, with http://) : </b><br />
								<input type="text" name="Fisheye4link" value="<?php echo $FisheyeOptions['Fisheye4link'];?>" style="width: 70%;" /><br />
								<small>Enter link for fourth menu</small>					
				
								<br />
								<br />
								<hr />
							</div>
							<div style="clear:both;"></div>
							<div style="width: 50%; float: left;">
								<b>Fifth Fisheye Menu text: </b><br />
								<input type="text" name="Fisheye5" value="<?php echo $FisheyeOptions['Fisheye5'];?>" style="width: 25%;" /><br />
								<small>Enter text for first menu</small>					
				
								<br />
								<b>Fifth Fisheye Menu link(use full link, with http://) : </b><br />
								<input type="text" name="Fisheye5link" value="<?php echo $FisheyeOptions['Fisheye5link'];?>" style="width: 70%;" /><br />
								<small>Enter link for fifth menu</small>					
				
								<br />
								<br />
								<hr />
							</div>
							<div style="width: 50%; float: left;">
								<b>Sixt Fisheye Menu text: </b><br />
								<input type="text" name="Fisheye6" value="<?php echo $FisheyeOptions['Fisheye6'];?>" style="width: 25%;" /><br />
								<small>Enter text for sixth menu</small>					
				
								<br />
								<b>Sixth Fisheye Menu link(use full link, with http://) : </b><br />
								<input type="text" name="Fisheye6link" value="<?php echo $FisheyeOptions['Fisheye6link'];?>" style="width: 70%;" /><br />
								<small>Enter link for sixth menu</small>					
				
								<br />
								<br />
								<hr />
							</div>
							<div style="clear:both;"></div>
							<div style="width: 50%; float: left;">
								<b>Seventh Fisheye Menu text: </b><br />
								<input type="text" name="Fisheye7" value="<?php echo $FisheyeOptions['Fisheye7'];?>" style="width: 25%;" /><br />
								<small>Enter text for seventh menu</small>					
				
								<br />
								<b>seventh Fisheye Menu link(use full link, with http://) : </b><br />
								<input type="text" name="Fisheye7link" value="<?php echo $FisheyeOptions['Fisheye7link'];?>" style="width: 70%;" /><br />
								<small>Enter link for seventh menu</small>					
				
								<br />
								<br />
								<hr />
							</div>
							<div style="width: 50%; float: left;">
								<b>Eighth Fisheye Menu text: </b><br />
								<input type="text" name="Fisheye8" value="<?php echo $FisheyeOptions['Fisheye8'];?>" style="width: 25%;" /><br />
								<small>Enter text for eighth menu</small>					
				
								<br />
								<b>Eigth Fisheye Menu link(use full link, with http://) : </b><br />
								<input type="text" name="Fisheye8link" value="<?php echo $FisheyeOptions['Fisheye8link'];?>" style="width: 70%;" /><br />
								<small>Enter link for eighth menu</small>					
				
								<br />
								<br />
								<hr />
							</div>
							<div style="clear:both;"></div>
							
							<div class="submit">
								<input type="submit" name="update_DynamicwpFisheyeSettings" value="<?php _e('Update Settings', 'DynamicwpFisheye') ?>" />	
							</div>
							</form>
						</div>
					<?php
				}//End function printAdminPage()
	
	}

} //End Class DynamicwpFisheye

if (class_exists("DynamicwpFisheye")) {
	$Fisheye_plugin = new DynamicwpFisheye();
}

//Initialize the admin panel
if (!function_exists("DynamicwpFisheye_ap")) {
	function DynamicwpFisheye_ap() {
		global $Fisheye_plugin;
		if (!isset($Fisheye_plugin)) {
			return;
		}
		if (function_exists('add_options_page')) {
	add_options_page('<b style="color: #C50606;">Fisheye Menu</b>', '<b style="color: #C50606;">Fisheye menu</b>', 9, basename(__FILE__), array(&$Fisheye_plugin, 'printAdminPage'));
		}
	}	
}

function dynamicwp_fisheye() {
    do_action('dynamicwp_fisheye');
}

//Actions and Filters	
if (isset($Fisheye_plugin)) {
	//Actions
	add_action('admin_menu', 'DynamicwpFisheye_ap');
	add_action('activate_Fisheye/Fisheye.php',  array(&$Fisheye_plugin, 'init'));
	
	if(!is_admin()){
	add_action('init', array(&$Fisheye_plugin, 'myFisheyepunct')); 
	add_action('dynamicwp_fisheye', array(&$Fisheye_plugin, 'myFisheyescript'));
	add_action('wp_head', array(&$Fisheye_plugin, 'myFisheyestyle'));
	}
}


?>
