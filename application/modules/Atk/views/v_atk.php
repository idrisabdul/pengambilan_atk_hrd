<style>
    .table-filter-container {
        text-align: right;
    }
</style>

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <button class="btn btn-md btn-rounded btn-success mr-1" onclick="add()"><i class="fas fa-plus mr-1"></i>Tambah Barang</button>
                    <a href="<?= base_url() ?>Atk/pdf" class="btn btn-rounded btn-md btn-primary"><i class="fas fa-print mr-1"></i>Cetak</a>
                </div>
                <h4 class="page-title">Total Barang-barang ATK</h4>
                <?= $this->session->flashdata('message') ?>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <p id="table-filter" style="display:none">
        Search:
        <select>
            <option value="">All</option>
            <?php foreach ($atk as $a) { ?>
                <option><?= $a['nm_barang'] ?></option>
            <?php } ?>
        </select>
    </p>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box pb-2">
                <div class="float-right d-none d-md-inline-block">
                    <div class="btn-group mb-2">
                        <button type="button" id="btn-filter" class="btn btn-sm btn-info" data-toggle="modal" data-target="#filterModal">Filter</button>
                        <a href="<?= base_url('Atk') ?>" type="button" id="btn-filter" class="btn btn-sm btn-info">Show All</a>
                        <!-- <button type="button" id="btn-unfilter" class="btn btn-sm btn-info">-</button> -->
                    </div>
                </div>

                <h4 class="header-title mb-3">Total ATK</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-sm table-centered m-0" id="example">

                        <!-- <thead class="pb-10 mb-10" id="filter">
                            <tr>
                                <th class="text-right">Nama Atk :</th>
                                <th></th>
                                <th class="text-right">Kategori :</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead> -->
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kode Atk</th>
                                <th>Kategori</th>
                                <th>Satuan</th>
                                <th>Jumlah Stok</th>
                                <th>Tgl Masuk Barang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($atk_filt as $a) { ?>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $a['nm_barang'] ?>
                                    </td>

                                    <td>
                                        <?= $a['kd_inputatk'] ?>
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
                                        <?= $a['tgl_masuk_barang'] ?>
                                    </td>

                                    <td>
                                        <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModal<?= $a['id_barang'] ?>"><i class="fa fa-edit mr-1"></i>Edit</button>
                                        <button onclick="deleteConfirm('<?= base_url('Atk/delete/' . $a['id_barang']) ?>')" href="#!" class="btn btn-xs btn-danger"><i class="mdi mdi-delete mr-1"></i>Hapus</button>
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
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <label for="">Nama PT</label>
                            <select name="nama_pt" class="form-control" required>
                                <option value="" selected disabled>- Select PT - </option>
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
                                <option value="" selected disabled>- Select Kategori - </option>
                                <?php foreach ($kategori as $kat) : ?>
                                    <option value="<?= $kat['nm_kategori'] ?>"><?= $kat['nm_kategori'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Satuan</label>
                            <select name="sat" class="form-control" required>
                                <option value="" selected disabled>- Select Satuan - </option>
                                <?php foreach ($sat as $s) : ?>
                                    <option value="<?= $s['satuan'] ?>"><?= $s['satuan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <label for="">Harga</label>
                            <div class="form-group">
                                <input type="text" name="harga" class="form-control" placeholder="Harga" required />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Merek</label>
                            <div class="form-group">
                                <input type="text" name="merek" class="form-control" placeholder="Merek" required />
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
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <label for="">Keterangan</label>
                            <div class="form-group">
                                <textarea type="text" rows="1" name="keperluan" class="form-control"></textarea>
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

<!-- EDIT ITEM MODAL -->
<?php $no = 0; ?>
<?php foreach ($atk as $a) : $no++; ?>
    <div class="modal fade" id="editModal<?= $a['id_barang'] ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">Edit ATK</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Atk/editAtk') ?>" method="POST">
                        <input type="text" name="id_barang" class="form-control" placeholder="Nama Barang" value="<?= $a['id_barang'] ?>" />

                        <div class="row clearfix mb-1">
                            <div class="col-sm-12">
                                <label for="">Nama PT</label>
                                <select name="nama_pt" class="form-control" required>
                                    <option value="<?= $a['nama_pt'] ?>" selected><?= $a['nama_pt'] ?></option>
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
                                    <input type="text" name="nm_barang" class="form-control" placeholder="Nama Barang" value="<?= $a['nm_barang'] ?>" required />
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix mb-1">
                            <div class="col-sm-6">
                                <label for="">Kategori</label>
                                <select name="kat_barang" class="form-control" required>
                                    <option value="<?= $a['kat_barang'] ?>" selected><?= $a['kat_barang'] ?></option>
                                    <?php foreach ($kategori as $kat) : ?>
                                        <option value="<?= $kat['nm_kategori'] ?>"><?= $kat['nm_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Satuan</label>
                                <select name="satuan" class="form-control" required>
                                    <option value="<?= $a['satuan'] ?>" selected><?= $a['satuan'] ?></option>
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
                                    <input type="text" name="kd_barang" class="form-control" placeholder="Kode Barang" value="<?= $a['kd_inputatk'] ?>" required />
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="">Jumlah Stok</label>
                                <div class="form-group">
                                    <input type="number" name="qty" class="form-control" placeholder="Jumlah Stok" value="<?= $a['qty'] ?>" required />
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
<?php endforeach;  ?>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
            <div class="modal-footer">
                <button class="btn" type="button" data-dismiss="modal">Batal</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- FILTER MODAL -->
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Filter ATK</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Atk/filterAtk') ?>" method="POST">
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <label for="">Nama ATK</label>
                            <select name="nm_barang" class="form-control" required>
                                <?php foreach ($atkf as $a) : ?>
                                    <option value="<?= $a['nm_barang'] ?>"><?= $a['nm_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="">Kategori</label>
                            <select name="kat_barang" class="form-control" required>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['nm_kategori'] ?>"><?= $k['nm_kategori'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="">Satuan</label>
                            <select name="satuan" class="form-control" required>
                                <?php foreach ($sat as $s) : ?>
                                    <option value="<?= $s['satuan'] ?>"><?= $s['satuan'] ?></option>
                                <?php endforeach; ?>
                            </select>
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
    // $('#filter').hide();
    // $('#btn-filter').click(function() {
    //     $('#filter').show();
    // });
    // $('#unbtn-filter').click(function() {
    //     $('#filter').show();
    // });

    function add() {
        $('#addModal').modal('show');
    }

    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }

    $(document).ready(function() {
        $('#example').DataTable({
            // initComplete: function() {
            //     this.api().columns([1, 3, 4]).every(function(d) {
            //         var column = this;
            //         var theadname = $("#example th").eq([d]).text();
            //         var select = $('<select class="form-control form-control-sm"><option value="">All</option></option></select>')
            //             .appendTo($(column.header()).empty())
            //             .on('change', function() {
            //                 var val = $.fn.dataTable.util.escapeRegex(
            //                     $(this).val()
            //                 );

            //                 column
            //                     .search(val ? '^' + val + '$' : '', true, false)
            //                     .draw();
            //             });

            //         column.data().unique().sort().each(function(d, j) {
            //             select.append('<option value="' + d + '">' + d + '</option>')
            //         });
            //     });
            // },
            // "aoColumnDefs": [{
            //     "bSortable": false,
            //     "aTargets": [0, 1, 2, 3, 5, 7]
            // }, ]
        });
    });
</script>