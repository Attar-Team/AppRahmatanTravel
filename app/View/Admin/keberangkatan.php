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
    
              
              <div class="card" style="margin-top: -16px;">
                <div class="table-responsive text-nowrap p-3">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#ModalTambahKeberangkatan" class="btn btn-primary mb-3">Tambah</button>
                  <table id="myTable" class="table text-center table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Nama Paket</th>
                        <th>Seats</th>
                        <th>Available Seats</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                        foreach($data['dataKeberangkatan'] as $d):
                      ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $d['tanggal'] ?></td>
                        <td><?= $d['status_keberangkatan'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['seats'] ?></td>
                        <td><?= $d['available_seat'] ?></td>
                        <td>
                        <a class="btn btn-danger" href="/admin/hapus-keberangkatan/<?= $d['keberangkatan_id'] ?>" onclick="return confirm('Apakah yakin menghapus')" role="button"><i class='bx bx-trash' ></i></a>
                          <!-- <a class="btn btn-warning" href="/admin/edit-paket/<?= $d['keberangkatan_id'] ?>" role="button"><i class='bx bxs-edit-alt'></i></a> -->
                          <button type="button" data-bs-toggle="modal" data-bs-target="#ModalEditKeberangkatan<?= $d['keberangkatan_id'] ?>" class="btn btn-warning"><i class='bx bxs-edit-alt'></i></button>
                          <a class="btn btn-success" href="/admin/detail-keberangkatan/<?= $d['keberangkatan_id'] ?>" role="button"><i class='bx bx-message-detail' ></i></a>
                        </td>
                      </tr>
                      <?php 
                      include'Modal/ModalEditKeberangkatan.php';
                      $no++; endforeach; ?>
                      
                    </tbody>
                   
                  </table>
                </div>
              </div>
            </div>
            <script>
              let table = new DataTable('#myTable');
            </script>
            <?php include'Modal/ModalTambahKeberangkatan.php';  ?>