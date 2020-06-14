<div class="row">
    <div class="col-lg-12"><br />

        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('jenis'); ?>">Jenis Barang</a></li>
            <li class="active">Data Jenis Barang</li>
        </ol>

        <?php

            if(!empty($message)) {
                echo $message;
            }
        ?>

    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            <div class="panel-heading">
            <?php echo anchor('jenis/create', 'Tambah', array('class' => 'btn btn-primary btn-sm')); ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body" >
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Nama Jenis</td>
                                        <td>Deskripsi</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                foreach($jenis as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $row->nama_jenis;?></td>
                                        <td><?php echo $row->deskripsi;?></td>
                                        <td class="text-center">
                                <a href="<?php echo base_url('jenis/edit/'.$row->id_jenis) ?>"><input type="submit" class="btn btn-success btn-xs" name="edit" value="Ubah"></a>
                                <a href="#"  class="hapus btn btn-danger btn-xs"
                                nama_jenis="<?php echo $row->nama_jenis;?>"
                                kode="<?php echo $row->id_jenis; ?>">Hapus</a>
                            </td>
                                    </tr>
                                <?php $no++; } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- Modal Hapus-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Konfirmasi</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" name="idhapus" id="idhapus">
                <p>Apakah anda yakin ingin menghapus jenis barang <strong class="text-konfirmasi"> </strong> ?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-success btn-xs" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger btn-xs" id="konfirmasi">Hapus</button>
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>

<script type="text/javascript">
    // function confirmDelete()
    // {
    //     return confirm("Apakah anda yakin ingin menghapus data karyawan")
    // }

    $(function(){
        $(".hapus").click(function(){
            var kode = $(this).attr("kode");
            var name = $(this).attr("nama_jenis");

            $(".text-konfirmasi").text(name)
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });

        $("#konfirmasi").click(function(){
            var id_petugas = $("#idhapus").val();

            $.ajax({
                url:"<?php echo site_url('jenis/delete');?>",
                type:"POST",
                data:"id_jenis="+id_jenis,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('jenis/index/delete-success');?>";
                }
            });
        });
    });
</script>
