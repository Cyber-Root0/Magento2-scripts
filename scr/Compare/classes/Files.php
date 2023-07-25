<?php

namespace App\Scripts\Compare\classes;
 class Files
{
    private $path;
    public function setPath($file){
        $this->path = $file;

    }

    public function GetBody(){

        return file($this->path);
    }


    
}
