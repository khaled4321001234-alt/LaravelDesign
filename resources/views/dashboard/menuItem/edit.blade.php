@extends('dashboard.layouts.main')
@section('content')

<h1>{{ __('Edit MenuItem Page') }}</h1>
<form method="POST" action="{{ route('menuItem.update',[$menuItem->id]) }}" enctype="multipart/form-data">
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
              <input name="title_en" type="text" class="form-control" value="{{ $menuItem->title_en }}">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Title Arabic') }}</label>
              <input name="title_ar" type="text" class="form-control" required value="{{ $menuItem->title_ar }}">
            </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Link') }}</label>
              <input name="link" type="text" class="form-control" value="{{ $menuItem->link }}">
            </div>
          
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Parent') }}</label>
              <select name="parent_id" class="form-control">
                <option value="" selected >...</option>
                @foreach ($parents as $parent)                    
                  <option value="{{ $parent->id }}" {{$parent->id == $menuItem->parent_id ? 'selected' : ''}}>{{ $parent->title  }}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">{{ __('Rank') }}</label>
              <input name="rank" type="text" class="form-control" value="{{ $menuItem->rank }}">
              @error('rank')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror          
            </div>
            <div class="form-group col-md-6">
             
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
