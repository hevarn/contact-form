<?php
namespace App\Controller;

use Database\DbConnection;
use Database\DBtrait;

abstract class Controller{
    use DBtrait;
    protected $db;
    
}