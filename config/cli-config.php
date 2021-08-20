<?php

require_once './vendor/autoload.php';    

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\Doctrine\DocEntityManager;

   $doctrine = new DocEntityManager;
   $entityManager = $doctrine->GetEntityManager();
   return ConsoleRunner::createHelperSet($entityManager);
