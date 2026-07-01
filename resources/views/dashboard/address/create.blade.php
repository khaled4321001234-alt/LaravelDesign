@extends('dashboard.layouts.main')
@section('content')

<h1>{{ __('Create New address Page') }}</h1>

@include('general.flash-message')

<form method="POST" action="{{ route('address.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Title') }}</label>
              <input name="title" type="text" class="form-control">
              @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror          
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Title Arabic') }}</label>
              <input name="title_ar" type="text" class="form-control" required>
              @error('title_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror 
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Address') }}</label>
              <input name="address" type="text" class="form-control">
              @error('address')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror          
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Address Arabic') }}</label>
              <input name="address_ar" type="text" class="form-control" required>
              @error('address_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror 
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Phone') }}</label>
              <input name="phone" type="text" class="form-control">
              @error('phone')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror          
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Email') }}</label>
              <input name="email" type="text" class="form-control" required>
              @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror 
            </div>
        </div>
       
       

      <div class="form-group">
        <label for="exampleInputFile">{{__('image input')}}</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">{{__('Choose file')}}</label>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

        </div>
      </div>


    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">{{ __('Add new address') }}</button>
    </div>
  </form>
@endsection
