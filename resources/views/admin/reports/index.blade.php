@extends('admin.master')

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">التقارير</h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">الرئيسية</a>
            </li>
            <li class="breadcrumb-item active">التقارير
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content-body')



        <!-- HTML5 export buttons table -->
        <section id="html5">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">تقارير PO </h4>
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
                  <div class="card-body card-dashboard">
                   
                      <table class="table table-striped table-bordered dataex-html5-export">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>اسم السائق</th>
                            <th>التاريخ</th>
                            <th>رقم الفتوره</th>
                            <th>رقم ال po</th>
                            <th>وقت الوصول</th>
                            <th>وقت التحميل</th>
                            <th>وقت الخروج</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                          <tr>
                              <td>1</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                          <tr>
                              <td>2</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                          <tr>
                              <td>3</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                          <tr>
                              <td>4</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                          <tr>
                              <td>5</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                          <tr>
                              <td>6</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                          <tr>
                              <td>7</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                          <tr>
                              <td>8</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                          <tr>
                              <td>9</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                          <tr>
                              <td>10</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                          <tr>
                              <td>11</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                          <tr>
                              <td>12</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                          <tr>
                              <td>13</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                          <tr>
                              <td>14</td>
                            <td>ايمن</td>
                            <td>2014/05/19</td>
                            <td>689891</td>
                            <td>320-800</td>
                            <td>11:40</td>
                            <td>11:40</td>
                            <td>11:40</td>
                          </tr>

                        </tbody>
                        <tfoot>
                          <tr>
                            <th>#</th>
                            <th>اسم السائق</th>
                            <th>التاريخ</th>
                            <th>رقم الفتوره</th>
                            <th>رقم ال po</th>
                            <th>وقت الوصول</th>
                            <th>وقت التحميل</th>
                            <th>وقت الخروج</th>
                          </tr>
                        </tfoot>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--/ HTML5 export buttons table -->




@endsection