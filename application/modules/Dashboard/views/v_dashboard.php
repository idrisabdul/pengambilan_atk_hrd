<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <button class="btn btn-primary" onclick="add()"> + Tambah Barang</button>
                </div>
                <h4 class="page-title">Dashboard</h4>
                <?= $this->session->flashdata('message') ?>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fe-heart font-22 avatar-title text-primary"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1">$<span data-plugin="counterup">58,947</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Barang ATK</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">127</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total ATK yang Sudah Diambil</p>
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
                            <tr>
                                <td>

                                    <h5 class="m-0 font-weight-normal">Tomaslau</h5>
                                    <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                </td>

                                <td>
                                    <i class="mdi mdi-currency-btc text-primary"></i> BTC
                                </td>

                                <td>
                                    0.00816117 BTC
                                </td>
                                <td>
                                    0.00816117 BTC
                                </td>

                                <td>
                                    0.00097036 BTC
                                </td>

                                <td>
                                    <a href="javascript: void(0);" class="btn btn-xs btn-success"><i class="mdi mdi-plus"></i>Permintaan Barang</a>
                                </td>
                            </tr>


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
                        <div class="col-sm-4">
                            <label for="">Kategori</label>
                            <select name="kat_bar" class="form-control" required>
                                <option value="Kertas">Kertas</option>
                                <option value="Alat Menulis">Alat Menulis</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Printer">Printer</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="">Kode Barang</label>
                            <div class="form-group">
                                <input type="text" name="kodebar" class="form-control" placeholder="Kode Barang" required />
                            </div>
                        </div>
                        <div class="col-sm-4">
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