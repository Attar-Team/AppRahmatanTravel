<div class="container-xxl flex-grow-1 container-p-y">

          
              <div class="card " style="margin-top: -16px;" >
                <div class="table-responsive text-nowrap p-3">
                <div class="d-flex mb-3">
                <a href="/admin/data-belum-dibayar"  class="btn d-flex align-items-center">Agen belum dibayar</a>
                <a href="/admin/data-sudah-dibayar"  class="btn btn-primary">Agen sudah dibayar</a>
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
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no = 1;
                      foreach($data['pemesanan'] as $p) : ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $p['status'] ?></td>
                        <td><?= $p['tanggal_pemesanan'] ?></td>
                        <td><?= $p['status'] ?></td>
                        <td><?= $p['jenis_pembayaran'] ?></td>
                        <td><?= $p['total_tagihan'] ?></td>
                        <td><?= $p['sudah_bayar'] ?></td>
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