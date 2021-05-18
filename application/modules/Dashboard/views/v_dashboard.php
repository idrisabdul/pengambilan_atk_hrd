<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
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
                            <?php foreach ($stok_atk as $sa) { ?>

                                <tr>
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