<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Select CSV File</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        <form method="post" action="{{ route('Upload_CSV_File') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="col">
                    <div class="form-group">
                        <label>Upload CSV File:</label>
                        <input type="file" class="form-control input-default" name="csv_file" placeholder="Grouping" required> <!-- Updated name -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>


    </div>
  </div>
</div>
