@extends('admin.master.masterDoctor')

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
                      <th>ID Khách hàng</th>
                      <th>ID Bác sĩ</th>
                      <th>Ngày đặt</th>
                      <th>Thời gian bắt đầu</th>
                      <th>Thời gian kết thúc</th>
                      <th>Ghi chú</th>
                      <th >Trạng thái</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse ($doctor as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>
                            {{$item->name}}                     
                        </td>
                        <td>
                            {{$item->name_doctor}}
                        </td>
                        <td>
                            {{$item->date}}
                        </td>
                        <td>
                            {{$item->time_start}}
                        </td>
                        <td>
                            {{$item->time_end}}
                        </td>
                        <td>
                            {{$item->purpose}}
                        </td>
                        <td>
                            {{$item->status}}
                        </td>
                        <td>
                          
                          @if($item->status=='completed')
                          <p>Đã hoàn thành</p>
                          @elseif($item->status=='canceled')
                          <p>Đã hủy bỏ</p>
                          @elseif($item->status=='pending')
                          <p>Đang chờ phê duyệt</p>
                          @else
                          <a style="float: right;" href="{{url('/complete/'.$item->id)}}">completed</a>
                          @endif

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
      "pageLength": 5,
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