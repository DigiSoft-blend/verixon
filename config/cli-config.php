<?php

require_once './vendor/autoload.php';    

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\Doctrine\DocEntityManager;

/**
   * gets verixons entity manager class instance
   * 
   * @param object $entityManager: DocEntityManager instance
   * 
   * @return ConsoleRunner
   *
*/
$doctrine = new DocEntityManager; //creates doctrine entity manager instance
$entityManager = $doctrine->GetEntityManager();//gets verixon entity manager class
return ConsoleRunner::createHelperSet($entityManager);// creates entity manager helperSet via console runner
