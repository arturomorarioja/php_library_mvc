<?php

namespace App\Models;

use PDO;
use PDOException;

class Publisher extends \Core\Model
{
    public static function getAll(): array
    {
        try {
            $sql = <<<'SQL'
                SELECT nPublishingCompanyID AS publisher_id,
                    cName AS name
                FROM tpublishingcompany
                ORDER BY cName;
            SQL;

            return self::execute($sql);
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
            $sql = <<<'SQL'
                INSERT INTO tpublishingcompany
                    (cName)
                VALUES
                    (:name);
            SQL;

            return self::execute($sql, [
                'name' => $name
            ]);

        } catch (PDOException $e) {
            throw new \Exception("Error <strong>{$e->getMessage()}</strong> in model " . get_called_class());
        }
    }

    public static function delete(int $publisherID): bool
    {        
        try {
            $sql = <<<'SQL'
                DELETE FROM tpublishingcompany
                WHERE nPublishingCompanyID = :publisherID;
            SQL;

            return self::execute($sql, [
                'publisherID' => $publisherID
            ]) > 0;
        } catch (PDOException $e) {
            throw new \Exception("Error <strong>{$e->getMessage()}</strong> in model " . get_called_class());
        }
    }
}