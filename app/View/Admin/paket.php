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
              <!-- <div style="display: flex;justify-content: space-between;margin-bottom: 20px;gap: 50px;">
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
                <a href="/admin/tambah-paket"  class="btn btn-primary d-flex align-items-center">Tambah</a>
              </div> -->
              
              <div class="card " style="margin-top: -16px;" >
                <div class="table-responsive text-nowrap p-3">
                <div class="d-inline-block mb-3">
                <a href="/admin/tambah-paket"  class="btn btn-primary d-flex align-items-center">Tambah</a>
                </div>
                  <table id="myTable" class="table table-hover ">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Menu</th>
                        <th>lama</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($data["dataPaket"] as $d): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['menu'] ?></td>
                        <td><?= $d['lama_hari'] ?></td>
                        <td>    
                          
                          <a class="btn btn-danger" href="/admin/hapus-paket/<?= $d['paket_id'] ?>" onclick="return confirm('Apakah yakin menghapus')" role="button"><i class='bx bx-trash' ></i></a>
                          <a class="btn btn-warning" href="/admin/edit-paket/<?= $d['paket_id'] ?>" role="button"><i class='bx bxs-edit-alt'></i></a>
                          <a class="btn btn-success" href="/admin/detail-paket/<?= $d['paket_id'] ?>" role="button"><i class='bx bx-message-detail' ></i></a>
                     
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