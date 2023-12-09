<x-app-layout>

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
  							<div class="col-xl-9 col-lg-8 col-12">	
  								<div id="calendar"></div>
  							</div>
  							<div class="col-xl-3 col-lg-4 col-12">
  								<div class="box no-border no-shadow">
  									<div class="box-header with-border">
  									  <h4 class="box-title">Draggable Events</h4>
  									</div>
  									<div class="box-body p-0">
  									  <!-- the events -->
  									  <div id="external-events">
  										<div class="external-event m-15 bg-primary" data-class="bg-primary"><i class="fa fa-hand-o-right"></i>Lunch</div>
  										<div class="external-event m-15 bg-warning" data-class="bg-warning"><i class="fa fa-hand-o-right"></i>Go home</div>
  										<div class="external-event m-15 bg-info" data-class="bg-info"><i class="fa fa-hand-o-right"></i>Do homework</div>
  										<div class="external-event m-15 bg-success" data-class="bg-success"><i class="fa fa-hand-o-right"></i>Work on UI design</div>
  										<div class="external-event m-15 bg-danger" data-class="bg-danger"><i class="fa fa-hand-o-right"></i>Sleep tight</div>
  									  </div>
  									  <div class="event-fc-bt mx-15 my-20">
  										<!-- checkbox -->
  										<div class="checkbox">
  											<input id="drop-remove" type="checkbox">
  											<label for="drop-remove">
  												Remove after drop
  											</label>
  										</div>
  										<a href="#" data-toggle="modal" data-target="#add-new-events" class="btn btn-rounded btn-success btn-block my-10">
  											<i class="ti-plus"></i> Add New Event
  										</a>
  									  </div>
  								   </div>
  							  </div>								
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
