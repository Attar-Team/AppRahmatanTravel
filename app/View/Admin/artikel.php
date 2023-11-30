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
                <button type="button" data-bs-toggle="modal" data-bs-target="#ModalTambah" class="btn btn-primary">Tambah</button>
              </div>

              <?php include 'Modal/ModalTambahArtikel.php'?>
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table text-center table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul Artikel</th>
                        <th>Tanggal Posting</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data['dataArtikel'] as $article) : ?>
                      <tr>
                        <td><?= $article['artikel_id'] ?></td>
                        <td><?= $article['judul']?></td>
                        <td><?= $article['tanggal']?></td>
                        <td><img src="/uploads/foto_artikel/<?= $article['foto']?>" width="150px" class="shadow rounded" alt=""></td>
                        <td> <?=substr($article['isi'], 0, 20)?> ...</td>
                        <td>
                        <button class="btn btn-danger" href="/admin/deleteArtikel/<?= $article['artikel_id']?>" role="button"><i class='bx bx-trash' ></i></button>
                          <button type="button"
                          class="btn btn-warning"
                          data-bs-toggle="modal"
                          data-bs-target="#ModalEdit"><i class='bx bxs-edit-alt'></i></button>
                          <button class="btn btn-success" href="" role="button"><i class='bx bx-message-detail' ></i></button>
                        </td>
                      </tr>
                      
                      <?php 
                        include 'Modal/ModalEditArtikel.php';
                      endforeach; ?>

                    </tbody>

                  </table>
                </div>
              </div>
            </div>

            