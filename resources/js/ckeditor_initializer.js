import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

document.addEventListener("DOMContentLoaded", () => {
    if (document.querySelector("#content")) {
        const csrfToken = document.head.querySelector(
            'meta[name="csrf-token"]',
        )?.content;

        const uploadUrl = "/upload-ckeditor-image" + "?_token=" + csrfToken;

        ClassicEditor.create(document.querySelector("#content"), {
            ckfinder: {
                uploadUrl: uploadUrl,
            },
        })
            .then((editor) => {
                window.editor = editor;
                console.log("CKEditor initialized successfully on this page!");
            })
            .catch((error) => {
                console.error("Error while initializing CKEditor:", error);
            });
    }
});
