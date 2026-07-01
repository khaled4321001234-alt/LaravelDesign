
@extends('dashboard.layouts.main')

@section('content')

    <div class="content py-5">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-lg-12">

            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">{{ __('Recent demands') }}</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Phone')}}</th>
                    <th>{{__('Company')}}</th>
                    <th>{{__('Country')}}</th>
                    <th>{{__('message')}}</th>
                    <th>{{__('Read more')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach (App\Models\Contacts::orderBy('id','desc')->get() as $contact) 
                      <tr>
                        <td>
                          {{$contact->name}}
                        </td>
                        <td>
                          {{$contact->email}}
                        </td>
                        <td>
                          {{$contact->phone}}
                        </td>
                        <td>
                          {{$contact->company}}
                        </td>
                        <td>
                          {{$contact->country_id}}
                        </td>
                        <td>
                          {{ Str::words($contact->message, 7)}}
                        </td>
                        <td>
                          <a href="{{ route('contacts.single',$contact->id) }}">{{ __('Read more') }}</a>
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
