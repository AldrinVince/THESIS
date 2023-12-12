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

    public function getActualSensorData()
    {
        return $this->model
        ->selectRaw(
            'created_at,
            AVG(temperature) as temperature,
            AVG(humidity) as humidity,
            AVG(electricity_consumption) as electricity_consumption,
            AVG(electricity_ampere) as electricity_ampere'
        )
        ->orderBy('created_at', 'asc')
        ->groupBy('created_at')
        ->get();
    }

    public function getDailyActualData()
    {
        $data = $this->model->get();
        $grouped = $data->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->format('Y-m-d');
        })->map(function ($group) {
            return $group->reduce(function ($carry, $item) {
                $carry['temperature'] += $item->temperature;
                $carry['humidity'] += $item->humidity;
                $carry['electricity_ampere'] += $item->electricity_ampere;
                $carry['electricity_consumption'] += $item->electricity_consumption;
                return $carry;
            }, [
                'temperature' => 0,
                'humidity' => 0,
                'electricity_ampere' => 0,
                'electricity_consumption' => 0,
            ]);
        });
        return $grouped;
    }
}