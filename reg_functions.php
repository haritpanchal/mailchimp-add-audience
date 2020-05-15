<?php 

wp_enqueue_script( 'reg-custom-js' , get_template_directory_uri().'/reg_custom.js', array('jquery') , false , true );
wp_localize_script( 'reg-custom-js', 'admin', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

add_action( 'wp_ajax_nopriv_register_action', 'register_user_callback' );
add_action( 'wp_ajax_register_action', 'register_user_callback' );

function register_user_callback(){

    $api_key = YOUR_API_KEY_HERE;
    $audienceId = YOUR_AUDIENCE_ID_HERE;

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $json = wp_json_encode( [
        'email_address' => $email,
        'status'        => 'subscribed',
        'merge_fields'  => [
            'FNAME'     => $firstname,
            'LNAME'     => $lastname,
        ]
    ] );
    $dataCenter = substr( $api_key , strpos( $api_key,'-') + 1 );

    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $audienceId . '/members/';

    $ch = curl_init( $url );
    
    curl_setopt( $ch , CURLOPT_USERPWD , 'user:' . $api_key );
    curl_setopt( $ch , CURLOPT_HTTPHEADER , ['Content-Type: application/json'] );
    curl_setopt( $ch , CURLOPT_RETURNTRANSFER , true );
    curl_setopt( $ch , CURLOPT_TIMEOUT , 10 );
    curl_setopt( $ch ,  CURLOPT_SSL_VERIFYPEER , false );
    curl_setopt( $ch , CURLOPT_POSTFIELDS , $json );

    $result = curl_exec($ch);
    $http_code = curl_getinfo( $ch , CURLINFO_HTTP_CODE ) ;

    curl_close($ch);
    wp_send_json( $http_code );
}
?>