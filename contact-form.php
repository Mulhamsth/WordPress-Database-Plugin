<?php
/**
*Plugin Name: Form Plugin
*Author: Mulham Taylouni
*Version:0.0.1
*Description: this is a Form to help you save the infos from users directly on the database
*/

function database_creation(){

								global $wpdb;
								$tablename = $wpdb->prefix.'customer_infos';
								$charset = $wpdb->get_charset_collate;

								$cust_info = "CREATE TABLE ".$tablename."(

								customer_ID		int NOT NULL AUTO_INCREMENT,
								name		text NOT NULL,
                                email       text NOT NULL,
                                description text,
								img 	longblob,
								PRIMARY KEY (customer_ID)
								) $charset;";

								require_once(ABSPATH.'wp-admin/includes/upgrade.php');
								dbDelta($cust_info);
}
register_activation_hook(__FILE__, 'database_creation');

include "assets/form.php";

function form_capture()
{			
	
				if(isset($_POST['contact_form_submit']))
				{
								$name = sanitize_text_field($_POST['your_name']);
								$email = sanitize_text_field($_POST['your_email']);
                                $description = sanitize_text_field($_POST['your_description']);
                                $img = $_FILES['your_img'];

								global $wpdb;
								$tablename = $wpdb->prefix.'customer_infos';
				
								$data= array(
								'name' => $name,
								'email' => $email,
                                'description' => $description,
                                'img' => $img
								);

								$format= array('%s','%s','%s','LONGBLOB');								
								
								$wpdb->insert($tablename, $data, $format);

				}
}
add_action('wp_head', 'form_capture');

?>