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
			<div id="content" data-url="<?= base_url('kasir') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
						</div>
					</div>
					<hr>
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('success') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php elseif($this->session->flashdata('error')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('error') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif ?>
					<?php if ($this->session->login['role'] == 'admin'): ?>
					<div class="row">

			            <!-- Earnings (Monthly) Card Example -->
			            <div class="col-xl-3 col-md-6 mb-4">
			              <div class="card border-left-primary shadow h-100 py-2">
			                <div class="card-body">
			                  <div class="row no-gutters align-items-center">
			                    <div class="col mr-2">
			                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Aplikasi</div>
			                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_barang ?></div>
			                    </div>
			                    <div class="col-auto">
			                      <i class="fas fa-box fa-2x text-gray-300"></i>
			                    </div>
			                  </div>
			                </div>
			              </div>
			            </div>

			            <!-- Earnings (Monthly) Card Example -->
			            <div class="col-xl-3 col-md-6 mb-4">
			              <div class="card border-left-success shadow h-100 py-2">
			                <div class="card-body">
			                  <div class="row no-gutters align-items-center">
			                    <div class="col mr-2">
			                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Karyawan</div>
			                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_petugas ?></div>
			                    </div>
			                    <div class="col-auto">
			                      <i class="fas fa-users fa-2x text-gray-300"></i>
			                    </div>
			                  </div>
			                </div>
			              </div>
			            </div>

			            <!-- Earnings (Monthly) Card Example -->
			            <div class="col-xl-3 col-md-6 mb-4">
			              <div class="card border-left-info shadow h-100 py-2">
			                <div class="card-body">
			                  <div class="row no-gutters align-items-center">
			                    <div class="col mr-2">
			                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Input Lapker <small>Hari Ini</small></div>
			                      <div class="row no-gutters align-items-center">
			                        <div class="col-auto">
			                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlah_pengeluaran ?></div>
			                        </div>
			                      </div>
			                    </div>
			                    <div class="col-auto">
			                      <i class="fas fa-file-invoice fa-2x text-gray-300"></i>
			                    </div>
			                  </div>
			                </div>
			              </div>
			            </div>

			            <!-- Pending Requests Card Example -->
			            <div class="col-xl-3 col-md-6 mb-4">
			              <div class="card border-left-warning shadow h-100 py-2">
			                <div class="card-body">
			                  <div class="row no-gutters align-items-center">
			                    <div class="col mr-2">
			                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Input Lembur <small>Hari Ini</small></div>
			                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_penerimaan ?></div>
			                    </div>
			                    <div class="col-auto">
			                      <i class="fas fa-users fa-2x text-gray-300"></i>
			                    </div>
			                  </div>
			                </div>
			              </div>
			            </div>
			        </div>
			        <?php endif ?>
			        <div class="clearfix">
			        <div class="row">
			        	<div class="col-md-12">
			        		<div class="card shadow">
								<div class="card-header"><strong>Status Pengiriman Lapker Harian</strong></div>
								<div class="card-body">
									<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<td rowspan="2" width="600px" align="center">Nama Pegawai</td>
												<td colspan="31" align="center">Tanggal</td>
											</tr>
											<tr>
												<td align="center">1</td>
												<td align="center">2</td>
												<td align="center">3</td>
												<td align="center">4</td>
												<td align="center">5</td>
												<td align="center">6</td>
												<td align="center">7</td>
												<td align="center">8</td>
												<td align="center">9</td>
												<td align="center">10</td>
												<td align="center">11</td>
												<td align="center">12</td>
												<td align="center">13</td>
												<td align="center">14</td>
												<td align="center">15</td>
												<td align="center">16</td>
												<td align="center">17</td>
												<td align="center">18</td>
												<td align="center">19</td>
												<td align="center">20</td>
												<td align="center">21</td>
												<td align="center">22</td>
												<td align="center">23</td>
												<td align="center">24</td>
												<td align="center">25</td>
												<td align="center">26</td>
												<td align="center">27</td>
												<td align="center">28</td>
												<td align="center">29</td>
												<td align="center">30</td>
												<td align="center">31</td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($all_status as $status): ?>
												<tr>
													<td><?= $status->nama ?></td>
													<td align="center" width="600px">
																<?php if ($status->tgl1=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>		
													
													<td align="center">
														<?php if ($status->tgl2=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl3=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl4=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl5=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl6=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl7=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl8=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl9=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl10=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl11=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl12=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl13=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl14=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl15=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl16=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl17=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl18=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl19=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl20=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl21=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl22=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl23=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl24=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl25=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl26=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl27=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl28=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl29=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl30=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
													<td align="center">
														<?php if ($status->tgl31=='1'){ ?>
																	<a href="#" class="btn btn-success btn-circle btn-sm">
																<i class="fas fa-check"></i>

																<?php }else{ ?>
																	<a href="#" class="btn btn-danger btn-circle btn-sm">
																		<i class="fas fa-times"></i>
																	</a>
																<?php } ?>
													</td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
								</div>
							</div>
			        	</div>
			        </div>
			    </div>
			        <!-- <div class="row">
			          	<div class="col-md-6">
							<div class="card shadow">
								<div class="card-header"><strong>Profil Toko</strong></div>
								<div class="card-body">
									<strong>Nama Toko : </strong><br>
									<input  type="text" value="<?= $toko->nama_toko ?>" readonly class="form-control mt-2 mb-2">
									<strong>Nama Pemilik : </strong><br>
									<input  type="text" value="<?= $toko->nama_pemilik ?>" readonly class="form-control mt-2 mb-2">
									<strong>No Telepon : </strong><br>
									<input  type="text" value="<?= $toko->no_telepon ?>" readonly class="form-control mt-2 mb-2">
									<strong>Alamat : </strong><br>
									<input  type="text" value="<?= $toko->alamat ?>" readonly class="form-control mt-2">
								</div>				
							</div>
			          	</div>
			          	<div class="col-md-6">
							<div class="card shadow">
								<div class="card-header"><strong>User Sedang Login</strong></div>
								<div class="card-body">
									<strong>Nama : </strong><br>
									<input type="text" value="<?= $this->session->login['nama'] ?>" readonly class="form-control mt-2 mb-2">
									<strong>Username : </strong><br>
									<input type="text" value="<?= $this->session->login['username'] ?>" readonly class="form-control mt-2 mb-2">
									<strong>Role : </strong><br>
									<input type="text" value="<?= $this->session->login['role'] ?>" readonly class="form-control mt-2 mb-2">
									<strong>Jam Login : </strong><br>
									<input type="text" value="<?= $this->session->login['jam_masuk'] ?>" readonly class="form-control mt-2">
								</div>				
							</div>
			          	</div>
			        </div> -->

				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
	<script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>
</html>