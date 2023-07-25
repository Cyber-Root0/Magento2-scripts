<?php

namespace App\Scripts\Menu;
use App\Scripts\Compare\Compare;
Class Menu{

    protected $options;
    public function __construct(){
       $this->options = OPTIONS;
       $this->menu();
    }

    public function menu(){
        if ($this->haveOption()){
            while(true){
                
                $this->ShowMenu($this->options);
                $option = $this->getOption();
                if ($option > count($this->options) || $option < 0 ){
                    $this->EndMenu();
                }else{

                    $this->callModule($this->options[$option]);
                         
                }
            }    
        }else{

            $this->EndMenu();
        }

    }
   
    public function callModule($module){

        $path = "App\Scripts\\$module\\$module";
        $call_option = new $path; 
        $call_option->initialine("mag1.txt","mag2.txt");   


    }
    public function haveOption(){
        return $this->options > 0;
    }

    public function  EndMenu(){
        exit;

    }

    public function ShowMenu($options){
        echo "\n\n ---------- Scripts to debug Magento 2 ------------\n\n";
        foreach($options as $index => $option){
            echo $index.": - SCRIPT ".$option."\n";
        }        

    }

    public function getOption(){

        return (int) readline("Digite a sua opção: ");

    }

}


