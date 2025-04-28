<?php

// Wrapper for PDO "prepare" statements that execute once
//
// from https://phpdelusions.net/pdo/pdo_wrapper
function pdosingleprepare(PDO $db, string $sqltext, array $args): PDOStatement {
    $stmt = $db->prepare($sqltext);
    $stmt->execute($args);
    return $stmt;
}
