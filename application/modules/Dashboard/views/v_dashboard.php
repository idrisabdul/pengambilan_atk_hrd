<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <buttoan class="btn btn-md btn-success mr-2" onclick="add()"><i class="fas fa-plus mr-1"></i>Masukkan ATK</buttoan>
                    <a href="<?= base_url('Ambil_atk/pilihAtk') ?>" class="btn btn-md btn-primary"><i class="fas fa-hand-holding mr-1"></i>Pengambilan ATK</a>
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
                            <i class="fe-heart font-22 avatar-title text-primary"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1"><span data-plugin="counterup"><?= count($stok_atk) ?></span></h3>
                            <p class="text-muted mb-1 text-truncate">Total ATK</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-3 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <a href="<?= base_url('Ambil_atk/insert') ?>">
                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                <i class="fe-plus font-22 avatar-title text-white"></i>
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
        <div class="col-md-3 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <a href="<?= base_url('Ambil_atk/insert') ?>">
                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                <i class="fe-user font-22 avatar-title text-white"></i>
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
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">127</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total User</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
        <div class="col-md-3 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <a href="<?= base_url('Ambil_atk/insert') ?>">
                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                <i class="fe-user font-22 avatar-title text-white"></i>
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
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">127</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Pengambilan ATK</p>
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
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-xs btn-light">Today</button>
                        <button type="button" class="btn btn-xs btn-light">Weekly</button>
                        <button type="button" class="btn btn-xs btn-light">Monthly</button>
                    </div>
                </div>

                <h4 class="header-title mb-3">Barang ATK Yang Tersedia</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover" id="basic-datatable">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kode Barang</th>
                                <th>Kategori</th>
                                <th>Satuan</th>
                                <th>Jumlah Stok</th>
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
                                        <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-btc text-primary"></i> <?= $sa['kd_barang'] ?>
                                    </td>

                                    <td>
                                        <?= $sa['kat_barang'] ?>
                                    </td>
                                    <td>
                                        <?= $sa['satuan'] ?>
                                    </td>

                                    <td>
                                        <?= $sa['qtyatk'] ?>
                                    </td>

                                    <td>
                                        <?= anchor('Ambil_atk/getAtk/' . $sa['nm_barang'], '<button href="#" class="btn btn-xs btn-success"><i class="mdi mdi-plus"></i>Permintaan ATK</button>') ?>
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