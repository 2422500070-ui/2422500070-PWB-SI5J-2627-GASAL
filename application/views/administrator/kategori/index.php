<?php

/** @var array $list_kategori */ ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Kategori</h1>
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
          <div class="card">
            <div class="card-body">
              <h5 class="card-title font-weight-bold d-block mb-3">Kategori</h5>

              <div class="mb-3">
                <a href="<?= base_url('admin/kategori/tambah') ?>" class="btn btn-primary">
                  <i class="fa fa-plus"></i> Kategori
                </a>
              </div>

              <?php if ($this->session->flashdata('message')): ?>
                <?= $this->session->flashdata('message') ?>
              <?php endif ?>

              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th width="15%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($list_kategori as $kategori): ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $kategori['nama'] ?></td>
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