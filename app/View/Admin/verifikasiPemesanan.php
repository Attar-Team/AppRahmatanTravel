<div class="container-xxl flex-grow-1 container-p-y">
              <div style="display: flex;justify-content: space-between;margin-bottom: 20px;gap: 50px;">
                <div class="navbar-nav bg-light shadow rounded w-100 align-items-center">
                  <div class="nav-item d-flex w-100 px-4 py-2 align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input
                      type="text"
                      class="form-control border-0 w-100 shadow-none"
                      placeholder="Search..."
                      aria-label="Search..."
                    />
                  </div>
                </div>
                <!-- <button type="button" data-bs-toggle="modal" data-bs-target="#ModalEditStatusPembayaran" class="btn btn-primary">Tambah</button> -->
              </div>
              
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table text-center table-hover">
                    <thead>
                      <tr>
                        <th>Id Pemesanan</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Jumlah Bayar</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($data['detailPemesanan'] as $d): ?>
                        
                      <tr>
                        <td><?= $d['detail_pemesanan_id'] ?></td>
                        <td><?= $d['nama_customer'] ?></td>
                        <td><?= $d['tanggal'] ?></td>
                        
                        <td ><p style="color: #fff;padding: 10px;" class="<?php if($d['status_verivikasi'] == 'belum verivikasi')  echo "bg-warning";  else if ($d['status_verivikasi'] == 'terverivikasi') echo "bg-primary"; else if ($d['status_verivikasi'] == 'ditolak') echo "bg-danger"; ?>" ><?= $d['status_verivikasi'] ?></p></td>
                        <td><?= $d['jumlah_bayar'] ?></td>
                        <td>
                          <button type="button" data-bs-toggle="modal" data-bs-target="#ModalDetailPembayaran<?= $d['detail_pemesanan_id'] ?>" class="btn btn-success"><i class='bx bx-message-detail' ></i></button>
                          <button type="button" data-bs-toggle="modal" data-bs-target="#ModalEditStatusPembayaran<?= $d['detail_pemesanan_id'] ?>" class="btn btn-warning"><i class='bx bxs-edit-alt'></i></button>
                          <!-- <button type="button" class="btn btn-danger"><i class='bx bx-trash'></i></button> -->
                        </td>
                      </tr>

                      <?php 
                  include'Modal/ModalUpdateStatusPembayaran.php';
                  include'Modal/ModalDetailPembayaran.php';
                    endforeach; ?>
                      
                    </tbody>
                   
                  </table>
                </div>
              </div>
            </div>