<?php

namespace App\Contracts;

interface SensorContract {

    public function getSensorTable();
    public function getTotalMonthTemperature();
    public function getTotalMonthHumidity();
    public function getTotalMonthElectricConsumption();
    public function getCurrentMonthTemperature();
    public function getActualSensorData();
}