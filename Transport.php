<?php

/*
 * Абстрактные классы призваны предоставлять базовый функционал для классов-наследников.
 * А производные классы уже реализуют этот функционал.
 */


abstract class Transport implements MovableInterface, MoveAddonInterface
{
    private const DEFAULT_SPEED_LIMIT = 100;
    private const DEFAULT_STEP_SPEED = 25;

    private static int $counter = 0; // Количество созданого транспорта

    private int $currentSpeed = 0;
    private int $maxSpeed;

    private $name;
    private $model;
    private $year;

    private EngineInterface $engine;
    private TransmissionInterface $transmission;

    public function __construct($name, $model, $year, $speed, EngineInterface $engine, TransmissionInterface $transmission)
    {
        $this->name = $name;
        $this->model = $model;
        $this->year = $year;
        $this->maxSpeed = ($speed) ?? self::DEFAULT_SPEED_LIMIT;

        $this->engine = $engine;
        $this->transmission = $transmission;

        self::$counter++;
    }

    abstract public function getFullInfo();

    public static function getCount()
    {
        return self::$counter;
    }

    protected function getName()
    {
        return $this->name;
    }

    protected function getModel()
    {
        return $this->model;
    }

    protected function getYear()
    {
        return $this->year;
    }

    public function getSpeed()
    {
        return $this->currentSpeed;
    }

    public function setSpeed($speed)
    {
        $this->currentSpeed = $speed;

        echo "Текущая скорость: " . $this->currentSpeed . "<br>\n";
    }

    public function incSpeed()
    {
        if($this->maxSpeed < ($this->currentSpeed + self::DEFAULT_STEP_SPEED)) {
            return false;
        }

        $this->setSpeed($this->currentSpeed + self::DEFAULT_STEP_SPEED);
        return true;
    }

    public function decSpeed()
    {
        if($this->currentSpeed == 0) {
            return false;
        }

        $this->setSpeed($this->currentSpeed - self::DEFAULT_STEP_SPEED);
        return true;
    }


    public function start()
    {
        echo "start<br>\n";

        $this->engine->start();
        $this->transmission->setTransmissionNumber(1);

        if(!$this->incSpeed()) {
            echo "Превышеная скорость<br>\n";
        }

        echo "Двигатель: " .  ($this->engine->status()? "Включен":"Отключен") . "<br>\n";
    }

    public function stop()
    {
        echo "stop<br>\n";

        $this->engine->stop();
        $this->transmission->setTransmissionNumber(0);
        $this->setSpeed(0);

        echo "Двигатель: " .  ($this->engine->status()? "Включен":"Отключен") . "<br>\n";

        echo "<br><br>\n\n";
    }

    public function up()
    {
        echo "up<br>\n";
        $this->transmission->incTransmissionNumber();
        echo "Двигатель: " .  ($this->engine->status()? "Включен":"Отключен") . "<br>\n";

        if(!$this->incSpeed()) {
            echo "Превышеная скорость<br>\n";
        }
    }

    public function down()
    {
        echo "down<br>\n";
        $this->transmission->decTransmissionNumber();
        echo "Двигатель: " .  ($this->engine->status()? "Включен":"Отключен") . "<br>\n";

        if(!$this->decSpeed()) {
            echo "Скорость на нуле<br>\n";
        }
    }


    public function left()
    {
        // TODO: Implement left() method.
        echo "left<br>\n";
    }

    public function right()
    {
        // TODO: Implement right() method.
        echo "right<br>\n";
    }

    public function maxspeed()
    {
        echo "maxspeed<br>\n";
        $this->setSpeed(self::DEFAULT_SPEED_LIMIT);
        $this->transmission->setMaxTransmissionNumber();
    }


}