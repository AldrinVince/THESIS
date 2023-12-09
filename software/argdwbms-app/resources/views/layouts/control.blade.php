<!-- Control Sidebar -->
<aside class="control-sidebar">

	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab" class="active">Actual Data</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-home-tab">
            <div class="lookup lookup-sm lookup-right d-none d-lg-block">
                <input type="text" name="s" placeholder="Search" class="w-p100">
            </div>
            <div class="media-list media-list-hover mt-20">
                @foreach ($sensorTable as $key => $item)
                    <div class="media py-10 px-0">
                        <div class="media-body">
                            <p>Temperature: {{ $item->temperature }}</p>
                            <p>Humidity: {{ $item->humidity }}</p>
                            <p>Electricity: {{ $item->electricity_consumption }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
