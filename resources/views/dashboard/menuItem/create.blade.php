@extends('dashboard.layouts.main')
@section('content')

<h1>{{ __('Create New menuItem Page') }}</h1>

@include('general.flash-message')

<form method="POST" action="{{ route('menuItem.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Title') }}</label>
              <input name="title_en" type="text" class="form-control">
              @error('title_en')
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
              <label for="exampleInputEmail1">{{ __('Link') }}</label>
              <input name="link" type="text" class="form-control" value="">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Parent') }}</label>
              <select name="parent_id" class="form-control">
                <option value="" selected >...</option>
                @foreach ($parents as $parent)                    
                  <option value="{{ $parent->id }}" }}>{{ $parent->title  }}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Rank') }}</label>
              <input name="rank" type="text" class="form-control" value="">
              @error('rank')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror          
            </div>
            <div class="form-group col-md-6">
             
            </div>
        </div>
  
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">{{ __('Add new Navbar item') }}</button>
    </div>
  </form>
@endsection
