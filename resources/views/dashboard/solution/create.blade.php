@extends('dashboard.layouts.main')
@section('content')

<h1>{{ __('Create New Solution Page') }}</h1>

@include('general.flash-message')

<form method="POST" action="{{ route('solution.store') }}" enctype="multipart/form-data">
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
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">{{ __('Description English') }}</label>
              <textarea type="text" rows="9" name="description" class="form-control quilljs-textarea">
              </textarea>
              @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">{{ __('Description Arabic') }}</label>
              <textarea type="text" rows="9" name="description_ar" class="form-control quilljs-textarea" required>
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
      <button type="submit" class="btn btn-primary">{{ __('Add new Solution') }}</button>
    </div>
  </form>
@endsection
