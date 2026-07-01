@extends('dashboard.layouts.main')
@section('content')

<h1>{{ __('Create New Client Page') }}</h1>

@include('general.flash-message')

<form method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Title') }}</label>
              <input name="title_en" type="text" class="form-control" value="{{old('title_en')}}">
              @error('title_en')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror          
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Title Arabic') }}</label>
              <input name="title_ar" type="text" class="form-control" value="{{old('title_ar')}}">
              @error('title_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror 
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">the number</label>
              <input name="numberText" type="text" class="form-control" value="{{old('numberText')}}">
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
      <button type="submit" class="btn btn-primary">{{ __('Add new Client') }}</button>
    </div>
  </form>
@endsection
