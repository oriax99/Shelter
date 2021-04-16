<?php
declare(strict_types = 1);

namespace TPG\Utils;

trait RandomID
{
    private static function generateID()
    {
        return sha1(hrtime(true) . microtime());
    }
}
