$(document).ready(function() {
    let editor;
    ClassicEditor.create(document.querySelector('#comment'))
        .then(newEditor => {
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });

    // Disable submit button. 
    $("form.apply-leave").submit(function () {
        Swal.fire({
            title: "Wait..!",
            didOpen: () => {
              Swal.showLoading();
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
        
        $(this).find("button[type=submit]").prop('disabled', 'disabled');

    });
});