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
                                    <input type="text" class="form-control bg-light" value="<?= $a['qtyatk'] ?>">
                                    <div class="input-group-append">
                                        <button href="#" class="btn btn-dark waves-effect waves-light"><?= $a['satuan'] ?></button>
                                    </div>
                                </div>
                                <label class="col-1 col-form-label">Stok Qty</label>
                                <div class="input-group col-2">
                                    <input type="text" class="form-control" name="qty" value="<?= $a['qtyatk'] ?>">
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