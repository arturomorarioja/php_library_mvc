<?php

namespace App\Models;

use PDO;
use PDOException;

class Author extends \Core\Model
{
    public static function getAll(): array
    {
        try {
            $db = static::getDB();
            
            $sql = <<<'SQL'
                SELECT nAuthorID AS author_id,
                    cName AS first_name,
                    cSurname AS last_name
                FROM tauthor
                ORDER BY cName, cSurname;
            SQL;
            $stmt = $db->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (PDOException $e) {
            throw new \Exception("Error <strong>{$e->getMessage()}</strong> in model " . get_called_class());
        }
    }

    public static function delete(int $authorID): bool
    {        
        try {
            $db = static::getDB();

            $sql = <<<'SQL'
                DELETE FROM tauthor
                WHERE nAuthorID = :authorID;
            SQL;
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':authorID', $authorID);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new \Exception("Error <strong>{$e->getMessage()}</strong> in model " . get_called_class());
        }
    }
}