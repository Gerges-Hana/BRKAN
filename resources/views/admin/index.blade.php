@extends('admin.master')
@section('css')

@endsection

@section('content-body')

        <!-- Minimal statistics section start -->
        <section id="minimal-statistics">
        
        

        <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="media-body text-left">
                        <h3 class="success">156</h3>
                        <span>عدد العملاء </span>
                      </div>
                      <div class="align-self-center">
                        <i class="icon-user success font-large-2 float-right"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="media-body text-left">
                        <h3 class="danger">278</h3>
                        <span>عدد ال po </span>
                      </div>
                      <div class="align-self-center">
                        <i class="icon-rocket danger font-large-2 float-right"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="align-self-center">
                        <i class="icon-pointer danger font-large-2 float-left"></i>
                      </div>
                      <div class="media-body text-right">
                        <h3>23</h3>
                        <span>عدد العربيات الوارده اليوم  </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="align-self-center">
                        <i class="icon-graph success font-large-2 float-left"></i>
                      </div>
                      <div class="media-body text-right">
                        <h3>6</h3>
                        <span>عدد العربيات التي تم تفريغها  </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          
     </div>


        </section>
        <!-- // Minimal statistics section end -->


        <!-- Pie charts section start -->
        <section id="chartjs-pie-charts">
          <div class="row">
            <!-- Simple Pie Chart -->
            <div class="col-md-6 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Simple Pie Chart</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <canvas id="simple-pie-chart" height="400"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- Simple Doughnut Chart -->
            <div class="col-md-6 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Simple Doughnut Chart</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <canvas id="simple-doughnut-chart" height="400"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </section>
        <!-- // Pie charts section end -->


@endsection



@section('script')
  <!-- BEGIN VENDOR JS-->
  <script src="../../../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->

@endsection