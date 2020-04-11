<?php

function giftoflifecbd_does_user_already_exists() {
    return false;
}

/**
 * giftoflifecbd_register()
 * Ajax register a new user
 * @return array
 */
add_action( 'wp_ajax_giftoflifecbd_register', 'giftoflifecbd_register' );
add_action( 'wp_ajax_nopriv_giftoflifecbd_register', 'giftoflifecbd_register' );
function giftoflifecbd_register() {
	$response = array(
        'success' => false,
        'msg' => 'Something went wrong.',
    );
	if ( ! isset($_POST['action']) || $_POST['action'] !== 'giftoflifecbd_register'  ) {
		$response['msg'] =  'Form action value missing. Contact justin@justinestrada.com';
        exit( json_encode($response) );
	}
}
