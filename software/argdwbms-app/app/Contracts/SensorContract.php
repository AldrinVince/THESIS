<?php

namespace App\Contracts;

interface SensorContract {

    public function getSensorTable();
    public function getCurrentMonthTemperature();
}
