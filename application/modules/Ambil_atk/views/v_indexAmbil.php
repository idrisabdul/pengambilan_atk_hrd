<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <button class="btn btn-primary" onclick="add()"> + Tambah Barang</button>
                </div>
                <h4 class="page-title">Daftar Pengambilan ATK</h4>
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

                <h4 class="header-title mb-3">Total ambil ATK</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-nowrap table-centered m-0" id="basic-datatable">

                        <thead class="thead-light">
                            <tr>
                                <th>No Ambil ATk</th>
                                <th>User</th>
                                <th>Kategori</th>
                                <th>Satuan</th>
                                <th>Jumlah Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ambil_atk as $aa) { ?>
                                <tr>
                                    <td>
                                        <h5 class="m-0 font-weight-normal"><?= $aa['no_ambilatk'] ?></h5>
                                        <p class="mb-0 text-muted"><small><?= $aa['tgl_permintaan'] ?></small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-btc text-primary"></i> <?= $aa['user_nama'] ?>
                                    </td>

                                    <td>
                                        <?= $aa['nm_barang'] ?>
                                    </td>
                                    <td>
                                        <?= $aa['sat'] ?>
                                    </td>

                                    <td>
                                        <?= $aa['qty'] ?>
                                    </td>

                                    <td>
                                        <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModal<?= $aa['id'] ?>"><i class="fa fa-edit mr-1"></i>Edit</button>
                                        <button onclick="deleteConfirm('<?= base_url('Atk/delete/' . $aa['id']) ?>')" href="#!" class="btn btn-xs btn-danger"><i class="mdi mdi-delete mr-1"></i>Hapus</button>
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