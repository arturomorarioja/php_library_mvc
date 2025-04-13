<?php

namespace App\Models;

use PDO;
use PDOException;

class Publisher extends \Core\Model
{
    public static function getAll(): array
    {
        try {
            $db = static::getDB();
            
            $sql = <<<'SQL'
                SELECT nPublishingCompanyID AS publisher_id,
                    cName AS name
                FROM tpublishingcompany
                ORDER BY cName;
            SQL;
            $stmt = $db->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (PDOException $e) {
            throw new \Exception("Error <strong>{$e->getMessage()}</strong> in model " . get_called_class());
        }
    }

    private static function validate(string $name): array
    {
        $validationErrors = [];
        if (empty($name)) {
            $validationErrors[] = 'Name is mandatory';
        }
        return $validationErrors;
    }

    public static function create(array $columns): int|array
    {
        $name = trim($columns['name'] ?? '');

        $validationErrors = self::validate($name);
        if (!empty($validationErrors)) {
            return $validationErrors;
        }

        try {
            $db = static::getDB();

            $sql = <<<'SQL'
                INSERT INTO tpublishingcompany
                    (cName)
                VALUES
                    (:name);
            SQL;
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $name);
            $stmt->execute();

            return $stmt->rowCount() > 0;

        } catch (PDOException $e) {
            throw new \Exception("Error <strong>{$e->getMessage()}</strong> in model " . get_called_class());
        }
    }

    public static function delete(int $publisherID): bool
    {        
        try {
            $db = static::getDB();

            $sql = <<<'SQL'
                DELETE FROM tpublishingcompany
                WHERE nPublishingCompanyID = :publisherID;
            SQL;
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':publisherID', $publisherID);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new \Exception("Error <strong>{$e->getMessage()}</strong> in model " . get_called_class());
        }
    }
}