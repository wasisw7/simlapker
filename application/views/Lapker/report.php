<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
	
	<div class="row">
		<table style="border-collapse:collapse; font-size:12;" width="100%" align="center" border="0" cellspacing="0" cellpadding="4">
                    <tr>
                        <td  align="center">
                            <img src="<?='sb-admin/img/msm.jpg'; ?>" />
                        </td>
                        <td width="80%" align="left">
                            <h2><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FORM LAPORAN KERJA BULANAN</strong></h2> 
                            
                        </td>
                        
                        <td width="20%"  align="center">
                            <b>Form L.01A</b>
                        </td>
                    </tr>

                  </table>
                  <table style="border-collapse:collapse; font-size:12;" width="100%" align="center" border="0" cellspacing="0" cellpadding="2">
                    <?php foreach ($all_header as $header): ?>
                    <tr>
                        <td align="left" width="5%">Nama</td>
                        <td align="left" width="1%">:</td>
                        <td align="left"><?= $header->nama ?></td>

                        <td align="left"></td>
                        <td align="center"></td>
                        <td align="left"></td>

                        <td align="left"></td>
                    </tr>

                    <tr>
                        <td align="left" width="5%">Jabatan</td>
                        <td align="left" width="1%">:</td>
                        <td align="left"><?= $header->jabatan ?></td>

                        <td align="left"></td>
                        <td align="center"></td>
                        <td align="left"></td>

                        <td align="left"></td>
                    </tr>

                    <tr>
                        <td align="left" width="5%">Bulan</td>
                        <td align="left" width="1%">:</td>
                        <td align="left"><?= $header->nbulan ?></td>

                        <td align="left"></td>
                        <td align="center">Kota/Kabupaten (Home Base):</td>
                        <td align="left"></td>

                        <td align="left">Proyek/System/Aplikasi yang ditangani :</td>
                    </tr>

                    <tr>
                        <td align="left" width="5%">Regional</td>
                        <td align="left" width="1%">:</td>
                        <td align="left">Kalimantan</td>

                        <td align="left"></td>
                        <td align="center">Pontianak</td>
                        <td align="left"></td>

                        <td align="left"><?= $header->aplikasi?></td>
                    </tr>
                    <?php endforeach ?>
                    <tr>
                        <td colspan="6" align="left" style="font-size:10;"><b><i>Rincian Pekerjaan Harian</i></td>
                        
                    </tr>
                  </table>
		<table class="table table-bordered" id="dataTable" width="100%" border="1" cellspacing="0" style="font-size:12px;">
			<thead>      

	            <tr><td rowspan="2" width="8%" bgcolor="#CCCCCC" align="center"><b>Tanggal</b></td>
	                <td rowspan="2" width="10%" bgcolor="#CCCCCC" align="center"><b>Hari</b></td>                            
	                <td rowspan="2" width="10%" bgcolor="#CCCCCC" align="center"><b>Nama Aplikasi</b></td>
	                <td rowspan="2" width="10%" bgcolor="#CCCCCC" align="center"><b>Lokasi</b></td>
	                <td rowspan="2" width="67%" bgcolor="#CCCCCC" align="center"><b>Keterangan</b></td>
	                <td 		 width="5%"	bgcolor="#CCCCCC" align="center"><b>Status</b></td>
	                
	            </tr>  
	            <tr>
	                <td bgcolor="#CCCCCC" width="5%" align="center"><b>(OG/OK)*</b></td> 
	            </tr>                     
	         </thead>
	         
	         <tbody>
	         	<?php foreach ($all_lapker as $lapker): ?>
	         		<?php if($lapker->hari=="sabtu" || $lapker->hari=="minggu"){ ?>
	         			<tr>
		         			<td bgcolor="#ff3d3d" align="center"><?= $lapker->t1 ?></td>
		                	<td bgcolor="#ff3d3d" align="center"><?= ucwords(strtolower($lapker->hari)) ?></td>
		                	<td colspan="4" bgcolor="#ff3d3d" align="center"></td>	                
		            	</tr>
	         		<?php }else if($lapker->ket!=""){ ?>
	         			<tr>
		         			<td bgcolor="#ff3d3d" align="center"><?= $lapker->t1 ?></td>
		                	<td bgcolor="#ff3d3d" align="center"><?= ucwords(strtolower($lapker->hari)) ?></td>
		                	<td colspan="4" bgcolor="#ff3d3d" align="center"><?= $lapker->ket ?></td>	                
		            	</tr>
	         		<?php }else{ ?>
	         			<tr>
		         			<td bgcolor="#ffffff" style="vertical-align:top;border-top: none;border-bottom: none;"align="center"><?= $lapker->t1 ?></td>
		                	<td bgcolor="#ffffff" style="vertical-align:top;border-top: none;border-bottom: none;"align="center"><?= ucwords(strtolower($lapker->hari)) ?></td>
		                	<td bgcolor="#ffffff" style="vertical-align:top;border-top: none;border-bottom: none;"align="center"><?= ucwords(strtolower($lapker->app)) ?></td>
		                	<td bgcolor="#ffffff" style="vertical-align:top;border-top: none;border-bottom: none;"align="center"><?= ucwords(strtolower($lapker->lokasi)) ?></td>
		                	<td bgcolor="#ffffff" style="vertical-align:top;border-top: none;border-bottom: none;"align="left"><?= $lapker->uraian ?></td>
		                	<td bgcolor="#ffffff" style="vertical-align:top;border-top: none;border-bottom: none;"align="center"><?= $lapker->status_kerja ?></td>	                
		            	</tr>
	         		<?php } ?>
	         		
	         	<?php endforeach ?>
	         	
	         </tbody>
			<tfoot>
                <tr>
                    <td colspan="6" style="border:solid 1px white;border-top:solid 1px black;"></td>
                </tr>
            </tfoot>
		</table>
		<?php foreach ($all_header as $header): ?>
                    
		<table style="border-collapse:collapse; font-size:12;" width="100%" align="center" border="0" cellspacing="0" cellpadding="4">
                        <tr>
                            <td align="center" width="50%">Mengetahui,</td>
                            <td align="center">Pontianak, <?= $header->str ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="50%">&nbsp;</td>
                            <td align="center"></td>
                        </tr>
                        <tr>
                            <td align="center" width="50%">&nbsp;</td>
                            <td align="center"></td>
                        </tr>
                        <tr>
                            <td align="center" width="50%">&nbsp;</td>
                            <td align="center"></td>
                        </tr>
                        <tr>
                            <td align="center" width="50%"><u>FAJRI</u></td>
                            <td align="center"><u><?= $header->nama ?></u></td>
                        </tr>
                        <tr>
                            <td align="center" width="50%">Kepala Kantor</td>
                            <td align="center"></td>
                        </tr>
                    </table>
                    <?php endforeach ?>
	</div>
</body>
</html>