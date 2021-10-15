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
						<a href="<?= base_url('lapker').'/detail_edit/'.$barang->id  ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
								<form action="<?= base_url('lapker/proses_ubah/' . $barang->id.'/'.$barang->idrincian) ?>" id="form-tambah" method="POST">
									<div class="form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="kode_barang"><strong>ID</strong></label>
												<input type="text" name="idrincian" placeholder="ID LAPKER" autocomplete="off"  class="form-control" required value="<?= $barang->idrincian ?>" readonly>
											</div>
										</div>
										<div class="col-md-6" >
											<div class="form-group">
												<label for="nama_aplikasi"><strong>Nama Aplikasi</strong></label>
												<select name="nama_aplikasi" id="nama_aplikasi" class="form-control" required>
													<option value="">-- Silahkan Pilih --</option>
													<option value="SIMAKDA" <?= $barang->app == 'SIMAKDA' ? 'selected' : '' ?>>SIMAKDA</option>
													<option value="SIMBOS" <?= $barang->app == 'SIMBOS' ? 'selected' : '' ?>>SIMBOS</option>
													<option value="Mr" <?= $barang->app == 'Mr' ? 'selected' : '' ?>>MR</option>
													<option value="MATA BATINKEU" <?= $barang->app == 'MATA BATINKEU' ? 'selected' : '' ?>>MATA BATINKEU</option>
													<option value="SIRUP" <?= $barang->app == 'SIRUP' ? 'selected' : '' ?>>SIRUP</option>
													<option value="SIMPBB" <?= $barang->app == 'SIMPBB' ? 'selected' : '' ?>>SIMPBB</option>
													<option value="SIMBPHTB" <?= $barang->app == 'SIMBPHTB' ? 'selected' : '' ?>>SIMBPHTB</option>
													<option value="SOPD" <?= $barang->app == 'SOPD' ? 'selected' : '' ?>>SOPD</option>
													<option value="-" <?= $barang->app == '-' ? 'selected' : '' ?>>-</option>
												</select>
											</div>
										</div>
									</div>

									<div class="form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="tempat"><strong>Tempat</strong></label>
												<input type="text" name="tempat" placeholder="Masukkan Kode Barang" autocomplete="off"  class="form-control" required value="<?= $barang->tempat ?>" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="tempat"><strong>Uraian</strong></label>
												<input type="text" name="uraian" placeholder="Masukkan Kode Barang" autocomplete="off"  class="form-control" required value="<?= $barang->uraian ?>" readonly>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="status_kerja"><strong>Status</strong></label>
												<select name="status_kerja" id="status_kerja" class="form-control" required>
													<option value="">-- Status --</option>
													<option value="OK" <?= $barang->status_kerja == 'OK' ? 'selected' : '' ?>>OK</option>
													<option value="OG" <?= $barang->status_kerja == 'OG' ? 'selected' : '' ?>>OG</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="nama_aplikasi"><strong>&nbsp;</strong></label><br>
												<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
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