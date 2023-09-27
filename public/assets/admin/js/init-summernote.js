//** Sumernote Initialize **/
const initSummernote = (className = "summernote") => {
    // laravel filemanager image upload with summernote
    // Define function to open filemanager window
    const lfm = function(options, cb) {
        const route_prefix =
            options && options.prefix ? options.prefix : "/laravel-filemanager";
        window.open(
            route_prefix + "?type=" + options.type || "file",
            "FileManager",
            "width=900,height=600"
        );
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    const LFMButton = context => {
        const ui = $.summernote.ui;
        const button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: "Insert image with filemanager",
            click: function() {
                lfm({ type: "image", prefix: "/laravel-filemanager" }, function(
                    lfmItems,
                    path
                ) {
                    lfmItems.forEach(function(lfmItem) {
                        context.invoke("insertImage", lfmItem.url);
                    });
                });
            }
        });
        return button.render();
    };

    $(`.${className}`).summernote({
        // height: 300,                 // set editor height
        minHeight: 300, // set minimum height of editor
        maxHeight: 500, // set maximum height of editor
        focus: true, // set focus to editable area after initializing summernote
        dialogsFade: true,
        placeholder: "Write your content here...",

        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "underline"]],
            // ['font', ['bold', 'underline', 'clear','strikethrough', 'superscript', 'subscript']],
            ["fontsize", ["fontsize"]],
            // ['fontname', ['fontname']],
            ["color", ["color"]],
            // ['backcolor', ['backcolor']],
            // ['color', ['color']],
            ["para", ["ul", "ol", "paragraph"]],
            ["popovers", ["lfm"]],
            ["insert", ["link", "video"]],
            // ['table', ['table']],
            ["codeview", ["codeview"]]
        ],
        buttons: {
            lfm: LFMButton
        }
    });
};
//** Sumernote Initialize Ends **/
