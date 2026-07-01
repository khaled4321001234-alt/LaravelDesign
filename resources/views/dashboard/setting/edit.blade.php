@extends('dashboard.layouts.main')
@section('content')

<h1>{{ __('Edit Setting Page') }}</h1>
<form method="POST" action="{{ route('setting.update',[$setting->id]) }}" enctype="multipart/form-data">
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
              <input name="title_en" type="text" class="form-control" value="{{ $setting->title_en }}">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Title Arabic') }}</label>
              <input name="title_ar" type="text" class="form-control" required value="{{ $setting->title_ar }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">{{ __('Description English') }}</label>
              <input type="text" name="description_en" class="form-control"
               value="{{ $setting->description_en }}">
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">{{ __('Description Arabic') }}</label>
              <input type="text" name="description_ar" class="form-control" 
               value="{{ $setting->description_ar }}" >
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
          <img  width="250"  src="{{ asset('images/images/' .$setting->img )  }}" alt="">
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
