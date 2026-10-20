<?php /** @var array $list_kategori */ ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"><h1 class="m-0">Tambah Produk</h1></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Produk</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title font-weight-bold d-block mb-4">Tambah Produk</h5>

              <form method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label for="nama_produk">Nama Produk</label>
                  <input type="text" class="form-control" name="nama_produk" id="nama_produk" required>
                  <small class="text-danger"><?= form_error('nama_produk') ?></small>
                </div>

                <div class="form-group mb-3">
                  <label for="kategori_produk">Kategori Produk</label>
                  <select class="form-control" name="kategori_produk" id="kategori_produk" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($list_kategori as $kategori): ?>
                      <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama'] ?></option>
                    <?php endforeach ?>
                  </select>
                  <small class="text-danger"><?= form_error('kategori_produk') ?></small>
                </div>

                <div class="form-group mb-3">
                  <label for="harga_produk">Harga</label>
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                    <input type="number" name="harga_produk" id="harga_produk" class="form-control" required>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="stok_produk">Stok Produk</label>
                  <input type="number" class="form-control" name="stok_produk" id="stok_produk" required>
                </div>

                <div class="form-group mb-3">
                  <label for="gambar_produk">Gambar Produk (Bisa Pilih Banyak)</label>
                  <input class="form-control-file" type="file" id="gambar_produk" name="gambar_produk[]" multiple>
                </div>

                <div class="form-group mb-3">
                  <label for="deskripsi_produk">Deskripsi</label>
                  <textarea name="deskripsi_produk" id="deskripsi_produk" cols="30" rows="5" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url('admin/produk') ?>" class="btn btn-danger">Kembali</a>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>