
@extends('dashboard.layouts.main')
@section('content')
    <!-- Main content -->
    <section class="content my-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex">
                <h3 class="card-title">{{__('partners Table')}}</h3>
                <a href="{{route('partner.create')}}" class="btn btn-block btn-outline-success col-md-3 ml-auto">{{__('Add new')}}</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>{{__('#id')}}</th>
                    <th>{{__('image')}}</th>
                    <th>{{__('title')}}</th>
                    <th>{{__('edit')}}</th>
                    <th>{{__('delete')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($partners as $partner)
                      <tr>
                          <td>{{$partner->id}}</td>
                          <td><img width="100" height="100" src="{{ asset('images/thumb_100/' . $partner->img )}}"/></td>
                          
                          <td>{{$partner->title}}</td>
                          <td>
                            <a href="{{ route('partner.edit',[$partner->id]) }}" class="btn btn-block btn-outline-primary">Edit</a>
                          </td>
                          @if ($partner->position != 'front')
                            <td>
                              <form class="delete-item" action="{{ route('partner.destroy',[$partner->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                  <input type="submit" value="Delete" class="btn btn-block bg-gradient-danger">
                              </form>
                            </td>
                          @endif
                          @if ($partner->position == 'front')
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

