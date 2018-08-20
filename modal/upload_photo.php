<div class="modal fade" id="uploadPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../uploads/upload_photo_payment.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

          <label for="referenceNo">Reference Number</label>
          <input type="text" name="referenceNo" class="form-control" required>

          <label for="paymentPhoto">Deposit Slip Photo</label>
          <input type="file" name="paymentPhoto" class="form-control" required>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>