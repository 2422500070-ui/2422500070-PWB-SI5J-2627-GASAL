<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Kategori</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Kategori</li>
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
          <div class="card">
            <div class="card-body">
              <h5 class="card-title font-weight-bold d-block mb-4">Tambah Kategori</h5>

              <form method="post">
                <div class="form-group mb-3">
                  <label for="nama_kategori">Nama Kategori</label>
                  <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" required>
                </div>

                <div class="form-group mb-3">
                  <label for="deskripsi_kategori">Deskripsi</label>
                  <textarea name="deskripsi_kategori" id="deskripsi_kategori" cols="30" rows="5" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url('admin/kategori') ?>" class="btn btn-danger">Kembali</a>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>