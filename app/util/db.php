<?php

function getMysqlClient() {
    $serverName = MYSQL_HOST;
    $serverPort = MYSQL_PORT;
    $databaseName = MYSQL_DATABASE;
    $username = MYSQL_USERNAME;
    $password = MYSQL_PASSWORD;
    $client = new PDO("mysql:host=$serverName;port=$serverPort;dbname=$databaseName", $username, $password);
    $client->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $client;
}

function executeQuery($sql, $params = [], $fetchAll = false) {
    $dbClient = getMysqlClient();
    $stmt = $dbClient->prepare($sql);

    foreach ($params as $key => $value) {
        $stmt->bindParam(":$key", $params[$key]);
    }

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $fetchAll ? $stmt->fetchAll() : $stmt->fetch();
    $dbClient = null;

    return $result;
}

function execute($sql, $params = []) {
    $dbClient = getMysqlClient();
    $stmt = $dbClient->prepare($sql);

    foreach ($params as $key => $value) {
        $stmt->bindParam(":$key", $params[$key]);
    }

    $stmt->execute();

    return $result;
}
