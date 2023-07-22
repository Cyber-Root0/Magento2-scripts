<?php
namespace App\Scripts\CompareActiveModules\classes;
Class Split{

    private $data;
    private array $enable = [];
    private array $disable = [];
    private $LineStatus;
public function setData($data){

    $this->data = $data;
    $this->enable = [];
    $this->disable = [];
    $this->LineStatus = false;
    return $this->Split();
}

public function Split(){

   foreach($this->data as $line){
        $line = trim($line);
        if (!$this->isActiveModules($line)==5){
            continue;
        }else{
            if ($this->LineStatus==true){

                if($line!=null && $this->isModule($line))  $this->enable[] = $line;
                
            }else{
                if($line!=null && $this->isModule($line))  $this->disable[] = $line;
            }
        }


   }
    
   //return dos modulos habilitados  e desabilitados
    return array(
            "enable" => $this->enable,
            "disable" => $this->disable
    );

}

public function isActiveModules($line){
    $line = trim($line);
    if ($line==="List of enabled modules:"){
        $this->LineStatus = true;
        return false;
    }

    if ($line==="List of disabled modules:"){
        $this->LineStatus= false;
        return false;
    }else{
        return 5;
    }


}

public function isModule($line){
    if (strpos($line,"_")){

        $count = explode("_",$line);
        if (count($count)==2){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

}