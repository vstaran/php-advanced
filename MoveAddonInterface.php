<?php


interface MoveAddonInterface
{
    /**
     * Повернуть на лево
     * @return mixed
     */
    public function left();

    /**
     * Повернуть на право
     * @return mixed
     */
    public function right();

    /**
     * Увеличивает скорость движения до максимума
     * @return mixed
     */
    public function maxspeed();

}