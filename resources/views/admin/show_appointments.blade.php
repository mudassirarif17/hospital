

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
            
            <h1 class="text-center display-3">All Appointments</h1>

            <div class="">
               <table class="table table-bordered table-striped my-5">
                <tr>
                    <th>Patient name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Approved</th>
                    <th>Canceled</th>
                </tr>
                @foreach($data as $p)
                <tr>
                    <td>{{$p->name}}</td>
                    <td>{{$p->email}}</td>
                    <td>{{$p->phone}}</td>
                    <td>{{$p->doctor}}</td>
                    <td>{{$p->date}}</td>
                    <td>{{$p->message}}</td>
                    <td>{{$p->status}}</td>
                    <td><a href="{{url('approved_appointment' , $p->id)}}" class="btn btn-success">Approved</a></td>
                    <td><a href="{{url('canceled_appointment' , $p->id)}}" class="btn btn-danger">Canceled</a></td>
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