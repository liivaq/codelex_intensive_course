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

$sparky = new Dog('Sparky', 'male');
$sam = new Dog('Sam', 'male');
$lady = new Dog('Lady', 'female');
$molly = new Dog('Molly', 'female');
$rocky = new Dog('Rocky', 'male', $molly, $sam);
$max = new Dog('Max', 'male', $lady, $rocky);
$buster = new Dog('Buster', 'male', $lady, $sparky);
$coco = new Dog('Coco', 'female', $molly, $buster);

echo 'Coco\'s father is: ' . $coco->getFathersName() . PHP_EOL;
echo 'Sparky\'s father is: ' . $sparky->getFathersName() . PHP_EOL;

if ($coco->hasSameMotherAs($rocky)) {
    echo $coco->getName() . ' has the same mother as ' . $rocky->getName() . PHP_EOL;
} else {
    echo $coco->getName() . '\'s mother is ' . $coco->getMother()->getName() . PHP_EOL;
    echo $rocky->getName() . '\'s mother is ' . $rocky->getMother()->getName() . PHP_EOL;
};

