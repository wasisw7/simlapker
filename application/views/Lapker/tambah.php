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
			<div id="content" data-url="<?= base_url('lapker') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800">Tambah lapker</h1>
					</div>
					<div class="float-right">
						<a href="<?= base_url('lapker') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
					<div class="card">
						<div class="card-header bg-success text-white">
							Input Data Lapker
						</div>
						<div class="card-body">
							<form action="<?= base_url('lapker/proses_tambah') ?>" id="form-tambah" method="POST">
								<div class="form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Kode Lapker</label>
												<input type="text" name="no_terima" value="<?= $this->session->login['kode'] ?>-<?= time() ?>" readonly class="form-control">
											</div>
											<div class="form-group">
												<label>Kode Pegawai</label>
												<input type="text" name="kode_petugas" value="<?= $this->session->login['kode'] ?>" readonly class="form-control">
											</div>
											<div class="form-group">
												<label>Nama Pegawai</label>
												<input type="text" name="nama_petugas" value="<?= $this->session->login['nama'] ?>" readonly class="form-control">
											</div>
											<div class="form-group">
												<label>Tanggal Lapker</label>
												<input type="date" name="tgl_terima" value="<?= date('d/m/Y') ?>" style="width: 200px;" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="aplikasi">Nama Aplikasi</label>
												<select name="nama_aplikasi" id="nama_aplikasi" class="form-control" style="width: 200px;">
													<option value="">Pilih Aplikasi</option>
													<?php foreach ($all_barang as $barang): ?>
														<option value="<?= $barang->nama_barang ?>"><?= $barang->nama_barang ?></option>
													<?php endforeach ?>
												</select>
											</div>
											<div class="form-group">
												<label>Tempat</label>
												<input type="text" name="tempat" id="tempat" value="" class="form-control" />
											</div>
											<div class="form-group">
												<label>Uraian</label>
												<textarea name="uraian" id="uraian" value="" class="form-control" rows="1"></textarea>
											</div>
											<div class="form-group">
												<label>Status</label>
												<select id="status" name="status" class="form-control" style="width: 200px;">
													<option value="">Status</option>
													<option value="OK">OK</option>
													<option value="OG">OG</option>
												</select>
											</div>
											<div class="form-group">
												<label for="">&nbsp;</label>
												<button disabled type="button" class="btn btn-success" id="tambah"><i class="fa fa-plus"></i> Tambah</button>
												<input type="hidden" name="satuan" value="">
											</div>
										</div>		
								</div>
							</form>
						</div>
						<div class="card-footer">
							<div class="keranjang">
								<h5>Detail lapker</h5>
								<hr>
								<table class="table table-bordered" id="keranjang">
									<thead>
										<tr>
											<td width="15%">Nama Aplikasi</td>
											<td width="20%">Tempat</td>
											<td width="40%">Uraian</td>
											<td width="10%">Status</td>
											<td width="15%">Aksi</td>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
									<tfoot>
										<tr>
											<td colspan="5" align="center">
												<input type="hidden" name="max_hidden" value="">
												<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
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
	<script>
		$(document).ready(function(){
			$('tfoot').hide()

			$(document).keypress(function(event){
		    	if (event.which == '13') {
		      		event.preventDefault();
			   	}
			})


			$('#status').on('change', function(){
				$('button#tambah').prop('disabled', false)
			})


			$(document).on('click', '#tambah', function(e){
				const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
				const data_keranjang = {
					nama_aplikasi: $('select[name="nama_aplikasi"]').val(),
					tempat: $('input[name="tempat"]').val(),
					uraians: $('textarea[name="uraian"]').val(),
					statuss: $('select[name="status"]').val()
				}

				$.ajax({
					url: url_keranjang_barang,
					type: 'POST',
					data: data_keranjang,
					success: function(data){
						// if(
						// 	$('select[name="nama_aplikasi"]').val() == data_keranjang.nama_aplikasi) 
						// 	$('option[value="' + data_keranjang.nama_aplikasi + '"]').hide()
						reset()

						$('table#keranjang tbody').append(data)
						$('tfoot').show()

						// $('#total').html('<strong>' + hitung_total() + '</strong>')
						// $('input[name="total_hidden"]').val(hitung_total())
					}
				})
			})


			$(document).on('click', '#tombol-hapus', function(){
				$(this).closest('.row-keranjang').remove()

				$('option[value="' + $(this).data('nama-aplikasi') + '"]').show()

				if($('tbody').children().length == 0) $('tfoot').hide()
			})

			$('button[type="submit"]').on('click', function(){
				$('select[name="nama_aplikasi"]').prop('disabled', true)
				$('input[name="uraian"]').prop('disabled', true)
				$('input[name="status"]').prop('disabled', true)
			})

			function reset(){
				$('#nama_aplikasi').val('')
				$('input[name="tempat"]').val('')
				$('textarea[name="uraian"]').val('')
				$('#status').val('')
				$('button#tambah').prop('disabled', true)
			}
		})
	</script>
</body>
</html>