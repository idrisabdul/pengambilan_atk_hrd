<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="<?= base_url() ?>Item_terambil/pdf" class="btn btn-rounded btn-md btn-success"><i class="fas fa-print mr-1"></i>Cetak Laporan</a>
                </div>
                <h4 class="page-title">Daftar Pengambilan ATK PerItem</h4>
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

                <h4 class="header-title mb-3">Total Item ATK Yang Sudah Diambil</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover  table-sm m-0" id="basic-datatable">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>No Ambil ATk</th>
                                <th>User</th>
                                <th>Nama ATK</th>
                                <th>Kategori</th>
                                <th>QTY</th>
                                <th>Harga</th>
                                <th>Satuan</th>
                                <th>Keperluan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($detail as $d) { ?>
                                <tr>
                                    <td><?= $no++; ?>
                                    </td>
                                    <td>
                                        <h5 class="m-0 font-weight-normal"><?= $d['no_ambilatk'] ?></h5>
                                    </td>

                                    <td>
                                        <h5 class="m-0 font-weight-normal"><?= strtoupper($d['user_nama']); ?></h5>
                                    </td>

                                    <td>
                                        <?= $d['nm_barang'] ?>
                                    </td>

                                    <td class="text-center">
                                        <?= $d['kat_barang'] ?>
                                    </td>

                                    <td>
                                        <?= $d['qty'] ?>
                                    </td>
                                    <td>
                                        Rp. <?= number_format($d['harga']); ?>
                                    </td>
                                    <td>
                                        <?= $d['sat'] ?>
                                    </td>
                                    <td>
                                        <?= $d['keperluan'] ?>
                                    </td>
                                    <td>
                                        <!-- <button onclick="deleteConfirm('<?= base_url('Ambil_atk/delete/' . $d['no_ambilatk']) ?>')" href="#!" class="btn btn-xs btn-danger"><i class="mdi mdi-delete mr-1"></i>Hapus</button> -->
                                        <?= anchor('Ambil_atk/lebihLanjut/' . $d['no_ambilatk'], '<button class="btn btn-sm  btn-rounded waves-effect waves-light btn-info"><i class="fas fa-eye mr-1"></i></button>'); ?>
                                        <!-- <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#editModal<?= $d['id'] ?>"><i class="fas fa-angle-double-right mr-1"></i>Lebih lanjut</button> -->
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

    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }

    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>