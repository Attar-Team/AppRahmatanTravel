<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Model\testModel;

class Test
{
    private $testModel;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->testModel = new testModel($connection);
    }
    public function index()
    {
        $data['all'] = $this->testModel->getData();
        View::render("index",$data);
    }

    public function testt(){
        echo "testt";
    }

    public function createSesion(){
        session_start();
        $_SESSION['status_login'] = true;
        $_SESSION['level'] = 'admin';
    }
    
    public function deleteSesion(){
        session_start();
        session_destroy();
    }
}