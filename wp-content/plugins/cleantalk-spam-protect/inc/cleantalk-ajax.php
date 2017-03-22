<?php
global $cleantalk_hooked_actions;

/*
AJAX functions
*/

//$cleantalk_ajax_actions_to_check - array for POST 'actions' we should check.

$cleantalk_ajax_actions_to_check[] = 'qcf_validate_form';			//Quick Contact Form
$cleantalk_ajax_actions_to_check[] = 'amoforms_submit';			//amoForms

//cleantalk_hooked_actions[] - array for POST 'actions' which were direct hooked.

$cleantalk_hooked_actions[] = 'rwp_ajax_action_rating'; //Don't check Reviewer plugin

/* MailChimp Premium*/
add_filter('mc4wp_form_errors', 'ct_mc4wp_ajax_hook');

/*hooks for Usernoise Form*/
add_action('un_feedback_form_body', 'ct_add_hidden_fields',1);
add_filter('un_validate_feedback', 'ct_ajax_hook', 1, 2);

/*hooks for AJAX Login & Register email validation*/
add_action( 'wp_ajax_nopriv_validate_email', 'ct_validate_email_ajaxlogin',1 );
add_action( 'wp_ajax_validate_email', 'ct_validate_email_ajaxlogin',1 );
$cleantalk_hooked_actions[]='validate_email';

/*hooks for user registration*/
add_action( 'user_register', 'ct_user_register_ajaxlogin',1 );

/*hooks for WPUF pro */
//add_action( 'wp_ajax_nopriv_wpuf_submit_register', 'ct_wpuf_submit_register',1 );
//add_action( 'wp_ajax_wpuf_submit_register', 'ct_wpuf_submit_register',1 );
add_action( 'wp_ajax_nopriv_wpuf_submit_register', 'ct_ajax_hook',1 );
add_action( 'wp_ajax_wpuf_submit_register', 'ct_ajax_hook',1 );
$cleantalk_hooked_actions[]='submit_register';

/*hooks for MyMail */
//add_action( 'wp_ajax_nopriv_mymail_form_submit', 'ct_mymail_form_submit',1 );
//add_action( 'wp_ajax_mymail_form_submit', 'ct_mymail_form_submit',1 );
add_action( 'wp_ajax_nopriv_mymail_form_submit', 'ct_ajax_hook',1 );
add_action( 'wp_ajax_mymail_form_submit', 'ct_ajax_hook',1 );
$cleantalk_hooked_actions[]='form_submit';

/*hooks for MailPoet */
//add_action( 'wp_ajax_nopriv_wysija_ajax', 'ct_wysija_ajax',1 );
//add_action( 'wp_ajax_wysija_ajax', 'ct_wysija_ajax',1 );
add_action( 'wp_ajax_nopriv_wysija_ajax', 'ct_ajax_hook',1 );
add_action( 'wp_ajax_wysija_ajax', 'ct_ajax_hook',1 );
$cleantalk_hooked_actions[]='wysija_ajax';

/*hooks for cs_registration_validation */
//add_action( 'wp_ajax_nopriv_cs_registration_validation', 'ct_cs_registration_validation',1 );
//add_action( 'wp_ajax_cs_registration_validation', 'ct_cs_registration_validation',1 );
add_action( 'wp_ajax_nopriv_cs_registration_validation', 'ct_ajax_hook',1 );
add_action( 'wp_ajax_cs_registration_validation', 'ct_ajax_hook',1 );
$cleantalk_hooked_actions[]='cs_registration_validation';

/*hooks for send_message and request_appointment */
//add_action( 'wp_ajax_nopriv_send_message', 'ct_sm_ra',1 );
//add_action( 'wp_ajax_send_message', 'ct_sm_ra',1 );
//add_action( 'wp_ajax_nopriv_request_appointment', 'ct_sm_ra',1 );
//add_action( 'wp_ajax_request_appointment', 'ct_sm_ra',1 );
add_action( 'wp_ajax_nopriv_send_message', 'ct_ajax_hook',1 );
add_action( 'wp_ajax_send_message', 'ct_ajax_hook',1 );
add_action( 'wp_ajax_nopriv_request_appointment', 'ct_ajax_hook',1 );
add_action( 'wp_ajax_request_appointment', 'ct_ajax_hook',1 );
$cleantalk_hooked_actions[]='send_message';
$cleantalk_hooked_actions[]='request_appointment';

