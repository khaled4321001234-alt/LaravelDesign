{{-- {{dd(request()->fullUrl())}} --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed" >
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">{{__('Dashboard')}}</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="nav-link">{{__('Visit Site')}}</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('services.show') }}" 
          class="nav-link {{ Str::endsWith(request()->fullUrl(), 'service') ? 'active' : '' }}"
        >
          {{__('Services')}}
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('products.show') }}" 
          class="nav-link  {{ Str::endsWith(request()->fullUrl(), 'products') ? 'active' : '' }}">
          {{__('Products')}}
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard.articles') }}" class="nav-link {{ Str::endsWith(request()->fullUrl(), 'articles') ? 'active' : '' }}">
          {{__('Articles')}}
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" style="background-color:#0d97c6;margin:5px">
        <a href="?lang=ar" class="nav-link">Ar</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" style="background-color:#0d97c6;margin:5px">
        <a href="?lang=en" class="nav-link">En</a>
      </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('assets/img/logos/mtsc2.png') }}" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets\img\team\avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{__('Dashboard')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('menuItem.show') }}" 
                  class="nav-link  {{ Str::endsWith(request()->fullUrl(), 'menuItem') ? 'active' : '' }}"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Navbar') }}</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('slider.show') }}" 
                  class="nav-link  {{ Str::endsWith(request()->fullUrl(), 'slider') ? 'active' : '' }}" 
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>السلايدر</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('products.show') }}" 
                  class="nav-link {{ Str::endsWith(request()->fullUrl(), 'products') ? 'active' : '' }}"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Products') }}</p>
                </a>
              </li>
            </ul>
              
            
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('client.show') }}" 
                  class="nav-link {{ Str::endsWith(request()->fullUrl(), 'client') ? 'active' : '' }}"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Clients') }}</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('partner.show') }}" 
                  class="nav-link {{ Str::endsWith(request()->fullUrl(), 'partner') ? 'active' : '' }}"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Partners') }}</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pragraphs.show') }}" 
                  class="nav-link {{ Str::endsWith(request()->fullUrl(), 'pragraphs') ? 'active' : '' }}"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Main Paragraphs') }}</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('setting.show') }}" 
                  class="nav-link {{ Str::endsWith(request()->fullUrl(), 'setting') ? 'active' : '' }}"
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Website Setting') }}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{__('Pages')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('address.show') }}" 
                  class="nav-link {{ Str::endsWith(request()->fullUrl(), 'address') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('address info')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('privacy.show') }}" 
                  class="nav-link {{ Str::endsWith(request()->fullUrl(), 'privacy') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('Privacy')}}</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('refund.show') }}" 
                  class="nav-link {{ Str::endsWith(request()->fullUrl(), 'refund') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('refund')}}</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('contacts.show') }}" 
              class="nav-link {{ Str::endsWith(request()->fullUrl(), 'contacts') ? 'active' : '' }}"
            >
              <i class="nav-icon far fa-image"></i>
              <p>
                {{__('contacts')}}
              </p>
            </a>
          </li>
               <li class="nav-item">
            <a href="{{ route('donations.index') }}" 
              class="nav-link {{ Str::contains(request()->fullUrl(), 'donations') ? 'active' : '' }}"
            >
              <i class="nav-icon fas fa-heart"></i>
              <p>
                التبرعات
                @php $pendingCount = \Illuminate\Support\Facades\DB::table('donations')->where('status','pending')->count(); @endphp
                @if($pendingCount > 0)
                  <span class="badge badge-warning right">{{ $pendingCount }}</span>
                @endif
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" 
              class="nav-link {{ Str::endsWith(request()->fullUrl(), 'logout') ? 'active' : '' }}"
            >
              <i class="nav-icon far fa-image"></i>
              <p>
                {{__('logout')}}
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. endsWith page content -->
  <div class="content-wrapper">

    @yield('content')

  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="{{url('/')}}">MTSC</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->


<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 -->
 <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
 <style>
   .ql-toolbar.ql-snow {
     background: #f4f6f9;
     border: 1px solid #ced4da !important;
     border-bottom: 2px solid #dee2e6 !important;
     border-radius: 6px 6px 0 0;
     padding: 8px 12px !important;
   }
   .ql-container.ql-snow {
     border: 1px solid #ced4da !important;
     border-top: none !important;
     border-radius: 0 0 6px 6px;
     background: #ffffff !important;
     font-size: 15px;
   }
   .ql-editor {
     min-height: 180px;
     max-height: 350px;
     overflow-y: auto !important;
     background: #ffffff !important;
     color: #212529 !important;
     font-size: 15px !important;
     line-height: 1.8 !important;
     padding: 14px 16px !important;
   }
   .ql-container {
     height: auto !important;
     overflow: visible !important;
   }
   .ql-editor.ql-blank::before {
     color: #adb5bd;
     font-style: normal;
   }
   .ql-toolbar .ql-stroke { stroke: #495057; }
   .ql-toolbar .ql-fill { fill: #495057; }
   .ql-toolbar button:hover .ql-stroke,
   .ql-toolbar button.ql-active .ql-stroke { stroke: #007bff; }
   .ql-toolbar button:hover .ql-fill,
   .ql-toolbar button.ql-active .ql-fill { fill: #007bff; }
   .ql-toolbar .ql-picker-label { color: #495057 !important; }
   .ql-toolbar .ql-picker-label:hover { color: #007bff !important; }
   .quilljs-textarea { display: none !important; }
   /* wrapper around each editor */
   .form-group .ql-toolbar.ql-snow + .ql-container.ql-snow {
     margin-top: 0;
   }
 </style>

 <script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
 <script src="{{ asset('dist/js/quill-textarea.js')}}"></script>
  <script>
    (function() {
      quilljs_textarea('.quilljs-textarea', {
        modules: { toolbar: [
          ['bold', 'italic', 'underline'],        // toggled buttons
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
          [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
          [{ 'align': [] }],
        ]},
        theme: 'snow',
      });
    })();
    </script>

<script>


 /* var editor_config = {
    path_absolute : "/",
    selector: 'textarea.my-editor',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config); */
</script>
<script>
  let deleteform = document.querySelectorAll('.delete-item');
  deleteform.forEach(item => {
    item.addEventListener('click',(e)=>{
      if(!confirm('Are you sure you want to delete this record ??')){
        e.preventDefault();
      };
    });
  });
</script>
</body>
</html>