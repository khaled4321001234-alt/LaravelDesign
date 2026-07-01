@extends('dashboard.layouts.main')
@section('content')

<h1>{{ __('Edit Product Page') }}</h1>
<form method="POST" action="{{ route('pragraphs.update',[$product->id]) }}" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Title') }}</label>
              <input name="title" type="text" class="form-control" value="{{ $product->title }}">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Title Arabic') }}</label>
              <input name="title_ar" type="text" class="form-control" required value="{{ $product->title_ar }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">{{ __('Description English') }}</label>
              <textarea type="text" name="description" class="form-control quilljs-textarea">
                {{ $product->description }}
              </textarea>
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">{{ __('Description Arabic') }}</label>
              <textarea type="text" name="description_ar" class="form-control quilljs-textarea" >
                {{ $product->description_ar }}
              </textarea>
            </div>
        </div>
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </div>
  </form>
@endsection
