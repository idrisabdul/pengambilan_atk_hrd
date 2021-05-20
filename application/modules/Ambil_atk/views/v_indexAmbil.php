<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <button class="btn btn-primary" onclick="add()"> + Ajukan Pengambilan Atk</button>
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
                </div>

                <h4 class="header-title mb-3">Total ambil ATK</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-nowrap table-centered m-0" id="basic-datatable">

                        <thead class="thead-light">
                            <tr>
                                <th>No Ambil ATk</th>
                                <th>User</th>
                                <th>Kategori</th>
                                <th>Satuan</th>
                                <th>Jumlah Stok</th>
                                <th>Tgl Pengambilan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ambil_atk as $aa) { ?>
                                <tr>
                                    <td>
                                        <h5 class="m-0 font-weight-normal"><?= $aa['no_ambilatk'] ?></h5>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-btc text-primary"></i> <?= $aa['user_nama'] ?>
                                    </td>

                                    <td>
                                        <?= $aa['nm_barang'] ?>
                                    </td>
                                    <td>
                                        <?= $aa['sat'] ?>
                                    </td>


                                    <td>
                                        <?= $aa['qty'] ?>
                                    </td>
                                    <td>
                                        <?= $aa['tgl_permintaan'] ?>
                                    </td>

                                    <td>
                                        <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModal<?= $aa['id'] ?>"><i class="fa fa-edit mr-1"></i>Edit</button>
                                        <button onclick="deleteConfirm('<?= base_url('Ambil_atk/delete/' . $aa['id']) ?>')" href="#!" class="btn btn-xs btn-danger"><i class="mdi mdi-delete mr-1"></i>Hapus</button>
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
                <h4 class="title" id="defaultModalLabel">Pilih ATK Yang Tersedia</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover" id="basic-datatable">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kode Input ATK</th>
                                <th>Kategori</th>
                                <th>Satuan</th>
                                <th>Jumlah Stok</th>
                                <th>Action</th>
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

                                $qryambil = "SELECT SUM(qty) as qtyambil  FROM tb_ambil_atk where kd_inputatk='$nm_atk'";

                                $result2 = $this->db->query($qryambil)->result_array();
                                foreach ($result2 as $row2) {
                                    $qtyambil = $row2['qtyambil'];
                                }
                                $saldo = $qtyatk - $qtyambil;

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
                                            <i class="mdi mdi-currency-btc text-primary"></i> <?= $sa['kd_inputatk'] ?>
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
                                            <?= anchor('Ambil_atk/getAtk/' . $sa['id_barang'], '<button href="#" class="btn btn-xs btn-success"><i class="mdi mdi-plus"></i>Permintaan ATK</button>') ?>
                                        </td>
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
                    <h4 class="title" id="defaultModalLabel">Edit Pengambilan ATK</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Ambil_atk/editAmbilAtk') ?>" method="POST">
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


<script>
    function add() {
        $('#addModal').modal('show');
    }

    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>