<?php
declare(strict_types = 1);

namespace TPG\Animals;

class Cat extends Animal
{
    public function speak(): void
    {
        print 'Meow' . PHP_EOL;
    }
}
