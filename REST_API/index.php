<?php

require __DIR__."/System/bootstrap.php";


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = explode( '/', $uri );

//$objFeedController = new TestController();
//http://localhost/REST_API/index.php/list
//https://fiipractic-backend2022.herokuapp.com/index.php/list
//if($uri[2]=='list')
//{
//    $strMethod = $uri[2];//2-heroku 3-local
//    $objFeedController->{$strMethod}();
//}

if($uri[2]=='user'){
    require PROJECT_ROOT_PATH."/Controllers/UserController.php";
    $objFeedController = new UserController();
    if($uri[3]=='create')
    {
        $json = file_get_contents('php://input');
        $data1 = json_decode($json);

        $objFeedController -> create($data1->firstName, $data1->lastName, $data1->email);
    }

    if($uri[3]=='read')
    {   
        $objFeedController -> read();
    }
}

if($uri[2]=='event'){
    require PROJECT_ROOT_PATH."/Controllers/EventController.php";
    $objFeedController = new EventController();
    if($uri[3]=='create')
    {
        $json = file_get_contents('php://input');
        $data1 = json_decode($json);

        $objFeedController -> create($data1->name, $data1->date, $data1->start_time, $data1->adress);
    }

    if($uri[3]=='read')
    {   
        $objFeedController -> read();
    }
}

if($uri[2]=='location'){
    require PROJECT_ROOT_PATH."/Controllers/LocationController.php";
    $objFeedController = new LocationController();
    if($uri[3]=='create')
    {
        $json = file_get_contents('php://input');
        $data1 = json_decode($json);

        $objFeedController -> create($data1->adress, $data1->name);
    }

    if($uri[3]=='read')
    {   
        $objFeedController -> read();
    }
}

if($uri[2]=='activity'){
    require PROJECT_ROOT_PATH."/Controllers/ActivityController.php";
    $objFeedController = new ActivityController();
    if($uri[3]=='create')
    {
        $json = file_get_contents('php://input');
        $data1 = json_decode($json);

        $objFeedController -> create($data1->name);
    }

    if($uri[3]=='read')
    {   
        $objFeedController -> read();
    }
}



    


