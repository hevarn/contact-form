<?php

namespace App\Controller;

use App\PHPMailer\SMTP;
use App\PHPMailer\PHPMailer;

class ControllerCreatedMail{

  
    public function sendEmail($data)
    {
        require_once 'private.php';

        $mail = new PHPMailer(true);
        //smtp setting
        $mail->isSMTP(); //Send using SMTP
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587; //Enable SMTP authentication
        $mail->Username = USERMAIL; //SMTP username
        $mail->Password = USERPASSWORD; //SMTP password
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ];

        //prepare message body
        $message =
            "<!DOCTYPE html>
                    <html lang='en'>
                    <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width,initial-scale=1'>
                    <meta name='x-apple-disable-message-reformatting'>
                    <title></title>
                    <style>
                        table, td, div, h1, p {font-family: Arial, sans-serif;}
                        img{ width:100px;}
                        h5{ border-bottom:1px solid black ;
                            width:100px}
                    </style>
                    </head>
                    <body style='margin:0;padding:0;'>
                    <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;'>
                        <tr>
                        <td align='center' style='padding:0;'>
                            <table role='presentation' style='width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;'>
                            <tr>
                                <td align='center' style='padding:40px 0 30px 0;background:#70bbd9;'>
                                <img src='https://cdn-icons.flaticon.com/png/512/3408/premium/3408329.png?token=exp=1635521739~hmac=5faa756b4250f1047618a02abd5d3eca'/>

                                </td>
                            </tr>
                            <tr>
                                <td style='padding:36px 30px 42px 30px;'>
                                <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;'>
                                    <tr>
                                    <td style='padding:0 0 36px 0;color:#153643;'>
                                        <h1 style='font-size:24px;margin:0 0 40px 0;font-family:Arial,sans-serif;'>UN CLIENT VOUS ENVOIE UN MAIL</h1>
                                        <p style='margin:0 0 15px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'><img src='https://cdn-icons-png.flaticon.com/512/4477/4477698.png'/></p>
                                        <h2 style='font-size:20px;margin:0 0 10px 0;font-family:Arial,sans-serif;'>COORDONNÉES DU CLIENT</h2>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'> <h5> SON NOM</h5>" .
                                        $data['firstname'] .
                                        "</p>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'> <h5> SON TELEPHONE</h5>" .
                                        $data['phone'] .
                                        "</p>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'> <h5> SON EMAIL</h5>" .
                                        $data['email'] .
                                        "</p>
                                        <p style='margin:0 0 15px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'><img src='https://cdn-icons.flaticon.com/png/512/2970/premium/2970063.png?token=exp=1635523178~hmac=cc0864b02a40e03fbc470c458714e714'/></p>
                                        <h2 style='font-size:18px;margin:0 0 10px 0;font-family:Arial,sans-serif;'>INFORMATION SUR LA DEMANDE</h2>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'> <h5> NOMBRE DE PASSAGER</h5>" .
                                        $data['customer'] .
                                        "</p>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'> <h5> SI IL Y A DES ENFANTS</h5>" .
                                        $data['childrenSelect']."<br><br>".$data['nbChildren'] .
                                        "</p>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'> <h5> OBJET DE LA DEMANDE</h5>" .
                                        $data['choicewhere'] .
                                        "</p>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'> <h5> SI LA DEMANDE EST DIFFÉRENTE</h5>" .
                                        $data['otherchoice'] .
                                        "</p>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'> <h5> DEPART </h5> " .
                                        $data['departure'] .
                                        "</p>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'> <h5> DETOUR </h5> " .
                                        $data['via'] .
                                        "</p>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'> <h5> DESTINATION</h5> " .
                                        $data['arrival'] .
                                        "</p>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'> <h5> LA DATE</h5>" .
                                        $data['date'] .
                                        "</p>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'> <h5> L'HEURE</h5>" .
                                        $data['time'] .
                                        "</p>
                                        <p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'> <h5> UNE OBSERVATION DU CLIENT</h5>" .
                                        $data['description'] .
                                        "</p>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                    </body>
                    </html>";

        // email setting

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->setFrom($data['email'], $data['firstname']);
        // $mail->addAddress('taarik02@hotmail.com');// destinataire
        // $mail->addAddress('arezkidevweb@gmail.com');// destinataire
        $mail->addAddress('nunzio.moderni@gmail.com'); // destinataire
        $mail->Subject = 'Un client vous envoie une demande';
        $mail->Body = $message;

        // send
        if ($mail->send()) {
            return true ;
        }
        $mail->smtpClose();
    }
}