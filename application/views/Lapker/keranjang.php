<tr class="row-keranjang">
	<td class="nama_aplikasi">
		<?= $this->input->post('nama_aplikasi') ?>
		<input type="hidden" name="nama_aplikasi_hidden[]" value="<?= $this->input->post('nama_aplikasi') ?>">
	</td>
	<td class="tempat">
		<?= $this->input->post('tempat') ?>
		<input type="hidden" name="tempat_hidden[]" value="<?= $this->input->post('tempat') ?>">
	</td>
	<td class="uraian">
		<?= $this->input->post('uraians') ?>
		<input type="hidden" name="uraian_hidden[]" value="<?= $this->input->post('uraians') ?>">
	</td>
	<td class="status">
		<?= $this->input->post('statuss') ?>
		<input type="hidden" name="status_hidden[]" value="<?= $this->input->post('statuss') ?>">
	</td>
	
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('uraian_hidden') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>