@extends('dashboard.layouts.main')
@section('content')

<h1>{{ __('Edit About Page') }}</h1>
<form method="POST" >
    @csrf
    @method('PUT')
    <input type="hidden" name="type" value="aboutpage">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">{{ __('Description English') }}</label>
              <textarea type="text" name="description" class="form-control my-editor">
              </textarea>
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">{{ __('Description Arabic') }}</label>
              <textarea type="text" name="description_ar" class="form-control my-editor"  required>
              </textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Slug') }}</label>
              <input type="text" name="slug" class="form-control" required >
            </div>

        </div>

    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </div>
  </form>
@endsection
