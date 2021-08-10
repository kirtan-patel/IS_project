<aside>
  <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
              
  
 
    <h3 class="centered" style=" color:#0a0b0e; ">Welcome <br> <?php echo $_SESSION['username'] ?> </h3>
                  <li class="mt">
                      <a href="dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                   <li class="sub-menu">
                      <a href="registeredAgent.php" >
                          <i class="fa fa-eye"></i>
                          <span>View Registered Agent</span>
                      </a>
                    </li>
                  <li class="sub-menu">
                      <a href="viewUploads.php" >
                          <i class="fa fa-eye"></i>
                          <span>View Uploaded hostels</span>
                      </a>
                      
                  </li>
                 
                  <li class="sub-menu">
                      <a href="unApprove.php" >
                          <i class="fa fa-book"></i>
                          <span>UnApproved listings</span>
                      </a>
                    </li>
                  <li class="sub-menu">
                      <a href="usersFeedback.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Users Feedback</span>
                      </a>
                      
                  </li>
                 

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Account Setting</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="change-password.php">Change Password</a></li>
                           <li><a  href="createAdmin.php">Create Admin</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>