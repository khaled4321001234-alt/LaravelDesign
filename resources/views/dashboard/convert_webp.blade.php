{{-- resources/views/dashboard/convert_webp.blade.php --}}
@extends('dashboard.layouts.main')

@section('content')
<div class="content-wrapper p-4">

    {{-- Header --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">
            🖼️ تحويل الصور إلى WebP
            @if($DRY_RUN)
                <span class="badge badge-warning ml-2">DRY RUN — معاينة فقط</span>
            @else
                <span class="badge badge-success ml-2">تم التنفيذ</span>
            @endif
        </h1>
        <div>
            @if($DRY_RUN)
                <a href="{{ route('dashboard.convert.webp') }}"
                   class="btn btn-success"
                   onclick="return confirm('سيتم تحويل الصور وتحديث قاعدة البيانات. هل أنت متأكد؟')">
                    🚀 تنفيذ فعلي
                </a>
            @else
                <a href="{{ route('dashboard.convert.webp') }}?dry=1" class="btn btn-secondary">
                    👁 معاينة DRY RUN
                </a>
            @endif
        </div>
    </div>

    {{-- Stats --}}
    <div class="row mb-4">
        <div class="col-md-2 col-sm-4 col-6 mb-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $stats['converted'] }}</h3>
                    <p>تم التحويل</p>
                </div>
                <div class="icon"><i class="fas fa-check"></i></div>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6 mb-3">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $stats['skipped'] }}</h3>
                    <p>تخطي</p>
                </div>
                <div class="icon"><i class="fas fa-forward"></i></div>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6 mb-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $stats['missing'] }}</h3>
                    <p>غير موجود</p>
                </div>
                <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6 mb-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $stats['failed'] }}</h3>
                    <p>فشل</p>
                </div>
                <div class="icon"><i class="fas fa-times"></i></div>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6 mb-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $stats['db_updated'] }}</h3>
                    <p>DB محدّث</p>
                </div>
                <div class="icon"><i class="fas fa-database"></i></div>
            </div>
        </div>
    </div>

    {{-- Log --}}
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">📄 السجل التفصيلي</h5>
            <span class="badge badge-primary">{{ count($log) }} سجل</span>
        </div>
        <div class="card-body p-0">
            <div style="max-height:450px; overflow-y:auto; padding:16px; font-family:monospace; font-size:13px;">
                @forelse($log as $entry)
                    @php
                        $color = match($entry['type']) {
                            'ok'    => '#28a745',
                            'error' => '#dc3545',
                            'warn'  => '#ffc107',
                            'dry'   => '#6f42c1',
                            'table' => '#007bff',
                            default => '#6c757d',
                        };
                        $icon = match($entry['type']) {
                            'ok'    => '✅',
                            'error' => '❌',
                            'warn'  => '⚠️',
                            'dry'   => '🔵',
                            'table' => '📋',
                            default => '•',
                        };
                    @endphp
                    <div style="color:{{ $color }}; padding:4px 0; border-bottom:1px solid #f0f0f0;">
                        {{ $icon }} {{ $entry['msg'] }}
                    </div>
                @empty
                    <p class="text-muted text-center p-4">لا توجد بيانات</p>
                @endforelse
            </div>
        </div>
    </div>

</div>
@endsection