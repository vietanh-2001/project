@extends('admin.master.masteradmin')

@section('css')
  @parent
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<div class="card-body table-responsive p-0">
                <table id="table-doctor" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên</th>
                      <th>Ngày sinh</th>
                      <th>Email</th>
                      <th>Đánh giá</th>
                      <th>Địa chỉ</th>
                      <th>Số điện thoại</th>
                      <th >Active</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse ($doctor as $item)
                    <tr>
                        <td><a href="{{ url('thongke/listappointmentdoctor/'.$item->id_doctor) }}" style="color: red">{{$item->id_doctor}}</a></td>
                        <td>
                            {{$item->name_doctor}}                     
                        </td>
                        <td>
                            {{$item->doctor_date}}
                        </td>
                        <td>
                            {{$item->doctor_email}}
                        </td>
                        <td>
                            {{$item->star}}
                        </td>
                        <td>
                            {{$item->address}}
                        </td>
                        <td>
                            {{$item->phone}}
                        </td>
                        <td>
                          <a style="float: left;" href="{{url('/edit/'.$item->id_doctor)}}"><i class="fas fa-cog"></i></a>
                          
                          <a onclick="return confirm('Are you sure?')" style="float: right;" href="{{url('/delete/'.$item->id_doctor)}}"><i class="fas fa-trash"></i></a>
                        </td>
                        
                    </tr>
                @empty
            <tr>
                <td colspan="8" style="text-align: center;">Danh sách rỗng</td>
            </tr>
        @endforelse
                    
                  </tbody>
                </table>
              </div>
@endsection

@section('scripts')
  @parent
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script>
  $(function () {
    $("#table-doctor").DataTable({
      "pageLength": 4,
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table-doctor_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


@endsection