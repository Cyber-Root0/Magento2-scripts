<?php

namespace App\Scripts\CompareActiveModules\classes;
 class Files
{
    private $path;
    public function setPath($file){

        $this->path = $file;

    }

    public function GetBody(){

        return file_get_contents($this->path);
    }


    
}
