<div class="container-xxl flex-grow-1 container-p-y">

<div class="nav-align-top mb-4">
    <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">
                Detail Keberangkatan
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">
                Detail Paket
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="false">
                Pemesan
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
        <div class="row">
        <div class="col-xl">
            <h5>Data Customer</h5>
            <?php
        foreach($data['dataKeberangkatan'] as $d):
    ?>
            <table class="table table-borderless bg-white">
                <tbody>
                    <tr>
                        <td>Tanggal Keberangkatan</td>
                        <td><?= $d->tanggal ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Ditutup</td>
                        <td><?= $d->tanggal_ditutup ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?= $d->status_keberangkatan ?></td>
                    </tr>
                    <tr>
                        <td>Seats</td>
                        <td><?= $d->seats ?></td>
                    </tr>
                </tbody>

            </table>
            <?php endforeach; ?>
        </div>

    </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
        <div class="row">
        <div class="col-xl">
            <h5>Data Customer</h5>
            <?php
        foreach($data['dataPaket'] as $p):
            $termasukHarga = explode(",", $p->termasuk_harga);
            $tidakTermasukHarga = explode(",", $p->tidak_termasuk_harga);
            $keunggulan = explode(",", $p->keunggulan);
    ?>
            <table class="table table-borderless bg-white">
                <tbody>
                    <tr>
                        <td>Nama Paket</td>
                        <td><?= $p->nama ?></td>
                    </tr>
                    <tr>
                        <td>Menu</td>
                        <td><?= $p->menu ?></td>
                    </tr>
                    <tr>
                        <td>Lama Hari</td>
                        <td><?= $p->lama_hari ?></td>
                    </tr>
                    <tr>
                        <td>Minim DP</td>
                        <td><?= $p->minim_dp ?></td>
                    </tr>
                    <tr>
                        <td>Maskapai</td>
                        <td><?= $p->maskapai ?></td>
                    </tr>
                    <tr>
                        <td>Termasuk Harga</td>
                        <td>
                        <?php foreach($termasukHarga as $t){
                        echo "- ". $t ."<br>";
                    } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tidak Termasuk Harga</td>
                        <td>
                        <?php foreach($tidakTermasukHarga as $t){
                        echo "- ". $t ."<br>";
                    } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Keunggulan</td>
                        <td>
                        <?php foreach($keunggulan as $t){
                        echo "- ". $t ."<br>";
                    } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Foto brosur</td>
                        <td><img src="/uploads/foto_brosur/<?= $p->foto_brosur ?>" width="200px" alt=""></td>
                    </tr>
                </tbody>

            </table>
            <?php endforeach; ?>
        </div>

    </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
            <p>
                Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
                cupcake gummi bears cake chocolate.
            </p>
            <p class="mb-0">
                Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet
                roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
                jelly-o tart brownie jelly.
            </p>
        </div>
    </div>
</div>

</div>