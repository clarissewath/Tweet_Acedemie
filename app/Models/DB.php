<?php
declare(strict_types=1);

/**
 * Static class to use pdo
 */
class DB
{
    public ?PDO $pdo = null;

    /**
     * @return PDO|void
     */
    public static function &connection()
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
            PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
        ];
        $dbname = 'twitter';
        $username = 'wac';
        $password = 'bob';

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$dbname", (string)$username, (string)$password, $options);
        } catch (PDOException $exception) {
            printf("\nPDO Error : " . $exception->getMessage() . "\n<br/>");
            die();
        }

        return $pdo;
    }
}
