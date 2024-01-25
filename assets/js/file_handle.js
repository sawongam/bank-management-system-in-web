// document.getElementById('fileInput').addEventListener('change', function () {
//     var file = this.files[0];
//     var formData = new FormData();
//     formData.append('fileToUpload', file);

//     fetch('../../scripts/upload_img.php', {
//         method: 'POST',
//         body: formData
//     })
//         .then(response => response.text())
//         .then(data => {
//             document.getElementById('profilePic').src = '../pages/dashboard/img/' + data;
//         })
//         .catch(error => {
//             console.error(error);
//         });
// });



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