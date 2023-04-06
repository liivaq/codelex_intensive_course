<?php declare(strict_types=1);

class Dog
{
    private string $name;
    private string $sex;
    private $mother;
    private $father;

    public function __construct(string $name, string $sex, $mother = null, $father = null)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function fathersName(): string
    {
        return $this->father->name ?? "Unknown";
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
}

$sparky = new Dog('Sparky', 'male');
$sam = new Dog('Sam', 'male');
$lady = new Dog('Lady', 'female');
$molly = new Dog('Molly', 'female');
$rocky = new Dog('Rocky', 'male', $molly, $sam);
$max = new Dog('Max', 'male', $lady, $rocky);
$buster = new Dog('Buster', 'male', $lady, $sparky);
$coco = new Dog('Coco', 'female', $molly, $buster);

echo "Coco's father is: " . $coco->fathersName() . PHP_EOL;
echo "Sparky's father is: " . $sparky->fathersName() . PHP_EOL;
if ($coco->hasSameMotherAs($rocky)) {
    echo $coco->getName() . " has the same mother as " . $rocky->getName() . PHP_EOL;
};

