<?php ob_start();
session_start();  
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  include "pages-error-404-2.html";
}
else{
  include "config/koneksi.php";
  include "config/fungsi_indotgl.php";
  include "config/pagingproduk.php";
  include "config/fungsi_combobox.php";
  include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_rupiah.php";

  if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    $user="<a href='media.php?hal=dashboard'>Halo, Pengunjung</a>";
    }
    else
    {
    $user="$_SESSION[namalengkap]";
    $level="$_SESSION[leveluser]"; 
    // $jabatan="$_SESSION[jabatan]";  
    }
    
    $tampil= mysql_query("SELECT * FROM users WHERE nama_lengkap ='$user'");
    $r=mysql_fetch_array($tampil);
    ?>
                                
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <title>E-Services LIPI Press</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.png" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a>E-Services</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="foto_profil/<?php echo $r['foto'] ?> "alt="<?php echo $r['nama_lengkap'] ?>"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                               <a href="media.php?hal=profil"> <img src="foto_profil/<?php echo $r['foto'] ?>" alt="<?php echo $r['nama_lengkap'] ?>"/> </a> 
                            </div>
                                                        
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo "$user"; ?></div>
                                <div class="profile-data-title"><?php echo $r['jabatan']; ?> </div>
                               
                            </div>
                            <div class="profile-controls">
                                <a href="media.php?hal=ganti-password" class="profile-control-left"><span class="fa fa-key"></span></a>
                                <a href="media.php?hal=informasi" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <!-- Start menu -->
                    <?php
      $user = $_SESSION['namauser'];
        $lv   = $_SESSION['leveluser'];
        if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']))
                  {
                  include "menu/menu_standar.php";  //it should be admin
                  }
                  else if($user && $lv)
                    {
                        if($lv == 'dewan')              
                        {
                            include "menu/menu_dewan.php";      //dewan
                        }
                        else if($lv == 'reviewer')          
                        {
                            include "menu/menu_reviewer.php";       //reviewer
                        }
                        else if($lv == 'penulis')           
                        {
                            include "menu/menu_penulis.php";        //penulis
                        }
                        else if($lv == 'kelompok')          
                        {
                            include "menu/menu_kelompok.php";
                        }
                        else if($lv == 'editor')         
                        {
                            include "menu/menu_editor.php";
                        }
                        else if($lv == 'editor_visual')
                        {
                            include "menu/menu_editor_visual.php";
                        }
                        else if($lv == 'editor_bahasa')
                        {
                            include "menu/menu_editor_bahasa.php";
                        }
                        else                                        
                        {
                            include "menu/menu_standar.php";
                        }
                    }
      ?></div>
      
            <!-- end menu -->
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    </ul>
                <!-- END X-NAVIGATION VERTICAL -->               
                <!-- PAGE CONTENT WRAPPER -->
                                  
                <?php include "konten.php";?>
                
                <!-- END CONTENT WRAPPER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="config/logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <!--<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>-->
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>

        <!--<script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>-->
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>

        <!--<script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>-->

        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>                 
        <script type="text/javascript" src="js/plugins/dropzone/dropzone.min.js"></script>
        <script type="text/javascript" src="js/plugins/fileinput/fileinput.min.js"></script> 
        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->        
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script> 

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        <script type="text/javascript" src="js/demo_tables.js"></script>  
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        <!--<script type="text/javascript" src="js/demo_dashboard.js"></script>-->
        <script type="text/javascript" src="js/demo_charts_morris.js"></script>

         <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/tocify/jquery.tocify.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>
<?php ob_flush();?>
<?php } ?>