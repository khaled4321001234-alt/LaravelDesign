@extends('dashboard.layouts.main')
@section('content')

<h1>{{ __('Create New Product Page') }}</h1>

@include('general.flash-message')

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6">
              <label>{{ __('Title') }}</label>
              <input name="title_en" type="text" class="form-control" value="{{old('title_en')}}">
              @error('title_en')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label>{{ __('Title Arabic') }}</label>
              <input name="title_ar" type="text" class="form-control" required value="{{old('title_ar')}}">
              @error('title_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
              <label>{{ __('Description English') }}</label>
              <textarea rows="9" name="description_en" class="form-control quilljs-textarea" required>{{old('description_en')}}</textarea>
              @error('description_en')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-12">
              <label>{{ __('Description Arabic') }}</label>
              <textarea rows="9" name="description_ar" class="form-control quilljs-textarea" required>{{old('description_ar')}}</textarea>
              @error('description_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
              <label>{{ __('Type') }}</label>
              @php
                  $types = \DB::table('categories')->select('name')->distinct()->get();
              @endphp
              <select name="type" class="form-control">
                <option value="">...</option>
                @foreach ($types as $type)
                  <option value="{{ $type->name }}">{{ $type->name }}</option>
                @endforeach
              </select>
              @error('type')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label>Link</label>
              <input type="text" name="link" class="form-control" value="{{old('link')}}">
            </div>
        </div>

        {{-- ── الصورة الرئيسية ── --}}
        <div class="form-group">
            <label>{{ __('Main Image') }}</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="mainImageInput"
                           accept="image/*" onchange="previewMainImage(event)">
                    <label class="custom-file-label" for="mainImageInput">{{ __('Choose file') }}</label>
                </div>
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div id="mainImagePreview" class="mt-2"></div>
        </div>

        {{-- ── الصور الإضافية ── --}}
        <div class="form-group">
            <label>{{ __('Extra Images') }}</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="extra_images[]" id="extraImagesInput"
                           class="custom-file-input" accept="image/*" multiple
                           onchange="previewExtraImages(event)">
                    <label class="custom-file-label" for="extraImagesInput">{{ __('Choose multiple images') }}</label>
                </div>
            </div>
            @error('extra_images.*')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- معاينة الصور المختارة --}}
            <div id="extraImagesPreview" class="d-flex flex-wrap mt-2" style="gap:10px;"></div>
        </div>

    </div>{{-- end card-body --}}

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{ __('Add new product') }}</button>
    </div>
</form>

<script>
function previewMainImage(event) {
    const container = document.getElementById('mainImagePreview');
    container.innerHTML = '';
    const file = event.target.files[0];
    if (!file) return;
    const img = document.createElement('img');
    img.src = URL.createObjectURL(file);
    img.style = 'height:120px;border-radius:6px;border:2px solid #dee2e6;';
    container.appendChild(img);
}

function previewExtraImages(event) {
    const container = document.getElementById('extraImagesPreview');
    container.innerHTML = '';
    Array.from(event.target.files).forEach(file => {
        const wrapper = document.createElement('div');
        wrapper.style = 'position:relative;display:inline-block;';
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.style = 'height:100px;border-radius:6px;border:2px solid #dee2e6;';
        wrapper.appendChild(img);
        container.appendChild(wrapper);
    });
}
</script>
@endsection
