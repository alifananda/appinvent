<div class="row">
    <div class="col-lg-12"><br />

        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('users/create'); ?>">Pengguna</a></li>
            <li class="active">Ubah Pengguna</li>
        </ol>

        <?php
            echo validation_errors();
            //buat message nis
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
                Ubah Pengguna
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <?php
                //validasi error upload
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open('users/update', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Nama Pengguna </p>
                    <input type="hidden" name="id_petugas" class="form-control" placeholder="Nama Pengguna"
                        value="<?php echo $edit['id_petugas'] ?>">

                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" placeholder="Nama Pengguna"
                        value="<?php echo $edit['username'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Nama Lengkap </p>

                    <div class="col-sm-10">
                        <input type="text" name="full_name" class="form-control" placeholder="Nama Lengkap" value="<?php echo $edit['full_name']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Kata Sandi </p>

                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Kata Sandi">
                    </div>
                </div>




                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="btn-group pull-left">
                            <?php echo anchor('users', 'Batal', array('class' => 'btn btn-danger btn-sm')); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group pull-right">
                            <input type="submit" name="update" value="Ubah" class="btn btn-success btn-sm">
                        </div>
                    </div>
                </div>
            <?php echo form_close(); ?>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>



<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/bootstrap-datepicker.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/tinymce/tinymce.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>



<script type="text/javascript">

tinymce.init({selector:'textarea'});

$(document).ready(function() {
    $("#tanggal1").datepicker({
        format:'yyyy-mm-dd'
    });

    $("#tanggal2").datepicker({
        format:'yyyy-mm-dd'
    });

    $("#tanggal").datepicker({
        format:'yyyy-mm-dd'
    });
})



</script>
