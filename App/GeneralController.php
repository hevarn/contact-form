<?php

namespace App;

use App\Validation\Validator;
use App\Controller\Controller;
use App\Controller\ControllerCreatedMail;
use App\Controller\ControllerRecaptcha;

class GeneralController extends Controller
{
    public function index()
    {
        return $this->view('General/HomePage');
    }

    protected function valide()
    {
        $checkDataForm = new Validator($_POST);
        $errors = $checkDataForm->validate([
            'firstname' => [
                'required',
                'min:3',
                'notSpecialCaractere',
                'goodWord',
            ],
            'lastname' => [
                'required',
                'min:3',
                'notSpecialCaractere',
                'goodWord',
            ],
            'email' => ['required', 'emailValide', 'goodWord'],
            'phone' => ['required', 'min:10'],
            'departure' => [
                'required',
                'notSpecialCaractere',
                'min:5',
                'goodWord',
            ],
            'arrival' => [
                'required',
                'notSpecialCaractere',
                'min:5',
                'goodWord',
            ],
            'date' => ['required'],
            'time' => ['required'],
            'urgency' => ['required'],
            'description' => ['required'],
        ]);
        if ($errors) {
            $_SESSION['errors'][] = $errors;
            return header('Location: /projet-contact-master/');
            exit();
        }
        return true;
    }

    public function send()
    {
        var_dump($_POST);die;
        $valide = $this->valide($_POST);

        if ($valide == true) {
            $send = (new ControllerCreatedMail())->sendEmail($_POST);
            if ($send == true) {
                return header('location: /projet-contact-master/');
            } 
            $errors = " il y a eu un probleme à l'envoie du mail veuillez réessayez";
            $_SESSION['errors'][] = $errors;
            return header("location :  /projet-contact-master/ ");
        }
        // activéé recaptcha 
        // $recaptcha = (new ControllerRecaptcha())->recaptcha($_POST['recaptcha-responce']);
        // if($recaptcha === true){

        // }

    }


    public function contact()
    {
        return $this->view('Contact/Contact');
    }


}
