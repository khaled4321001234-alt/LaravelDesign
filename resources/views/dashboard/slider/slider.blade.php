
@extends('dashboard.layouts.main')
@section('content')


    <!-- Main content -->
    <section class="content my-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">{{__('sliders Table')}}</h3>
                <a href="{{route('slider.create')}}" class="btn btn-block btn-outline-success col-md-3 ml-auto">{{__('Add new')}}</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>{{__('#id')}}</th>
                    <th>{{__('image')}}</th>
                    <th>{{__('title')}}</th>
                    <th>{{__('description')}}</th>
                    {{-- <th>{{__('type')}}</th> --}}
                    <th>{{__('edit')}}</th>
                    <th>{{__('delete')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($sliders as $slider)
                      <tr>
                          <td>{{$slider->id}}</td>
                          @php
                          $img = $slider->img;
                          if(empty($img))
                            $img = $slider->bg;
                          @endphp
                          <td><img width="100" height="100" src="{{asset('images/thumb_100/' . $img )}}"/></td>
                          
                          <td>{{$slider->title}}</td>
                          <td>{{ strip_tags( Str::words($slider->description, 20, '...') ) }}</td>
                          {{-- <td>{{ $slider->type }}</td> --}}
                          <td>
                            <a href="{{ route('slider.edit',[$slider->id]) }}" class="btn btn-block btn-outline-primary">Edit</a>
                          </td>
                          @if ($slider->position != 'front')
                            <td>
                              <form class="delete-item" action="{{ route('slider.destroy',[$slider->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                  <input type="submit" value="Delete" class="btn btn-block bg-gradient-danger">
                              </form>
                            </td>
                          @endif
                          @if ($slider->position == 'front')
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

