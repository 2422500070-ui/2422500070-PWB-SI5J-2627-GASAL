<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Ekspedisi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Ekspedisi</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">Form Tambah Ekspedisi</h3>
            </div>
            
            <div class="card-body">
              <form method="post">
                <div class="form-group mb-3">
                  <label for="nama_ekspedisi070">Nama Ekspedisi</label>
                  <input type="text" class="form-control" name="nama_ekspedisi070" id="nama_ekspedisi070" placeholder="Contoh: JNE, J&T" required>
                </div>

                <div class="form-group mb-3">
                  <label for="jenis_layanan070">Jenis Layanan</label>
                  <input type="text" class="form-control" name="jenis_layanan070" id="jenis_layanan070" placeholder="Contoh: Reguler, Express" required>
                </div>

                <div class="form-group mb-3">
                  <label for="tarif_per_kg070">Tarif Per KG</label>
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                    <input type="number" class="form-control" name="tarif_per_kg070" id="tarif_per_kg070" placeholder="Contoh: 10000" required>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="status070">Status</label>
                  <select name="status070" id="status070" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                  </select>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url('admin/ekspedisi') ?>" class="btn btn-danger">Kembali</a>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>