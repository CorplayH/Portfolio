<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use App\Notifications\siteContact;
use App\User;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    //
    public function index(Request $request)
    {
        $okMessage = 'Contact form successfully submitted. Thank you, I will get back to you soon!';
        $errorMessage = 'There was an error while submitting the form. Please try again later';
//        // let's do the sending
        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
            //your site secret key
            $secret = '6LfUa6sUAAAAAGiN55EdcOvLvqYIUdopLZWyrvVK';
            //get verify response data
            $c = curl_init(
                'https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']
            );
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            $verifyResponse = curl_exec($c);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success):

                try {
                    $uToken = uToken();
                    $userId = UserInfo::where('uToken', $uToken)->value('userId');
                    if ($userId != 0) {
                        $user = User::where('id', $userId)->first();
                        $user->notify(new siteContact($request));
                        $responseArray = array('type' => 'success', 'message' => $okMessage);
                    }else{
                        $responseArray = array('type' => 'danger', 'message' => $errorMessage);
                    }
                } catch (\Exception $e) {
                    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
                }

                if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower(
                        $_SERVER['HTTP_X_REQUESTED_WITH']
                    ) == 'xmlhttprequest') {
                    $encoded = json_encode($responseArray);

                    header('Content-Type: application/json');

                    echo $encoded;
                } else {
                    echo $responseArray['message'];
                }

            else:
                $errorMessage = 'Robot verification failed, please try again.';
                $responseArray = array('type' => 'danger', 'message' => $errorMessage);
                $encoded = json_encode($responseArray);

                header('Content-Type: application/json');

                echo $encoded;
            endif;
        else:
            $errorMessage = 'Please click on the reCAPTCHA box.';
            $responseArray = array('type' => 'danger', 'message' => $errorMessage);
            $encoded = json_encode($responseArray);

            header('Content-Type: application/json');

            echo $encoded;
        endif;
//
    }


}
