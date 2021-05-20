<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <button class="btn btn-primary" onclick="add()"> + Tambah Barang</button>
                </div>
                <h4 class="page-title">Total Barang-barang ATK</h4>
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
                        <button type="button" class="btn btn-xs btn-light">Today</button>
                        <button type="button" class="btn btn-xs btn-light">Weekly</button>
                        <button type="button" class="btn btn-xs btn-light">Monthly</button>
                    </div>
                </div>

                <h4 class="header-title mb-3">Total ATK</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-nowrap table-centered m-0" id="basic-datatable">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kode Atk</th>
                                <th>Kategori</th>
                                <th>Satuan</th>
                                <th>Jumlah Stok</th>
                                <th>Tgl Masuk Barang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($atk as $a) { ?>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <h5 class="m-0 font-weight-normal"><?= $a['nm_barang'] ?></h5>
                                    </td>

                                    <td>
                                        <?= $a['kd_inputatk'] ?>
                                    </td>

                                    <td>
                                        <?= $a['kat_barang'] ?>
                                    </td>
                                    <td>
                                        <?= $a['satuan'] ?>
                                    </td>

                                    <td>
                                        <?= $a['qty'] ?>
                                    </td>
                                    <td>
                                        <?= $a['tgl_masuk_barang'] ?>
                                    </td>

                                    <td>
                                        <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModal<?= $a['id_barang'] ?>"><i class="fa fa-edit mr-1"></i>Edit</button>
                                        <button onclick="deleteConfirm('<?= base_url('Atk/delete/' . $a['id_barang']) ?>')" href="#!" class="btn btn-xs btn-danger"><i class="mdi mdi-delete mr-1"></i>Hapus</button>
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
                                <option value="" selected disabled>- Select Level - </option>
                                <?php foreach ($pt as $p) : ?>
                                    <option value="<?= $p['alias'] ?>"><?= $p['alias'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <label for="">Nama Barang</label>
                            <div class="form-group">
                                <input type="text" name="nama_bar" class="form-control" placeholder="Nama Barang" required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-1">
                        <div class="col-sm-6">
                            <label for="">Kategori</label>
                            <select name="kat_bar" class="form-control" required>
                                <option value="" selected disabled>- Select Level - </option>
                                <?php foreach ($kategori as $kat) : ?>
                                    <option value="<?= $kat['nm_kategori'] ?>"><?= $kat['nm_kategori'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Satuan</label>
                            <select name="sat" class="form-control" required>
                                <option value="" selected disabled>- Select Level - </option>
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

<!-- EDIT ITEM MODAL -->
<?php $no = 0; ?>
<?php foreach ($atk as $a) : $no++; ?>
    <div class="modal fade" id="editModal<?= $a['id_barang'] ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">Edit ATK</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Atk/editAtk') ?>" method="POST">
                        <input type="text" name="id_barang" class="form-control" placeholder="Nama Barang" value="<?= $a['id_barang'] ?>" />

                        <div class="row clearfix mb-1">
                            <div class="col-sm-12">
                                <label for="">Nama PT</label>
                                <select name="nama_pt" class="form-control" required>
                                    <option value="<?= $a['nama_pt'] ?>" selected><?= $a['nama_pt'] ?></option>
                                    <?php foreach ($pt as $p) : ?>
                                        <option value="<?= $p['alias'] ?>"><?= $p['alias'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="">Nama Barang</label>
                                <div class="form-group">
                                    <input type="text" name="nm_barang" class="form-control" placeholder="Nama Barang" value="<?= $a['nm_barang'] ?>" required />
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix mb-1">
                            <div class="col-sm-6">
                                <label for="">Kategori</label>
                                <select name="kat_barang" class="form-control" required>
                                    <option value="<?= $a['kat_barang'] ?>" selected><?= $a['kat_barang'] ?></option>
                                    <?php foreach ($kategori as $kat) : ?>
                                        <option value="<?= $kat['nm_kategori'] ?>"><?= $kat['nm_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Satuan</label>
                                <select name="satuan" class="form-control" required>
                                    <option value="<?= $a['satuan'] ?>" selected><?= $a['satuan'] ?></option>
                                    <?php foreach ($sat as $s) : ?>
                                        <option value="<?= $s['satuan'] ?>"><?= $s['satuan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="">Kode Barang</label>
                                <div class="form-group">
                                    <input type="text" name="kd_barang" class="form-control" placeholder="Kode Barang" value="<?= $a['kd_barang'] ?>" required />
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="">Jumlah Stok</label>
                                <div class="form-group">
                                    <input type="number" name="qty" class="form-control" placeholder="Jumlah Stok" value="<?= $a['qty'] ?>" required />
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
<?php endforeach;  ?>

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
</script>