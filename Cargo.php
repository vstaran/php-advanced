<?php


class Cargo implements CargoInterface
{
    private $name;
    private $weight;


    public function __construct($name, $weight)
    {
        $this->name = $name;
        $this->weight = $weight;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getWeight()
    {
        return $this->weight;
    }
}