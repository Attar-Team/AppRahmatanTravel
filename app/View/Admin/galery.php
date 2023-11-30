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
                <button type="button" data-bs-toggle="modal" data-bs-target="#ModalTambahGalery" class="btn btn-primary mb-3">Tambah</button>

                </div>
                  <table id="myTable" class="table table-hover ">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Foto</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($data["galery"] as $d): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['judul'] ?></td>
                        <td><img src="/uploads/foto_galery/<?= $d['foto'] ?>" class="shadow rounded" width="150px" alt=""></td>
                        <td>
                        <a class="btn btn-danger" href="/admin/hapus-keberangkatan/<?= $d['galery_id'] ?>" onclick="return confirm('Apakah yakin menghapus')" role="button"><i class='bx bx-trash' ></i></a>
                          <button type="button" data-bs-toggle="modal" data-bs-target="#ModalEditGalery<?= $d['galery_id'] ?>" class="btn btn-warning"><i class='bx bxs-edit-alt'></i></button>
                        </td>
                      </tr>
                      <?php
                    endforeach; ?>
                      
                    </tbody>
                   
                  </table>
                </div>
              </div>
            </div>
<?php include'Modal/ModalTambahGalery.php'; ?>
            <script>
              let table = new DataTable('#myTable');
            </script>