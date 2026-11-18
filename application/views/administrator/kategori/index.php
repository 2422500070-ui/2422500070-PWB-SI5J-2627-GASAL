<?php

/** @var array $list_kategori */ ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Kategori Laptop</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kategori</li>
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
              <h3 class="card-title font-weight-bold">Data Kategori Laptop</h3>
            </div>
            
            <div class="card-body">
              <div class="mb-3">
                <a href="<?= base_url('admin/kategori/tambah') ?>" class="btn btn-primary">
                  <i class="fas fa-plus"></i> Kategori
                </a>
              </div>

              <?php if ($this->session->flashdata('message')): ?>
                <?= $this->session->flashdata('message') ?>
              <?php endif ?>

              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th width="15%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($list_kategori as $kategori): ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= isset($kategori['nama_kategori']) ? $kategori['nama_kategori'] : (isset($kategori['nama']) ? $kategori['nama'] : '') ?></td>
                      <td><?= $kategori['deskripsi'] ?></td>
                      <td>
                        <a href="<?= base_url('admin/kategori/ubah/' . $kategori['id_kategori']) ?>" class="badge badge-success">Ubah</a>
                        <a href="<?= base_url('admin/kategori/hapus/' . $kategori['id_kategori']) ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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