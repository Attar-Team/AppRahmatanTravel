

            <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card " style="margin-top: -16px;" >
                <div class="table-responsive text-nowrap p-3">
                <div class="d-inline-block mb-3">
                <a href="/admin/tambah-paket"  class="btn btn-primary d-flex align-items-center">Tambah</a>
                </div>
                  <table id="myTable" class="table table-hover ">
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
            <script>
              let table = new DataTable('#myTable');
            </script>