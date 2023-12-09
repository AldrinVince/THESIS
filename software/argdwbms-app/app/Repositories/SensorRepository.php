<?php

namespace App\Repositories;

use App\Contracts\SensorContract;
use App\Models\Sensor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SensorRepository implements SensorContract {

    protected $model;

    public function __construct(Sensor $model)
    {
        $this->model = $model;
    }

    public function getSensorTable()
    {
        return $this->model
        ->select(DB::raw('DATE(created_at) as date'), 'temperature', 'humidity', 'electricity_consumption')
        ->groupBy('date', 'temperature', 'humidity', 'electricity_consumption')
        ->paginate(10);
    }

    public function getTotalMonthTemperature()
    {
         $result = $this->model
        ->select(DB::raw('SUM(temperature) as sum_temperature'))
        ->whereRaw('MONTH(created_at) = MONTH(CURRENT_DATE())')
        ->first();

        return $result->sum_temperature;
    }

    public function getTotalMonthHumidity()
    {
         $result = $this->model
        ->select(DB::raw('SUM(humidity) as sum_humidity'))
        ->whereRaw('MONTH(created_at) = MONTH(CURRENT_DATE())')
        ->first();

        return $result->sum_humidity;
    }

    public function getTotalMonthElectricConsumption()
    {
        $result = $this->model
        ->select(
            DB::raw('SUM(electricity_consumption) as sum_electricity_consumption'),
            DB::raw('SUM(electricity_ampere) as sum_electricity_ampere')
        )
        ->whereRaw('MONTH(created_at) = MONTH(CURRENT_DATE())')
        ->first();

        $totalWatts = $totalWatts = ($result->sum_electricity_consumption * $result->sum_electricity_ampere) / 1000;

        return $totalWatts;
    }

    public function getCurrentMonthTemperature()
    {
        return $this->model
            ->select(
                DB::raw('DATE(created_at) as date'), 
                DB::raw('SUM(temperature) as sum_temperature')
            )
            ->whereRaw('MONTH(created_at) = MONTH(CURRENT_DATE())')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();
    }
}
