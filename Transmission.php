<?php

class Transmission implements TransmissionInterface {

    public const MAXIMUM_TRANSMISSION_NUMBER = 6;
    private int $transmissionNumber = 0;

    public function getTransmissionNumber()
    {
        return $this->transmissionNumber;
    }

    public function setTransmissionNumber($transmissionNumber)
    {
        if(self::MAXIMUM_TRANSMISSION_NUMBER >= $transmissionNumber) {
            $this->transmissionNumber = $transmissionNumber;
        }

        echo "Номер трансмиссии:" . $this->transmissionNumber . "<br>\n";
    }

    public function incTransmissionNumber() {
        $this->setTransmissionNumber($this->transmissionNumber + 1);
    }

    public function decTransmissionNumber() {

        if (($this->transmissionNumber - 1) <= 0) {
            $this->transmissionNumber = 1;
        }

        $this->transmissionNumber -= 1;

        echo "Номер трансмиссии:" . $this->transmissionNumber . "<br>\n";
    }

    public function setMaxTransmissionNumber()
    {
        $this->setTransmissionNumber(self::MAXIMUM_TRANSMISSION_NUMBER);
    }
}