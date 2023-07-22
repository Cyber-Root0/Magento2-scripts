<?php

namespace App\Scripts\CompareActiveModules;
use App\Scripts\CompareActiveModules\classes\Files;
class Compare{

    private $mag_1;
    private $mag_2;
    private $files;
public function __construct($file=null,$file2=null, Files $files){

        $this->mag_1 = $file;
        $this->mag_2 = $file2;
        $this->files = $files;
}

public function execute(){

    $BodyMag1 = $this->getDataLogs($this->mag_1);
    $BodyMag2 = $this->getDataLogs($this->mag_2);

}


public function getDataLogs($path){
    $this->files->setPath($path);
    return $this->files->GetBody();
}


}

