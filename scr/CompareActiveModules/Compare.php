<?php

namespace App\Scripts\CompareActiveModules;
use App\Scripts\CompareActiveModules\classes\Files;
use App\Scripts\CompareActiveModules\classes\Split;
class Compare{

    private $mag_1;
    private $mag_2;
    private $files;
    private $split;

    private $modules_1;
    private $modules_2;
public function __construct($file=null,$file2=null, Files $files){

        $this->mag_1 = $file;
        $this->mag_2 = $file2;
        $this->files = $files;
        $this->split = new Split;
}

public function execute(){

    $this->modules_1 =  $this->split->setData($this->getDataLogs($this->mag_1));
    $this->modules_2 =  $this->split->setData($this->getDataLogs($this->mag_2));
    $this->ActiveModules();
    $this->DisableModules();
}


public function ActiveModules(){

    $mag_1 = count($this->modules_1['enable']);
    $mag_2 = count($this->modules_2['enable']);
    $this->renderMessage($mag_1, $mag_2, "Módulos Ativos");

}

public function DisableModules(){

    $mag_1 = count($this->modules_1['disable']);
    $mag_2 = count($this->modules_2['disable']);
    $this->renderMessage($mag_1, $mag_2, "Módulos Desativados");

}

public function getDataLogs($path){
    $this->files->setPath($path);
    return $this->files->GetBody();
}

public function renderMessage($m1, $m2, $msg){
    echo "\n -------------- $msg ------------\n";
    echo "Magento 1: "."$m1"." $msg";
    echo "\nMagento 2: "."$m2"." $msg";
}

}

