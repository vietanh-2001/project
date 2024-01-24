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
                      <th>Khách hàng</th>
                      <th>Phản hồi</th>
                      <th>Phone</th>
                      <th>Phản hồi admin</th>
                      <th>Vấn đề phản hồi</th>
                      <th>Thời gian</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  @forelse ($doctor as $item)
                    <tr>
                        <td>
                            {{$item->id_phanhoi}}
                        </td>
                        <td>
                            {{$item->name}}                     
                        </td>
                        <td>
                            {{$item->phone}}                     
                        </td>
                        <td>
                            {{$item->lydoviettay}}
                        </td>
                        <td>
                            {{$item->phanhoiadmin}}
                        </td>
                        <td>
                            {{$item->toto}} 
                        </td>
                        <td>
                            {{$item->created_at}}
                        </td>
                        <td>
                            <a href="{{url('/edit1/'.$item->id_phanhoi)}}">Phản hồi</i></a>
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