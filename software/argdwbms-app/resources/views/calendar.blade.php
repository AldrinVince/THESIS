<x-app-layout>
    @push('styles')
        <style>
            .temperature-event {
                background-color: #27a745;
                text-align: start;
            }

            .humidity-event {
                background-color: #007bff;
                text-align: start;
            }

            .electricity-consumption-event {
                background-color: #ffc001;
                text-align: start;
            }

            .electricity-ampere-event {
                background-color: #ed7b7c;
                text-align: start;
            }
        </style>
    @endpush

    @include('layouts.header')

    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Main content -->
        <section class="content" style="padding-top:100px;">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12">
                                    <div id="calendar"></div>
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
        <script>
            $(document).ready(function() {
                var sensorData = @json($sensorData);

                console.log("sensorData", sensorData);

                var SITEURL = "{{ url('/calendar') }}";

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var events = [];

                for (var date in sensorData) {
                    if (sensorData.hasOwnProperty(date)) {
                        var data = sensorData[date];

                        events.push({
                            title: 'Temperature: ' + data.temperature,
                            start: date,
                            end: date,
                            allDay: true,
                            className: 'temperature-event',
                        });

                        events.push({
                            title: 'Humidity: ' + data.humidity,
                            start: date,
                            end: date,
                            allDay: true,
                            className: 'humidity-event',
                        });

                        events.push({
                            title: 'Electric: ' + data.electricity_consumption,
                            start: date,
                            end: date,
                            allDay: true,
                            className: 'electricity-consumption-event',
                        });

                        events.push({
                            title: 'Ampere: ' + data.electricity_ampere,
                            start: date,
                            end: date,
                            allDay: true,
                            className: 'electricity-ampere-event',
                        });
                    }
                }

                var calendar = $('#calendar').fullCalendar({
                    editable: false,
                    events: events,
                    displayEventTime: false,
                    eventRender: function(event, element, view) {
                        if (event.allDay === 'true' || event.allDay === true) {
                            event.allDay = true;
                        } else {
                            event.allDay = false;
                        }
                    },
                    selectable: true,
                    selectHelper: true,
                });
            });
        </script>
    @endpush
</x-app-layout>
