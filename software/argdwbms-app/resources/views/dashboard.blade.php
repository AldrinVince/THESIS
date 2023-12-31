<x-app-layout>

    @include('layouts.header')

    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Main content -->
        <section class="content" style="padding-top:100px;">
            <div class="row">
                <div class="col-xl-4 col-4">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="text-warning mr-0 font-size-24 mdi mdi-thermometer-lines"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Temperature</p>
                                <h3 class="text-white mb-0 font-weight-500">
                                    {{ $currentMonthTemperature }}
                                    <small class="text-success">
                                        <i class="fa fa-caret-up"></i>
                                        +2.5%</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-4">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="text-info mr-0 font-size-24 wi wi-raindrop"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Humidity</p>
                                <h3 class="text-white mb-0 font-weight-500">
                                    {{ $currentMonthHumidity }}
                                    <small class="text-danger">
                                        <i class="fa fa-caret-down"></i>
                                        -0.5%
                                    </small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-4">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 mdi mdi-speedometer"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">Electricity Consumption</p>
                                <h3 class="text-white mb-0 font-weight-500">
                                    {{ $currentMonthElectricConsumption }}
                                    <small class="text-danger"><i class="fa fa-caret-up"></i>
                                        -1.5%</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">
                                Summary Reports
                            </h4>
                        </div>
                        <div class="box-body py-0">
                            <div id="chart-live-reports"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="box bg-info bg-img" style="background-image: url(../images/gallery/bg-1.png)">
                        <div class="box-body text-center">
                            <img src="../images/trophy.png" class="mt-50" alt="" />
                            <div class="max-w-500 mx-auto">
                                <h2 class="text-white mb-20 font-weight-500">Welcome {{ Auth::user()->name }},</h2>
                                <p class="text-white-50 mb-10 font-size-20">Logged in account</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="box overflow-hidden">
                                <div class="box-body pb-0">
                                    <div>
                                        <h2 class="text-white mb-0 font-weight-500">
                                            {{ $currentMonthTemperature }}
                                        </h2>
                                        <p class="text-mute mb-0 font-size-20">Temperature</p>
                                    </div>
                                </div>
                                <div class="box-body p-0">
                                    <div id="revenue1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="box overflow-hidden">
                                <div class="box-body pb-0">
                                    <div>
                                        <h2 class="text-white mb-0 font-weight-500">
                                            {{ $currentMonthHumidity }}
                                        </h2>
                                        <p class="text-mute mb-0 font-size-20">Humidity</p>
                                    </div>
                                </div>
                                <div class="box-body p-0">
                                    <div id="revenue2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    @include('layouts.footer')

    @include('layouts.control')

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

    @push('scripts')
        {{-- <script>
            var sensorData = @json($sensorData);

            var humiditySeries = {
                name: 'Humidity',
                data: [
                    @foreach ($sensorData as $data)
                        [new Date('{{ $data->created_at }}').getTime(), {{ $data->humidity }}],
                    @endforeach
                ]
            };
            var temperatureSeries = {
                name: 'Temperature',
                data: [
                    @foreach ($sensorData as $data)
                        [new Date('{{ $data->created_at }}').getTime(), {{ $data->temperature }}],
                    @endforeach
                ]
            };
            var electricityConsumptionSeries = {
                name: 'Electric Consumption',
                data: [
                    @foreach ($sensorData as $data)
                        [new Date('{{ $data->created_at }}').getTime(), {{ $data->electricity_consumption }}],
                    @endforeach
                ]
            };
            var ampereSeries = {
                name: 'Ampere',
                data: [
                    @foreach ($sensorData as $data)
                        [new Date('{{ $data->created_at }}').getTime(), {{ $data->electricity_ampere }}],
                    @endforeach
                ]
            };
            var series = [humiditySeries, temperatureSeries, electricityConsumptionSeries, ampereSeries];
            var options = {
                series: series,
                chart: {
                    id: 'area-datetime',
                    type: 'area',
                    height: 350,
                    zoom: {
                        autoScaleYaxis: true
                    }
                },
                annotations: {
                    yaxis: [{
                        y: 30,
                        borderColor: '#999',
                        label: {
                            show: true,
                            text: 'Support',
                            style: {
                                color: "#fff",
                                background: '#00E396'
                            }
                        }
                    }],
                    xaxis: [{
                        x: new Date('14 Jan 2012').getTime(),
                        borderColor: '#999',
                        yAxisIndex: 0,
                        label: {
                            show: true,
                            text: 'Rally',
                            style: {
                                color: "#fff",
                                background: '#775DD0'
                            }
                        }
                    }]
                },
                dataLabels: {
                    enabled: false
                },
                markers: {
                    size: 0,
                    style: 'hollow',
                },
                xaxis: {
                    type: 'datetime',
                    min: new Date('01 Mar 2012').getTime(),
                    tickAmount: 6,
                },
                tooltip: {
                    x: {
                        format: 'dd MMM yyyy'
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.9,
                        stops: [0, 100]
                    }
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart-live-reports"), options);
            chart.render();

            var resetCssClasses = function(activeEl) {
                var els = document.querySelectorAll('button')
                Array.prototype.forEach.call(els, function(el) {
                    el.classList.remove('active')
                })

                activeEl.target.classList.add('active')
            }

            document
                .querySelector('#one_month')
                .addEventListener('click', function(e) {
                    resetCssClasses(e)

                    chart.zoomX(
                        new Date('28 Jan 2013').getTime(),
                        new Date('27 Feb 2013').getTime()
                    )
                })

            document
                .querySelector('#six_months')
                .addEventListener('click', function(e) {
                    resetCssClasses(e)

                    chart.zoomX(
                        new Date('27 Sep 2012').getTime(),
                        new Date('27 Feb 2013').getTime()
                    )
                })

            document
                .querySelector('#one_year')
                .addEventListener('click', function(e) {
                    resetCssClasses(e)
                    chart.zoomX(
                        new Date('27 Feb 2012').getTime(),
                        new Date('27 Feb 2013').getTime()
                    )
                })

            document.querySelector('#ytd').addEventListener('click', function(e) {
                resetCssClasses(e)

                chart.zoomX(
                    new Date('01 Jan 2013').getTime(),
                    new Date('27 Feb 2013').getTime()
                )
            })
            document.querySelector('#all').addEventListener('click', function(e) {
                resetCssClasses(e)

                chart.zoomX(
                    new Date('23 Jan 2012').getTime(),
                    new Date('27 Feb 2013').getTime()
                )
            })
        </script> --}}
        <script>
            var sensorData = @json($sensorData);
            var humiditySeries = {
                name: 'Humidity',
                data: [
                    @foreach ($sensorData as $data)
                        [new Date('{{ $data->created_at }}').getTime(), {{ $data->humidity }}],
                    @endforeach
                ]
            };
            var temperatureSeries = {
                name: 'Temperature',
                data: [
                    @foreach ($sensorData as $data)
                        [new Date('{{ $data->created_at }}').getTime(), {{ $data->temperature }}],
                    @endforeach
                ]
            };
            var electricityConsumptionSeries = {
                name: 'Electric Consumption',
                data: [
                    @foreach ($sensorData as $data)
                        [new Date('{{ $data->created_at }}').getTime(), {{ $data->electricity_consumption }}],
                    @endforeach
                ]
            };
            var ampereSeries = {
                name: 'Ampere',
                data: [
                    @foreach ($sensorData as $data)
                        [new Date('{{ $data->created_at }}').getTime(), {{ $data->electricity_ampere }}],
                    @endforeach
                ]
            };
            var series = [humiditySeries, temperatureSeries, electricityConsumptionSeries, ampereSeries];
            var options = {
                series: series,
                chart: {
                    type: 'area',
                    height: 350,
                    stacked: true,
                    events: {
                        selection: function(chart, e) {
                            console.log(new Date(e.xaxis.min))
                        }
                    },
                },
                colors: ['#007bff', '#27a745', '#ffc001', '#ed7b7c'],
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    curve: 'smooth'
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        opacityFrom: 0.6,
                        opacityTo: 0.8,
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'left',
                    style: {
                        colors: '#fff',
                    },
                },
                xaxis: {
                    type: 'datetime',
                    style: {
                        colors: '#fff',
                    },
                },
                style: {
                    fontSize: '14px',
                    fontFamily: 'Helvetica, Arial, sans-serif',
                    fontWeight: 'bold',
                    colors: '#fff',
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart-live-reports"), options);
            chart.render();
        </script>
    @endpush

</x-app-layout>
