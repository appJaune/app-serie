<?php
/**
 * Created by PhpStorm.
 * User: rototo
 * Date: 14/02/2018
 * Time: 19:56
 */

// create_product.php <name>
require_once "../bootstrap.php";

header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Headers: content-type,X-Requested-With,x-api-key");
Header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

// init du repo
$repository = $entityManager->getRepository('Tvtruc\Entities\Serie');

$search = isset($_GET['name']) ? $_GET['name'] : die();

$dqlSeriesNameSearchPattern = $search;
$query = $repository->createQueryBuilder('s')
	->where('s.seriesName LIKE :nomSerie') // les contraintes
	->setParameter('nomSerie', '%'. $dqlSeriesNameSearchPattern .'%') // remplacer :name par l'expression '%88%'
    ->setMaxResults(5)
    ->getQuery();

$dqlSeries = $query->getResult();



$repositoryB = $entityManager->getRepository('Tvtruc\Entities\Banner');
//$foundBanner = $repositoryB->findOneby(array('keyvalue' => '78462'));
//\Doctrine\Common\Util\Debug::dump($foundBanner);




//\Doctrine\Common\Util\Debug::dump($dqlSeries, 3);

// retourne les tous
//$series = $repository->findBySeriesName($search);
// alternativement
// $seriesList = $repository->findAll('Tvtruc\Entities\Series');


// affiche la version "lisible"
 //\Doctrine\Common\Util\Debug::dump($series,4);

 // traitement en direct

 // retourne la version "lisible"
$exportedSeries = \Doctrine\Common\Util\Debug::export($dqlSeries,4);
//print_r($exportedSeries);
//echo '<PRE>';
echo json_encode($exportedSeries, JSON_PRETTY_PRINT);
//echo '<PRE>';