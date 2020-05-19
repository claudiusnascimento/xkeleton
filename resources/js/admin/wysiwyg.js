require('./summernote-pt-BR');

$('.html-editor').summernote({
    lang: 'pt-BR',
    callbacks: {
        onInit: function() {
            //$('div.note-group-select-from-files').remove();
        },
        onMediaDelete: function(target) {
            //let formData = new FormData();
            //formData.append('image', $(target).attr('src'));
            //const urlPost = APP.base_url + '/admin/image/delete';
            //axios.post(urlPost, formData);
        },
        onImageUpload: function(images) {

            let formData = new FormData();

            formData.append('uploaddir', $(this).data('upload-dir'));

            Array.from(images).forEach(file => formData.append('images[]', file, file.name));


            const config = {
                headers: { 'Content-Type': 'multipart/form-data' }
            }

            let $summernote = $(this);

            const urlPost = APP.base_url + '/admin/image/upload';

            axios.post(urlPost, formData, config)

                .then((response) => {

                    let uploads = response.data.uploads;

                    if(uploads.length) {

                        uploads.forEach($src => {

                            let img = document.createElement('img');
                                img.setAttribute('src', $src);
                                img.setAttribute('class', 'img-responsive');

                            $summernote.summernote('insertNode', img);

                        });
                    }

                })
                .catch(error => {

                    let errors = error.response.data.errors;

                    let imgErrors = typeof errors.images == "undefined" ? [] : errors.images;
                    let dirErrors = typeof errors.uploaddir == "undefined" ? [] : errors.uploaddir;

                    let allErrors = imgErrors.concat(dirErrors);

                    showErrors(allErrors);

                });
        }
    }
});



function showErrors(errors) {
    errors.forEach(err => {
        toastr.error(err);
    });
}

