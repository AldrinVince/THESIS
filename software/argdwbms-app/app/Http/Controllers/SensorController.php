<?php

namespace App\Http\Controllers;

use App\Contracts\SensorContract;
use Exception;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    protected $sensorContract;

    public function __construct(
        SensorContract $sensorContract
    ){
        $this->sensorContract = $sensorContract;
    }

    public function index()
    {
        try {

            $sensorTable = $this->sensorContract->getSensorTable();

            $currentMonthTemperature = $this->sensorContract->getTotalMonthTemperature();
            $currentMonthHumidity = $this->sensorContract->getTotalMonthHumidity();
            $currentMonthElectricConsumption = $this->sensorContract->getTotalMonthElectricConsumption();
            $sensorData = $this->sensorContract->getActualSensorData();

            return view('dashboard', [
                'sensorTable' => $sensorTable,
                'currentMonthTemperature' => $currentMonthTemperature,
                'currentMonthHumidity' => $currentMonthHumidity,
                'currentMonthElectricConsumption' => $currentMonthElectricConsumption,
                'sensorData' => $sensorData,
            ]);

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function calendar()
    {
        try {
            $sensorTable = $this->sensorContract->getSensorTable();

            $currentMonthTemperature = $this->sensorContract->getTotalMonthTemperature();
            $currentMonthHumidity = $this->sensorContract->getTotalMonthHumidity();
            $currentMonthElectricConsumption = $this->sensorContract->getTotalMonthElectricConsumption();

            return view('calendar', [
                'sensorTable' => $sensorTable,
                'currentMonthTemperature' => $currentMonthTemperature,
                'currentMonthHumidity' => $currentMonthHumidity,
                'currentMonthElectricConsumption' => $currentMonthElectricConsumption,
            ]);

        } catch (Exception $e) {
            dd($e);
        }
    }
}
