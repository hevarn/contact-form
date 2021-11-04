<?php
namespace Database;

trait DBtrait {
    public function __construct(DbConnection $db) {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        $this->db= $db;
    }
    protected function view(string $path, array $params = null){
        ob_start();
        require VIEWS .$path.'.php';
        
        if($params){
            $params = extract($params);
        }
        $content = ob_get_clean();
        require VIEWS.'baseTamplate.php';

     }
}