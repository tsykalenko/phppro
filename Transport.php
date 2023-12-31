<?php

class Transport
{
    public function __construct(
        protected string $name,
        protected int $speed
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): void
    {
        $this->speed = $speed;
    }

    public function getInfo()
    {
        return "Name: {$this->name}, Speed: {$this->speed} km/h";
    }

}

class Car extends Transport
{
    private int $nunDoors;

    public function __construct($name, $speed, $nunDoors)
    {
        parent::__construct($name, $speed);
        $this->nunDoors = $nunDoors;
    }

    public function getNumDoors(): int
    {
        return $this->nunDoors;
    }

    public function setNumDoors(int $numDoors): void
    {
        $this->nunDoors = $numDoors;
    }

    public function startEngine()
    {
        return "Starting the engine of {$this->name}...";
    }
}

class Bicycle extends Transport
{
    private int $numGears;
    protected string $colour;

    public function __construct($name, $speed, $numGears, $colour)
    {
        parent::__construct($name, $speed);
        $this->numGears = $numGears;
        $this->colour = $colour;
    }


    public function getColour(): string
    {
        return $this->colour;
    }

    public function setColour(string $colour): void
    {
        $this->colour = $colour;
    }

    public function getNumGears(): int
    {
        return $this->numGears;
    }

    public function setNumGears(int $numGears): void
    {
        $this->numGears = $numGears;
    }

    public function ringBell()
    {
        return "Ring the bell on {$this->name}!!!";
    }

    public function getInfo()
    {
        return "Name: {$this->name}, Speed: {$this->speed} km/h, Colour: {$this->colour}";
    }

}

class Boat extends Transport
{
    private int $numSeats;

    public function __construct($name, $speed, $numSeats)
    {
        parent::__construct($name, $speed);
        $this->numSeats = $numSeats;
    }

    public function getNumSeats(): int
    {
        return $this->numSeats;
    }

    public function setNumSeats(int $numSeats): void
    {
        $this->numSeats = $numSeats;
    }

    public function dropAnchor()
    {
        return "Drop anchor on the {$this->name}";
    }
}


$array = [];
$array[] = new Car('Toyota Camry', 180, 5);
$array[] = new Bicycle('Cyclone', 35, 10, 'Blue');
$array[] = new boat('G3', 70, 4);

foreach ($array as $item) {
    echo $item->getInfo() . PHP_EOL;
}
