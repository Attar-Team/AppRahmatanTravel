<?php

function getDatabaseConfig():array {
    return [
        "database" => [
            "test"=> [
                "url"=> "mysql:host=localhost;dbname=db_new_rahmatan",
                "username"=> "root",
                "password"=> ""
            ],
            "production"=> [
                "url"=> "mysql:host=localhost;dbname=id21440679_database_rahmatan",
                "username"=> "id21440679_db_rahmatan",
                "password"=> "DB_rahmatan123"
            ]
        ]
            ];
}