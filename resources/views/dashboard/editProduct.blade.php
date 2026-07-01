@extends('dashboard.layouts.main')
@section('content')

<h1>{{ __('Edit Product Page') }}</h1>
<form method="POST" action="{{ route('product.update', [$product->id]) }}" enctype="multipart/form-data">
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

    {{-- حقل مخفي لتجميع IDs الصور المحذوفة --}}
    <input type="hidden" name="delete_image_ids" id="deleteImageIds" value="">

    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6">
              <label>{{ __('Title') }}</label>
              <input name="title_en" type="text" class="form-control" value="{{ $product->title_en }}">
            </div>
            <div class="form-group col-md-6">
              <label>{{ __('Title Arabic') }}</label>
              <input name="title_ar" type="text" class="form-control" required value="{{ $product->title_ar }}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
              <label>{{ __('Description English') }}</label>
              <textarea name="description_en" class="form-control quilljs-textarea">{{ $product->description_en }}</textarea>
            </div>
            <div class="form-group col-md-12">
              <label>{{ __('Description Arabic') }}</label>
              <textarea name="description_ar" class="form-control quilljs-textarea">{{ $product->description_ar }}</textarea>
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
                  <option value="{{ $type->name }}" {{ $type->name == $product->type ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
              </select>
              @error('type')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label>Link</label>
              <input type="text" name="link" class="form-control" value="{{ $product->link }}">
            </div>
        </div>

        {{-- ── الصورة الرئيسية ── --}}
        <div class="form-group">
            <label>{{ __('Main Image') }}</label>
            @if ($product->image)
                <div class="mb-2">
                    <img src="{{ asset('images/thumb_400/' . $product->image) }}"
                         style="height:120px;border-radius:6px;border:2px solid #dee2e6;" alt="">
                    <small class="d-block text-muted mt-1">{{ __('Current main image — upload a new one to replace it') }}</small>
                </div>
            @endif
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="mainImageInput"
                           accept="image/*" onchange="previewMainImage(event)">
                    <label class="custom-file-label" for="mainImageInput">{{ __('Choose file') }}</label>
                </div>
            </div>
            <div id="mainImagePreview" class="mt-2"></div>
        </div>

        {{-- ── الصور الإضافية الموجودة ── --}}
        @if ($product->images->count())
        <div class="form-group">
            <label>{{ __('Extra Images') }}</label>
            <div class="d-flex flex-wrap" id="existingImagesContainer" style="gap:12px;">
                @foreach ($product->images as $img)
                <div class="existing-image-wrapper" id="img-wrapper-{{ $img->id }}"
                     style="position:relative;display:inline-block;">
                    <img src="{{ asset('images/thumb_400/' . $img->image) }}"
                         style="height:100px;border-radius:6px;border:2px solid #dee2e6;" alt="">
                    <button type="button"
                            onclick="markForDeletion({{ $img->id }})"
                            id="del-btn-{{ $img->id }}"
                            style="position:absolute;top:-8px;right:-8px;width:24px;height:24px;
                                   border-radius:50%;background:#dc3545;color:#fff;border:none;
                                   font-size:14px;line-height:1;cursor:pointer;"
                            title="{{ __('Remove') }}">×</button>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- ── رفع صور إضافية جديدة ── --}}
        <div class="form-group">
            <label>{{ __('Add More Images') }}</label>
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
            <div id="extraImagesPreview" class="d-flex flex-wrap mt-2" style="gap:10px;"></div>
        </div>

    </div>{{-- end card-body --}}

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
      <a class="btn btn-warning" href="{{ route('single.product', $product->slug_en) }}" target="_blank">{{ __('Show') }}</a>
    </div>
</form>

<script>
// تتبع IDs الصور المراد حذفها
let deleteIds = [];

function markForDeletion(id) {
    deleteIds.push(id);
    document.getElementById('deleteImageIds').value = deleteIds.join(',');

    // إخفاء الصورة بشكل بصري مع تأثير
    const wrapper = document.getElementById('img-wrapper-' + id);
    wrapper.style.opacity = '0.3';
    wrapper.style.filter = 'grayscale(100%)';

    const btn = document.getElementById('del-btn-' + id);
    btn.textContent = '↩';
    btn.style.background = '#6c757d';
    btn.onclick = function() { unmarkForDeletion(id); };
}

function unmarkForDeletion(id) {
    deleteIds = deleteIds.filter(i => i !== id);
    document.getElementById('deleteImageIds').value = deleteIds.join(',');

    const wrapper = document.getElementById('img-wrapper-' + id);
    wrapper.style.opacity = '1';
    wrapper.style.filter = 'none';

    const btn = document.getElementById('del-btn-' + id);
    btn.textContent = '×';
    btn.style.background = '#dc3545';
    btn.onclick = function() { markForDeletion(id); };
}

function previewMainImage(event) {
    const container = document.getElementById('mainImagePreview');
    container.innerHTML = '';
    const file = event.target.files[0];
    if (!file) return;
    const img = document.createElement('img');
    img.src = URL.createObjectURL(file);
    img.style = 'height:120px;border-radius:6px;border:2px solid #28a745;';
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
        img.style = 'height:100px;border-radius:6px;border:2px solid #28a745;';
        wrapper.appendChild(img);
        container.appendChild(wrapper);
    });
}
</script>
@endsection
