<?php
declare(strict_types = 1);

namespace TPG\Animals;

class Turtle extends Animal
{
    public function speak(): void
    {
        print 'Hiss!' . PHP_EOL;
    }
}
