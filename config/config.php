<?php
	ob_start();
	if (is_session_started() === FALSE) session_start();
	// load env variables
    require './vendor'.DIRECTORY_SEPARATOR.'autoload.php';

    //(new DotEnv(__DIR__ . '/.env'))->load();
    $path = '.'.DIRECTORY_SEPARATOR;
    $_SESSION['toastr'] = array(
		'type'      => '', // or 'success' or 'info' or 'warning'
		'message' => '',
	);
//	error_reporting(E_ALL);
//	ini_set('display_errors',1);

    $dotenv = new Dotenv\Dotenv($path);
	 $dotenv->load();

	 $connection = "";
	 define("SITE_MODE",getenv('SITE_MODE')); //LOCAL = local, LOCAL STAGING = zerozone,CLIENT STAGING = staging, LIVE
     define("SITE_URL",getenv('SITE_URL'));
	 //define("SERVER_ROOT","http://localhost/");
     define("SERVER_ROOT","http://localhost/ultragenyx/");

	$SERVER_SETTINGS = array (
			'DATABASE_HOST' =>getenv('DATABASE_HOST')
			, 'DATABASE_USER' =>getenv('DATABASE_USER')
			, 'DATABASE_PASSWORD' =>getenv('DATABASE_PASSWORD')
			, 'DATABASE_NAME' =>getenv('DATABASE_NAME')
		 	, 'MAILER' =>getenv('MAILER') //SIMPLE, SMTP, SENDMAIL
			, 'SMTP_SERVER' =>getenv('SMTP_SERVER') //MAIL SERVER ADDRESS
			, 'SMTP_PORT' =>getenv('SMTP_PORT') //MAIL SERVER PORT
			, 'SMTP_SECURE' =>getenv('SMTP_SECURE')
			, 'SMTP_AUHTENTICAION' =>getenv('SMTP_AUHTENTICAION') //WHETHER MAIL SERVER REQUIRE AUTHENTICATION?
			, 'SMTP_USER_NAME' =>getenv('SMTP_USER_NAME') //IF AUTHENTICATION IS REQUIRED, SPECIFY ITS USERNAME
			, 'SMTP_USER_PASSWORD' =>getenv('SMTP_USER_PASSWORD') //IF AUTHENTICATION IS REQUIRED, SPECIFY ITS PASSWORD
			// , 'POR_SMTP_USER_NAME' =>getenv('POR_SMTP_USER_NAME') //IF AUTHENTICATION IS REQUIRED, SPECIFY ITS USERNAME
			// , 'POR_SMTP_USER_PASSWORD' =>getenv('POR_SMTP_USER_PASSWORD') //IF AUTHENTICATION IS REQUIRED, SPECIFY ITS PASSWORD
			// , 'VENDOR_PO_SMTP_USER_NAME' =>getenv('VENDOR_PO_SMTP_USER_NAME') //IF AUTHENTICATION IS REQUIRED, SPECIFY ITS USERNAME
			// , 'VENDOR_PO_SMTP_USER_PASSWORD' =>getenv('VENDOR_PO_SMTP_USER_PASSWORD') //IF AUTHENTICATION IS REQUIRED, SPECIFY ITS PASSWORD
			// , 'FORGOT_PWD_SMTP_USER_NAME' =>getenv('FORGOT_PWD_SMTP_USER_NAME') //IF AUTHENTICATION IS REQUIRED, SPECIFY ITS USERNAME
			// , 'FORGOT_PWD_SMTP_USER_PASSWORD' =>getenv('FORGOT_PWD_SMTP_USER_PASSWORD') //IF AUTHENTICATION IS REQUIRED, SPECIFY ITS PASSWORD
	);

	$server_settings_array = $SERVER_SETTINGS;
	
    
	// define('SECURE_SITE_URL',getenv('SECURE_SITE_URL'));
	// define('SITE_IP',getenv('SITE_IP'));
	// define('EMP_IMG_PATH',getenv('EMP_IMG_PATH'));
	// define('FIRST_DIVISOR',getenv('FIRST_DIVISOR'));
	// define('SECOND_DIVISOR',getenv('SECOND_DIVISOR'));
	// define('THIRD_DIVISOR',getenv('THIRD_DIVISOR'));
	// define('NON_FREELENCER_PERCENTAGE',getenv('NON_FREELENCER_PERCENTAGE'));
	// define('FREELENCER_PERCENTAGE',getenv('FREELENCER_PERCENTAGE'));
	// define('THRESOLD_FOR_HOURLY_RATE',getenv('THRESOLD_FOR_HOURLY_RATE'));
	// define('OVERTIME_PERCENTAGE',getenv('OVERTIME_PERCENTAGE'));
	// define('CUSTOMIZE_EMAIL_TO',getenv('CUSTOMIZE_EMAIL_TO'));
	// define('CUSTOMIZE_SEND_ACCOUNT_DOMAIN',getenv('CUSTOMIZE_SEND_ACCOUNT_DOMAIN'));	
	// define('ACCOUNT_MAIL_FOR_CHANGE',getenv('ACCOUNT_MAIL_FOR_CHANGE'));

	if ( is_array($server_settings_array) && count($server_settings_array) ) {
		foreach ( $server_settings_array as $constant_name => $constant_value ) {
			define($constant_name, $constant_value);
		}
	}
	// //define('CALIFORNIA_SALES_TAX_RATE',getenv('CALIFORNIA_SALES_TAX_RATE'));
	// define('ENCRYPTION_KEY', getenv('ENCRYPTION_KEY'));

	 $connection = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD);
	 mysqli_select_db($connection,DATABASE_NAME);

	// // TO get latest tax rate
	// $tax_rate = 9.5;
	// $taxRateQue = "SELECT tax_rate FROM tbl_tax_rate WHERE status = 1 ORDER BY id DESC LIMIT 1";
	// $taxRateQueResult = mysqli_query($connection,$taxRateQue);
	// if(mysqli_num_rows($taxRateQueResult) > 0) {
	// 	while($rows = mysqli_fetch_assoc($taxRateQueResult)) {
	// 		$tax_rate = $rows['tax_rate'];
	// 	}
	// }
	mysqli_query($connection,'SET CHARACTER SET utf8');
	$GLOBALS["scope"] = "";
	// function my_autoload($className) {
	// 	require_once ("../common/class/" . $className . ".php");
	// }
	
	// spl_autoload_register("my_autoload");
	
	// $msg = new message();
	// define('CALIFORNIA_SALES_TAX_RATE',$tax_rate);

	function is_session_started() {

        if ( php_sapi_name() === 'cli' )
            return false;
    
        return version_compare( phpversion(), '5.4.0', '>=' )
            ? session_status() === PHP_SESSION_ACTIVE
            : session_id() !== '';
    }
?>