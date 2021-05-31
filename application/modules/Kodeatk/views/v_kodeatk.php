<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Kode ATK</h4>
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
                        <button type="button" class="btn btn-sm btn-success" onclick="add()">+ Tambah Kode</button>
                    </div>
                </div>

                <h4 class="header-title mb-3">Menu Kode ATK</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm nowrap w-100" id="basic-datatable">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Kode ATK</th>
                                <th>Nama ATK</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($k_atk as $ka) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <h5 class="m-0 font-weight-normal"><?= $ka['kode_atk'] ?></h5>
                                    </td>
                                    <td>
                                        <h5 class="m-0 font-weight-normal"><?= $ka['nm_barang'] ?></h5>
                                    </td>
                                    <td>
                                        <button href="#" id="editkode" href="javascript:;" data-id="<?php echo $ka['id_kodeatk'] ?>" data-kode_atk="<?php echo $ka['kode_atk'] ?>" data-nm_barang="<?php echo $ka['nm_barang'] ?>" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModalKategori"><i class="fa fa-edit mr-1"></i>Edit</button>
                                        <button onclick="deleteConfirm('<?= base_url('Kodeatk/delete/' . $ka['id_kodeatk']) ?>')" href="#!" class="btn btn-xs btn-danger"><i class="mdi mdi-delete mr-1"></i>Hapus</button>
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
                <h4 class="title" id="defaultModalLabel">Tambah Kode ATK</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kodeatk/addKode') ?>" method="POST">
                    <div class="row clearfix mb-1">
                        <div class="col-sm-12">
                            <label for="">Nama ATK</label>
                            <div class="form-group">
                                <input type="text" name="nm_barang" class="form-control" placeholder="Nama ATK" required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-1">
                        <div class="col-sm-12">
                            <label for="">Kode ATK</label>
                            <div class="form-group">
                                <input type="text" name="kode_atk" class="form-control" placeholder="Kode ATK" required />
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
<div class="modal fade" id="editModalKategori" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Ubah Kategori</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kodeatk/editKode') ?>" method="POST">
                    <input type="hidden" id="id1" name="id" class="form-control" />
                    <div class="row clearfix mb-1">
                        <div class="col-sm-12">
                            <label for="">Nama ATK</label>
                            <div class="form-group">
                                <input type="text" id="nm_barang1" name="nm_barang" class="form-control" placeholder="Masukkan Satuan" required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-1">
                        <div class="col-sm-12">
                            <label for="">Kode ATK</label>
                            <div class="form-group">
                                <input type="text" id="kode_atk1" name="kode_atk" class="form-control" placeholder="Masukkan Satuan" required />
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
<script>
    function add() {
        $('#addModal').modal('show');
    }

    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }

    $(document).ready(function() {
        $(document).on('click', '#editkode', function() {

            var id = $(this).data('id');
            var kode_atk = $(this).data('kode_atk');
            var nm_barang = $(this).data('nm_barang');

            $('#id1').val(id);
            $('#kode_atk1').val(kode_atk);
            $('#nm_barang1').val(nm_barang);
        });
    });
</script>