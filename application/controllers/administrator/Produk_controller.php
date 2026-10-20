<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Upload $upload
 * @property Produk_model $produk_model
 * @property Produk_kategori_model $produk_kategori_model
 * @property Produk_gambar_model $produk_gambar_model
 */
class Produk_controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_admin_logged_in();
    $this->load->model('produk_model');
    $this->load->model('produk_kategori_model');
    $this->load->model('produk_gambar_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Daftar Produk';
    $data['list_produk'] = $this->produk_model->get_all();
    $this->load->view('administrator/templates/header', $data);
    $this->load->view('administrator/templates/sidebar');
    $this->load->view('administrator/produk/index', $data);
    $this->load->view('administrator/templates/footer');
  }

  public function tambah_produk()
  {
    $data['title'] = 'Tambah Produk';
    $this->form_validation->set_rules('nama_produk', 'Nama produk', 'required');
    $this->form_validation->set_rules('kategori_produk', 'Kategori', 'required');

    if ($this->form_validation->run() == FALSE) {
      $data['list_kategori'] = $this->produk_kategori_model->get_all();
      $this->load->view('administrator/templates/header', $data);
      $this->load->view('administrator/templates/sidebar');
      $this->load->view('administrator/produk/tambah_produk', $data);
      $this->load->view('administrator/templates/footer');
    } else {
      $this->_simpan_produk();
    }
  }

  private function _simpan_produk()
  {
    $data = [
      'nama'        => ucwords($this->input->post('nama_produk')),
      'categori_id' => $this->input->post('kategori_produk'),
      'harga'       => $this->input->post('harga_produk'),
      'stok'        => $this->input->post('stok_produk'),
      'deskripsi'   => ucfirst($this->input->post('deskripsi_produk'))
    ];

    $id_produk = $this->produk_model->tambah($data);

    if (!empty($_FILES['gambar_produk']['name'][0])) {
      $count = count($_FILES['gambar_produk']['name']);
      $this->_produk_gambar_upload($count, $id_produk);
    }

    $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil menambahkan produk!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

    redirect('admin/produk');
  }

  private function _produk_gambar_upload($count, $id_produk)
  {
    for ($i = 0; $i < $count; $i++) {
      if (!empty($_FILES['gambar_produk']['name'][$i])) {
        $_FILES['file']['name']     = $_FILES['gambar_produk']['name'][$i];
        $_FILES['file']['type']     = $_FILES['gambar_produk']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['gambar_produk']['tmp_name'][$i];
        $_FILES['file']['error']    = $_FILES['gambar_produk']['error'][$i];
        $_FILES['file']['size']     = $_FILES['gambar_produk']['size'][$i];

        $config['upload_path']   = './uploads/produk/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']      = '5000';
        $config['file_name']     = 'produk-' . $id_produk . '-' . time() . '-' . $i;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
          $uploadData = $this->upload->data();
          $filename   = $uploadData['file_name'];
          $data = [
            'nama_gambar' => $filename,
            'produk_id'   => $id_produk
          ];
          $this->produk_gambar_model->tambah($data);
        }
      }
    }
  }

  public function ubah_produk($id)
  {
    $produk = $this->produk_model->get_by_id($id);
    if ($produk) {
      $this->form_validation->set_rules('nama_produk', 'Nama produk', 'required');
      $this->form_validation->set_rules('kategori_produk', 'Kategori', 'required');

      if ($this->form_validation->run() == FALSE) {
        $data['title']         = 'Ubah Produk';
        $data['produk']        = $produk;
        $data['list_kategori'] = $this->produk_kategori_model->get_all();
        $data['gambar_model']  = $this->produk_gambar_model;
        $this->load->view('administrator/templates/header', $data);
        $this->load->view('administrator/templates/sidebar');
        $this->load->view('administrator/produk/ubah_produk', $data);
        $this->load->view('administrator/templates/footer');
      } else {
        $this->_ubah_produk($id);
      }
    } else {
      $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Produk tidak ditemukan!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
      redirect('admin/produk');
    }
  }

  private function _ubah_produk($id)
  {
    $data = [
      'nama'        => ucwords($this->input->post('nama_produk')),
      'categori_id' => $this->input->post('kategori_produk'),
      'harga'       => $this->input->post('harga_produk'),
      'stok'        => $this->input->post('stok_produk'),
      'deskripsi'   => ucfirst($this->input->post('deskripsi_produk'))
    ];

    $this->produk_model->ubah($data, $id);

    // FITUR TAMBAHAN TUGAS: Upload gambar baru saat ubah produk
    if (!empty($_FILES['gambar_produk']['name'][0])) {
      $count = count($_FILES['gambar_produk']['name']);
      $this->_produk_gambar_upload($count, $id);
    }

    $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil mengubah produk!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

    redirect('admin/produk');
  }

  public function hapus_gambar($id_gambar, $id_produk)
  {
    $gambar = $this->produk_gambar_model->get_by_id($id_gambar);
    if ($gambar) {
      $path = './uploads/produk/' . $gambar['nama_gambar'];
      if (file_exists($path)) {
        unlink($path);
      }
      $this->produk_gambar_model->hapus($id_gambar);
    }
    redirect('admin/produk/ubah/' . $id_produk);
  }

  public function hapus_produk($id)
  {
    $produk = $this->produk_model->get_by_id($id);
    if ($produk) {
      $list_gambar = $this->produk_gambar_model->get_by_produk_id($id);
      foreach ($list_gambar as $gambar) {
        $path = './uploads/produk/' . $gambar['nama_gambar'];
        if (file_exists($path)) {
          unlink($path);
        }
        $this->produk_gambar_model->hapus($gambar['id_gambar']);
      }
      $this->produk_model->hapus($id);
      $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil menghapus produk!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
    }
    redirect('admin/produk');
  }
}
