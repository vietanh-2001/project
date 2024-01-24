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
          @if(session()->has('error'))
                <div class="alert alert-danger" style="width: 600px;">
                    {{ session()->get('error') }}
                </div>
            @endif
                <table id="table-doctor" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên</th>
                      <th >Active</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse ($chuyenmon1 as $item)
                    <tr>
                        <td>{{$item->id_chuyenmon}}</td>
                        <td>
                            {{$item->name}}                     
                        </td>
                        <td>
                          <a href="{{url('/editChuyenmon/'.$item->id_chuyenmon)}}"><i class="fas fa-cog"></i></a>
                            
                            
                          </td>
                        
                    </tr>
                @empty
            <tr>
                <td colspan="3" style="text-align: center;">Danh sách rỗng</td>
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