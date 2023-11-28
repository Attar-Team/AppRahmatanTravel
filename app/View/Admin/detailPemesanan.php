<div class="container-xxl flex-grow-1 container-p-y">
 
<div class="row">
        <div class="col-xl">
            <h5>Paket</h5>
            <h5>Data Jamaah</h5>
            <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Paket</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach($data['detailCustomerPemesanan'] as $d) : ?>
                    <tr>
                        <td><?= $d['nama_customer'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['harga'] ?></td>
                        <td><?= $d['diskon'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                  
            <?php
        foreach($data['keberangkatan'] as $d):
    ?>
<h3>Keberangkatan</h3>
            <table class="table table-borderless bg-white">
                <tbody>
                    <tr>
                        <td>Tanggal Keberangkatan</td>
                        <td><?= $d['tanggal'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Ditutup</td>
                        <td><?= $d['tanggal_ditutup'] ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?= $d['status'] ?></td>
                    </tr>
                    <tr>
                        <td>Seats</td>
                        <td><?= $d['seats'] ?></td>
                    </tr>
                </tbody>

            </table>
            <?php endforeach; ?>

            
            <?php
        foreach($data['pemesanan'] as $d):
    ?>
<h3>Pemesanan</h3>
            <table class="table table-borderless bg-white">
                <tbody>
                    <tr>
                        <td>Jenis Pembayaran</td>
                        <td><?= $d['jenis_pembayaran'] ?></td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td><?= $d['status'] ?></td>
                    </tr>

                    <tr>
                        <td>Tanggal Pemesanan</td>
                        <td><?= $d['tanggal_pemesanan'] ?></td>
                    </tr>

                    <tr>
                        <td>Catatan</td>
                        <td><?= $d['catatan_pemesanan'] ?></td>
                    </tr>

                    <tr>
                        <td>Sudah Bayar</td>
                        <td><?= $d['sudah_bayar'] ?></td>
                    </tr>

                    <tr>
                        <td>Total Tagihan</td>
                        <td><?= $d['total_tagihan'] ?></td>
                    </tr>

                </tbody>

            </table>
            <?php endforeach; ?>
        </div>

</div>
</div>
