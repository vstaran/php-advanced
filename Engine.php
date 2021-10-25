<?php

class Engine implements EngineInterface {

    private $status = 0;

    public function start()
    {
        $this->status = 1;
    }

    public function stop()
    {
        $this->status = 0;
    }

    public function status()
    {
        return $this->status;
    }

}