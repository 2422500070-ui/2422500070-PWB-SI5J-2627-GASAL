<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property Produk_kategori_model $produk_kategori_model
 */
class Kategori_controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_admin_logged_in();
    $this->load->model('produk_kategori_model');
  }

  public function index()
  {
    $data['title'] = 'Kategori';
    $data['list_kategori'] = $this->produk_kategori_model->get_all();
    $this->load->view('administrator/templates/header', $data);
    $this->load->view('administrator/templates/sidebar');
    $this->load->view('administrator/kategori/index', $data);
    $this->load->view('administrator/templates/footer');
  }

  public function tambah_kategori()
  {
    $data['title'] = 'Tambah Kategori';

    $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('administrator/templates/header', $data);
      $this->load->view('administrator/templates/sidebar');
      $this->load->view('administrator/kategori/tambah_kategori');
      $this->load->view('administrator/templates/footer');
    } else {
      $this->_simpan_kategori();
    }
  }

  private function _simpan_kategori()
  {
    $data = [
      'nama'      => ucwords($this->input->post('nama_kategori')),
      'deskripsi' => ucfirst($this->input->post('deskripsi_kategori'))
    ];

    $simpan = $this->produk_kategori_model->tambah($data);

    if ($simpan) {
      $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil menambahkan kategori!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
    } else {
      $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Gagal menambahkan kategori!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
    }
    redirect('admin/kategori');
  }

  public function hapus_kategori($id)
  {
    $kategori = $this->produk_kategori_model->get_by_id($id);
    if ($kategori) {
      $hapus = $this->produk_kategori_model->hapus($id);
      if ($hapus) {
        $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Berhasil menghapus kategori!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
      } else {
        $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Gagal menghapus kategori!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
      }
    } else {
      $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Kategori tidak ditemukan!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
    }
    redirect('admin/kategori');
  }

  public function ubah_kategori($id)
  {
    $kategori = $this->produk_kategori_model->get_by_id($id);
    if ($kategori) {
      $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

      if ($this->form_validation->run() == FALSE) {
        $data['title'] = 'Ubah Kategori';
        $data['kategori'] = $kategori;
        $this->load->view('administrator/templates/header', $data);
        $this->load->view('administrator/templates/sidebar');
        $this->load->view('administrator/kategori/ubah_kategori', $data);
        $this->load->view('administrator/templates/footer');
      } else {
        $this->_ubah_kategori($id);
      }
    } else {
      $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Kategori tidak ditemukan!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
      redirect('admin/kategori');
    }
  }

  private function _ubah_kategori($id)
  {
    $data = [
      'nama'      => ucwords($this->input->post('nama_kategori')),
      'deskripsi' => ucfirst($this->input->post('deskripsi_kategori'))
    ];

    $ubah = $this->produk_kategori_model->ubah($data, $id);

    if ($ubah) {
      $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil mengubah kategori!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
    } else {
      $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Gagal mengubah kategori!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
    }
    redirect('admin/kategori');
  }
}
