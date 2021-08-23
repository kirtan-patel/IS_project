<aside>
  <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
              
 
                  <h3 class="centered" style=" color:#0a0b0e; ">Welcome <br> <?php echo $_SESSION['username'] ?></h3>
                  <li class="mt">
                      <a href="dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>My profile</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="viewhostel.php" >
                          <i class="fa fa-eye"></i>
                          <span>View Approved Hostel</span>
                      </a>
                      
                  </li>
                 
                  
                 

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Account Setting</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="change-password.php">Change Password</a></li>
                           
                      </ul>
                  </li>
              </ul>
                <form action="dashboard.php" method="post" >
                    <li><input type="submit" value="Logout" name="logout" class="logout" >
                    </form>
                        
              <!-- sidebar menu end-->
          </div>
      </aside>