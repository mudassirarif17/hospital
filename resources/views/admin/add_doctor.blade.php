

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

            <h1 class="text-center display-3">Add Doctor</h1>
            <div class="">
                <form action="/upload_doctor" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="my-4">
                        <input class="form-control " type="text" name="name" style="color : black" placeholder="Write Doctor name">
                    </div>
                    <div class="my-4">
                        <input class="form-control " type="number" name="phone" style="color : black" placeholder="Write Phone">
                    </div>
                    <div class="my-4">
                       <select class="form-control " name="speciality" style="color : black" >
                            <option>--select--</option>
                            <option value="skin">skin</option>
                            <option value="heart">heart</option>
                            <option value="eye">eye</option>
                        </select>
                    </div>
                    <div  class="my-4">
                        <input class="form-control " type="number" name="room" style="color : black" placeholder="Write Room Number">
                    </div>
                    <div class="my-4">
                        <input type="file" name="file"  class="form-control">
                    </div>
                    <div class="d-flex justify-center ">
                        
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
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