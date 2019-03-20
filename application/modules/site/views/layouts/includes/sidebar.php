<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">
            <div align="center" class = "text-muted", style="font-family: 'PT Serif', serif; font-weight:bold;">
              <span data-feather="bar-chart-2"></span>
              DASHBOARD <span class="sr-only">(current)</span>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <div align="center"><?php echo anchor("user_management/user_types","<i class='fas fa-users'> USER TYPES</i>", array("class"=> "text-dark", "style"=>"color:black;font-family: 'PT Serif', serif; font-weight:bold;"));?> <span class="sr-only">(current)</span>
        </div>
            </a>
          </li>
          
        

          <div align="center" style="font-family: 'PT Serif', serif; font-weight:bold;">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">

          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        </div>

        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
                            
        </ul>
      </div>
    </nav>