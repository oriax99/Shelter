<?php
declare(strict_types = 1);

namespace TPG\Database;

final class AnimalFace
{
    use AnimalFaceACL;

    private static array $db = [];

    public static function getMeta(string $id): array
    {
        return @self::$db[$id] ?: [0, ''];
    }

    public static function requestUpdater(string $macID): \closure
    {
        return
            self::checkAccess($macID)
                ? (fn(string $id, int $age, string $nick) => self::$db[$id] = [$age, $nick])
                : (function () {});
    }
}
