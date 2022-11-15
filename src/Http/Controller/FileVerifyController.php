<?php

namespace Xoxoday\Fileverify\Http\Controller;

use Config;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Xoxoday\Fileupload\Models\Xofile;

class FileVerifyController extends Controller
{
    

    //function to verify file entry created or not with respect the response no sent in the API parameters
    public function verifyFile(Request $request)
    {
        $params = $request->post();

        if (isset($params['response_no']) && $params['response_no'] != '') {
            $response_no_exist = '';
            try {
                $response_no_exist = Xofile::where('response_no', $params['response_no'])->first();
            } catch (QueryException $ex) {
                Log::channel($log_name)->info(date('Y-m-d H:i:s') . ':: FileVerifyController - Failed to find file entry :: SQL Error code' . $ex->errorInfo[1] . ' -SQL Error Message' . $ex->getmessage());
                $reponse_array = array('response' => 'Request Failed');
                echo json_encode($reponse_array);
                die();
            }

            if ($response_no_exist != '') {

                $reponse_array = array('response' => "File entry created successfully");
                echo json_encode($reponse_array);
                die();
            }
        }

        $reponse_array = array('response' => 'Request Failed');
        echo json_encode($reponse_array);
        die();
    }

}
