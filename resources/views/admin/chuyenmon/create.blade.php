@extends('admin.master.masteradmin')

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
          <div class="col-lg-9 col-12">
                <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm mới doctor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  

                <div class="form-group">
                    <label for="exampleInputEmail1">Mã Chuyên Môn</label>
                    <input type="number" class="form-control" name="id_chuyenmon" id="id_chuyenmon" placeholder="Nhập ID">
                    <span style="color: red">@error('id_chuyenmon')
                        {{$message}}
                    @enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên Chuyên Môn</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nhập bằng cấp">
                    <span style="color: red">
                        @error('name')
                            {{$message}}
                        @enderror
                  </span>
                  </div>

                  
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