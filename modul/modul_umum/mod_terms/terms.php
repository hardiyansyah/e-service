 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Syarat dan Ketentuan</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-columns"></span> Syarat dan Ketentuan</h2>
                </div>
                <!-- END PAGE TITLE -->                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                   <!--  <div class="row">
                        <div class="col-md-12">
                            
                            <div class="panel panel-default">                                
                                <div class="panel-body">
                                    <h3>jQuery Tocify Plugin</h3>
                                    <p>A jQuery plugin that dynamically generates a table of contents. Tocify also optionally provides support for smooth scrolling, scroll highlighting, scroll page extending, and forward and back button support.</p>
                                </div>
                            </div>
                            
                        </div>
                    </div> -->
                    
                    <div class="row">                        
                        <div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-body">                            
                                    <div class="tocify-content">
                                        <h2>Dengan ini menyatakan dengan sebenar-benarnya bahwa :</h2>
                                        <p>1. Naskah yang diserahkan adalah karya asli dan bebas dari fabrikasi, falsifikasi, plagiasi, duplikasi, fragmentasi/salami, dan pelanggaran hak cipta data/isi.</p>
                                        <p>2. Naskah belum pernah diterbitkan dan tidak sedang dipertimbangkan oleh penerbit lain.</p>
                                        <p>3. Apabila dikemudian hari ada implikasi terhadap hal-hal yang disebutkan di atas, bukan menjadi tanggung jawab Penerbit dan Dewan Editor.</p>                      
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="position: relative;">
                            <div id="tocify"></div>
                        </div>
                    </div>
                    
                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                 
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

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
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <script>
            $(function() {
                var toc = $("#tocify").tocify({context: ".tocify-content", showEffect: "fadeIn",extendPage:false,selectors: "h2, h3, h4" });
            });
        </script>
        