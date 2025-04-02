$(document).ready(function() {
    let editor;
    ClassicEditor.create(document.querySelector('#comment'))
        .then(newEditor => {
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });
});