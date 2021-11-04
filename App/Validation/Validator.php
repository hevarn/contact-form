<?php

namespace App\Validation;

class Validator{

    private $data;
    private $errors = [];

    public function __construct(array $data)
    {
        $this->data = $data;
        return $this->data; 
    }
    public function validate(array $rules): ?array
    {
        
        foreach ($rules as $name => $rulesArray) {
            if (array_key_exists($name, $this->data)) {
                foreach ($rulesArray as $rules) {
                    switch ($rules) {
                        case 'required':
                            $this->required($name, $this->data[$name]);
                            break;
                        case substr($rules, 0, 3) === 'min';
                            $this->min($name, $this->data[$name],$rules);
                            break;
                        case 'emailValide':
                            $this->checkValideMail($name, $this->data[$name]);
                            break;
                        case 'notSpecialCaractere':
                            $this->checkValideUserName($name, $this->data[$name]);
                            break;
                        case 'goodWord':
                            $this->goodWord($name, $this->data[$name]);
                            break;
                        default:
                            break;
                    }
                }
            }
        }
        return $this->getMessageError();
    }



    private function required(string $name, string $value){
        $value = trim($value);
        if (!isset($value) || is_null($value) || empty($value)) {
            $this->errors[$name][] = "{$name} est requis.";
        }
    }
    protected function min(string $name, string $value, string $rules){
        preg_match_all('/(\d+)/',$rules, $matches);
        $limit = (int)$matches[0][0];
        if (strlen($value) < $limit){
            $this->errors[$name][] = "{$name} doit comprendre un minimum de {$limit} caractères.";
        }
    }
    protected function checkValideMail(string $name, string $value){
        $value = trim($value);
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$name][] = "{$name} n'est pas un email valide.";
        }
    }

    protected function goodWord(string $name, string $value){
        $value = trim(strtolower($value));
        $ext = array('fils de pute','connard','conard','fait chier','putain','con','conne','salope','salaud','pute','sale chien','sale arabe','sale noir','enculer',' merde','je t\'emmerde','va te faire enculer','va te faire foutre','foutre','anal','bite','sex','sodomie','defoncé','débile','ta geule','nique ta mere');
        $extEnglish = array('piss off','fuck','asshole','fuck off','bugger off','sheet','bloody hell','shit','dick head','son of bitch','damn','c*nt','root',' bollocks','bugger','choad','crikey','rubbish','shag','wanker','taking the piss','bloody oath','get stuffed','bugger me','fair suck of the sav',);
        if (in_array($value,$ext)){
            $this->errors[$name][] = "{$name} vous ne pouvez pas ecrire de gros mots ";
        }elseif(in_array($value,$extEnglish)){
            $this->errors[$name][] = "{$name} the bad words it's not accepted ";
        }
     }

     private function checkValideUserName(string $name, string $value){
        $value = trim($value);
        if(preg_match('/(?=.*[@#\-_$%^&+=§!\?])/',$value)) {
            $this->errors[$name][] = "{$name} ne de doit pas contenir de caractères spéciaux";
        }
    }
    
    private function getMessageError(): ?array
    {
        return $this->errors;
    }
}