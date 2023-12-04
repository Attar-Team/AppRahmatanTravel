<div class="container-xxl flex-grow-1 container-p-y">

    <?php
    if(isset($data['success'])){ ?>
          <div class="alert alert-success alert-dismissible" role="alert">
                        <?= $data['success'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
    <?php } ?>
              
              <div class="card" style="margin-top: -16px;">
                <div class="table-responsive text-nowrap p-3">
                <div class="d-inline-block mb-3">
                <a href="/admin/tambah-customer"  class="btn btn-primary d-flex align-items-center">Tambah</a>
                </div>
                  <table id="myTable" class="table text-center table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>No Telepon</th>
                        <th>Foto</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                       foreach($data['dataCustomer'] as $d):
                        ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $d['nama_customer'] ?></td>
                        <td><?= $d['tempat_lahir'] ?></td>
                        <td><?= $d['tanggal_lahir'] ?></td>
                        <td><?= $d['no_telp'] ?></td>
                        <td>
                          <a class="btn btn-danger" href="/admin/hapus-customer/<?= $d['NIK'] ?>/admin" onclick="return confirm('Apakah yakin menghapus')" role="button"><i class='bx bx-trash' ></i></a>
                          <a class="btn btn-warning" href="/admin/edit-customer/<?= $d['NIK'] ?>" role="button"><i class='bx bxs-edit-alt'></i></a>
                          <a class="btn btn-success" href="/admin/detail-customer/<?= $d['NIK'] ?>" role="button"><i class='bx bx-message-detail' ></i></a>
                        </td>
                      </tr>
                      <?php $no++; endforeach; ?>
                    </tbody>
                   
                  </table>
                </div>
              </div>
            </div>

            <script>
              let table = new DataTable('#myTable');
            </script>