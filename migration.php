<?php

require 'db.php';

$statement = <<<EOS
    CREATE TABLE IF NOT EXISTS tasks (
        id INT NOT NULL AUTO_INCREMENT,
        content text not null,
        status int not null default 1,
        PRIMARY KEY (id)
    ) ENGINE=INNODB;

    INSERT INTO tasks
        (content, status)
    VALUES
        ('task_1', 1),
        ('task_2', 2);
EOS;

try {
    $createTable = $dbConn->exec($statement);
    echo "Success!\n";
} catch (\PDOException $e) {
    exit($e->getMessage());
}