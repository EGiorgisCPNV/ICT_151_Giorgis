<?php
/**
 * 151_2019_startproject - dbConnector.php
 *
 * Initial version by: Esteban.GIORGIS
 * Initial version created on: 07.02.2020 11:19
 */


//Test client - must be remove to before using in a project
//try to get a list of available tables in database
$query = 'SHOW TABLES';
$queryResult = executeQuery($query);

//Source : http://php.net/manual/en/pdo.prepare.php
function executeQuery($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion();//open database connexion
    if ($dbConnexion != null) {
        $statement = $dbConnexion->prepare($query);//prepare query
        $statement->execute();//execute query
        $queryResult = $statement->fetchAll();//prepare result for client
    }
    $dbConnexion = null;//close database connexion
    return $queryResult;
}



//Source : http://php.net/manual/en/pdo.prepare.php
function insertQuery($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion();//open database connexion
    if ($dbConnexion != null) {
        $statement = $dbConnexion->prepare($query);//prepare query
        $statement->execute();//execute query
        //$queryResult = $statement->fetchAll();//prepare result for client
    }
    $dbConnexion = null;//close database connexion
    return $queryResult;
}



//Source : http://php.net/manual/en/pdo.construct.php
function openDBConnexion()
{
    $tempDbConnexion = null;

    $sqlDriver = 'mysql';
    $hostname = 'localhost';
    $port = 50000;
    $charset = 'utf8';
    $dbName = 'snows';
    $userName = 'root';
    $userPwd = 'Pa$$w0rd';
    $dsn = $sqlDriver . ':host=' . $hostname . ';dbname=' . $dbName . ';port=' . $port . ';charset=' . $charset;

    try {
        $tempDbConnexion = new PDO($dsn, $userName, $userPwd);

    }
    catch (PDOException $exception) {
        echo 'Connection failed: ' . $exception->getMessage()."<br>";


    }
    return $tempDbConnexion;
}