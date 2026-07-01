
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
                <h3 class="card-title">{{__('Products Table')}}</h3>
                <a href="{{route('products.create')}}" class="btn btn-block btn-outline-success col-md-3 ml-auto">{{__('Add new')}}</a>
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
                    <th>{{__('type')}}</th>
                    <th>{{__('edit')}}</th>
                    <th>{{__('delete')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                      <tr>
                          <td>{{$product->id}}</td>
                          <td><img width="100" height="100" src="{{asset('images/thumb_100/' . $product->image )}}"/></td>
                         
                          <td>{{$product->title}}</td>
                          <td>{{ strip_tags( Str::words($product->excerpt, 20, '...') ) }}</td>
                           <td>{{ $product->type }}</td>
                          <td>
                            <a href="{{ route('product.edit',[$product->id]) }}" class="btn btn-block btn-outline-primary">Edit</a>
                          </td>
                          @if ($product->position != 'front')
                            <td>
                              <form class="delete-item" action="{{ route('product.destroy',[$product->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                  <input type="submit" value="Delete" class="btn btn-block bg-gradient-danger">
                              </form>
                            </td>
                          @endif
                          @if ($product->position == 'front')
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

