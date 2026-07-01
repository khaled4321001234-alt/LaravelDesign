@extends('dashboard.layouts.main')

@section('content')

<div class="content py-4">
  <div class="container-fluid">

    {{-- Header + Stats --}}
    <div class="row mb-4">
      <div class="col-12 d-flex justify-content-between align-items-center">
        <h3 class="mb-0"><i class="fas fa-heart text-danger me-2"></i> إدارة التبرعات</h3>
      </div>
    </div>

    {{-- Stats Cards --}}
    <div class="row mb-4">
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $stats['total'] }}</h3>
            <p>إجمالي التبرعات</p>
          </div>
          <div class="icon"><i class="fas fa-list"></i></div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $stats['pending'] }}</h3>
            <p>بانتظار التأكيد</p>
          </div>
          <div class="icon"><i class="fas fa-clock"></i></div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $stats['confirmed'] }}</h3>
            <p>مؤكدة</p>
          </div>
          <div class="icon"><i class="fas fa-check-circle"></i></div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{ number_format($stats['total_amount'], 2) }} <small style="font-size:1rem">د.أ</small></h3>
            <p>إجمالي المبالغ المؤكدة</p>
          </div>
          <div class="icon"><i class="fas fa-dollar-sign"></i></div>
        </div>
      </div>
    </div>

    {{-- Filter bar --}}
    <div class="card mb-3">
      <div class="card-body py-2">
        <form method="GET" action="{{ route('donations.index') }}" class="d-flex gap-2 flex-wrap align-items-center">
          <select name="status" class="form-control" style="width:auto;">
            <option value="">-- كل الحالات --</option>
            <option value="pending"   {{ request('status')=='pending'   ? 'selected' : '' }}>بانتظار التأكيد</option>
            <option value="confirmed" {{ request('status')=='confirmed' ? 'selected' : '' }}>مؤكدة</option>
            <option value="rejected"  {{ request('status')=='rejected'  ? 'selected' : '' }}>مرفوضة</option>
          </select>
          <select name="method" class="form-control" style="width:auto;">
            <option value="">-- كل الطرق --</option>
            <option value="bank" {{ request('method')=='bank' ? 'selected' : '' }}>حساب بنكي</option>
            <option value="cliq" {{ request('method')=='cliq' ? 'selected' : '' }}>كليك</option>
          </select>
          <input type="text" name="search" class="form-control" placeholder="بحث بالاسم أو الإيميل..."
                 value="{{ request('search') }}" style="width:220px;">
          <button class="btn btn-primary">بحث</button>
          @if(request()->hasAny(['status','method','search']))
            <a href="{{ route('donations.index') }}" class="btn btn-secondary">مسح</a>
          @endif
        </form>
      </div>
    </div>

    {{-- Flash messages --}}
    @if(session('success'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        {{ session('success') }}
      </div>
    @endif

    {{-- Donations Table --}}
    <div class="card">
      <div class="card-header border-0">
        <h3 class="card-title">قائمة التبرعات</h3>
        <div class="card-tools">
          <a href="{{ route('donations.export') }}" class="btn btn-sm btn-success">
            <i class="fas fa-file-excel"></i> تصدير Excel
          </a>
        </div>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-striped table-hover table-valign-middle">
          <thead class="bg-light">
            <tr>
              <th>#</th>
              <th>الاسم</th>
              <th>البريد / الهاتف</th>
              <th>المبلغ</th>
              <th>طريقة الدفع</th>
              <th>الإيصال</th>
              <th>الحالة</th>
              <th>التاريخ</th>
              <th>إجراءات</th>
            </tr>
          </thead>
          <tbody>
            @forelse($donations as $donation)
            <tr>
              <td>{{ $donation->id }}</td>
              <td>
                <strong>{{ $donation->full_name }}</strong>
                @if($donation->notes)
                  <br><small class="text-muted" title="{{ $donation->notes }}">
                    {{ Str::limit($donation->notes, 30) }}
                  </small>
                @endif
              </td>
              <td>
                {{ $donation->email }}
                @if($donation->phone)
                  <br><small class="text-muted">{{ $donation->phone }}</small>
                @endif
              </td>
              <td><strong class="text-success">{{ number_format($donation->amount, 2) }} د.أ</strong></td>
              <td>
                @if($donation->payment_method === 'bank')
                  <span class="badge badge-info"><i class="fas fa-university me-1"></i> بنكي</span>
                @else
                  <span class="badge badge-primary"><i class="fas fa-mobile-alt me-1"></i> كليك</span>
                @endif
              </td>
              <td>
                @if($donation->receipt_path)
                  @php $ext = pathinfo($donation->receipt_path, PATHINFO_EXTENSION); @endphp
                  @if(in_array(strtolower($ext), ['jpg','jpeg','png','webp']))
                    <a href="{{ asset('storage/' . $donation->receipt_path) }}" target="_blank">
                      <img src="{{ asset('storage/' . $donation->receipt_path) }}"
                           style="width:50px;height:40px;object-fit:cover;border-radius:4px;border:1px solid #ddd;">
                    </a>
                  @else
                    <a href="{{ asset('storage/' . $donation->receipt_path) }}" target="_blank"
                       class="btn btn-xs btn-outline-secondary">
                      <i class="fas fa-file-pdf"></i> عرض
                    </a>
                  @endif
                @endif
              </td>
              <td>
                @if($donation->status === 'pending')
                  <span class="badge badge-warning">بانتظار التأكيد</span>
                @elseif($donation->status === 'confirmed')
                  <span class="badge badge-success">مؤكدة ✓</span>
                @else
                  <span class="badge badge-danger">مرفوضة</span>
                @endif
              </td>
              <td>
                <small>{{ \Carbon\Carbon::parse($donation->created_at)->format('Y/m/d') }}</small>
                <br><small class="text-muted">{{ \Carbon\Carbon::parse($donation->created_at)->format('H:i') }}</small>
              </td>
              <td>
                <div class="d-flex gap-1">
                  @if($donation->status === 'pending')
                    <form method="POST" action="{{ route('donations.status', $donation->id) }}" style="display:inline;">
                      @csrf @method('PATCH')
                      <input type="hidden" name="status" value="confirmed">
                      <button class="btn btn-xs btn-success" title="تأكيد">
                        <i class="fas fa-check"></i>
                      </button>
                    </form>
                    <form method="POST" action="{{ route('donations.status', $donation->id) }}" style="display:inline;">
                      @csrf @method('PATCH')
                      <input type="hidden" name="status" value="rejected">
                      <button class="btn btn-xs btn-danger" title="رفض"
                              onclick="return confirm('هل تريد رفض هذا التبرع؟')">
                        <i class="fas fa-times"></i>
                      </button>
                    </form>
                  @elseif($donation->status === 'confirmed')
                    <form method="POST" action="{{ route('donations.status', $donation->id) }}" style="display:inline;">
                      @csrf @method('PATCH')
                      <input type="hidden" name="status" value="pending">
                      <button class="btn btn-xs btn-warning" title="إعادة للانتظار">
                        <i class="fas fa-undo"></i>
                      </button>
                    </form>
                  @endif
                  <form method="POST" action="{{ route('donations.destroy', $donation->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-xs btn-outline-danger" title="حذف"
                            onclick="return confirm('هل تريد حذف هذا التبرع نهائياً؟')">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="9" class="text-center py-4 text-muted">
                <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                لا توجد تبرعات
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      @if($donations->hasPages())
      <div class="card-footer">
        {{ $donations->appends(request()->query())->links('pagination::bootstrap-4') }}
      </div>
      @endif
    </div>

  </div>
</div>

@endsection
