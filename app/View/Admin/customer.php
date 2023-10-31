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
                <button type="button" data-bs-toggle="modal" data-bs-target="#basicModal" class="btn btn-primary">Tambah</button>
              </div>
              
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table text-center table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Jenis Kelamin</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Zarif</td>
                        <td>BLitar</td>
                        <td>085942972801</td>
                        <td>Laki - Laki</td>
                        <td>
                        
                          <button type="button" data-bs-toggle="modal" data-bs-target="#updateContact<?= $d['contactId'] ?>" data-bs-whatever="@mdo" class="btn btn-primary">Updated</button>
                          <a class="btn btn-danger" href="/admin/deleteClientAddress/<?= $d['clientId'] ?>" role="button">Deleted</a>
                     
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Zarif</td>
                        <td>BLitar</td>
                        <td>085942972801</td>
                        <td>Laki - Laki</td>
                        <td>
                        
                          <button type="button" data-bs-toggle="modal" data-bs-target="#updateContact<?= $d['contactId'] ?>" data-bs-whatever="@mdo" class="btn btn-primary">Updated</button>
                          <a class="btn btn-danger" href="/admin/deleteClientAddress/<?= $d['clientId'] ?>" role="button">Deleted</a>
                     
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Zarif</td>
                        <td>BLitar</td>
                        <td>085942972801</td>
                        <td>Laki - Laki</td>
                        <td>
                        
                          <button type="button" data-bs-toggle="modal" data-bs-target="#updateContact<?= $d['contactId'] ?>" data-bs-whatever="@mdo" class="btn btn-primary">Updated</button>
                          <a class="btn btn-danger" href="/admin/deleteClientAddress/<?= $d['clientId'] ?>" role="button">Deleted</a>
                        
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Zarif</td>
                        <td>BLitar</td>
                        <td>085942972801</td>
                        <td>Laki - Laki</td>
                        <td>
                        
                          <button type="button" data-bs-toggle="modal" data-bs-target="#updateContact<?= $d['contactId'] ?>" data-bs-whatever="@mdo" class="btn btn-primary">Updated</button>
                          <a class="btn btn-danger" href="/admin/deleteClientAddress/<?= $d['clientId'] ?>" role="button">Deleted</a>
                     
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Zarif</td>
                        <td>BLitar</td>
                        <td>085942972801</td>
                        <td>Laki - Laki</td>
                        <td>
                        
                          <button type="button" data-bs-toggle="modal" data-bs-target="#updateContact<?= $d['contactId'] ?>" data-bs-whatever="@mdo" class="btn btn-primary">Updated</button>
                          <a class="btn btn-danger" href="/admin/deleteClientAddress/<?= $d['clientId'] ?>" role="button">Deleted</a>
                    
                        </td>
                      </tr>
                    </tbody>
                   
                  </table>
                </div>
              </div>
            </div>