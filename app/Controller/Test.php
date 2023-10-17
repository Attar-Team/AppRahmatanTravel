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
    
}