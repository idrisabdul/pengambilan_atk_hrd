<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <buttoan class="btn btn-md btn-rounded btn-primary mr-2" onclick="add()"><i class="fas fa-plus mr-1"></i>Masukkan ATK</buttoan>
                    <a href="<?= base_url('Ambil_atk/pilihAtk') ?>" class="btn btn-md btn-rounded btn-success"><i class="fas fa-hands mr-1"></i>Ajukan Pengambilan ATK</a>
                </div>
                <h4 class="page-title">Dashboard</h4>
                <?= $this->session->flashdata('message') ?>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-3 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fe-box font-22 avatar-title text-primary"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1"><span data-plugin="counterup"><?= count($stok_atk) ?></span></h3>
                            <p class="text-muted mb-1 text-truncate">ATK Masuk</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-3 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <a href="<?= base_url('Ambil_atk') ?>">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="fe-archive font-22 avatar-title text-info"></i>
                            </div>
                        </a>
                        <!-- <a href="#">
                            <div class="avatar-lg rounded-circle bg-soft-white border-white border">
                                <i class="fe-plus font-22 avatar-title text-white"></i>
                            </div>
                        </a> -->
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $ambil_atk ?></span></h3>
                            <p class="text-muted mb-1 text-truncate">Ambil ATK</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
        <div class="col-lg-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <a href="<?= base_url('Retur/AtkRusak') ?>">
                            <div class="avatar-lg rounded-circle bg-soft-danger border-warning border">
                                <i class="fe-alert-circle font-22 avatar-title text-danger"></i>
                            </div>
                        </a>
                        <!-- <a href="#">
                            <div class="avatar-lg rounded-circle bg-soft-white border-white border">
                                <i class="fe-plus font-22 avatar-title text-white"></i>
                            </div>
                        </a> -->
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $total_retur ?></span></h3>
                            <p class="text-muted mb-1 text-truncate">Data Retur</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div>

        <div class="col-md-3 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fe-user font-22 avatar-title text-success"></i>
                        </div>
                        <!-- <a href="#">
                            <div class="avatar-lg rounded-circle bg-soft-white border-white border">
                                <i class="fe-plus font-22 avatar-title text-white"></i>
                            </div>
                        </a> -->
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span><?= ucfirst($this->session->userdata('userlogin')) ?></span></h3>
                            <p class="text-muted mb-1 text-truncate">USER</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->


    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box pb-2">
                <div class="float-right d-none d-md-inline-block">
                </div>

                <h4 class="header-title mb-3">Barang ATK Yang Tersedia</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-sm table-hover" id="basic-datatable">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kode Input ATK</th>
                                <th>Kategori</th>
                                <th>Satuan</th>
                                <th>Jumlah Stok</th>
                                <th>Tgl Masuk ATK</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($stok_atk as $sa) { ?>
                                <?php $nm_atk = $sa['kd_inputatk']; ?>
                                <?php
                                $query = "SELECT SUM(qty) as qtyatk from tb_barang where kd_inputatk='$nm_atk'";
                                $qry = $this->db->query($query)->result_array();

                                foreach ($qry as $data) {
                                    $qtyatk = $data['qtyatk'];
                                }

                                $row = "SELECT SUM(qty) as qtyambil  FROM tb_detail_ambilatk where kd_inputatk='$nm_atk'";
                                $row1 = "SELECT SUM(qty_rusak) as qtyambil_rusak  FROM tb_atk_rusak where kd_inputatk='$nm_atk'";

                                $result2 = $this->db->query($row)->result_array();
                                foreach ($result2 as $row2) {
                                    $qtyambil = $row2['qtyambil'];
                                }
                                $result3 = $this->db->query($row1)->result_array();
                                foreach ($result3 as $row3) {
                                    $qtyambilrusak = $row3['qtyambil_rusak'];
                                }
                                $qtytotal = $qtyambilrusak + $qtyambil;
                                $saldo = $qtyatk - $qtytotal;

                                if ($saldo > 0) :
                                ?>

                                    <tr>
                                        <td>
                                            <?= $no++; ?>
                                        </td>
                                        <td>
                                            <h5 class="m-0 font-weight-normal"><?= $sa['nm_barang'] ?></h5>
                                        </td>

                                        <td>
                                            <?= $sa['kd_barang'] ?>
                                        </td>

                                        <td>
                                            <?= $sa['kat_barang'] ?>
                                        </td>
                                        <td>
                                            <?= $sa['satuan'] ?>
                                        </td>

                                        <td>
                                            <?= $saldo ?>
                                        </td>

                                        <td>
                                            <?= $sa['tgl_masuk_barang'] ?>
                                        </td>
                                        <!-- 
                                        <td>
                                            <?= anchor('Ambil_atk/getAtk/' . $sa['id_barang'], '<button href="#" class="btn btn-xs btn-success"><i class="mdi mdi-plus"></i>Permintaan ATK</button>') ?>
                                        </td> -->
                                    </tr>
                                <?php endif; ?>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->

    </div> <!-- end card-box -->



    <!-- ADD ITEM MODAL -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">Tambah ATK</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Atk/addAtk') ?>" method="POST">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="">Nama PT</label>
                                <select name="nama_pt" class="form-control" required>
                                    <option value="" selected disabled>- Select PT - </option>
                                    <?php foreach ($pt as $p) : ?>
                                        <option value="<?= $p['alias'] ?>"><?= $p['alias'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <label for="">Nama ATK</label>
                                <div class="form-group">
                                    <input type="text" name="nama_bar" class="form-control" placeholder="Nama Barang" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Kode ATK</label>
                                <select name="kd_atk" class="form-control" required>
                                    <option value="" selected disabled>- Select Kode ATK - </option>
                                    <?php foreach ($kodeatk as $ka) : ?>
                                        <option value="<?= $ka['kode_atk'] ?>"><?= $ka['kode_atk'] ?> - <?= $ka['nm_barang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix mb-1">
                            <div class="col-sm-6">
                                <label for="">Kategori</label>
                                <select name="kat_bar" class="form-control" required>
                                    <option value="" selected disabled>- Select Kategori - </option>
                                    <?php foreach ($kategori as $kat) : ?>
                                        <option value="<?= $kat['nm_kategori'] ?>"><?= $kat['nm_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Satuan</label>
                                <select name="sat" class="form-control" required>
                                    <option value="" selected disabled>- Select Satuan - </option>
                                    <?php foreach ($sat as $s) : ?>
                                        <option value="<?= $s['satuan'] ?>"><?= $s['satuan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <label for="">Harga</label>
                                <div class="form-group">
                                    <input type="text" name="harga" class="form-control" placeholder="Harga" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Merek</label>
                                <div class="form-group">
                                    <input type="text" name="merek" class="form-control" placeholder="Merek" required />
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="">Jumlah Stok</label>
                                <div class="form-group">
                                    <input type="number" name="jml_stok" class="form-control" placeholder="Jumlah Stok" required />
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="">Keterangan</label>
                                <div class="form-group">
                                    <textarea type="text" rows="1" name="keperluan" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row modal-footer">
                            <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-round waves-effect">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function add() {
            $('#addModal').modal('show');
        }

        // function deleteConfirm(url) {
        //     $('#btn-delete').attr('href', url);
        //     $('#deleteModal').modal();
        // }

        // $(document).ready(function() {
        //     $(document).on('click', '#editdept', function() {

        //         var id_dept = $(this).data('id');
        //         var nama_dept = $(this).data('nama_dept');
        //         var kode_dept = $(this).data('kode_dept');
        //         var deskripsi = $(this).data('deskripsi');
        //         var alias = $(this).data('alias');
        //         var singkatan = $(this).data('singkatan');

        //         $('#id_dept').val(id_dept);
        //         $('#namadept').val(nama_dept);
        //         $('#kodedept').val(kode_dept);
        //         $('textarea#deskripsi').val(deskripsi);
        //         $('#alias').val(alias);
        //         $('#singkatan').val(singkatan);
        //     });
        // });
    </script>