

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container page-body-wrapper">
        
        <!-- partial -->
        <div class="main-panel ">
          <div class="content-wrapper">
            
            <h1 class="text-center display-3">All Doctors</h1>

            <div class="">
               <table class="table table-bordered table-striped my-5">
                <tr>
                    <th>DR name</th>
                    <th>Phone</th>
                    <th>Speciality</th>
                    <th>Room</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->name}}</td>
                    <td>{{$d->phone}}</td>
                    <td>{{$d->speciality}}</td>
                    <td>{{$d->room}}</td>
                    <td><a onclick="return confirm('Are you sure to delete this')" href="{{url('delete_doctor' , $d->id )}}" class="btn btn-danger">Delete</a></td>
                    <td><a href="{{url('update_doctor' , $d->id )}}" class="btn btn-success">Update</a></td>
                </tr>
                @endforeach
               </table>
            </div>
</div>
</div>

<!-- partial:partials/_navbar.html -->
@include('admin.navbar')

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>