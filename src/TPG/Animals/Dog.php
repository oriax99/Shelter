<?php
declare(strict_types = 1);

namespace TPG\Animals;

class Dog extends Animal
{
    public function speak(): void
    {
        print 'Bark!' . PHP_EOL;
    }
}
