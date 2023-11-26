<div class="modal fade" id="ModalDetailPembayaran<?= $d['detail_pemesanan_id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <input type="hidden" name="detail_pemesanan_id" value="<?= $d['detail_pemesanan_id'] ?>">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Detail Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <ul class="d-flex" style="list-style: none;gap: 15px;">
                <li style="width: 130px;">Pemesanan id</li>
                <li>: <?= $d['pemesanan_id'] ?></li>
            </ul>  
            
            <ul class="d-flex" style="list-style: none;gap: 15px;">
                <li style="width: 130px;">Jumlah Bayar</li>
                <li>: <?= $d['sudah_bayar'] ?></li>
            </ul>   
            
            <ul class="d-flex" style="list-style: none;gap: 15px;">
                <li style="width: 130px;">Status</li>
                <li>: <?= $d['status_verivikasi'] ?></li>
            </ul>  
            <ul class="d-flex" style="list-style: none;gap: 15px;">
                <li style="width: 130px;">Tanggal</li>
                <li>: <?= $d['tanggal_pemesanan'] ?></li>
            </ul>  
            <ul class="d-flex" style="list-style: none;gap: 15px;">
                <li style="width: 130px;">Catatan</li>
                <li>: <?= $d['catatan'] ?></li>
            </ul>  
            <ul class="d-flex" style="list-style: none;gap: 15px;">
                <li style="width: 130px;">Foto Bukti</li>
                <li><img src="/uploads/foto_bukti/<?= $d['foto_bukti'] ?>" class="shadow rounded" width="200px" alt=""></li>
            </ul>  
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>