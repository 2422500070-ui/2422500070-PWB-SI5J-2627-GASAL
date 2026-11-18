<?php

/** @var array $list_produk */ ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Produk Laptop</h1>
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

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <div class="card-header border-transparent">
              <h3 class="card-title font-weight-bold">Daftar Semua Laptop</h3>
            </div>
            
            <div class="card-body">
              <div class="mb-3">
                <a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-primary">
                  <i class="fas fa-plus"></i> Tambah Laptop
                </a>
              </div>

              <?php if ($this->session->flashdata('message')): ?>
                <?= $this->session->flashdata('message') ?>
              <?php endif ?>

              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Laptop</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Berat (KG)</th>
                    <th>Deskripsi</th>
                    <th style="width: 150px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($list_produk as $produk): ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $produk['pd_nama'] ?></td>
                      <td><?= $produk['kt_nama'] ?></td>
                      <td>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></td>
                      <td><?= $produk['stok'] ?></td>
                      <td><?= isset($produk['berat_kg']) ? $produk['berat_kg'] : '1.00' ?> kg</td>
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