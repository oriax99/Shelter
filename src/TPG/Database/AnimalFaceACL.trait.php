<?php
declare(strict_types = 1);

namespace TPG\Database;

trait AnimalFaceACL
{
    private static array $acl = ['ae143d59d1e513d7804a100f213c10d83c8931cd'];

    private static function checkAccess(string $macID): bool
    {
        return in_array($macID, self::$acl);
    }
}
