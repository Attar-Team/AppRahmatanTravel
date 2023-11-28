            <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card " style="margin-top: -16px;" >
                <div class="table-responsive text-nowrap p-3">
                <div class="d-inline-block mb-3">
                <a href="/admin/tambah-paket"  class="btn btn-primary d-flex align-items-center">Tambah</a>
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
                      foreach($data['pemesanan'] as $p) : ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $p['nama_customer'] ?></td>
                        <td><?= $p['tanggal_pemesanan'] ?></td>
                        <td><?= $p['status'] ?></td>
                        <td><?= $p['jenis_pembayaran'] ?></td>
                        <td><?= $p['total_tagihan'] ?></td>
                        <td><?= $p['sudah_bayar'] ?></td>
                        <td>
                          
                          <a class="btn btn-danger" href="/admin/hapus-pemesanan/<?= $p['pemesanan_id'] ?>" onclick="return confirm('Apakah yakin menghapus')" role="button"><i class='bx bx-trash' ></i></a>
                          <a class="btn btn-warning" href="/admin/edit-pemesanan/<?= $p['pemesanan_id'] ?>" role="button"><i class='bx bxs-edit-alt'></i></a>
                          <a class="btn btn-success" href="/admin/detail-pemesanan/<?= $p['pemesanan_id'] ?>" role="button"><i class='bx bx-message-detail' ></i></a>
                          
                        </td>
                      </tr>
                      <?php endforeach; ?>
                      
                    </tbody>
                   
                  </table>
                </div>
              </div>
            </div>
            <script>
              let table = new DataTable('#myTable');
            </script>