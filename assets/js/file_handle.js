// Grabbing Image and Uploading to PHP Server
document.getElementById('fileInput').addEventListener('change', function () {
    var file = this.files[0];
    var formData = new FormData();
    formData.append('fileToUpload', file);

    fetch('../../scripts/upload_img.php', {
        method: 'POST',
        body: formData
    })
        .then(() => {
            location.reload();
        });
});