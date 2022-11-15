<!DOCTYPE html>
  <body >
    <div class="main-wrapper">
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <div class="preloader">
        <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Login box.scss -->
      <!-- ============================================================== -->
      <div
        class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
          img js-fullheight
          bg-dark">

      
        <div class="auth-box bg-dark border-top border-secondary">

             
          <div>
            <div class="text-center pt-3 pb-3">
              <span class="db"
                ><img src="../../assets/images/logo1.png" width="200" alt="logo"
              /></span>
            </div>
            <!-- Form -->
             <?php echo form_open_multipart('Registro/registrarbd');?>
           
              <div class="row pb-4">
                <div class="col-12">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text bg-success text-white h-100"
                        id="basic-addon1"
                        ><i class="mdi mdi-account fs-4"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      class="form-control form-control-lg"
                      placeholder="Login"
                      aria-label="Username"
                      aria-describedby="basic-addon1"
                      required
                    />
                  </div>
                  <!-- rol -->
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text bg-danger text-white h-100"
                        id="basic-addon1"
                        ><i class="mdi mdi-account-card-details fs-4"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      class="form-control form-control-lg"
                      placeholder="Cargo"
                      aria-label="Username"
                      aria-describedby="basic-addon1"
                      required
                    />
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text bg-warning text-white h-100"
                        id="basic-addon2"
                        ><i class="mdi mdi-lock fs-4"></i
                      ></span>
                    </div>
                    <input
                      type="password"
                      class="form-control form-control-lg"
                      placeholder="Password"
                      aria-label="Password"
                      aria-describedby="basic-addon1"
                      required
                    />
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text bg-info text-white h-100"
                        id="basic-addon2"
                        ><i class="mdi mdi-key fs-4"></i
                      ></span>
                    </div>
                    <input
                      type="password"
                      class="form-control form-control-lg"
                      placeholder=" Confirm Password"
                      aria-label="Password"
                      aria-describedby="basic-addon1"
                      required
                    />
                  </div>
                </div>
              </div>
              <div class="row border-top border-secondary">
                <div class="col-12">
                  <div class="form-group">
                    <div class="pt-3 d-grid">
                      <button
                        class="btn btn-block btn-lg btn-info "
                        type="submit"
                      >
                        Registrarse
                      </button>
                      
        
                    </div>
                  </div>
                </div>
              </div>

         
              <?php  echo form_close();?>
               <?php echo form_open_multipart('Usuarios/index');?>
             <input type="submit"  class="btn btn-success" name="Cancelar" value="Cancelar" onClick="location.href='Usuarios/index'"></input>
              <?php echo form_close();?>
          </div>
        </div>
      </div>

      <!-- ============================================================== -->
      <!-- Login box.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper scss in scafholding.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper scss in scafholding.scss -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right Sidebar -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Right Sidebar -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
      $(".preloader").fadeOut();
    </script>
  </body>
</html>
