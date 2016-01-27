<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ajax Upload Multiple Files with Progress Bar</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1 class="text-center">Ajax Upload Multiple Files with Progress Bar</h1>
    <div class="row">
      <form id="uploadForm" action="upload.php" method="POST" enctype="multipart/form-data" class="col-md-6 col-md-offset-3">
        <div class="input-group">
          <input type="file" name="filesToUpload" id="filesToUpload" class="form-control" required multiple>  
          <span class="input-group-btn">
            <button type="submit" class="btn btn-success">Upload</button>      
          </span>
        </div>
      </form>
    </div> <!-- End Form -->
    <div class="progress-box" id="progressBox">
      <div class="progress-bar"></div>  
    </div> <!-- End Progress Bar -->
    <div id="uploadStatus"></div>
    <div class="upload-preview row well" id="uploadPreview">
      
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
  <script src="scripts.js"></script>
</body>
</html>