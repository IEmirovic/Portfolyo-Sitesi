<?php include_once("header.php") ?>
<?php include_once "adminpanel/db/conn.php";
//////////////////HAKKINDA BÖLÜMÜ İÇERİKLERİ///////////////////
$sql = "SELECT * FROM hakkinda WHERE id = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Çekilen verileri değişkenlere aktar
$adSoyad = $row["adSoyad"];
$unvan = $row["unvan"];
$hakkindaText = $row["hakkindaText"];
$imagePath = $row["imagePath"];
//////////////////////////////////////////////////////////////

//////////////////İLETİŞİM BÖLÜMÜ İÇERİKLERİ///////////////////
$sql = "SELECT * FROM iletisim WHERE id = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Çekilen verileri değişkenlere aktar
$email = $row["email"];
$telefon = $row["telefon"];
$adres = $row["adres"];
$instagram = $row["instagram"];
$twitter = $row["twitter"];
$youtube = $row["youtube"];
$linkedin = $row["linkedin"];
$github = $row["github"];
//////////////////////////////////////////////////////////////
?>

<body data-spy="scroll" data-offset="0" data-target="#nav">
	<section id="about" name="about"></section>
	<div id="section-topbar">
		<div id="topbar-inner">
			<div class="container">
				<div class="row">
					<div class="dropdown">
						<ul id="nav" class="nav">
							<li class="menu-item"><a class="smoothScroll" href="#about" title="About"><i
										class="icon-user"></i></a></li>
							<li class="menu-item"><a class="smoothScroll" href="#resume" title="Resume"><i
										class="icon-file"></i></a></li>
							<li class="menu-item"><a class="smoothScroll" href="#work" title="Works"><i
										class="icon-briefcase"></i></a></li>
							<li class="menu-item"><a class="smoothScroll" href="#contact" title="Contact"><i
										class="icon-envelope"></i></a></li>
						</ul><!--/ uL#nav -->
					</div><!-- /.dropdown -->

					<div class="clear"></div>
				</div><!--/.row -->
			</div><!--/.container -->

			<div class="clear"></div>
		</div><!--/ #topbar-inner -->
	</div><!--/ #section-topbar -->

	<div id="headerwrap"
		style="background: url(adminpanel/db/hakkindadb/<?php echo $imagePath; ?>) no-repeat center top;">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-12">
					<h1>
						<?php echo $adSoyad; ?>
					</h1>
					<h3>
						<?php echo $unvan; ?>
					</h3>
				</div><!--/.col-lg-12 -->
			</div><!--/.row -->
		</div><!--/.container -->
	</div><!--/.#headerwrap -->
	<div id="intro">
		<div class="container">
			<div class="row">

				<div class="col-lg-2 col-lg-offset-1">
					<h5>HAKKIMDA</h5>
				</div>
				<div class="col-lg-6">
					<p>
						<?php echo $hakkindaText; ?>
					</p>
				</div>

			</div><!--/.row -->
		</div><!--/.container -->
	</div><!--/ #intro -->

	<section id="resume" name="resume"></section>
	<!--EDUCATION DESCRIPTION -->
	<div class="container desc">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-1">
				<h5>EĞİTİM</h5>
			</div>

			<?php
			$sql = "SELECT id, egitimadi, okuladi, baslangicyil, bitisyil, devamdurumu FROM egitim ORDER BY baslangicyil DESC";
			$stmt = $pdo->query($sql);
			$ilkDongu = true;
			foreach ($stmt as $row) {
				if ($ilkDongu == true) {
					echo '<div class="col-lg-6">
						<p>
							<t>' . $row["egitimadi"] . '</t><br />
							' . $row["okuladi"] . ' <br />
						</p>
					</div>';
					$ilkDongu = false;
				} else {
					echo '<div class="col-lg-6 col-lg-offset-3">
						<p>
							<t>' . $row["egitimadi"] . '</t><br />
							' . $row["okuladi"] . ' <br />
						</p>
					</div>';
				}

				if ($row["devamdurumu"] == 1) {
					echo '<div class="col-lg-3">
							<p>
				    			<sm>' . $row["baslangicyil"] . '</sm><br />
				        			<imp>
				            			<sm>DEVAM EDIYOR</sm>
				        			</imp>
							</p>
					</div>';
				} else {
					echo '<div class="col-lg-3">
							<p>
								<sm>' . $row["baslangicyil"] . ' - ' . $row["bitisyil"] . '</sm>
							</p>
						</div>';
				}
			}
			?>
		</div><!--/.row -->
		<br>
		<hr>
	</div>

	<!--/.container -->


	<!--WORK DESCRIPTION -->
	<div class="container desc">
		<div class="row">

			<div class="col-lg-2 col-lg-offset-1">
				<h5>İŞ DENEYİMİ</h5>
			</div>

			<?php
			$sql = "SELECT id, pozisyon, sirketAdi, baslangicYili, bitisYili, devamdurumu FROM isdeneyimleri ORDER BY baslangicYili DESC";
			$stmt = $pdo->query($sql);
			$ilkDongu = true;
			foreach ($stmt as $row) {
				if ($ilkDongu == true) {
					echo '<div class="col-lg-6">
						<p>
							<t>' . $row["pozisyon"] . '</t><br />
							' . $row["sirketAdi"] . ' <br />
						</p>
					</div>';
					$ilkDongu = false;
				} else {
					echo '<div class="col-lg-6 col-lg-offset-3">
						<p>
							<t>' . $row["pozisyon"] . '</t><br />
							' . $row["sirketAdi"] . ' <br />
						</p>
					</div>';
				}

				if ($row["devamdurumu"] == 1) {
					echo '<div class="col-lg-3">
							<p>
				    			<sm>' . $row["baslangicYili"] . '</sm><br />
				        			<imp>
				            			<sm>DEVAM EDIYOR</sm>
				        			</imp>
							</p>
					</div>';
				} else {
					echo '<div class="col-lg-3">
							<p>
								<sm>' . $row["baslangicYili"] . ' - ' . $row["bitisYili"] . '</sm>
							</p>
						</div>';
				}
			}
			?>
		</div><!--/.row -->
		<br>
		<hr>
	</div><!--/.container -->


	<!--AWARDS DESCRIPTION -->
	<div class="container desc">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-1">
				<h5>SERTİFİKALAR</h5>
			</div>

			<?php
			$sql = "SELECT id, kurumAdi, sertifikaAdi, aciklama, yil FROM sertifika ORDER BY yil DESC";
			$stmt = $pdo->query($sql);
			$ilkDongu = true;
			foreach ($stmt as $row) {
				if ($ilkDongu == true) {
					echo '<div class="col-lg-6">
						<p>
							<t>' . $row["sertifikaAdi"] . '</t><br />
							' . $row["kurumAdi"] . ' <br />
						</p>
						<p>
							<more>' . $row["aciklama"] . '</more>
						</p>
					</div>';
					$ilkDongu = false;
				} else {
					echo '<div class="col-lg-6 col-lg-offset-3">
						<p>
							<t>' . $row["sertifikaAdi"] . '</t><br />
							' . $row["kurumAdi"] . ' <br />
						</p>
						<p>
							<more>' . $row["aciklama"] . '</more>
						</p>
					</div>';
				}

				echo '<div class="col-lg-3">
							<p>
								<sm>' . $row["yil"] . '</sm>
							</p>
						</div>';
			}
			?>

		</div><!--/.row -->
		<br>
		<hr>
	</div><!--/.container -->


	<!--SKILLS DESCRIPTION -->
	<div class="container desc">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-1">
				<h5>YETENEKLER</h5>
			</div>

			<?php
			$sql = "SELECT id, yetenekAdi, aciklama FROM yetenekler ORDER BY yetenekAdi";
			$stmt = $pdo->query($sql);
			$ilkDongu = true;
			foreach ($stmt as $row) {
				if ($ilkDongu == true) {
					echo '<div class="col-lg-6">
						<p>
							<t>' . $row["yetenekAdi"] . '</t>
						</p>
						<p>
							<more>' . $row["aciklama"] . '</more>
						</p>
					</div>';
					$ilkDongu = false;
				} else {
					echo '<div class="col-lg-6 col-lg-offset-3">
						<p>
							<t>' . $row["yetenekAdi"] . '</t>
						</p>
						<p>
							<more>' . $row["aciklama"] . '</more>
						</p>
					</div>';
				}
			}
			?>
		</div><!--/.row -->
		<br>
		<hr>
	</div><!--/ #skillswrap -->



	<section id="work" name="work"></section>
	<!--PORTFOLIO DESCRIPTION -->
	<div class="container desc">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-1">
				<h5>PORTFOLYO</h5>
			</div>
			<?php
			$sql = "SELECT id, projeAdi, konu, aciklama, imagePath, created_at FROM portfolyo ORDER BY created_at DESC";
			$stmt = $pdo->query($sql);
			$ilkDongu = true;
			foreach ($stmt as $row) {
				if ($ilkDongu == true) {
					echo '<div class="col-lg-6">
						<p>
							<img class="img-responsive" src="adminpanel/db/portfolyodb/' . $row['imagePath'] . '" alt="" />
						</p>
					</div>';
					$ilkDongu = false;
				} else {
					echo '<div class="col-lg-6 col-lg-offset-3">
						<p>
							<img class="img-responsive" src="adminpanel/db/portfolyodb/' . $row['imagePath'] . '" alt="" />
						</p>
					</div>';
				}

				echo '<div class="col-lg-3">
						<p>' . $row["projeAdi"] . '</p>
							<p>
								<more>' . $row["aciklama"] . '<br /><br />
								<sm><i class="icon-tag"></i>' . $row["konu"] . '</sm>
								</more>
							</p>
					</div>';
			}
			?>
		</div><!--/.row -->
		<br>
		<br>
	</div><!--/.container -->
	<section id="contact" name="contact"></section>
	<!--FOOTER DESCRIPTION -->
	<div id="footwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-lg-offset-1">
					<h5>İLETİŞİM</h5>
				</div>
				<div class="col-lg-6">
					<p>
						<t>E-Posta</t><br />
						<?php echo $email; ?> <br />
					</p>
					<p style="max-width: 250px; word-wrap: break-word;">
						<t>Adres</t><br />
						<!--Some Ave. 987 <br />
						Postal 23892 <br />
						London, England. <br />-->
						<?php echo $adres; ?> <br />

					</p>
					<p>
						<t>Telefon</t><br />
						<?php echo $telefon; ?> <br />
					</p>
				</div>
				<div class="col-lg-3">
					<p>
						<sm>SOSYAL MEDYA HESAPLARI</sm>
					</p>
					<p>
						<a href="<?php echo $instagram; ?>"><i class="icon-instagram"></i></a>
						<a href="<?php echo $twitter; ?>"><i class="icon-twitter"></i></a>
						<a href="<?php echo $youtube; ?>"><i class="icon-youtube"></i></a>
						<a href="<?php echo $linkedin; ?>"><i class="icon-linkedin"></i></a>
						<a href="<?php echo $github; ?>"><i class="icon-github"></i></a>
					</p>
					<p>
						<a href="loginscreen/login.php">
							<t>Admin Paneli</t>
						</a>
					</p>
				</div>
			</div><!--/.row -->
		</div><!--/.container -->
	</div><!--/ #footer -->
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/js/bootstrap.js"></script>
</body>

</html>