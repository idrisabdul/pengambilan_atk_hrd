<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <button class="btn btn-primary btn-rounded mr-2" onclick="add()"><i class="fas fa-eye mr-1"></i>Lihat ATK Saat ini</button>
                    <a href="<?= base_url('Ambil_atk/pilihAtk') ?>" class="btn btn-rounded btn-success"><i class="fas fa-user-edit mr-1"></i>Ajukan Pengambilan ATK</a>
                </div>
                <h4 class="page-title">Daftar Pengambilan ATK</h4>
                <?= $this->session->flashdata('message') ?>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box pb-2">
                <div class="float-right d-none d-md-inline-block">
                    <div class="btn-group mb-2">
                    </div>
                </div>

                <h4 class="header-title mb-3">Total ambil ATK</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-nowrap table-sm m-0" id="basic-datatable">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>No Ambil ATk</th>
                                <th>User</th>
                                <th>Jumlah Item</th>
                                <th>Tgl Pengambilan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($ambil_atk as $aa) { ?>
                                <?php $jml = $aa['no_ambilatk'] ?>
                                <tr>
                                    <td><?= $no++; ?>
                                    </td>
                                    <td>
                                        <h5 class="m-0 font-weight-normal"><?= $aa['no_ambilatk'] ?></h5>
                                    </td>

                                    <td>
                                        <?= strtoupper($aa['user_nama']); ?>
                                    </td>

                                    <td class="text-center">
                                        <?= $this->db->query("SELECT * FROM tb_detail_ambilatk WHERE no_ambilatk = '$jml' ")->num_rows() ?>
                                    </td>

                                    <td>
                                        <?= $aa['tgl_permintaan'] ?>
                                    </td>
                                    <td>
                                        <button onclick="deleteConfirm('<?= base_url('Ambil_atk/delete/' . $aa['no_ambilatk']) ?>')" href="#!" class="btn btn-sm  btn-rounded waves-effect waves-light btn-danger"><i class="mdi mdi-delete mr-1"></i></button>
                                        <?= anchor('Ambil_atk/lebihLanjut/' . $aa['no_ambilatk'], '<button class="btn btn-sm  btn-rounded waves-effect waves-light btn-info"><i class="fas fa-angle-double-right mr-1"></i>Lebih lanjut</button>'); ?>
                                        <!-- <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#editModal<?= $aa['id'] ?>"><i class="fas fa-angle-double-right mr-1"></i>Lebih lanjut</button> -->
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end card-box -->
</div> <!-- end col-->


<!-- SELECT MODAL -->
<div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" aria-labelledby="myLargeModalLabel" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">ATK Yang Tersedia</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" id="myTable">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kode ATK</th>
                                <th>Kategori</th>
                                <th>Jumlah Stok</th>
                                <th>Satuan</th>
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
                                            <?= $saldo ?>
                                        </td>
                                        <td>
                                            <?= $sa['satuan'] ?>
                                        </td>

                                        <!-- <td>
                                            <?= anchor('Ambil_atk/getAtk/' . $sa['id_barang'], '<button href="#" class="btn btn-xs btn-success"><i class="mdi mdi-plus"></i>Permintaan ATK</button>') ?>
                                        </td> -->
                                    </tr>
                                <?php endif; ?>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- EDIT ITEM MODAL -->
<?php $no = 0 ?>
<?php foreach ($ambil_atk as $aa) : $no++; ?>
    <div class="modal fade" id="editModal<?= $aa['id'] ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title mr-0" id="defaultModalLabel">Edit Pengambilan ATK</h4>
                    <h4 class="bg-light"><?= $aa['no_ambilatk'] ?></h4>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Ambil_atk/editAmbilAtk') ?>" method="POST">
                        <input type="text" name="id" class="form-control bg-light" placeholder="Nama Barang" value="<?= $aa['id'] ?>" />

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="">Nama User</label>
                                <select name="user_nama" class="form-control" required>
                                    <option value="<?= $this->session->userdata('userlogin') ?>" selected><?= $this->session->userdata('userlogin') ?></option>
                                    <?php foreach ($user_nama as $u) : ?>
                                        <option value="<?= $u['nama'] ?>"><?= $u['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="">Nama ATK</label>
                                <div class="form-group">
                                    <input type="text" name="nama_bar" class="form-control bg-light" placeholder="Nama Barang" value="<?= $aa['nm_barang'] ?>" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix mb-1">
                            <div class="col-sm-6">
                                <label for="">Kategori</label>
                                <select name="kat_bar" class="form-control bg-light" disabled>
                                    <option value="<?= $aa['kat_barang'] ?>"><?= $aa['kat_barang'] ?></option>

                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Stok Qty Sebelumnya</label>
                                <div class="form-group">
                                    <input type="text" name="nama_bar" class="form-control bg-light" placeholder="Nama Barang" value="<?= $aa['qty'] ?>" disabled />
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
                                    <textarea type="text" rows="1" name="keperluan" class="form-control"><?= $aa['keperluan'] ?></textarea>
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
<?php endforeach; ?>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
            <div class="modal-footer">
                <button class="btn" type="button" data-dismiss="modal">Batal</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    function add() {
        $('#addModal').modal('show');
    }

    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }

    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>