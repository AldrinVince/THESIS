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
                            <ul class="list-inline text-center mt-40">
                                <li>
                                    <h5><i class="fa fa-circle mr-5 text-success"></i>Data 1</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle mr-5 text-info"></i>Data 2</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle mr-5 text-warning"></i>Data 3</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle mr-5 text-danger"></i>Data 3</h5>
                                </li>
                            </ul>
                            <div id="area-chart3"></div>
                            <!-- <div id="charts_widget_43_chart"></div> -->
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
</x-app-layout>
