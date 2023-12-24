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
                <div class="d-inline-block mb-3">
                <!-- <button type="button" data-bs-toggle="modal" data-bs-target="#ModalTambahGalery" class="btn btn-primary mb-3">Tambah</button> -->
                <a href="/admin/tambah-agen"  class="btn btn-primary d-flex align-items-center">Tambah</a>
                </div>
                <table id="myTable" class="table text-center table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kode Referal</th>
                        <th>Alamat</th>
                        <th>No telpon</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // var_dump($data);
                        // die();
                        foreach($data['dataAgen'] as $d): ?>
                      <tr>
                        <td>1</td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['alamat'] ?></td>
                        <td><?= $d['notelp'] ?></td>
                        <td><?= $d['jenis_kelamin'] ?></td>
                        <td>
                          <a class="btn btn-danger" href="/admin/hapus-customer/<?= $d['NIK'] ?>" onclick="return confirm('Apakah yakin menghapus')" role="button"><i class='bx bx-trash' ></i></a>
                          <a class="btn btn-warning" href="/admin/edit-agen/<?= $d['NIK'] ?>" role="button"><i class='bx bxs-edit-alt'></i></a>
                          <!-- <a class="btn btn-success" href="/admin/detail-customer/<?= $d['NIK'] ?>" role="button"><i class='bx bx-message-detail' ></i></a> -->
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
