@extends('admin.master')
@section('content')

<div class="app-content content mt-0 pt-0">
    <div class="content-wrapper">


      <div class="content-body">
        <!-- Basic scenario start -->
        <section id="basic">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">قائمه عربيات ال po  </h4>
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
                  <div class="card-body card-dashboard ">
                    
                    <div id="basicScenario"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Basic scenario end -->
      </div>

    </div>
  </div>
  
@endsection