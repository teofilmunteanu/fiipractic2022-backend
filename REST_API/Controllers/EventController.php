<?php
class EventController extends BaseController
{
    public function read()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
 
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $model = new Event();
                
                $arrTests = $model->readEvents();
                $responseData = json_encode($arrTests);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().' Something went wrong! Please contact support. ';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
 
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
    
    public function create($id, $name, $date, $start_time, $adress)
    {
        $model = new Event(); 
        $model->createEvent($id, $name, $date, $start_time, $adress);
    }
}