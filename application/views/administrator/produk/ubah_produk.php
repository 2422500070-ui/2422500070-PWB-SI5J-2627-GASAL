<?php

/** @var array $produk */
/** @var array $list_kategori */
/** @var Produk_gambar_model $gambar_model */
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ubah Produk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ubah Produk</li>
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
              <h5 class="card-title font-weight-bold d-block mb-4">Ubah Produk</h5>

              <form method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label for="nama_produk">Nama Produk</label>
                  <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= $produk['nama'] ?>" required>
                </div>

                <div class="form-group mb-3">
                  <label for="kategori_produk">Kategori Produk</label>
                  <select class="form-control" name="kategori_produk" id="kategori_produk" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($list_kategori as $kategori): ?>
                      <option value="<?= $kategori['id_kategori'] ?>" <?= ($produk['categori_id'] == $kategori['id_kategori']) ? 'selected' : '' ?>>
                        <?= $kategori['nama'] ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group mb-3">
                  <label for="harga_produk">Harga</label>
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                    <input type="number" name="harga_produk" id="harga_produk" class="form-control" value="<?= $produk['harga'] ?>" required>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="stok_produk">Stok Produk</label>
                  <input type="number" class="form-control" name="stok_produk" id="stok_produk" value="<?= $produk['stok'] ?>" required>
                </div>

                <div class="form-group mb-3">
                  <label for="gambar_produk">Tambah Gambar Produk Baru</label>
                  <input class="form-control-file" type="file" id="gambar_produk" name="gambar_produk[]" multiple>
                </div>

                <!-- TAMPILKAN GAMBAR PRODUK & TOMBOL HAPUS (Solusi Tugas Modul) -->
                <?php $list_gambar = $gambar_model->get_by_produk_id($produk['id_produk']); ?>
                <?php if (!empty($list_gambar)): ?>
                  <div class="row mb-3">
                    <?php foreach ($list_gambar as $gambar): ?>
                      <div class="col-md-3 mb-2">
                        <div class="card p-2 text-center">
                          <img src="<?= base_url('uploads/produk/' . $gambar['nama_gambar']) ?>" class="img-thumbnail style=" max-height: 150px; object-fit: cover;">
                          <a href="<?= base_url('admin/produk/hapus_gambar/' . $gambar['id_gambar'] . '/' . $produk['id_produk']) ?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Hapus gambar ini?')">Hapus</a>
                        </div>
                      </div>
                    <?php endforeach ?>
                  </div>
                <?php endif ?>

                <div class="form-group mb-3">
                  <label for="deskripsi_produk">Deskripsi</label>
                  <textarea name="deskripsi_produk" id="deskripsi_produk" cols="30" rows="5" class="form-control"><?= $produk['deskripsi'] ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?= base_url('admin/produk') ?>" class="btn btn-danger">Kembali</a>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>