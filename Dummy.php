<?php
declare(strict_types = 1);

require('bootstrap/loader.php');

use TPG\Animals\Cat;
use TPG\Animals\Dog;
use TPG\Animals\Turtle;
use TPG\Humans\Person;
use TPG\Shelter\Shelter;

$pruitt = new Shelter('Igoe');

$types = ['Cat', 'Dog', 'Turtle'];

@array_walk(
    range(0, mt_rand(1, 32)),
    fn() => $pruitt->insert(new ('TPG\Animals\\' . $types[array_rand($types, 1)]))
);

$pruitt->list(fn($a) => print "{$a->getNick()} [{$a->getType()}]" . PHP_EOL);

print PHP_EOL;

@array_walk(
    range(0, mt_rand(1, 16)),
    fn() => (new Person)->adopt($pruitt->release())
);

print PHP_EOL . PHP_EOL;

array_walk(
    $types,

    function ($v) use ($pruitt)
    {
        $pruitt->list(fn($a) => print "{$a->getNick()} [{$a->getType()}]" . PHP_EOL, 'TPG\Animals\\' . $v);

        (new Person)->adopt($pruitt->release('TPG\Animals\\' . $v));

        print PHP_EOL;
    }
);
