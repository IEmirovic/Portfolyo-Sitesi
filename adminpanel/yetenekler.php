<?php include_once "header.php"; ?>
<?php include_once "db/conn.php";
function yilFonksiyonu()
{
    $start_year = 1930; // Başlangıç yılı
    $end_year = 2030;   // Bitiş yılı

    $options = '';
    for ($year = $start_year; $year <= $end_year; $year++) {
        $options .= "<option value=\"$year\">$year</option>";
    }
    return $options;
}
?>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }

    th:nth-child(1),
    td:nth-child(1) {
        width: 20%;
        /* Genişliği istediğiniz değere ayarlayın */
    }

    th:nth-child(2),
    td:nth-child(2) {
        width: 60%;
    }

    th:nth-child(3),
    td:nth-child(3) {
        width: 20%;

    }

    th {
        background-color: #f2f2f2;
        text-align: center;
    }

    .icon-cell {
        text-align: center;
    }

    .icon-cell a {
        display: inline-block;
        margin-left: 10px;
        font-size: 18px;
    }

    /* Modal Background */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Form Styling */
    .form-group {
        margin-bottom: 20px;
    }

    .form-check {
        margin-top: 5px;
    }

    /* Button */
    .btn-primary {
        background-color: #007bff;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }
</style>

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
                            style="color:red; border: none; background: none; cursor: pointer; font-size: 16px; padding: 0;">Çıkış
                            Yap
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
                <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
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
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
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
                            <h1 class="m-0">Yetenekler Bölümü</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active">Yetenekler</li>
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
                    <div class="row">
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-12 connectedSortable">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div>
                                        <?php
                                        $sql = "SELECT id,yetenekAdi,aciklama FROM yetenekler";
                                        $stmt = $pdo->query($sql);

                                        if ($stmt->rowCount() > 0) {
                                            // Tablo başlıklarını ve işlem sütununu yazdırma
                                            echo "<table><tr><th>Yetenek Adı</th><th>Açıklama</th><th>İşlemler</th></tr>";
                                            $sayac = "1";
                                            // Veri satırlarını yazdırma
                                            foreach ($stmt as $row) {
                                                echo "<tr><td>" . $row["yetenekAdi"] . "</td><td>" . $row["aciklama"] . "</td>";
                                                // İşlem ikonları ekleyerek her satıra silme ve güncelleme işlemlerini yapma
                                                echo "<td class='icon-cell'><a href='#' onclick=\"confirmDelete(" . $row["id"] . ")\"><i class='fas fa-trash-alt'></i></a>";
                                                echo "<a href='#' id='" . $sayac . "' class='update-btn fas fa-edit' data-id='" . $row["id"] . "'></a></td></tr>";
                                                $sayac++;
                                            }
                                            echo "</table>";
                                        } else {
                                            echo "0 sonuç";
                                        } ?>
                                    </div>
                                    <!-- Güncelleme Modalı -->
                                    <div id="updateModal" class="modal">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <span class="close">&times;</span>
                                                <h2 style="margin-bottom: 20px">Güncelleme Formu</h2>
                                                <form id="updateForm" method="POST"
                                                    action="db/yeteneklerdb/yeteneklerguncelle.php">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="yetenekAdi">Yetenek Adı</label>
                                                            <input id="yetenekAdi" type="text" class="form-control"
                                                                name="yetenekAdi">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="aciklama">Yetenek Açıklaması</label>
                                                            <textarea class="form-control" id="aciklama" rows="5"
                                                                name="aciklama"></textarea>
                                                            <input type="hidden" value="" name="rowid" id="gizli">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="submit" name="guncelle" value="Güncelle"
                                                                class="btn btn-primary">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- YENİ EĞİTİM EKLEME ALANI-------------------------------------------------- -->

                                    <div class="card" style="margin-top: 20px">
                                        <div class="card-header" style="background-color: #f2f2f2">
                                            <h3 class="card-title">Yeni Yetenek Ekle</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <form action="db/yeteneklerdb/yeteneklerekle.php" method="POST">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="yetenekAdi">Yetenek Adı</label>
                                                        <input id="yetenekAdi" type="text" class="form-control"
                                                            name="yetenekAdi">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="aciklama">Yetenek Açıklaması</label>
                                                        <textarea class="form-control" id="aciklama" rows="5"
                                                            name="aciklama"></textarea>
                                                    </div>
                                                </div>
                                                <button type=" submit" class="btn btn-primary"
                                                    name="ekle">Kaydet</button>
                                            </form>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </section>
                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <script>
            function confirmDelete(id) {
                var result = confirm("Bu öğeyi silmek istediğinize emin misiniz?");
                if (result) {
                    // Eğer kullanıcı eminse, silme işlemi için ilgili URL'ye yönlendirme yapabilirsiniz
                    window.location.href = "db/yeteneklerdb/yeteneklersil.php?id=" + id; // action kısmını düzelttik
                }
            }
            // Modalı açan butona tıklanınca verileri doldurma işlemi


            var updateButtons = document.getElementsByClassName('update-btn');
            var updateModal = document.getElementById('updateModal');
            var closeUpdateModal = document.querySelector('.close');
            var yetenekAdiInput = document.getElementById('yetenekAdi');
            var aciklamaTextarea = document.getElementById('aciklama');
            var rowIdInput = document.getElementById('gizli');

            function updateValue(checkbox) {
                if (checkbox.checked) {
                    checkbox.value = 1;
                } else {
                    checkbox.value = 0;
                }
            }

            for (var i = 0; i < updateButtons.length; i++) {
                updateButtons[i].addEventListener('click', function (event) {
                    event.preventDefault();
                    var id = this.getAttribute('data-id');
                    // Verileri doldurma işlemi
                    var yetenekAdi = this.parentElement.parentElement.children[0].innerText;
                    var aciklama = this.parentElement.parentElement.children[1].innerText;

                    yetenekAdiInput.value = yetenekAdi;
                    aciklamaTextarea.value = aciklama;
                    rowIdInput.value = id;

                    updateModal.style.display = "block";
                });
            }



            // Modalı kapatma işlemi
            closeUpdateModal.onclick = function () {
                updateModal.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == updateModal) {
                    updateModal.style.display = "none";
                }
            }

            document.querySelectorAll('.update-btn').forEach((updateBtn) => {

                updateBtn.addEventListener('click', (e) => {

                    e.preventDefault();

                    const dataId = e.target.getAttribute('data-id');

                    document.getElementById('gizli').value = dataId;


                    // Optionally, you can show the modal after setting the value

                    var modal = document.getElementById("updateModal");

                    modal.style.display = "block";

                });

            });
        </script>
        <?php include_once "footer.php"; ?>