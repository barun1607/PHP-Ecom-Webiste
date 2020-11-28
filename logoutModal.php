<?php
  if(!isset($_SESSION['uid'])) {
    header('Location: login.php');
    die();
  }

  echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border: none;">
      <div class="modal-header" style="background-color: #0278AE; color: white;">
        <h5 class="modal-title" id="exampleModalLabel">Confirm logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: white;">&times;</span>
        </button>
      </div>
      <div class="modal-body text-def">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a class="btn btn-primary" href="logout.php">Yes</a>
      </div>
    </div>
  </div>
</div>'
?>