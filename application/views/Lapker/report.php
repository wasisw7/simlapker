<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark"><?= $title ?></h3>
			<!-- <h4 class="h4 text-dark "><strong><?= $perusahaan->nama_perusahaan ?></strong></h4> -->
		</div>
	</div>
	<hr>
	<div class="row">

		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>                       
	            <tr><td rowspan="2" bgcolor="#CCCCCC" width="8%" align="center"><b>Tanggal</b></td>
	                <td rowspan="2" bgcolor="#CCCCCC" width="8%" align="center"><b>Hari</b></td>                            
	                <td rowspan="2" bgcolor="#CCCCCC" width="20%" align="center"><b>Nama</b></td>
	                <td rowspan="2" bgcolor="#CCCCCC" width="20%" align="center"><b>Lokasi</b></td>
	                <td rowspan="2" bgcolor="#CCCCCC" width="10%" align="center"><b>Pekerjaan (form,report, Lain-lain)</b></td>
	                <td 			bgcolor="#CCCCCC" width="5%" align="center"><b>Status</b></td>
	                <td rowspan="2" bgcolor="#CCCCCC" width="40%" align="center"><b>Keterangan</b></td>
	            </tr>  
	            <tr>
	                <td bgcolor="#CCCCCC" width="5%" align="center"><b>(OG/OK)*</b></td> 
	            </tr>                     
	         </thead>
			<!-- <thead>
				<tr>
					<td>No Terima</td>
					<td>Nama Petugas</td>
					<td>Nama Supplier</td>
					<td>Tanggal Terima</td>
				</tr>
			</thead> -->
			<tbody>
				<?php foreach ($all_penerimaan as $penerimaan): ?>
					<tr>
						<td><?= $penerimaan->no_terima ?></td>
						<td><?= $penerimaan->nama_petugas ?></td>
						<td><?= $penerimaan->nama_supplier ?></td>
						<td><?= $penerimaan->tgl_terima ?> Pukul <?= $penerimaan->jam_terima ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
                <tr>
                    <td colspan="7" style="border:solid 1px white;border-top:solid 1px black;"></td>
                </tr>
            </tfoot>
		</table>
	</div>
</body>
</html>