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
                        <div class="form-group row mb-2">
                            <label class="col-2 col-form-label">Nama PT</label>
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
                        <div class="form-group row mb-6" id="addAtk">
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
                        </div>
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
</script>