/*hooks for zn_do_login */
//add_action( 'wp_ajax_nopriv_zn_do_login', 'ct_zn_do_login',1 );
//add_action( 'wp_ajax_zn_do_login', 'ct_zn_do_login',1 );
add_action( 'wp_ajax_nopriv_zn_do_login', 'ct_ajax_hook',1 );
add_action( 'wp_ajax_zn_do_login', 'ct_ajax_hook',1 );
$cleantalk_hooked_actions[]='zn_do_login';

/*hooks for zn_do_login */
//add_action( 'wp_ajax_nopriv_cscf-submitform', 'ct_cscf_submitform',1 );
//add_action( 'wp_ajax_cscf-submitform', 'ct_cscf_submitform',1 );
if(isset($_POST['action']) && $_POST['action'] == 'cscf-submitform'){
	add_filter('preprocess_comment', 'ct_ajax_hook', 1);
	//add_action( 'wp_ajax_nopriv_cscf-submitform', 'ct_ajax_hook',1 );
	//add_action( 'wp_ajax_cscf-submitform', 'ct_ajax_hook',1 );
	$cleantalk_hooked_actions[]='cscf-submitform';
}


/*hooks for visual form builder */
//add_action( 'wp_ajax_nopriv_vfb_submit', 'ct_vfb_submit',1 );
//add_action( 'wp_ajax_vfb_submit', 'ct_vfb_submit',1 );
add_action( 'wp_ajax_nopriv_vfb_submit', 'ct_ajax_hook',1 );
add_action( 'wp_ajax_vfb_submit', 'ct_ajax_hook',1 );
$cleantalk_hooked_actions[]='vfb_submit';

/*hooks for woocommerce_checkout*/
add_action( 'wp_ajax_nopriv_woocommerce_checkout', 'ct_ajax_hook',1 );
add_action( 'wp_ajax_woocommerce_checkout', 'ct_ajax_hook',1 );
$cleantalk_hooked_actions[]='woocommerce_checkout';

/*hooks for frm_action*/
add_action( 'wp_ajax_nopriv_frm_entries_create', 'ct_ajax_hook',1 );
add_action( 'wp_ajax_frm_entries_create', 'ct_ajax_hook',1 );
$cleantalk_hooked_actions[]='frm_entries_create';

add_action( 'wp_ajax_nopriv_td_mod_register', 'ct_ajax_hook',1  );
add_action( 'wp_ajax_td_mod_register', 'ct_ajax_hook',1  );
$cleantalk_hooked_actions[]='td_mod_register';

/*hooks for tevolution theme*/
add_action( 'wp_ajax_nopriv_tmpl_ajax_check_user_email', 'ct_ajax_hook',1  );
add_action( 'wp_ajax_tmpl_ajax_check_user_email', 'ct_ajax_hook',1  );
add_action( 'wp_ajax_nopriv_tevolution_submit_from_preview', 'ct_ajax_hook',1  );
add_action( 'wp_ajax_tevolution_submit_from_preview', 'ct_ajax_hook',1  );
add_action( 'wp_ajax_nopriv_submit_form_recaptcha_validation', 'ct_ajax_hook',1  );
add_action( 'wp_ajax_tmpl_submit_form_recaptcha_validation', 'ct_ajax_hook',1  );
$cleantalk_hooked_actions[]='tmpl_ajax_check_user_email';
$cleantalk_hooked_actions[]='tevolution_submit_from_preview';
$cleantalk_hooked_actions[]='submit_form_recaptcha_validation';

/**hooks for cm answers pro */
add_action( 'template_redirect', 'ct_ajax_hook',1 );

/* hooks for ninja forms ajax*/
add_action( 'wp_ajax_nopriv_ninja_forms_ajax_submit', 'ct_ajax_hook',1  );
add_action( 'wp_ajax_ninja_forms_ajax_submit', 'ct_ajax_hook',1  );

add_action( 'ninja_forms_process', 'ct_ajax_hook',1  );
$cleantalk_hooked_actions[]='ninja_forms_ajax_submit';

