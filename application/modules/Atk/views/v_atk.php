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
                    <table class="table table-borderless table-hover table-nowrap table-centered m-0">

                        <thead class="thead-light">
                            <tr>
                                <th>Nama Barang</th>
                                <th>Kode Barang</th>
                                <th>Kategori</th>
                                <th>Satuan</th>
                                <th>Jumlah Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($atk as $a) { ?>
                                <tr>
                                    <td>

                                        <h5 class="m-0 font-weight-normal"><?= $a['nm_barang'] ?></h5>
                                        <p class="mb-0 text-muted"><small><?= $a['tgl_masuk_barang'] ?></small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-btc text-primary"></i> <?= $a['kd_barang'] ?>
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
                                        <a href="javascript: void(0);" class="btn btn-xs btn-success"><i class="mdi mdi-edit"></i>Edit</a>
                                        &nbsp;
                                        <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-delete mr-1"></i>Hapus</a>
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
                <form action="<?= base_url('Dashboard/addBarang') ?>" method="POST">
                    <div class="row clearfix mb-1">
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
                        <div class="col-sm-12">
                            <label for="">Kode Barang</label>
                            <div class="form-group">
                                <input type="text" name="kodebar" class="form-control" placeholder="Kode Barang" required />
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