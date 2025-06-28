import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

document.addEventListener("DOMContentLoaded", () => {
    if (document.querySelector("#content")) {
        const csrfTokenElement = document.head.querySelector(
            'meta[name="csrf-token"]',
        );
        let csrfToken = null;

        if (csrfTokenElement) {
            csrfToken = csrfTokenElement.content;
        } else {
            console.error(
                "CSRF token meta tag not found. CKEditor uploads might fail.",
            );
            return; // Stop execution if no CSRF token is found
        }

        // URL upload dengan token sebagai query parameter
        // Pastikan route 'admin.upload-ckeditor-image' sesuai dengan web.php
        const uploadUrl = `/upload-ckeditor-image?_token=${csrfToken}`;

        ClassicEditor.create(document.querySelector("#content"), {
            ckfinder: {
                uploadUrl: uploadUrl,
            },
        })
            .then((editor) => {
                // Tambahkan tinggi minimum 500px ke elemen editor
                editor.ui.view.editable.element.style.minHeight = "500px";

                window.editor = editor;
                console.log("CKEditor initialized successfully on this page!");
            })
            .catch((error) => {
                console.error("Error while initializing CKEditor:", error);
                if (error.response) {
                    console.error("Server response:", error.response);
                }
            });
    }
});
