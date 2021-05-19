<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Satuan</h4>
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
                        <button type="button" class="btn btn-sm btn-success" onclick="add()">+ Tambah Satuan</button>
                    </div>
                </div>

                <h4 class="header-title mb-3">Menu Satuan</h4>
                <div class="table-responsive">
                    <table class="table table-bordered dt-responsive nowrap w-100">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($sat as $s) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <h5 class="m-0 font-weight-normal"><?= $s['satuan'] ?></h5>
                                    </td>
                                    <td>
                                        <button href="#" id="editkategori" href="javascript:;" data-id="<?php echo $s['id_sat'] ?>" data-satuan="<?php echo $s['satuan'] ?>" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModalKategori"><i class="fa fa-edit mr-1"></i>Edit</button>
                                        <button onclick="deleteConfirm('<?= base_url('Satuan/delete/' . $s['id_sat']) ?>')" href="#!" class="btn btn-xs btn-danger"><i class="mdi mdi-delete mr-1"></i>Hapus</button>
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
                <h4 class="title" id="defaultModalLabel">Tambah Satuan</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Satuan/addSatuan') ?>" method="POST">
                    <div class="row clearfix mb-1">
                        <div class="col-sm-12">
                            <label for="">Nama Satuan</label>
                            <div class="form-group">
                                <input type="text" name="satuan" class="form-control" placeholder="Nama Kategori" required />
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
                <form action="<?= base_url('Satuan/editSatuan') ?>" method="POST">
                    <input type="hidden" id="id_sat" name="id_sat" class="form-control" />
                    <div class="row clearfix mb-1">
                        <div class="col-sm-12">
                            <label for="">Nama Satuan</label>
                            <div class="form-group">
                                <input type="text" id="satuan" name="satuan" class="form-control" placeholder="Masukkan Satuan" required />
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
        $(document).on('click', '#editkategori', function() {

            var id_sat = $(this).data('id');
            var satuan = $(this).data('satuan');

            $('#id_sat').val(id_sat);
            $('#satuan').val(satuan);
        });
    });
</script>