<!DOCTYPE html>
<html>

<!-- Mirrored from coderthemes.com/ubold_2.2/light/components-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Mar 2017 14:09:04 GMT -->
<head>

    <title>Inventaris Alat Kantor</title>
     <!-- Bootstrap Core CSS -->
     <link href="http://localhost/inventarisasi_alat_kantor/template/backend/sbadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
     <link href="http://localhost/inventarisasi_alat_kantor/template/backend/sbadmin/vendor/bootstrap/css/core.css" rel="stylesheet" type="text/css">
     <link href="http://localhost/inventarisasi_alat_kantor/template/backend/sbadmin/vendor/bootstrap/css/component.css" rel="stylesheet" type="text/css">
     <link href="http://localhost/inventarisasi_alat_kantor/template/backend/sbadmin/vendor/bootstrap/css/icons.css" rel="stylesheet" type="text/css">
     <link href="http://localhost/inventarisasi_alat_kantor/template/backend/sbadmin/vendor/bootstrap/css/pages.css" rel="stylesheet" type="text/css">
     <link href="http://localhost/inventarisasi_alat_kantor/template/backend/sbadmin/vendor/bootstrap/css/responsive.css" rel="stylesheet" type="text/css">
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0000FF;
  color: white;
}
</style>
</style>
  </head>
  <body >
    <div class="row">
        <div class="col-sm-3" align="center">
        </div>
                <div class="col-sm-12">
                    <div class="card-box">
                    <h4 class="m-t-0 header-title" style="text-align: center;"><b>LAPORAN INVENTARIS BARANG</b></h4>
                    <p class="text-muted m-b-30 font-13" style="text-align: center;">

                    </p>
                <table  id="customers">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
							<th>Petugas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
					<tbody>
                    <?php
					$i=1;
					foreach($object as $recordpinjam)
					{

					?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $recordpinjam->nama_barang;?></a></td>
							<td><?php echo $recordpinjam->tanggal_pinjam;?></td>
							<td><?php echo $recordpinjam->tanggal_kembali;?></td>
							<td><?php if($recordpinjam->status == "N"){echo "Masih Dipinjam";}else{echo "Sudah Dikembalikan";}; ?></td>
						</tr>
					<?php
						$i++;
					}?>
                    </tbody>
                </table>
				<br>
				<br>
                <p class="mr-2" align="right">Semarang,<?php
                echo date('d-m-Y');
                ?></p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <p align='right'>.........................</p>
                </div>
              </div>
            </div>
  </body>
</html>
