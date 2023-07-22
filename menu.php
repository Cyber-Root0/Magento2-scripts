<?php
require __DIR__.'/vendor/autoload.php';
use App\Scripts\CompareActiveModules\Compare;
use App\Scripts\CompareActiveModules\classes\Files;
$a = new Compare("mag1.txt", "mag2.txt", new Files);
$a->execute();