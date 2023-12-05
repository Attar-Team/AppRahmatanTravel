<div class="container-xxl flex-grow-1 container-p-y">

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
                  <form method="POST" action="/admin/cetak-laporan">
                <div class="d-flex mb-3" style="align-items: center;">
                <div class="mb-3">
                        <label for="html5-date-input" class=" col-form-label">Tanggal Awal</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="tanggal_awal" id="html5-date-input" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="html5-date-input" class=" col-form-label">Tanggal Akhir</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="tanggal_akhir" id="html5-date-input" />
                        </div>
                    </div>
                <div class="d-inline-block">
                <button type="submit" class="btn btn-primary align-items-center">Cetak Laporan</button>
                </div>
                </form>
                </div>
                  <table id="myTable" class="table table-hover ">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Kurang bayar</th>
                        <th>Total Harga</th>
                        <th>Pemasukan</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php

use Attar\App\Rahmatan\Travel\Util\FormatRupiah;

                        $no = 1;
                        foreach($data["pemesanan"] as $d):
                        $kurangBayar = $d['total_tagihan'] -  $d['sudah_bayar'];
                        ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['tanggal_pemesanan'] ?></td>
                        <td><?= $d['status'] ?></td>
                        <td><?= FormatRupiah::Rupiah($kurangBayar) ?></td>
                        <td><?= FormatRupiah::Rupiah($d['total_tagihan']) ?></td>
                        <td><?= FormatRupiah::Rupiah($d['sudah_bayar']) ?></td>
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