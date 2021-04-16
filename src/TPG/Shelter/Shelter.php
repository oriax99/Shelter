<?php
declare(strict_types = 1);

namespace TPG\Shelter;

class Shelter
{
    use \TPG\Utils\NamePicker;
    use \TPG\Utils\RandomID;

    private string $id;
    private \closure $metaBroker;

    private array $db = [];

    public function __construct(protected string $name)
    {
        $this->id = self::generateID();

        $this->metaBroker = \TPG\Database\AnimalFace::requestUpdater('ae143d59d1e513d7804a100f213c10d83c8931cd');
    }

    public function insert(\TPG\Animals\Animal $a): void
    {
        ($this->metaBroker)($a->getID(), mt_rand(1, 192), self::pickRandomName());

        $this->db[] = $a;
    }

    public function list(callable $F, string $T = null): void
    {
        if (null == $T) {
            $filtered = $this->db;
        } else {
            $filtered = array_filter($this->db, fn($a) => $a::class == $T);
        }

        usort($filtered, fn($a, $b) => $a->getNick() <=> $b->getNick());

        array_walk($filtered, $F);
    }

    public function release(string $T = null): \TPG\Animals\Animal|null
    {
        if (null == $T) {
            return array_shift($this->db);
        } else {
            $filterd = array_filter($this->db, fn($a) => $a::class == $T);

            $a = array_shift($filterd);

            if (null == $a) {
                return $a;
            } else {
                unset($this->db[array_search($a, $this->db)]);
            }

            return $a;
        }
    }
}