function ct_validate_email_ajaxlogin($email=null, $is_ajax=true)
{
	require_once(CLEANTALK_PLUGIN_DIR . 'cleantalk-public.php');
	global $ct_agent_version, $ct_checkjs_register_form, $ct_session_request_id_label, $ct_session_register_ok_label, $bp, $ct_signup_done, $ct_formtime_label, $ct_negative_comment, $ct_options, $ct_data;
	
	$ct_options = ct_get_options();
    $ct_data = ct_get_data();
		
	$email = is_null( $email ) ? $email : $_POST['email'];
	$email=sanitize_email($email);
	$is_good=true;
	if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL )||email_exists( $email ) )
	{
		$is_good=false;
	}

	if(class_exists('AjaxLogin')&&isset($_POST['action'])&&$_POST['action']=='validate_email')
	{
		
		//$ct_options=ct_get_options();
		$checkjs = js_test('ct_checkjs', $_COOKIE, true);
		$submit_time = submit_time_test();
	    $sender_info = get_sender_info();
	    $sender_info['post_checkjs_passed']=$checkjs;
	    
		if ($checkjs === null)
		{
			$checkjs = js_test('ct_checkjs', $_COOKIE, true);
			$sender_info['cookie_checkjs_passed'] = $checkjs;
		}
		
		$sender_info = json_encode($sender_info);
		if ($sender_info === false)
		{
			$sender_info= '';
		}
		
		require_once('cleantalk.class.php');
		$config = ct_get_server();
		$ct = new Cleantalk();
		$ct->work_url = $config['ct_work_url'];
		$ct->server_url = $ct_options['server'];
		
		$ct->server_ttl = $config['ct_server_ttl'];
		$ct->server_changed = $config['ct_server_changed'];
		$ct->ssl_on = $ct_options['ssl_on'];		
		
		$ct_request = new CleantalkRequest();
		$ct_request->auth_key = $ct_options['apikey'];
		$ct_request->sender_email = $email; 
		$ct_request->sender_ip = $ct->ct_session_ip($_SERVER['REMOTE_ADDR']);
		$ct_request->sender_nickname = ''; 
		$ct_request->agent = $ct_agent_version; 
		$ct_request->sender_info = $sender_info;
		$ct_request->js_on = $checkjs;
		$ct_request->submit_time = $submit_time; 
		
		$ct_result = $ct->isAllowUser($ct_request);
		
		if ($ct->server_change)
		{
			update_option(
				'cleantalk_server', array(
					'ct_work_url' => $ct->work_url,
					'ct_server_ttl' => $ct->server_ttl,
					'ct_server_changed' => time()
					)
			);
		}
		if ($ct_result->allow===0)
		{
			$is_good=false;
		}
	}
	if($is_good)
	{
		$ajaxresult=array(
            'description' => null,
            'cssClass' => 'noon',
            'code' => 'success'
            );
	}
	else
	{
		$ajaxresult=array(
            'description' => 'Invalid Email',
            'cssClass' => 'error-container',
            'code' => 'error'
            );
	}
	$ajaxresult=json_encode($ajaxresult);
	print $ajaxresult;
	wp_die();
}

function ct_user_register_ajaxlogin($user_id)
{
	require_once(CLEANTALK_PLUGIN_DIR . 'inc/cleantalk-public.php');
	global $ct_agent_version, $ct_checkjs_register_form, $ct_session_request_id_label, $ct_session_register_ok_label, $bp, $ct_signup_done, $ct_formtime_label, $ct_negative_comment, $ct_options, $ct_data;
	
	$ct_options = ct_get_options();
    $ct_data = ct_get_data();

	if(class_exists('AjaxLogin')&&isset($_POST['action'])&&$_POST['action']=='register_submit')
	{
		$checkjs = js_test('ct_checkjs', $_COOKIE, true);
		$submit_time = submit_time_test();
	    $sender_info = get_sender_info();
	    $sender_info['post_checkjs_passed']=$checkjs;
	    
		if ($checkjs === null)
		{
			$checkjs = js_test('ct_checkjs', $_COOKIE, true);
			$sender_info['cookie_checkjs_passed'] = $checkjs;
		}
		
		$sender_info = json_encode($sender_info);
		if ($sender_info === false)
		{
			$sender_info= '';
		}
		
		require_once('cleantalk.class.php');
		$config = ct_get_server();
		$ct = new Cleantalk();
		$ct->work_url = $config['ct_work_url'];
		$ct->server_url = $ct_options['server'];
		
		$ct->server_ttl = $config['ct_server_ttl'];
		$ct->server_changed = $config['ct_server_changed'];
		$ct->ssl_on = $ct_options['ssl_on'];
		
		$ct_request = new CleantalkRequest();
		$ct_request->auth_key = $ct_options['apikey'];
		$ct_request->sender_email = sanitize_email($_POST['email']); 
		$ct_request->sender_ip = $ct->ct_session_ip($_SERVER['REMOTE_ADDR']);
		$ct_request->sender_nickname = sanitize_email($_POST['login']); ; 
		$ct_request->agent = $ct_agent_version; 
		$ct_request->sender_info = $sender_info;
		$ct_request->js_on = $checkjs;
		$ct_request->submit_time = $submit_time; 
		
		$ct_result = $ct->isAllowUser($ct_request);
		
		if ($ct->server_change)
		{
			update_option(
				'cleantalk_server', array(
					'ct_work_url' => $ct->work_url,
					'ct_server_ttl' => $ct->server_ttl,
					'ct_server_changed' => time()
					)
			);			
		}
		if ($ct_result->allow===0)
		{
			wp_delete_user($user_id);
		}
	}
	return $user_id;
}

