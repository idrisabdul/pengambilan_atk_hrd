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
                    <form action="<?= base_url('Ambil_atk/addAmbilAtk') ?>" method="POST">
                        <input type="hidden" name="nama_pt" class="form-control" value="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Nama PT</label>
                                    <div class="col-6">
                                        <select name="nama_pt" class="form-control" required>
                                            <option value="" selected disabled>-- SELECT --</option>
                                            <?php foreach ($pt as $p) : ?>
                                                <option value="<?= $p['alias'] ?>"><?= $p['alias'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Nama</label>
                                    <div class="col-6">
                                        <select name="user_nama" class="form-control" required>
                                            <option value="<?= $this->session->userdata('userlogin') ?>"><?= $this->session->userdata('userlogin') ?></option>
                                            <?php foreach ($user_nama as $un) : ?>
                                                <option value="<?= $un['nama'] ?>"><?= $un['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mb-2">
                                    <label class="col-3 col-form-label">Pilih ATK</label>
                                    <div class="col-6">
                                        <select name="nama_pt" class="form-control" required>
                                            <option value="" selected disabled>-- SELECT --</option>
                                            <?php foreach ($pt as $p) : ?>
                                                <option value="<?= $p['alias'] ?>"><?= $p['alias'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <button class="btn btn-lg btn-success" type="button" data-toggle="modal" data-target="#modal-item">Pilih ATK</button>

                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <table class="table table-bordered nowrap w-60" id="basic-datatable">

                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama ATK</th>
                                    <th>Qty tersedia</th>
                                    <th>Qty</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <span id="nm_barang"></span>
                                        <input type="text" name="nm_barang" id="nm_barang_input">
                                    </td>
                                    <td>
                                        <span id="qty"></span>
                                    </td>
                                    <td>
                                        <h5 class="m-0 font-weight-normal"></h5>
                                        <input type="text" name="qty_input" id="qty_input">
                                    </td>
                                    <td>
                                        <input type="text" name="ket" id="ket">
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                        <!-- <div class="form-group row mb-6" id="addAtk">
                            <label class="col-2 col-form-label">Nama ATK</label>
                            <div class="col-2">
                                <input type="text" class="form-control" name="nm_barang" value="">
                            </div>
                            <label class="col-1 col-form-label">Stok Qty</label>
                            <div class="input-group col-2">
                                <input type="text" class="form-control bg-light" value="">
                                <div class="input-group-append">
                                    <button href="#" class="btn btn-dark waves-effect waves-light"></button>
                                </div>
                            </div>
                            <label class="col-1 col-form-label">Get Qty</label>
                            <div class="input-group col-2">
                                <input type="text" class="form-control" name="qty" value="">
                                <div class="input-group-append">
                                    <button href="#" class="btn btn-dark waves-effect waves-light"></button>
                                </div>
                            </div>
                            <input type="hidden" name="kat_barang" class="form-control" value="">
                            <input type="hidden" name="satuan" class="form-control" value="">
                            <button type="button" class="btn btn-success btn-rounded" id="clickAddAtk"><i class="fas fa-plus"></i></button>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Keperluan</label>
                            <div class="col-6">
                                <textarea type="text" name="keperluan" class="form-control"></textarea>
                            </div>
                            <div class="col-1"></div>
                        </div> -->
                        <div class="form-group mb-0 justify-content-end row">
                            <div class="col-2">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                            </div>
                        </div>
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

<script>
    function addAtk() {
        $('#addAtk').append('<input type="text" class="form-control" name="nm_barang" value="">');
    }

    $(document).ready(function() {
        $(document).on('click', '#clickAddAtk', function() {
            var br = '<br>';
            var nama_atk = '<label class="col-2 col-form-label">Nama ATK</label>';
            var input_atk = '<div class="col-2">' +
                '<input type="text" class="form-control" name="nm_barang" value="">' +
                '</div>';
            var nama_qty = '<label class="col-1 col-form-label">Stok Qty</label>';
            var info_qty = '<div class="input-group col-2">' +
                '<input type="text" class="form-control bg-light" value="">' +
                '<div class="input-group-append">' +
                '<button href="#" class="btn btn-dark waves-effect waves-light"></button>' +
                '</div>' +
                '</div>';
            var get_qty = '<label class="col-1 col-form-label">Get Qty</label>';
            var input_qty = '<div class="input-group col-2">' +
                '<input type="text" class="form-control" name="qty" value="">' +
                '<div class="input-group-append">' +
                '<button href="#" class="btn btn-dark waves-effect waves-light"></button>' +
                '</div>' +
                '</div>';
            var ket_bar = '<input type="hidden" name="kat_barang" class="form-control" value="">';
            var satuan = '<input type="hidden" name="satuan" class="form-control" value="">';
            var buttonmin = '<button type="button" class="btn btn-danger btn-rounded" id="clickAddAtk">x</button>';

            $('#addAtk').append(br + nama_atk + input_atk + nama_qty + info_qty + get_qty + input_qty + ket_bar + satuan + buttonmin);
        });
    });

    $(document).ready(function() {
        $(document).on('click', '#select', function() {

            var qty = $(this).data('qty');
            var nm_barang = $(this).data('nm_barang');

            $('#qty').text(qty);
            $('#qty_input').val(qty);
            $('#nm_barang').text(nm_barang);
            $('#nm_barang_input').val(nm_barang);
            $('#modal-item').modal('hide');
        });
    });
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>