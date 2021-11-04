<?php 
namespace App\Controller;

class ControllerRecaptcha {


    public function recaptcha($data)
    {
        if (empty($_POST['recaptcha-responce'])) {
            $errors = 'le recaptcha na pas fonctionné correctement ';
            $_SESSION['errors'][] = $errors;
            return header('Location: /projet-contact-us-php/');
            exit();
        }else{
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=6LfzVg4dAAAAAHAhIjNzhfFSEIMzK1en-EUfB7BU?response{$_POST['recaptcha-responce']}";

            if(function_exists('curl_version')){
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_HEADER,false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER ,true);
                curl_setopt($curl, CURLOPT_TIMEOUT,1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
                $response = curl_exec($curl);
            }else{
                $response = file_get_contents($url);
            }
            if (empty($response) || is_null($response)) {
                $errors = 'il y a un probleme avec les servers de google veuillez réessayer ';
                $_SESSION['errors'][] = $errors;
                return header('Location: /projet-contact-us-php/');
                exit();
            }else{
                $data = json_decode($response);
                return $data->success;
            }

        }

    }
}