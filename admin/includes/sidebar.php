            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.png" alt="#" /></div>
                        <div class="user_info">
                           <h6><?php echo strtoupper($_SESSION['user']); ?></h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                     <!-- data-toggle="collapse" aria-expanded="false"  -->
                        <a href="dashboard.php" class=""><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                     </li>
                     <li><a href="inscription.php"><i class="fa fa-map purple_color2"></i> <span>Inscription</span></a></li>
                     <li><a href="pointage.php"><i class="fa fa-bar-chart-o green_color"></i> <span>Pointage</span></a></li>
                     <li><a href="parametres.php"><i class="fa fa-cog yellow_color"></i> <span>Paramètres</span></a></li>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->