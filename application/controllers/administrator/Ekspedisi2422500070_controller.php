<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property Ekspedisi2422500070_model $ekspedisi2422500070_model
 */
class Ekspedisi2422500070_controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_admin_logged_in();
    $this->load->model('ekspedisi2422500070_model');
  }

  public function index()
  {
    $data['title'] = 'Ekspedisi';
    $data['list_ekspedisi'] = $this->ekspedisi2422500070_model->get_all();
    $this->load->view('administrator/templates/header', $data);
    $this->load->view('administrator/templates/sidebar');
    $this->load->view('administrator/ekspedisi2422500070/index', $data);
    $this->load->view('administrator/templates/footer');
  }

  public function tambah_ekspedisi()
  {
    $data['title'] = 'Tambah Ekspedisi';

    $this->form_validation->set_rules('nama_ekspedisi070', 'Nama Ekspedisi', 'required');
    $this->form_validation->set_rules('jenis_layanan070', 'Jenis Layanan', 'required');
    $this->form_validation->set_rules('tarif_per_kg070', 'Tarif Per KG', 'required|numeric');
    $this->form_validation->set_rules('status070', 'Status', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('administrator/templates/header', $data);
      $this->load->view('administrator/templates/sidebar');
      $this->load->view('administrator/ekspedisi2422500070/tambah_ekspedisi');
      $this->load->view('administrator/templates/footer');
    } else {
      $this->_simpan_ekspedisi();
    }
  }

  private function _simpan_ekspedisi()
  {
    $data = [
      'nama_ekspedisi070' => ucwords($this->input->post('nama_ekspedisi070')),
      'jenis_layanan070' => ucwords($this->input->post('jenis_layanan070')),
      'tarif_per_kg070'  => $this->input->post('tarif_per_kg070'),
      'status070'         => $this->input->post('status070')
    ];

    $simpan = $this->ekspedisi2422500070_model->tambah($data);

    if ($simpan) {
      $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil menambahkan ekspedisi!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
    } else {
      $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Gagal menambahkan ekspedisi!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
    }
    redirect('admin/ekspedisi');
  }

  public function hapus_ekspedisi($id)
  {
    $ekspedisi = $this->ekspedisi2422500070_model->get_by_id($id);
    if ($ekspedisi) {
      $hapus = $this->ekspedisi2422500070_model->hapus($id);
      if ($hapus) {
        $this->session->set_flashdata('message', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Berhasil menghapus ekspedisi!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
      } else {
        $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Gagal menghapus ekspedisi!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
      }
    } else {
      $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Ekspedisi tidak ditemukan!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
    }
    redirect('admin/ekspedisi');
  }

  public function ubah_ekspedisi($id)
  {
    $ekspedisi = $this->ekspedisi2422500070_model->get_by_id($id);
    if ($ekspedisi) {
      $this->form_validation->set_rules('nama_ekspedisi070', 'Nama Ekspedisi', 'required');
      $this->form_validation->set_rules('jenis_layanan070', 'Jenis Layanan', 'required');
      $this->form_validation->set_rules('tarif_per_kg070', 'Tarif Per KG', 'required|numeric');
      $this->form_validation->set_rules('status070', 'Status', 'required');

      if ($this->form_validation->run() == FALSE) {
        $data['title'] = 'Ubah Ekspedisi';
        $data['ekspedisi'] = $ekspedisi;
        $this->load->view('administrator/templates/header', $data);
        $this->load->view('administrator/templates/sidebar');
        $this->load->view('administrator/ekspedisi2422500070/ubah_ekspedisi', $data);
        $this->load->view('administrator/templates/footer');
      } else {
        $this->_ubah_ekspedisi($id);
      }
    } else {
      $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Ekspedisi tidak ditemukan!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
      redirect('admin/ekspedisi');
    }
  }

  private function _ubah_ekspedisi($id)
  {
    $data = [
      'nama_ekspedisi070' => ucwords($this->input->post('nama_ekspedisi070')),
      'jenis_layanan070' => ucwords($this->input->post('jenis_layanan070')),
      'tarif_per_kg070'  => $this->input->post('tarif_per_kg070'),
      'status070'         => $this->input->post('status070')
    ];

    $ubah = $this->ekspedisi2422500070_model->ubah($data, $id);

    if ($ubah) {
      $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil mengubah ekspedisi!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
    } else {
      $this->session->set_flashdata('message', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Gagal mengubah ekspedisi!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
    }
    redirect('admin/ekspedisi');
  }
}