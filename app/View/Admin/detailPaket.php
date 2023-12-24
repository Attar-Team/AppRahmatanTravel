<div class="container-xxl flex-grow-1 container-p-y">
 
<div class="row">
        <div class="col-xl">
            <h5>Paket</h5>
        <table class="table table-borderless bg-white">
        <?php
        foreach($data['dataPaket'] as $d):
            $termasukHarga = explode(",", $d['termasuk_harga']);
            $tidakTermasukHarga = explode(",", $d['tidak_termasuk_harga']);
            $keunggulan = explode(",", $d['keunggulan']);
    ?>
        <tbody>
            <tr>
                <td>Nama Paket</td>
                <td><?= $d['nama'] ?></td>
            </tr>
            <tr>
                <td>Menu</td>
                <td><?= $d['menu'] ?></td>
            </tr>
            <tr>
                <td>Durasi</td>
                <td><?= $d['lama_hari'] ?></td>
            </tr>
            <tr>
                <td>Minim DP</td>
                <td><?= $d['minim_dp'] ?></td>
            </tr>
            <tr>
                <td>Maskapai</td>
                <td><?= $d['maskapai'] ?></td>
            </tr>
            <tr>
                <td>Maskapai</td>
                <td><?= $d['maskapai'] ?></td>
            </tr>
            <tr>
                <td>Termasuk harga</td>
                <td>
                    <?php foreach($termasukHarga as $t){
                        echo "- ". $t ."<br>";
                    } ?>

                </td>
            </tr>
            <tr>
                <td>Tidak termasuk harga</td>
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
                <td>Foto</td>
                <td><img src="/uploads/foto_brosur/<?= $d['foto_brosur'] ?>" width="200px" alt=""></td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
        </div>
        <div class="col-xl">
        <h5>Jenis Harga</h5>
        <?php
        $no = 1;
        foreach($data['dataHarga'] as $d):
    ?>
   <div class="bg-white">

   <table class="table table-borderless bg-white">
    <thead>
        <tr>
            <th>Jenis <?= $no ?></th>
        </tr>
    </thead>
 <tbody>
     <tr>
         <td>Nama Jenis</td>
         <td><?= $d['nama_jenis'] ?></td>
     </tr>
     <tr>
         <td>Diskon</td>
         <td><?= $d['diskon'] ?></td>
     </tr>
     <tr>
         <td>Harga</td>
         <td><?= $d['harga'] ?></td>
     </tr>


 </tbody>
</table>
   </div>
        
    <?php endforeach; ?>
        </div>
</div>

<div class="row">
    <?php foreach($data['dataHotel']as $h):  ?>
<div class="col-xl">
            <h5>Paket</h5>
        <table class="table table-borderless bg-white">
        <tbody>
            <tr>
                <td>Nama hotel</td>
                <td><?= $h['nama_hotel'] ?></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td><?= $h['lokasi'] ?></td>
            </tr>
            <tr>
                <td>Bintang</td>
                <td><?= $h['bintang'] ?></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><?= $h['deskripsi'] ?></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><img src="/uploads/foto_hotel/<?= $h['foto_hotel'] ?>" width="200px" alt=""></td>
            </tr>
        </tbody>
    </table>
        </div>
        <?php endforeach; ?>
</div>


</div>
        
        
</div>