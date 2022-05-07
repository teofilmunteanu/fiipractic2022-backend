<?php
require __DIR__."/System/bootstrap.php";
 
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = explode( '/', $uri );

if ((isset($uri[3]) && $uri[3] != 'test') || !isset($uri[4])) {
    header("HTTP/1.1 404 Not Found");
    exit();
    echo "bruh";
}
else{
    require PROJECT_ROOT_PATH."/Controllers/TestController.php";
 
    $objFeedController = new TestController();
    $strMethodName = $uri[4];
        
    $objFeedController->{$strMethodName}(); 
    //http://localhost/REST_API/index.php/test/listX?x=420
    //http://localhost/REST_API/index.php/test/list
}

?>
