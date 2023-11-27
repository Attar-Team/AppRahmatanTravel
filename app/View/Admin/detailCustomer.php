<div class="container-xxl flex-grow-1 container-p-y">
 
        <?php
        foreach($data['dataCustomer'] as $d):
    ?>
<div class="row">
        <div class="col-xl">
            <h5>Data Customer</h5>
        <table class="table table-borderless bg-white">
        <tbody>
            <tr>
                <td>Nama</td>
                <td><?= $d->nama_customer ?></td>
            </tr>
            <tr>
                <td>Tempat , Tanggal Lahir</td>
                <td><?= $d->tempat_lahir ?> , <?= $d->tanggal_lahir ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?= $d->alamat ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><?= $d->jenis_kelamin ?></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td><?= $d->pekerjaan ?></td>
            </tr>
            <tr>
                <td>Ukuran Baju</td>
                <td><?= $d->ukuran_baju ?></td>
            </tr>
            <tr>
                <td>No telepon</td>
                <td><?= $d->no_telp ?></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><img src="/uploads/foto_customer/<?= $d->foto ?>" width="200px" alt=""></td>
            </tr>
        </tbody>

    </table>
        </div>

</div>

<div class="row">
        <div class="col-xl">
            <h5>Data Pasport</h5>
        <table class="table table-borderless bg-white">

        <tbody>
            <tr>
                <td>Nomor Pasport</td>
                <td><?= $d->nomor_pasport ?></td>
            </tr>
            <tr>
                <td>Nama Pasport</td>
                <td><?= $d->nama_pasport ?></td>
            </tr>
            <tr>
                <td>Tempat Penerbitan</td>
                <td><?= $d->tempat_penerbitan ?></td>
            </tr>
            <tr>
                <td>Tanggal Penerbitan</td>
                <td><?= $d->tgl_penerbitan ?></td>
            </tr>
            <tr>
                <td>Foto Pasport</td>
                <td><img src="/uploads/foto_paspor/<?= $d->foto_paspor ?>" width="200px" alt=""></td>
            </tr>
            <tr>
                <td>Foto Pasport Halaman 2</td>
                <td><img src="/uploads/foto_paspor2/<?= $d->foto_paspor_hal2 ?>" width="200px" alt=""></td>
            </tr>
        </tbody>
    </table>
        </div>
   

</div>

<div class="row">
        <div class="col-xl">
            <h5>Data Dokument</h5>
        <table class="table table-borderless bg-white">

        <tbody>
            <tr>
                <td>Foto KTP</td>
                <td><img src="/uploads/foto_paspor/<?= $d->foto_paspor ?>" width="200px" alt=""></td>
            </tr>
            <tr>
                <td>Foto Kartu Keluarga</td>
                <td><img src="/uploads/foto_paspor2/<?= $d->foto_paspor_hal2 ?>" width="200px" alt=""></td>
            </tr>
            <tr>
                <td>Foto Akte Kelahiran</td>
                <td><img src="/uploads/foto_akte/<?= $d->foto_akte_kelahiran ?>" width="200px" alt=""></td>
            </tr>
            <tr>
                <td>Foto BPJS</td>
                <td><img src="/uploads/foto_bpjs/<?= $d->foto_bpjs ?>" width="200px" alt=""></td>
            </tr>
            <tr>
                <td>Foto Buku rekening</td>
                <td><img src="/uploads/foto_rekening/<?= $d->foto_buku_rekening ?>" width="200px" alt=""></td>
            </tr>
            <tr>
                <td>Foto Buku Pernikahan</td>
                <td><img src="/uploads/foto_pernikahan/<?= $d->foto_buku_pernikahan ?>" width="200px" alt=""></td>
            </tr>
        </tbody>
    </table>
        </div>
    <?php endforeach; ?>

</div>

</div>
        
        
</div>