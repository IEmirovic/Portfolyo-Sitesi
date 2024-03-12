<?php include_once("header.php") ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Ana Sayfa</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <form method="post">
            <button type="submit" name="logout" class="nav-link"
              style="color:red; border: none; background: none; cursor: pointer; font-size: 16px; padding: 0;">Çıkış Yap
            </button>
          </form>
          <!-- <a href="index.php" class="nav-link"><span style="color: red;">Çıkış Yap</span></a>-->
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Yönetim Paneli</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://picsum.photos/160/160" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="hakkinda.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Hakkında Bölümü
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="egitim.php" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Eğitim Bölümü
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="isdeneyimi.php" class="nav-link">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                  İş Deneyimleri Bölümü
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="sertifikalar.php" class="nav-link">
                <i class="nav-icon fas  fa-graduation-cap"></i>
                <p>
                  Sertifikalar Bölümü
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="yetenekler.php" class="nav-link">
                <i class="nav-icon fas   fa-magic"></i>
                <p>
                  Yetenekler Bölümü
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="portfolyo.php" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p>
                  Portfolyo Bölümü
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="iletisim.php" class="nav-link">
                <i class="nav-icon fas fa-fax"></i>
                <p>
                  İletişim Bölümü
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Ana Sayfa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Merhaba!</h1>
              <p class="lead">İsmim Emircan Akar. Ondokuz Mayıs Üniversitesi Samsun MYO Bilgisayar Programcılığı
                Programı öğrencisiyim. Web Projesi Yönetimi tek ders sınavı için bu projeyi hazırladım.</p>
            </div>
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include_once("footer.php") ?>