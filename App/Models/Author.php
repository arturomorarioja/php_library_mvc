<?php

namespace App\Models;

use PDO;
use PDOException;

class Author extends \Core\Model
{
    public static function getAll(): array
    {
        try {
            $sql = <<<'SQL'
                SELECT nAuthorID AS author_id,
                    cName AS first_name,
                    cSurname AS last_name
                FROM tauthor
                ORDER BY cName, cSurname;
            SQL;

            return self::execute($sql);
        } catch (PDOException $e) {
            throw new \Exception("Error <strong>{$e->getMessage()}</strong> in model " . get_called_class());
        }
    }

    private static function validate(string $firstName): array
    {
        $validationErrors = [];
        if (empty($firstName)) {
            $validationErrors[] = 'First name is mandatory';
        }
        return $validationErrors;
    }

    public static function create(array $columns): int|array
    {
        $firstName = trim($columns['first_name'] ?? '');
        $lastName = trim($columns['last_name'] ?? '');

        $validationErrors = self::validate($firstName);
        if (!empty($validationErrors)) {
            return $validationErrors;
        }

        try {
            $sql = <<<'SQL'
                INSERT INTO tauthor
                    (cName, cSurname)
                VALUES
                    (:firstName, :lastName);
            SQL;
            return self::execute($sql, [
                'firstName' => $firstName,
                'lastName'  => $lastName
            ]);

        } catch (PDOException $e) {
            throw new \Exception("Error <strong>{$e->getMessage()}</strong> in model " . get_called_class());
        }
    }

    public static function delete(int $authorID): bool
    {        
        try {
            $sql = <<<'SQL'
                DELETE FROM tauthor
                WHERE nAuthorID = :authorID;
            SQL;

            return self::execute($sql, [
                'authorID' => $authorID
            ]) > 0;
        } catch (PDOException $e) {
            throw new \Exception("Error <strong>{$e->getMessage()}</strong> in model " . get_called_class());
        }
    }
}