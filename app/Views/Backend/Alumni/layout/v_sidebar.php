 <!-- Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <aside class="left-sidebar" data-sidebarbg="skin6">
   <!-- Sidebar scroll-->
   <div class="scroll-sidebar">
     <!-- Sidebar navigation-->
     <nav class="sidebar-nav">
       <ul id="sidebarnav">
         <!-- User Profile-->
         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('alumni/home') ?>" aria-expanded="false"><i class="mdi mr-2 mdi-home"></i><span class="hide-menu">Home</span></a></li>
         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('alumni/profil') ?>" aria-expanded="false">
             <i class="mdi mr-2 mdi-account"></i><span class="hide-menu">Profil</span></a>
         </li>
         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('alumni/lowongan') ?>" aria-expanded="false"><i class="mdi mr-2 mdi-briefcase"></i><span class="hide-menu">Data Lowongan</span></a></li>
         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('alumni/rekomendasi') ?>" aria-expanded="false"><i class="mdi mr-2 mdi-briefcase-check"></i><span class="hide-menu">Rekomendasi <br>Lowongan</span></a></li>
         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('alumni/lamar') ?>" aria-expanded="false"><i class="mdi mr-2 mdi-archive"></i><span class="hide-menu">Data Lamaran</span></a></li>
       </ul>
     </nav>
     <!-- End Sidebar navigation -->
   </div>
   <!-- End Sidebar scroll-->
   <div class="sidebar-footer">
     <div class="row">
       <div class="col-12 link-wrap">
         <!-- item-->
         <a href="/Backend/alumni/auth_alu/logout" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="mdi mdi-power"></i></a>
       </div>
     </div>
   </div>
 </aside>
 <!-- ============================================================== -->
 <!-- End Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <!-- ============================================================== -->
 <!-- Page wrapper  -->
 <!-- ============================================================== -->
 <div class="page-wrapper">
   <!-- ============================================================== -->
   <!-- Bread crumb and right sidebar toggle -->
   <!-- ============================================================== -->
   <div class="page-breadcrumb">
     <div class="row align-items-center">
       <div class="col-md-6 col-8 align-self-center">
         <h3 class="page-title mb-0 p-0"><?= $title; ?></h3>
       </div>
     </div>
   </div>
   <!-- ============================================================== -->
   <!-- End Bread crumb and right sidebar toggle -->
   <!-- ============================================================== -->
   <!-- ============================================================== -->