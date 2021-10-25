<?php

    include "Loader.php";
    spl_autoload_register([ClassLoader::class, 'autoload']);


    $cargo = new Cargo(
        'Ковбаса',
        100
    );

    // --- Car #1 ---
    $car1 = new Car(
        'Ford',
        'Focus',
        2015,
        100,        // Максимальная скорость
        $cargo             // Вантаж
    );


    $car1->start();

    for($i = 0; $i < 5; $i++) {
        $car1->up();
    }

    $car1->maxspeed();

    for($i = 0; $i < 5; $i++) {
        $car1->down();
    }

    $car1->stop();


    // --- Car #2 ---
    $car2 = new Car(
        'Subaru',
        'Impreza',
        2017,
        140,        // Максимальная скорость
        $cargo             // Вантаж
    );


    $car2->start();

    for($i = 0; $i < 5; $i++) {
        $car2->up();
    }

    $car2->maxspeed();

    for($i = 0; $i < 5; $i++) {
        $car2->down();
    }

    $car2->stop();



    echo sprintf(
        "Груз %s / Весом %s (кг). Успешно доставлен! Количество машин: %s",
        $cargo->getName(),
        $cargo->getWeight(),
        Car::getCount()
    );
