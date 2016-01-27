(function(){
  var uploadFiles = [],
      uploadForm = $('#uploadForm'),
      filesToUpload = $('#filesToUpload'),
      progressBox = $('#progressBox'),
      uploadPreview = $('#uploadPreview');

  filesToUpload.on('change', function(evt) {
    var files = evt.target.files;
    var filesArr = Array.prototype.slice.call(files);

    filesArr.forEach(function(file) {
      if (file.type.match(/image.*/)) {
        uploadFiles.push(file);
        var reader = new FileReader();
        reader.onload = function(e) {
          var template = "<div class='preview'><img src='" + e.target.result +
                         "' data-filename='" + file.name +
                         "'><button class='btn btn-danger removeFileBtn'>Remove</button>";
          uploadPreview.append(template);
        };
        reader.readAsDataURL(file);
      }
    });

    uploadPreview.on('click', '.removeFileBtn', function(){
      var file = $(this).siblings('img');
      var fileName = file.data('filename');
      var len = uploadFiles.length;

      for (var i = 0; i < len; i++) {
        if (uploadFiles[i].name == fileName) {
          uploadFiles.splice(i, 1);
          break;
        }
      }

      $(this).closest('.preview').remove();
    });

    uploadForm.on('submit', function(e) {
      e.preventDefault();
      var formdata = new FormData();
      uploadFiles.forEach(function(file) {
        formdata.append('filesToUpload[]', file);
      });
      
      var ajax = new XMLHttpRequest();
      ajax.upload.addEventListener('progress', progressHandler, false);
      ajax.open('POST', 'upload.php', true);
      ajax.send(formdata);
    });

    function progressHandler(e) {
      var percent = (e.loaded / e.total) * 100;
      var barWidth = Math.round(percent) + '%';
      progressBox.slideDown('fast');
      progressBox.children('.progress-bar').css('width', barWidth);
    }
  })
}());