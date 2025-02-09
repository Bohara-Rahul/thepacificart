const {
  ClassicEditor,
  Essentials,
  Bold,
  Italic,
  Font,
  Paragraph
} = CKEDITOR;

ClassicEditor
  .create( document.querySelector( '#description' ), {
      licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NDAzNTUxOTksImp0aSI6IjU2ZTE1NDkzLWU4NjgtNDIxYS05Y2UwLWVjNTAzZGY2NWU3MCIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6IjNiYWZlZmI4In0.lr4k-vrMtQgr2BUJ1IRZcpahRCMAqdHWv-vxVn_IxNmbM8CYRFwHs5L0IVBinVuFWL0TtYtJ7_g17yqgrzP1gA',
      plugins: [ Essentials, Bold, Italic, Font, Paragraph],
      toolbar: [
          'undo', 'redo', '|', 'bold', 'italic', '|',
          'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
      ]
  } )
  .then( /* ... */ )
  .catch( /* ... */ );