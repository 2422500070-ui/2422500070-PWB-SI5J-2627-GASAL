<?php

/** @var array $list_produk */ ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Produk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Produk</li>
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
              <h5 class="card-title font-weight-bold d-block mb-3">Semua Produk</h5>
              <div class="mb-3">
                <a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-primary">
                  <i class="fa fa-plus"></i> Produk
                </a>
              </div>

              <?php if ($this->session->flashdata('message')): ?>
                <?= $this->session->flashdata('message') ?>
              <?php endif ?>

              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th width="15%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($list_produk as $produk): ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $produk['pd_nama'] ?></td>
                      <td><?= $produk['kt_nama'] ?></td>
                      <td>Rp. <?= number_format($produk['harga']) ?></td>
                      <td><?= $produk['stok'] ?></td>
                      <td><?= $produk['deskripsi'] ?></td>
                      <td>
                        <a href="<?= base_url('admin/produk/ubah/' . $produk['id_produk']) ?>" class="badge badge-success">Ubah</a>
                        <a href="<?= base_url('admin/produk/hapus/' . $produk['id_produk']) ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                      </td>
                    </tr>
                  <?php $no++;
                  endforeach ?>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>