/**
 * Hook into MailChimp for WordPress `mc4wp_form_errors` filter.
 *
 * @param array $errors
 * @return array
 */
function ct_mc4wp_ajax_hook( array $errors )
{
	$result = ct_ajax_hook();

	// only return modified errors array when function returned a string value (the message key)
	if( is_string( $result ) ) {
		$errors[] = $result;
	}

	return $errors;
}

function ct_ajax_hook($message_obj = false, $additional = false)
{	
	require_once(CLEANTALK_PLUGIN_DIR . 'inc/cleantalk-public.php');
	global $ct_agent_version, $ct_checkjs_register_form, $ct_session_request_id_label, $ct_session_register_ok_label, $bp, $ct_signup_done, $ct_formtime_label, $ct_negative_comment, $ct_options, $ct_data, $current_user;

	$ct_options = ct_get_options();
    $ct_data = ct_get_data();
	$sender_email = null;
    $message = '';
    $nickname=null;
    $contact = true;
    $subject = '';
	
    //
    // Skip test if Custom contact forms is disabled.
    //
    if (intval($ct_options['general_contact_forms_test'])==0 ) {
        return false;
    }

    //
    // Go out because we call it on backend.
    //
    if(	(ct_is_user_enable() === false || (function_exists('get_current_user_id') && get_current_user_id() != 0)) &&
		(strval(current_action()) != 'et_pre_insert_answer' && isset($message_obj['author']) && intval($message_obj['author']) == 0) //QAEngine Theme fix
    ){
		return false;
    }
	
    //
    // Go out because of not spam data 
    //
    $skip_post = array(
        'gmaps_display_info_window',  // Geo My WP pop-up windows.
        'gmw_ps_display_info_window',  // Geo My WP pop-up windows.
        'the_champ_user_auth',  // Super Socializer 
    );
	
	$checkjs = js_test('ct_checkjs', $_COOKIE, true);
    if ($checkjs && // Spammers usually fail the JS test
        (isset($_POST['action']) && in_array($_POST['action'], $skip_post))
	) {
        return false;
    }
	
    if(isset($_POST['user_login']))
		$nickname=$_POST['user_login'];
	else
		$nickname='';
	
	//QAEngine Theme answers
    if( !empty($message_obj) && isset($message_obj['post_type'], $message_obj['author'], $message_obj['post_content']) ){
		$curr_user = get_user_by('id', $message_obj['author']);
		$ct_post_temp['comment'] = $message_obj['post_content'];
        $ct_post_temp['email'] = $curr_user->data->user_email;
		$ct_post_temp['name'] = $curr_user->data->user_login;
    }
	
    //CSCF fix
    if(isset($_POST['action']) && $_POST['action']== 'cscf-submitform'){
		$ct_post_temp[] = $message_obj['comment_author'];
        $ct_post_temp[] = $message_obj['comment_author_email'];
		$ct_post_temp[] = $message_obj['comment_content'];
    }
		
	//??? fix
    if(isset($_POST['action'], $_POST['target']) && ($_POST['action']=='request_appointment'||$_POST['action']=='send_message')){
		$ct_post_temp=$_POST;
    	$ct_post_temp['target']=1;
    }
  	
	//UserPro fix
	if(isset($_POST['action'], $_POST['template']) && $_POST['action']=='userpro_process_form' && $_POST['template']=='register'){
		$ct_post_temp = $_POST;
		$ct_post_temp['shortcode'] = '';
	}
		
	if(isset($ct_post_temp))
		$ct_temp_msg_data = ct_get_fields_any($ct_post_temp);
	else
		$ct_temp_msg_data = ct_get_fields_any($_POST);

	$sender_email = ($ct_temp_msg_data['email'] ? $ct_temp_msg_data['email'] : '');
	$sender_nickname = ($ct_temp_msg_data['nickname'] ? $ct_temp_msg_data['nickname'] : '');
	$subject = ($ct_temp_msg_data['subject'] ? $ct_temp_msg_data['subject'] : '');
	$contact_form = ($ct_temp_msg_data['contact'] ? $ct_temp_msg_data['contact'] : true);
	$message = ($ct_temp_msg_data['message'] ? $ct_temp_msg_data['message'] : array());
	
    if ($subject != '') {
        $message = array_merge(array('subject' => $subject), $message);
    }
   
    $message = json_encode($message);
    
	if($sender_email!=null)
	{
		$submit_time = submit_time_test();
	    $sender_info = get_sender_info();
	    $sender_info['post_checkjs_passed']=$checkjs;
	    
		$sender_info = json_encode($sender_info);
		if ($sender_info === false)
		{
			$sender_info= '';
		}
        
        $post_info['comment_type'] = 'feedback_ajax';
        $post_info = json_encode($post_info);
        if ($post_info === false)
            $post_info = '';

		
		$ct_base_call_result = ct_base_call(
			array(
				'message' => $message,
				'example' => null,
				'sender_email' => $sender_email,
				'sender_nickname' => $nickname,
				'sender_info' => $sender_info,
				'post_info'=> $post_info,
				'checkjs' => $checkjs
			)
		);
				
		$ct = $ct_base_call_result['ct'];
		$ct_result = $ct_base_call_result['ct_result'];
		if ($ct_result->allow == 0)
		{
			if(isset($_POST['action']) && $_POST['action']=='wpuf_submit_register'){
				$result=Array('success'=>false,'error'=>$ct_result->comment);
				@header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset' ) );
				print json_encode($result);
				die();
			}
			else if(isset($_POST['action']) && $_POST['action']=='mymail_form_submit')
			{
				$result=Array('success'=>false,'html'=>$ct_result->comment);
				@header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset' ) );
				print json_encode($result);
				die();
			}
			else if(isset($_POST['action'], $_POST['task']) && $_POST['action'] == 'wysija_ajax' && $_POST['task'] != 'send_preview')
			{
				$result=Array('result'=>false,'msgs'=>Array('updated'=>Array($ct_result->comment)));
				//@header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset' ) );
				print $_GET['callback'].'('.json_encode($result).');';
				die();
			}
			else if(isset($_POST['action']) && $_POST['action']=='cs_registration_validation')
			{
				$result=Array("type"=>"error","message"=>$ct_result->comment);
				print json_encode($result);
				die();
			}
			else if(isset($_POST['action']) && ($_POST['action']=='request_appointment' || $_POST['action']=='send_message'))
			{
				print $ct_result->comment;
				die();
			}
			else if(isset($_POST['action']) && $_POST['action']=='zn_do_login')
			{
				print '<div id="login_error">'.$ct_result->comment.'</div>';
				die();
			}
			else if(isset($_POST['action']) && $_POST['action']=='vfb_submit')
			{
				$result=Array('result'=>false,'message'=>$ct_result->comment);
				@header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset' ) );
				print json_encode($result);
				die();
			}
			else if(isset($_POST['action']) && $_POST['action']== 'cscf-submitform')
			{
				$message_obj['akismet_result'] = 'true';
				$result = array(
					'sent' => false,
					'valid' => 1,
					'errorlist' => array('confirm-email'=>$ct_result->comment)
				);
				$result = json_encode($result);
				echo $result;
				return $message_obj;
			}
			else if(isset($_POST['action']) && $_POST['action']=='woocommerce_checkout')
			{
				print $ct_result->comment;
				die();
			}
			else if(isset($_POST['action']) && $_POST['action']=='frm_entries_create')
			{
				$result=Array('112'=>$ct_result->comment);
				print json_encode($result);
				die();
			}
			else if(isset($_POST['cma-action']) &&  $_POST['cma-action']=='add')
			{
				$result=Array('success'=>0, 'thread_id'=>null,'messages'=>Array($ct_result->comment));
				print json_encode($result);
				die();
			}
			else if(isset($_POST['action']) && $_POST['action']=='td_mod_register')
			{
				print json_encode(array('register', 0, $ct_result->comment));
				die();
			}
			else if(isset($_POST['action']) && $_POST['action']=='tmpl_ajax_check_user_email')
			{
				print "17,email";
				die();
			}
			else if(isset($_POST['action']) && ($_POST['action']=='tevolution_submit_from_preview' || $_POST['action']=='submit_form_recaptcha_validation'))
			{
				print $ct_result->comment;
				die();
			}
			else if(isset($_POST['action']) && $_POST['action']=='ninja_forms_ajax_submit')
			{
				print '{"form_id":'.$_POST['_form_id'].',"errors":false,"success":{"success_msg-Success":"'.$ct_result->comment.'"}}';
				die();
			}
			else if(isset($_POST['action']) && $_POST['action']=='nf_ajax_submit')
			{
				$nf_data = json_decode($_POST['formData'], true);
				print '{"form_id":'.$nf_data['id'].',"errors":false,"success":{"success_msg-Success":"'.$ct_result->comment.'"}}';
				die();
			}
			
            //
            // WooWaitList
            // http://codecanyon.net/item/woowaitlist-woocommerce-back-in-stock-notifier/7103373
            //
			else if(isset($_POST['action']) && $_POST['action']=='wew_save_to_db_callback')
			{
                $result = array();
                $result['error'] = 1;
			    $result['message'] = $ct_result->comment;
                $result['code'] = 5; // Unused code number in WooWaitlist
				print json_encode($result);
				die();
			}
			//UserPro
			else if(isset($_POST['action'], $_POST['template']) && $_POST['action']=='userpro_process_form' && $_POST['template']=='register')
			{
				foreach($_POST as $key => $value){
					$output[$key]=$value;
				}unset($key, $value);
				$output['template'] = $ct_result->comment;
				$output=json_encode($output);
				print_r($output);
				die;
			}
			//Quick event manager
            else if(isset($_POST['action']) && $_POST['action']=='qem_validate_form'){
				$errors[] = 'registration_forbidden';
				$result = Array(
 					'success' => 'false',
 					'errors' => $errors,
 					'title' => $ct_result->comment
 				);
 				print json_encode($result);
 				die();
 			}
			// Quick Contact Form
			elseif(isset($_POST['action']) && $_POST['action'] == 'qcf_validate_form')
			{
				$result = Array(
					'blurb' => "<h1>".$ct_result->comment."</h1>",
					'display' => "Oops, got a few problems here",
 					'errors' => array(
						0 => array(
							error => 'error',
							name => 'name'
						),
					),
 					'success' => 'false',
 				);
 				print json_encode($result);
				die();
			}
			// Usernoise Contact Form
			elseif(isset($_POST['title'], $_POST['email'], $_POST['type'], $_POST['ct_checkjs']))
			{
				return array($ct_result->comment);
				die();
			}
			// amoForms
			elseif(isset($_POST['action']) && $_POST['action'] == 'amoforms_submit')
			{
				$result = Array(
					'result' => true,
					'type' => "html",
 					'value' => "<h1 style='font-size: 25px; color: red;'>".$ct_result->comment."</h1>",
					'fast' => false
 				);
				print json_encode($result);
				die();
			}
			//MailChimp for Wordpress Premium
			elseif(!empty($_POST['_mc4wp_form_id']))
			{
				return 'ct_mc4wp_response';
			}
			//QAEngine Theme answers
			elseif ( !empty($message_obj) && isset($message_obj['post_type'], $message_obj['author'], $message_obj['post_content']) ){
				return new WP_Error('Spam comment', $ct_result->comment);
			}
            else
			{
				print $ct_result->comment;
				die();
			}
		}
		//Allow == 1
		else{
			//QAEngine Theme answers
			if ( !empty($message_obj) && isset($message_obj['post_type'], $message_obj['author'], $message_obj['post_content']) ){
				return $message_obj;
			}
		}
	}
}

?>
