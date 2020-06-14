    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Cari Barang</strong></h4>
        </div>
        <div class="modal-body"><br />
            <!--<label class="col-lg-4 control-label">Cari Nama Barang</label>-->
            <input type="text" name="caribarang" id="caribarang" class="form-control" placeholder="Masukkan Kode Barang atau Nama Barang">

            <div id="tampilbarang"></div>

        </div>

        <br /><br />
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
	
	<script>
	    $(document).ready(function() {

    //search barang
    $("#caribarang").keyup(function(){
        var caribarang = $('#caribarang').val();

         $.ajax({
            url:"<?php echo site_url('peminjaman/cari_barang');?>",
            type:"POST",
            data:"caribarang="+caribarang,
            cache:false,
            success:function(hasil){
                $("#tampilbarang").html(hasil);
                
            }
        })
        
    })
})
	</script>