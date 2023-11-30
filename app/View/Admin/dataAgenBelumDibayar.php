<div class="container-xxl flex-grow-1 container-p-y">
<?php
    if(isset($data['error'])){ ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
                        <?= $data['error'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
    <?php } ?>
    <?php
    if(isset($data['success'])){ ?>
          <div class="alert alert-success alert-dismissible" role="alert">
                        <?= $data['success'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
    <?php } ?>

          
              <div class="card " style="margin-top: -16px;" >
                <div class="table-responsive text-nowrap p-3">
                <div class="d-flex mb-3">
                <a href="/admin/data-belum-dibayar"  class="btn btn-primary d-flex align-items-center">Agen belum dibayar</a>
                <a href="/admin/data-sudah-dibayar"  class="btn ">Agen sudah dibayar</a>
                </div>
                  <table id="myTable" class="table table-hover ">
                  <thead>
                      <tr>
                      <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Jenis Pembayaran</th>
                        <th>total tagihan</th>
                        <th>Jumlah bayar</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no = 1;
                      foreach($data['pemesanan'] as $d) : ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $d['pemesananId'] ?></td>
                        <td><?= $d['tanggal_pemesanan'] ?></td>
                        <td><?= $d['status'] ?></td>
                        <td><?= $d['jenis_pembayaran'] ?></td>
                        <td><?= $d['total_tagihan'] ?></td>
                        <td><?= $d['sudah_bayar'] ?></td>
                        <td>
                          
                          <a class="btn btn-danger" href="/admin/hapus-pemesanan/<?= $d['pemesanan_id'] ?>" onclick="return confirm('Apakah yakin menghapus')" role="button"><i class='bx bx-trash' ></i></a>
                          <button type="button" data-bs-toggle="modal" data-bs-target="#ModalTambahGaji<?= $d['pemesanan_id'] ?>" class="btn btn-warning"><i class='bx bxs-edit-alt'></i></button>
                          <!-- <a class="btn btn-warning" href="/admin/edit-pemesanan/<?= $d['pemesanan_id'] ?>" role="button"><i class='bx bxs-edit-alt'></i></a> -->
                          <a class="btn btn-success" href="/admin/detail-pemesanan/<?= $d['pemesanan_id'] ?>" role="button"><i class='bx bx-message-detail' ></i></a>
                          
                        </td>
                      </tr>
                      <?php
                    include 'Modal/ModalTambahGajiAgen.php';
                    endforeach; ?>
                      
                    </tbody>
                   
                  </table>
                </div>
              </div>

            </div>
            <script>
              let table = new DataTable('#myTable');
            </script>