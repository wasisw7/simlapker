<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('barang') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
						<a href="<?= base_url('lapker') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<div class="card shadow">
							<div class="card-header"><strong>Form Cetak!</strong></div>
							<div class="card-body">
								<form action="<?= base_url('lapker/export/') ?>" id="form-tambah" method="POST">
									<div class="form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="kode_barang"><strong>Nama Pegawai</strong></label>
												<input type="text" name="idrincian" placeholder="ID LAPKER" autocomplete="off"  class="form-control" required value="<?= $this->session->login['nama'] ?>" readonly>
											</div>
										</div>
										<div class="col-md-6" >
											<div class="form-group">
												<label for="nama_aplikasi"><strong>Bulan</strong></label>
												<select name="bulan" id="bulan" class="form-control" required>
													<option value="">-- Silahkan Pilih --</option>
													<option value="1" >Januari</option>
													<option value="2" >Februari</option>
													<option value="3" >Maret</option>
													<option value="4" >April</option>
													<option value="5" >Mei</option>
													<option value="6" >Juni</option>
													<option value="7" >Juli</option>
													<option value="8" >Agustus</option>
													<option value="9" >September</option>
													<option value="10" >Oktober</option>
													<option value="11" >November</option>
													<option value="12" >Desember</option>
												</select>
											</div>
										</div>
									</div>

									
									<div class="form-row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="nama_aplikasi"><strong>&nbsp;</strong></label><br>
												<button type="submit" class="btn btn-dark"><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak</button>
											</div>
										</div>
									</div>
										
									<!-- <hr>
									<div class="form-group">
										
									</div> -->
									
								</form>
							</div>				
						</div>
					</div>
				</div>
				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
</body>
</html>