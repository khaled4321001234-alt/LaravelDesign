/**
 * quill-textarea.js — improved version
 * Replaces each .quilljs-textarea with a Quill editor inline,
 * keeping proper height and not bleeding into sibling elements.
 */
function quilljs_textarea(selector, options) {
    var textareas = document.querySelectorAll(selector);

    textareas.forEach(function (textarea) {
        // Hide original textarea
        textarea.style.display = 'none';

        // Create wrapper div AFTER the textarea (sibling, not child)
        var wrapper = document.createElement('div');
        wrapper.className = 'quill-editor-wrapper';
        wrapper.style.cssText = 'position:relative; width:100%; margin-bottom:0;';
        textarea.parentNode.insertBefore(wrapper, textarea.nextSibling);

        // Init Quill on wrapper
        var quill = new Quill(wrapper, options);

        // Set initial content from textarea
        var content = textarea.value.trim();
        if (content) {
            // If content looks like HTML
            if (content.indexOf('<') !== -1) {
                quill.root.innerHTML = content;
            } else {
                quill.setText(content);
            }
        }

        // Sync back to textarea on change
        quill.on('text-change', function () {
            textarea.value = quill.root.innerHTML;
        });

        // Also sync on form submit
        var form = textarea.closest('form');
        if (form) {
            form.addEventListener('submit', function () {
                textarea.value = quill.root.innerHTML;
            }, { once: false });
        }
    });
}