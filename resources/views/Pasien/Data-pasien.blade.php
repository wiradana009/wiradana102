
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @include('Template.head')
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
 @include('Template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('Template.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
     
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Halaman Pasien</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Pasien</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
     
        <div class="card card-info card-outline">
            
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{route('create-pasien')}}" class="btn btn-success">Tambah Data  <i class="fas fa-plus-square"></i></a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-boardered">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tempat Lahir</th>
                        <th>Tgl. Lahir</th>
                        <th>Gender</th>
                        <th>Telp</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($dtPasien as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $item -> nama }}</td>
                        <td>{{ $item -> alamat }}</td>
                        <td>{{ $item -> tempat_lahir }}</td>
                        <td>{{ date('d-m-Y', strtotime($item -> tgl_lahir)) }}</td>
                        <td>{{ $item -> gender }}</td>
                        <td>{{ $item -> phone_email }}</td>
                        <td>
                            <a href="{{url('edit-pasien', $item->id)}}"><i class="fas fa-edit"></i></a> 
                            | 
                            <a href="{{url('delete-pasien', $item->id)}}"><i class="fas fa-trash-alt" style="color: red"></i></a>
                        </td>
                    </tr>    
                    @endforeach

                </table>
            </div>    
        </div>
    </div>
    <!-- /.content -->

    <div class="card-footer">
      {{$dtPasien->links('pagination::bootstrap-4')}} 
    </div>
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
   @include('Template.footer')
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
@include('Template.script')
@include('sweetalert::alert')
</body>
</html>
