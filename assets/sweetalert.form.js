jQuery(document).ready(function () {
    if (jQuery('.kaizen-notice-error').length) {
        let content;
        content = jQuery('.kaizen-notice-error').text();
        Swal.fire({
            title: 'Error!',
            text: content,
            icon: 'error',
            confirmButtonText: 'Ok'
        });
    }

    if (jQuery('.kaizen-notice-success').length) {
        let content;
        content = jQuery('.kaizen-notice-success').text();
        Swal.fire({
            title: 'Sukces',
            text: content,
            icon: 'success',
            confirmButtonText: 'Ok'
        });
    }
});
