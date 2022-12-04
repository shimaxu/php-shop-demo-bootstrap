<?php
class Database
{
    public function connect() {
        return new PDO('mysql:host=localhost;
        dbname=shop;
        charset=utf8mb4',
        'root',
        ''
        );
    }
}