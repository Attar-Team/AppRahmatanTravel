            <div class="container-xxl flex-grow-1 container-p-y">

              
              <div class="card " style="margin-top: -16px;" >
                <div class="table-responsive text-nowrap p-3">
                <div class="d-inline-block mb-3">
                <button type="button" data-bs-toggle="modal" data-bs-target="#ModalTambahGalery" class="btn btn-primary mb-3">Tambah</button>

                </div>
                  <table id="myTable" class="table table-hover ">
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
<?php include'Modal/ModalTambahGalery.php'; ?>
            <script>
              let table = new DataTable('#myTable');
            </script>

            