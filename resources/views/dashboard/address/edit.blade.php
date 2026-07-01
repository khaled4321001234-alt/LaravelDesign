@extends('dashboard.layouts.main')
@section('content')

<h1>{{ __('Edit Address Page') }}</h1>
<form method="POST" action="{{ route('address.update',[$address->id]) }}" enctype="multipart/form-data">
  @include('general.flash-message')

    @csrf
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Title') }}</label>
              <input name="title" type="text" class="form-control" value="{{ $address->title }}">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Title Arabic') }}</label>
              <input name="title_ar" type="text" class="form-control" required value="{{ $address->title_ar }}">
            </div>
        </div>      
      <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Address') }}</label>
              <input name="address" type="text" class="form-control" required value="{{ $address->address }}">
              @error('address')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror          
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Address Arabic') }}</label>
              <input name="address_ar" type="text" class="form-control" required value="{{ $address->address_ar }}">
              @error('address_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror 
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Phone') }}</label>
              <input name="phone" type="text" class="form-control" value="{{ $address->phone }}">
              @error('phone')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror          
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Email') }}</label>
              <input name="email" type="text" class="form-control" required value="{{ $address->email }}">
              @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror 
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Rank') }}</label>
              <input name="rank" type="text" class="form-control" value="{{ $address->rank }}">
              @error('rank')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror          
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Active') }}</label>
              <input name="active" type="text" class="form-control" required value="{{ $address->active }}">
              @error('active')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror 
            </div>
        </div>
      <div class="form-group">
        <label for="image">Image</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="image">
            <label class="custom-file-label" for="image">Choose file</label>
          </div>
        </div>
        <div>
          <img  width="250"  src="{{ asset('images/address/' .$address->img )  }}" alt="">
        </div>
      </div>



    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
     
    </div>
    <div>
    </div>
  </form>
@endsection
