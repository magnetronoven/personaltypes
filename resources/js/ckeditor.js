// import CKFinder from '@ckeditor/ckeditor5-ckfinder/src/ckfinder';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

ClassicEditor
    .create( document.querySelector( '#ckeditor' ), {
        // plugins: [ CKFinder ],
        // toolbar: [ 'imageUpload' ],
        ckfinder: {
            // Upload the images to the server using the CKFinder QuickUpload command.
            uploadUrl: `${window.location.origin}/ckfinder/connector.php?command=QuickUpload&type=Images&responseType=json`
        }
    })
    .catch( error => {
        console.error( error );
    } );