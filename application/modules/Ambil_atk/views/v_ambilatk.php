<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">Form Permintaan ATK</h4>
                    <br>
                    <br>
                    <form class="form-horizontal" action="<?= base_url('Ambil_atk/addAmbilAtk') ?>" method="POST">
                        <?php foreach ($stok_atk as $a) { ?>
                            <input type="hidden" name="kd_inputatk" class="form-control" value="<?= $a['kd_inputatk'] ?>">
                            <input type="hidden" name="nama_pt" class="form-control" value="<?= $a['nama_pt'] ?>">
                            <div class="form-group row mb-2">
                                <label class="col-2 col-form-label">Nama</label>
                                <div class="col-6">
                                    <select name="user_nama" class="form-control" required>
                                        <option value="<?= $this->session->userdata('userlogin') ?>"><?= $this->session->userdata('userlogin') ?></option>
                                        <?php foreach ($user_nama as $un) : ?>
                                            <option value="<?= $un['nama'] ?>"><?= $un['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-6">
                                <label class="col-2 col-form-label">Nama ATK</label>
                                <div class="col-2">
                                    <input type="text" class="form-control" name="nm_barang" value="<?= $a['nm_barang'] ?>">
                                </div>
                                <label class="col-1 col-form-label">Stok Qty</label>
                                <div class="input-group col-2">
                                    <input type="text" class="form-control bg-light" value="<?= $a['qty'] - $qtyambilatk ?>">
                                    <div class="input-group-append">
                                        <button href="#" class="btn btn-dark waves-effect waves-light"><?= $a['satuan'] ?></button>
                                    </div>
                                </div>
                                <label class="col-1 col-form-label">Stok Qty</label>
                                <div class="input-group col-2">
                                    <input type="text" class="form-control" name="qty" value="<?= $a['qty'] - $qtyambilatk ?>">
                                    <div class="input-group-append">
                                        <button href="#" class="btn btn-dark waves-effect waves-light"><?= $a['satuan'] ?></button>
                                    </div>
                                </div>
                                <input type="hidden" name="kat_barang" class="form-control" value="<?= $a['kat_barang'] ?>">
                                <input type="hidden" name="satuan" class="form-control" value="<?= $a['satuan'] ?>">
                            </div>
                            <br>
                            <!-- <div class="form-group row mb-2">
                                <label class="col-2 col-form-label">Kategori ATK</label>
                                <div class="col-6">
                                    <input type="text" class="form-control bg-light" value="<?= $a['kat_barang'] ?>">
                                </div>
                                <div class="col-1"></div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-2 col-form-label">Kode Barang</label>
                                <div class="col-6">
                                    <input type="text" class="form-control bg-light" value="<?= $a['kd_barang'] ?>" disabled>
                                </div>
                                <div class="col-1"></div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-2 col-form-label">Stok Qty</label>
                                <div class="input-group col-3">
                                    <input type="text" class="form-control bg-light" value="<?= $a['qtyatk'] ?>" disabled>
                                    <div class="input-group-append">
                                        <button href="#" class="btn btn-dark waves-effect waves-light"><?= $a['satuan'] ?></button>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                            </div> -->
                            <!-- <div class="form-group row mb-3">
                                <label class="col-2 col-form-label">Jumlah Pengambilan</label>
                                <div class="input-group col-3">
                                    <input type="text" class="form-control" value="<?= $a['qtyatk'] ?>" required>
                                    <input type="hidden" name="sat" value="<?= $a['satuan'] ?>" disabled>
                                    <div class="input-group-append">
                                        <button href="#" class="btn btn-dark waves-effect waves-light"><?= $a['satuan'] ?></button>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                            </div> -->
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Keperluan</label>
                                <div class="col-6">
                                    <textarea type="text" name="keperluan" class="form-control"></textarea>
                                </div>
                                <div class="col-1"></div>
                            </div>
                            <div class="form-group mb-0 justify-content-end row">
                                <div class="col-2">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                                </div>
                            </div>
                        <?php } ?>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

    </div>
</div> <!-- end col-->

<!-- SELECT MODAL -->
<div class="modal fade bd-example-modal-lg" id="modal-item" tabindex="-1" aria-labelledby="myLargeModalLabel" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Pilih ATK</h4>
            </div>
            <div class="modal-body">
                <table class="table table-sm nowrap table-bordered w-60" id="myTable">

                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama ATK</th>
                            <th>Qty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($stok_atk as $sa) { ?>

                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <h5 class="m-0 font-weight-normal"><?= $sa['nm_barang'] ?></h5>
                                </td>

                                <td>
                                    </i> <?= $sa['qty'] ?>
                                </td>

                                <td>
                                    <button type="button" id="select" data-qty="<?php echo $sa['qty']  ?>" data-nm_barang="<?php echo $sa['nm_barang'] ?>">Select</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ADD ITEM MODAL -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Tambah ATK</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Ambil_atk/editAmbilAtk') ?>" method="POST">
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

<script>
    function add() {
        $('#addModal').modal('show');
    }

    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>