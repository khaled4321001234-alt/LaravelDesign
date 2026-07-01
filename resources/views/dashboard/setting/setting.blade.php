
@extends('dashboard.layouts.main')
@section('content')

@php
  $lang = config('app.locale')== 'ar' ? '_ar':'' ;
@endphp
    <!-- Main content -->
    <section class="content my-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">{{__('settings Table')}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>{{__('#id')}}</th>
                    <th>{{__('title')}}</th>
                    <th>{{__('description')}}</th>
                    <th>{{__('edit')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($settings as $setting)
                      <tr>
                          <td>{{$setting->id}}</td>
                          
                          <td>{{$setting->title}}</td>
                          <td>
                            @if(!empty($setting->img))
                              <img width="150" src="{{ url('images/images/'.$setting->img) }}">

                            @else
                                {{ \Illuminate\Support\Str::limit($setting->description, 100) }}

                            @endif

                          </td>
                          <td>
                            <a href="{{ route('setting.edit',[$setting->id]) }}" class="btn btn-block btn-outline-primary">Edit</a>
                          </td>
                          
                          @if ($setting->position == 'front')
                            <td>
                               <i class="far fa-flag" style="font-size: 17px;color:red"></i>

                            </td>
                          @endif
                      </tr>
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

