const previewImage = (imgId, imgurl) => {
    console.log(imgId, imgurl);
    const defaultUrl = '{{asset("storage/")}}';
    $(`#${imgId}`).fadeIn("fast").attr('src',imgurl);
}

function makeDeleteRequest(event, id) {
    event.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            let form_id = $("#delete-form-" + id);
            $(form_id).submit();
        }
    });
}


// ckEditor load function
const loadCkEditor = () => {
    // initialize ckEditor
    CKEDITOR.replaceAll("ckEditor", {

    });
}

const loadSummerNote = () => {
    $('.summernoteEditor').summernote();
}
