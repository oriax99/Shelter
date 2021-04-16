<?php
declare(strict_types = 1);

namespace TPG\Animals;

abstract class Animal
{
    use \TPG\Utils\RandomID;

    private int $age = 0;
    private string $id;
    private string $nick = '';

    public function __construct()
    {
        $this->id = self::generateID();
    }

    final public function getID(): string
    {
        return $this->id;
    }

    final public function getAge(): int
    {
        if (0 == $this->age)
            $this->requestMeta();

        return $this->age;
    }

    final public function getNick(): string
    {
        if (null == $this->nick)
            $this->requestMeta();

        return $this->nick;
    }

    final public function getType(): string
    {
        return (new \ReflectionClass($this))->getShortName();
    }

    abstract public function speak(): void;

    private function requestMeta(): void
    {
        list($this->age, $this->nick) = \TPG\Database\AnimalFace::getMeta($this->id);
    }
}
