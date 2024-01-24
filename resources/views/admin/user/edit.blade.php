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
                <h3 class="card-title">cap nhat doctor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST"  enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input value="{{$doctor->id_doctor}}" readonly type="number" class="form-control" name="id_doctor" id="id_doctor" placeholder="Nhập ID">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên</label>
                    <input value="{{$doctor->name_doctor}}" type="text" class="form-control" name="name_doctor" id="name_doctor" placeholder="Nhập tên">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input value="{{$doctor->doctor_email}}" type="email" class="form-control" name="doctor_email" id="doctor_email" placeholder="Nhập email">
                  </div>

                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ngày sinh</label>
                    
                    <input value="{{$doctor->doctor_date}}" type="datetime" class="form-control" name="doctor_date" id="doctor_date" placeholder="Nhập ngày sinh">
                  </div>

                  <div class="input-group mb-3">
                    <label class="input-group-text" id="basic-addon3">Ảnh</label>
                    <img style="width: 200px;cursor:zoom-in;" src="../{{$doctor->image}}" >
                    <input name="images"  type="hidden" accept="image/*" class="form-control" placeholder="Ho ten" aria-describedby="basic-addon3" value="{{$doctor->image}}">
                    <input name="image" type="file" accept="image/*" class="form-control" placeholder="Ho ten" aria-describedby="basic-addon3">
                    {{-- <!-- <input type="text" name="hidden_image" value="{{$doctor->image}}"> --> --}}
                  
                  </div>

                  <div class="form-group">
                    <label class="input-group-text" id="basic-addon3">Giới tính</label>
                    <label class="form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" value="1" @if(old('gender',$doctor->gender)=="1") checked @endif> Nam
                    </label>
                    <label class="form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" value="2" @if(old('gender',$doctor->gender)=="2") checked @endif> Nữ
                    </label>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ</label>
                    <input value="{{$doctor->address}}" type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input value="{{$doctor->phone}}" type="int" class="form-control" name="phone" id="phone" placeholder="Nhập Số điện thoại">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Đánh giá    </label>
                    <select value="{{$doctor->star}}"  name="star" id="star">
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
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Bằng cấp</label>
                    <input value="{{$doctor->doctor_degree}}" type="text" class="form-control" name="doctor_degree" id="doctor_degree" placeholder="Nhập bằng cấp">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Doctor_export</label>
                    <input value="{{$doctor->doctor_export}}" type="text" class="form-control" name="doctor_export" id="doctor_export" placeholder="Nhập">
                  </div>

                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Chuyên môn</label>
                    <select name="id_chuyenmon" id="id_chuyenmon">
                        @forelse ($chuyenmon2 as $chuyenmon2)
                            <option selected="{{$doctor->id_chuyenmon}}" value="{{$chuyenmon2->id_chuyenmon}}">{{$chuyenmon2->name}}</option>
                        @empty
                            Danh sách rỗng
                        @endforelse

                    </select>
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