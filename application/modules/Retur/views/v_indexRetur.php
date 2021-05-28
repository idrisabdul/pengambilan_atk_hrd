<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <!-- <button class="btn btn-primary btn-rounded mr-2" onclick="add()"><i class="fas fa-eye mr-1"></i>Lihat ATK Saat ini</button>
                    <a href="<?= base_url('Ambil_atk/pilihAtk') ?>" class="btn btn-rounded btn-success"><i class="fas fa-user-edit mr-1"></i>Ajukan Pengambilan ATK</a> -->
                </div>
                <h4 class="page-title">Retur ATK</h4>
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

                <h4 class="header-title mb-3">Pilih ATK</h4>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-nowrap table-sm m-0" id="basic-datatable">

                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>No Ambil ATk</th>
                                <th>User</th>
                                <th>ATK</th>
                                <th>QTY</th>
                                <th>Tgl Pengambilan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($ambilatk_user as $au) { ?>
                                <?php $jml = $au['no_ambilatk'] ?>
                                <?php if ($au['status'] == 2) { ?>
                                    <tr class="bg-danger" style="color: white">
                                        <td><?= $no++; ?>
                                        </td>
                                        <td>
                                            <?= $au['no_ambilatk'] ?>
                                        </td>

                                        <td>
                                            <?= strtoupper($au['user_nama']); ?>
                                        </td>

                                        <td>
                                            <?= $au['nm_barang'] ?>
                                        </td>

                                        <td class="text-center">
                                            <?= $au['qty'] ?>
                                        </td>

                                        <td>
                                            <?= $au['tgl_permintaan'] ?>
                                        </td>
                                        <td>
                                            <?= anchor('Retur/gantiAtk/' . $au['id_detail_ambilatk'], '<button class="btn btn-xs btn-warning"><i class="fas fa-exchange-alt mr-1"></i>Diajukan</button>'); ?>
                                            <!-- <button class="btn btn-xs btn-info"><i class="fas fa-exchange-alt mr-1"></i>Tidak Perlu</button> -->
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <td><?= $no++; ?>
                                        </td>
                                        <td>
                                            <h5 class="m-0 font-weight-normal"><?= $au['no_ambilatk'] ?></h5>
                                        </td>

                                        <td>
                                            <?= strtoupper($au['user_nama']); ?>
                                        </td>

                                        <td>
                                            <?= $au['nm_barang'] ?>
                                        </td>

                                        <td class="text-center">
                                            <?= $au['qty'] ?>
                                        </td>

                                        <td>
                                            <?= $au['tgl_permintaan'] ?>
                                        </td>
                                        <td>
                                            <button href="#!" id="retur" class="btn btn-xs btn-success" href="javascript:;" data-id="<?php echo $au['id_detail_ambilatk'] ?>" data-user_nama="<?php echo strtoupper($au['user_nama']) ?>" data-kat_barang="<?php echo $au['kat_barang'] ?>" data-harga="<?php echo $au['harga'] ?>" data-no_ambil="<?php echo $au['no_ambilatk'] ?>" data-kd_inputatk="<?php echo $au['kd_inputatk'] ?>" data-qty="<?php echo $au['qty'] ?>" data-nm_barang="<?php echo $au['nm_barang'] ?>" data-keperluan="<?php echo $au['keperluan'] ?>" data-toggle="modal" data-target="#editModal"><i class="fas fa-exchange-alt mr-1"></i>Retur</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end card-box -->
</div> <!-- end col-->


<!-- Add ITEM MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Keterangan Retur</h4>
                <div class="text-right">
                    <h4 class="title" id="no_ambilatk">Keterangan Retur</h4>
                </div>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Retur/addRetur') ?>" method="POST">
                    <input type="hidden" id="id" name="id" class="form-control">
                    <input type="hidden" id="kd_inputatk" name="kd_inputatk" class="form-control">
                    <input type="hidden" id="kat_barang" name="kat_barang" class="form-control">
                    <input type="hidden" id="harga" name="harga" class="form-control">
                    <input type="text" id="user_nama" name="user_nama" class="form-control">
                    <div class="row clearfix mb-1">
                        <div class="col-sm-6">
                            <label for="">Nama ATK</label>
                            <div class="form-group">
                                <input type="text" id="nm_barang" name="nm_barang" class="form-control bg-light" placeholder="Nama Kategori" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="">QTY</label>
                            <div class="form-group">
                                <input type="number" id="qty" name="qty" class="form-control bg-light" placeholder="Nama Kategori" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-1">
                        <div class="col-sm-12">
                            <label for="">Masukkan Jumlah QTY yang rusak?</label>
                            <div class="form-group">
                                <input type="number" id="qty_inp" name="qty_inp" class="form-control" placeholder="Qty Rusak" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-1">
                        <div class="col-sm-12">
                            <label for="">Alasan</label>
                            <div class="form-group">
                                <textarea type="text" id="alasan" name="alasan" class="form-control" placeholder="Masukkan Keterangan Retur" required></textarea>
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

<!-- Add ITEM MODAL -->
<div class="modal fade" id="updateQty" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Keterangan Retur</h4>
                <div class="text-right">
                    <h4 class="title" id="no_ambilatk">Keterangan Retur</h4>
                </div>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Retur/addRetur') ?>" method="POST">
                    <input type="hidden" id="id" name="id" class="form-control">
                    <input type="hidden" id="kd_inputatk" name="kd_inputatk" class="form-control">
                    <input type="hidden" id="kat_barang" name="kat_barang" class="form-control">
                    <input type="hidden" id="harga" name="harga" class="form-control">
                    <input type="text" id="user_nama" name="user_nama" class="form-control">
                    <div class="row clearfix mb-1">
                        <div class="col-sm-6">
                            <label for="">Nama ATK</label>
                            <div class="form-group">
                                <input type="text" id="nm_barang" name="nm_barang" class="form-control bg-light" placeholder="Nama Kategori" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="">QTY</label>
                            <div class="form-group">
                                <input type="number" id="qty" name="qty" class="form-control bg-light" placeholder="Nama Kategori" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-1">
                        <div class="col-sm-12">
                            <label for="">Masukkan Jumlah QTY yang rusak?</label>
                            <div class="form-group">
                                <input type="number" id="qty_inp" name="qty_inp" class="form-control" placeholder="Qty Rusak" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-1">
                        <div class="col-sm-12">
                            <label for="">Alasan</label>
                            <div class="form-group">
                                <textarea type="text" id="alasan" name="alasan" class="form-control" placeholder="Masukkan Keterangan Retur" required></textarea>
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

    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }

    $(document).ready(function() {
        $(document).on('click', '#retur', function() {

            var id = $(this).data('id');
            var no_ambilatk = $(this).data('no_ambil');
            var nm_barang = $(this).data('nm_barang');
            var keperluan = $(this).data('keperluan');
            var kat_barang = $(this).data('kat_barang');
            var qty = $(this).data('qty');
            var kd_inputatk = $(this).data('kd_inputatk');
            var harga = $(this).data('harga');
            var user_nama = $(this).data('user_nama');

            // alert(kd_inputatk);
            $('#id').val(id);
            $('#nm_barang').val(nm_barang);
            $('#no_ambilatk').text(no_ambilatk);
            $('#qty').val(qty);
            $('#kat_barang').val(kat_barang);
            $('#kd_inputatk').val(kd_inputatk);
            $('#harga').val(harga);
            $('#user_nama').val(user_nama);
        });
    });
</script>