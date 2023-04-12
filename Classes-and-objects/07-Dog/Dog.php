<?php declare(strict_types=1);

class Dog
{
    private string $name;
    private string $sex;
    private ?Dog $mother;
    private ?Dog $father;

    public function __construct(string $name, string $sex, Dog $mother = null, Dog $father = null)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;

    }

    public function getFathersName(): string
    {
        return $this->father->name ?? 'Unknown';
    }

    public function getMother(): Dog
    {
        return $this->mother;
    }

    public function hasSameMotherAs(Dog $dog): bool
    {
        if ($this->getMother() === $dog->getMother()) {
            return true;
        }
        return false;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSex(): string
    {
        return $this->sex;
    }
}
