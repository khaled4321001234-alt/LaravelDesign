@extends('dashboard.layouts.main')

@section('content')

<br>
<br>


  <form  method="POST" id="myForm" enctype="multipart/form-data"  class="myForm" >
        @csrf

    <div class="row" style="direction: rtl;text-align: right ;">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
          <h3 >السلايدر الرئيسي للموقع .. </h3>
          <hr>
          <div class="row">
            <div class="col-lg-3">
                 <label for="mainTxt">العنوان الرئيسي</label>
            </div>
            <div class="col-lg-9">
              <div class="input-group">
                <input id="mainTxt" name="mainTxt" type="text" class="form-control" >
              </div>
              <br>
            </div>
            
            <div class="col-lg-3">
                 <label for="mainDesc"> وصف مختصر </label>
            </div>
            <div class="col-lg-9">
              <div class="input-group">
                <textarea  id="mainDesc" name="mainDesc" type="text" class="form-control" rows="3"></textarea>
              </div>
              <br>
            </div>

            <div class="col-lg-3">
                 <label for="mainImg">  إرفاق صورة  </label>
            </div>
            <div class="col-lg-9">
                <input type="file" class="form-control-file" id="mainImg" name="mainImg">
                <br>
            </div>

          </div>
          <center>
              <button type="submit" class="btn btn-primary mb-2">تعديل</button>
          </center>



        
                
      </div>
      <div class="col-lg-2"></div>
    </div>

  </form>

@endsection
