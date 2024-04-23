    <div id="main-wrapper">
        
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
              
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <b><img src="../uploadImage/Logo/images.jpg" alt="homepage" class="dark-logo" style="width:100%;height:auto;"/></b>
                    </a>
                </div>
                
                <div class="navbar-collapse">
                    
                    <ul class="navbar-nav mr-auto mt-md-0">
                        
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        
                    </ul>
                    
                    <ul class="navbar-nav my-lg-0">

                      
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php 
                                $sql = "select * from tbl_staff where id = '".$_SESSION["id"]."'";
                                $query=$conn->query($sql);
                                while($row=mysqli_fetch_array($query))
                                    {
                                     
                                      extract($row);
                                       $image = $row['image'];
                                      $fname = $row['fname'].' '.$row['lname'];
                                    }
                                                                    ?>
                                <img src="../uploadImage/conductor/<?=$image?>" alt="user" class="profile-pic" /></a>
                            
                               <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="profile.php"><i class="ti-user"></i> Profile</a></li>
                                   
                                     <li><a href="changepassword.php"><i class="ti-key"></i> Changed Password</a></li>
                                  
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
       
