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
          <div class="col-lg-12 col-12">
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
                    <label for="exampleInputEmail1">Tên</label>
                    <input type="text" value="{{old('name_doctor')}}" class="form-control @error('name_doctor') is-invalid @enderror" name="name_doctor" id="name_doctor" placeholder="Nhập tên">
                    @error('name_doctor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" value="{{old('doctor_email')}}" class="form-control @error('doctor_email') is-invalid @enderror" name="doctor_email" id="doctor_email" placeholder="Nhập email">
                    @error('doctor_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ngày sinh</label>
                    <input type="date" value="{{old('doctor_date')}}" class="form-control @error('doctor_date') is-invalid @enderror" name="doctor_date" id="doctor_date" placeholder="Nhập ngày sinh">
                    @error('doctor_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Ảnh</span>
                    <input name="image" type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" placeholder="Ho ten" aria-describedby="basic-addon3">
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Giới tính</label><br>
                    <label class="form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" value="1" @if(old('gender')=="1") checked @endif> Nam
                    </label>
                    <label class="form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" value="2" @if(old('gender')=="2") checked @endif> Nữ
                    </label>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ</label>
                    <input type="text" value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Nhập địa chỉ">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="int" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Nhập Số điện thoại">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Đánh giá</label>
                    <select  name="star" id="star">
                      <option value="3">
                          3
                      </option>
                      <option value="4">
                          4
                      </option>
                      <option value="5">
                          5
                      </option>
                    </select>
                    @error('star')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Bằng cấp</label>
                    <input type="text" value="{{old('doctor_degree')}}" class="form-control @error('doctor_degree') is-invalid @enderror" name="doctor_degree" id="doctor_degree" placeholder="Nhập bằng cấp">
                    @error('doctor_degree')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Doctor_export</label>
                    <input type="text" value="{{old('doctor_export')}}" class="form-control @error('doctor_export') is-invalid @enderror" name="doctor_export" id="doctor_export" placeholder="Nhập">
                    @error('doctor_export')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Chuyên môn</label>
                    <select name="id_chuyenmon" id="id_chuyenmon">
                        @forelse ($chuyenmon as $chuyenmon)
                            <option value="{{$chuyenmon->id_chuyenmon}}">{{$chuyenmon->name}}</option>
                        @empty
                            Danh sách rỗng
                        @endforelse

                    </select>
                    @error('id_chuyenmon')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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