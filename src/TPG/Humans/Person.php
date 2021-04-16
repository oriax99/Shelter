<?php
declare(strict_types = 1);

namespace TPG\Humans;

class Person
{
    use \TPG\Utils\NamePicker;

    private string $name;

    public function __construct()
    {
        $this->name = self::pickRandomName();
    }

    public function adopt(\TPG\Animals\Animal $a = null): void
    {
        print "Mr. {$this->getName()}: ";

        if (null == $a) {
            print 'It looks like there are no animals left at the shelter.' . PHP_EOL;
        } else {
            print "Adopted {$a->getType()}, named {$a->getNick()}"  . PHP_EOL;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }
}
