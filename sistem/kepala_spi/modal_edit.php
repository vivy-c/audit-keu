<?php
	include('../template/header.php');
	$id_pka=$_GET['id_pka'];
	$modal=mysqli_query($koneksi,"SELECT * FROM tb_pka WHERE id_pka='$id_pka'");
	while($r=mysqli_fetch_array($modal)){
?>

<div class="modal-dialog">
    <div class="modal-content">

		<div class="modal-header">
        <h5 class="modal-title">Edit Data PKA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
        	<form id="form-update" action="proses_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Modal Name</label>
                    <input type="hidden" name="id_pka" id="edit-id"  class="form-control" value="<?php echo $r['id_pka']; ?>" />
     				<input type="text" name="modal_name" id="edit-name" class="form-control" value="<?php echo $r['modal_name']; ?>"/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Description">Description</label>
     				<textarea name="description" id="edit-description" class="form-control"><?php echo $r['description']; ?></textarea>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Date">Date</label>       
     				<input type="text" name="date"  class="form-control" value="<?php echo $r['date']; ?>" disabled/>
                </div>

	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Update
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>

            	</form>

             <?php } ?>

            </div>

           
        </div>
    </div>