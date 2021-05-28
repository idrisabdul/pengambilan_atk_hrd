<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Daftar Retur ATK</h4>
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
                    </div>
                </div>

                <h4 class="header-title mb-3">ATK Bermasalah</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-nowrap table-sm m-0" id="basic-datatable">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nama ATK</th>
                                <th>Kode Input ATK</th>
                                <th>QTY</th>
                                <th>Alasan</th>
                                <th>Tgl Retur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($atk_rusak as $ar) { ?>
                                <tr>
                                    <td><?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $ar['user_nama'] ?>
                                    </td>

                                    <td>
                                        <?= $ar['nm_barang']; ?>
                                    </td>

                                    <td>
                                        <?= $ar['kd_inputatk'] ?>
                                    </td>

                                    <td>
                                        <?= $ar['qty_rusak'] ?>
                                    </td>

                                    <td>
                                        <?= $ar['alasan'] ?>
                                    </td>
                                    <td>
                                        <?= $ar['tgl_retur'] ?>
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
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>