<?php

class Car extends Transport
{
    private const MAXIMUM_CARGO_WEIGHT = 100;

    public function __construct($name, $model, $year, $speed, CargoInterface $cargo)
    {

        if($cargo->getWeight() > self::MAXIMUM_CARGO_WEIGHT) {
            throw new Exception('Большой вес. Максимальный вес перевозки: ' . self::MAXIMUM_CARGO_WEIGHT);
        }

        parent::__construct(
            $name,
            $model,
            $year,
            $speed,
            new Engine(), // Мотор
            new Transmission() // Трансмисия
        );
    }

    public function getFullInfo()
    {
        return $this->getName() . ' ' . $this->getModel() . ' ' . $this->getYear();
    }
}