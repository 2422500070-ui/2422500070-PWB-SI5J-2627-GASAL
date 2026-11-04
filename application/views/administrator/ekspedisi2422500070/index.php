<?php

/** @var array $list_ekspedisi */ ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ekspedisi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ekspedisi</li>
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
              <h3 class="card-title font-weight-bold">Data Ekspedisi</h3>
            </div>
            
            <div class="card-body">
              <div class="mb-3">
                <a href="<?= base_url('admin/ekspedisi/tambah') ?>" class="btn btn-primary">
                  <i class="fas fa-plus"></i> Ekspedisi
                </a>
              </div>

              <?php if ($this->session->flashdata('message')): ?>
                <?= $this->session->flashdata('message') ?>
              <?php endif ?>

              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Nama Ekspedisi</th>
                    <th>Jenis Layanan</th>
                    <th>Tarif / KG</th>
                    <th>Status</th>
                    <th width="15%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($list_ekspedisi as $ekspedisi): ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $ekspedisi['nama_ekspedisi070'] ?></td>
                      <td><?= $ekspedisi['jenis_layanan070'] ?></td>
                      <td>Rp <?= number_format($ekspedisi['tarif_per_kg070'], 0, ',', '.') ?></td>
                      <td>
                        <span class="badge <?= ($ekspedisi['status070'] == 'Aktif') ? 'badge-success' : 'badge-secondary' ?>">
                          <?= $ekspedisi['status070'] ?>
                        </span>
                      </td>
                      <td>
                        <a href="<?= base_url('admin/ekspedisi/ubah/' . $ekspedisi['id_ekspedisi070']) ?>" class="badge badge-success">Ubah</a>
                        <a href="<?= base_url('admin/ekspedisi/hapus/' . $ekspedisi['id_ekspedisi070']) ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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