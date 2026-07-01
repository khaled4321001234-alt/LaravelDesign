@extends('dashboard.layouts.main')

@section('content')

    <div class="content py-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  {{ DB::table('visitors')->count() }}
                </h3>

                <p>{{ __('Total visitors') }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  {{ DB::table('visitors')->whereDate('created_at',date('Y-m-d'))->count() }}

                </h3>

                <p>{{__('Today Visitors')}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  {{ DB::table('contacts')->count() }}
                </h3>

                <p>{{ __('Total submmited form') }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  {{ $comtactTody }}
                </h3>

                <p>{{ __('#This month submmited form') }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row ">
          <div class="col-lg-12">

            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">{{ __('Recent demands') }}</h3>
              </div>
              <div class="card-body table-responsive p-0">

              </div>
            </div>
            <div class="card">
              <div class="card-header border-0">
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>{{__('Full name')}}</th>
                    <th>{{__('Phone')}}</th>
                    <th>{{__('email')}}</th>
                    <th>Message</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($Contacts
                         as  $contact)
                        {{-- {{dd($contact)}} --}}
                      <tr>
                        <td>{{$contact->name}}</td>
                        <td><a href="tel:{{$contact->phone}}">{{$contact->phone}}</a></td>
                        <td>
                          <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                        </td>
                        
                                 <td>
                          {{$contact->message}}
                        </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>

        </div>
        <!-- /.row -->
        
      </div>
      <!-- /.container-fluid -->
    </div>

@endsection
