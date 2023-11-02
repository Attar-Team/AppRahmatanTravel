<div class="container-xxl flex-grow-1 container-p-y">
              <div style="display: flex;justify-content: space-between;margin-bottom: 20px;gap: 50px;">
                <div class="navbar-nav bg-light shadow rounded w-100 align-items-center">
                  <div class="nav-item d-flex w-100 px-4 py-2 align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input
                      type="text"
                      class="form-control border-0 w-100 shadow-none"
                      placeholder="Search..."
                      aria-label="Search..."
                    />
                  </div>
                </div>
                <a href="/admin/tambah-customer" class="btn btn-primary d-flex align-items-center">Tambah</a>
                <!-- <button type="button" data-bs-toggle="modal" data-bs-target="#basicModal" class="btn btn-primary">Tambah</button> -->
              </div>
              
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table text-center table-hover">
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
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['tempat_lahir'] ?></td>
                        <td><?= $d['tanggal_lahir'] ?></td>
                        <td><?= $d['no_telp'] ?></td>
                        <td>
                          <a class="btn btn-danger" href="/admin/hapus-customer/<?= $d['NIK'] ?>" onclick="return confirm('Apakah yakin menghapus')" role="button"><i class='bx bx-trash' ></i></a>
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