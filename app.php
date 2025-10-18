<?php 



// paths & urls 
//we use path in >> includes
//we use url in >> links , header, href 


define("PATH",__DIR__."/");
define("URL","http://localhost:3000/");

define("APATH",__DIR__."/admin/");
define("AURL","http://localhost:3000/admin/");

// DB 
define("DB_SERVERNAME","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD",'');
define("DB_NAME","techstore");

// include classes
// require_once(PATH ."classes/Request.php");
// require_once(PATH ."classes/Session.php");
// require_once(PATH ."classes/Db.php");
// require_once(PATH ."classes/models/categ.php");
// require_once(PATH ."classes/models/order.php");
// require_once(PATH ."classes/models/orderDetails.php");
// require_once(PATH ."classes/models/product.php");
// require_once(PATH ."classes/validation/ValidatoinRule.php");
// require_once(PATH ."classes/validation/Required.php");
// require_once(PATH ."classes/validation/Str.php");
// require_once(PATH ."classes/validation/Email.php");
// require_once(PATH ."classes/validation/Numeric.php");
// require_once(PATH ."classes/validation/Max.php");
// require_once(PATH ."classes/validation/Validator.php");
require_once(PATH."vendor/autoload.php");


use TechStore\Classes\Request;
use TechStore\Classes\Session;
// objects 
$request = new Request;
$session = new Session;





?>