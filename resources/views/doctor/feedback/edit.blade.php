@extends('admin.master.masterDoctor')

@section('css')
  @parent
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-12">
                <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Phản hồi doctor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST"  enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input value="{{$phanhoi->id_phanhoi}}" readonly type="number" class="form-control" name="id_phanhoi" id="id_phanhoi" placeholder="Nhập ID">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Khách hàng</label>
                    <input value="{{$phanhoi->name}}" readonly type="text" class="form-control" name="name" id="name" placeholder="Nhập tên">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Phản hồi</label>
                    <input value="{{$phanhoi->phone}}" readonly type="text" class="form-control" name="phone" id="phone" placeholder="Nhập email">
                  </div>                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>                  
                    <input value="{{$phanhoi->lydoviettay}}" readonly type="int" class="form-control" name="lydoviettay" id="lydoviettay" placeholder="Nhập ngày sinh">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Phản hồi admin</label>
                    <input value="{{$phanhoi->phanhoiadmin}}" type="text" class="form-control" name="phanhoiadmin" id="phanhoiadmin" placeholder="Nhập phản hồi của admin">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Vấn đề phản hồi</label>
                    <input value="{{$phanhoi->toto}}" readonly type="" class="form-control" name="to" id="to" placeholder="Nhập email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Thời gian</label>
                    <input value="{{$phanhoi->created_at}}" readonly type="timestamp" class="form-control" name="created_at" id="created_at" placeholder="Nhập email">
                  </div>

                  
                  

                  




                 

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>

          <!-- <div class="col-lg-3 col-12"> 
                Ảnh
          </div> -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

@endsection