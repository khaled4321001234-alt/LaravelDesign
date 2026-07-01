
@extends('dashboard.layouts.main')
@section('content')
    @foreach ($parags as $parag)
        <div class="p-4">
            <div class="card card-primary card-outline">
                <div class="card-header">
                <h5 class="m-0">{{$parag->title_ar}}</h5>
                </div>
                <div class="card-body">
            
                <p class="card-text">{{ $parag->description_ar }}</p>
                <a href="{{ route('pragraphs.edit',[$parag->id]) }}" class="btn btn-primary">{{__('Edit')}}</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection

