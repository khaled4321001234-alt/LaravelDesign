{{--
    flash-message.blade.php
    Global flash notification partial.

    FIX: Updated data-dismiss to data-bs-dismiss for Bootstrap 5 compatibility.
    Previously used Bootstrap 4 syntax (data-dismiss="alert") which stopped
    working after upgrading to Bootstrap 5.

    Include this partial at the top of any page that needs flash messages:
        @include('general.flash-message')
--}}

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ __('Please check the form below for errors') }}
    </div>
@endif
