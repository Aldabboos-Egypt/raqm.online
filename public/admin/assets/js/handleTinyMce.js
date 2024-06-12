// Function to load TinyMCE script
function loadTinyMCEScript() {
    return new Promise((resolve, reject) => {
      const script = document.createElement('script');
      script.src = 'https://cdn.tiny.cloud/1/xinfre85r3x296dyskrhlp84bidx71ehfl4orgx1iqmb9pai/tinymce/6/tinymce.min.js';
      script.onload = resolve;
      script.onerror = reject;
      document.body.appendChild(script);
    });
  }

  // Function to initialize TinyMCE in the modal
  async function initTinyMCEInModal() {
    try {
      await loadTinyMCEScript();
      tinymce.init({
        selector: '#description-tinymce-editor',
        plugins: 'code',
        toolbar: 'undo redo | code'
      });
    } catch (error) {
      console.error('Error loading TinyMCE:', error);
    }
  }

  // Load and initialize TinyMCE when the modal is opened
  initTinyMCEInModal();
