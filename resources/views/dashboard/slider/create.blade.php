@extends('dashboard.layouts.main')
@section('content')

<h1>{{ __('Create New Silder Page') }}</h1>

@include('general.flash-message')

<form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
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
              <label for="exampleInputEmail1">{{ __('Description English') }}</label>
              <textarea type="text" rows="9" name="description_en" class="form-control quilljs-textarea" >
                  {{old('description_en')}}
              </textarea>
              @error('description_en')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">{{ __('News No.') }}</label>
                <input name="product_id" type="text" class="form-control" value="{{old('product_id')}}" >
              </div>
           
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">{{ __('Description Arabic') }}</label>
              <textarea type="text" rows="9" name="description_ar" class="form-control quilljs-textarea" required>
                  {{old('description_ar')}}
              </textarea>
              @error('description_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
        </div>

      <div class="form-group">
        <label for="exampleInputFile">{{__('image input')}}</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="exampleInputFile" >
            <label class="custom-file-label" for="exampleInputFile">{{__('Choose file')}}</label>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

        </div>
      </div>



    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">{{ __('Add new Sild') }}</button>
    </div>
  </form>
@endsection
