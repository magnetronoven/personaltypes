// import CKFinder from '@ckeditor/ckeditor5-ckfinder/src/ckfinder';
import './ckeditorCustomBuild';

ClassicEditor
    .create( document.querySelector( '#ckeditor' ), {
        // plugins: [ CKFinder ],
        // toolbar: [ 'imageUpload' ],
        toolbar: {
            items: [
                'heading',
                '|',
                'fontColor',
                'fontSize',
                '|',
                'bold',
                'italic',
                'underline',
                'strikethrough',
                'subscript',
                'superscript',
                'link',
                'bulletedList',
                'numberedList',
                'horizontalLine',
                '|',
                'alignment',
                'indent',
                'outdent',
                '|',
                'imageUpload',
                'blockQuote',
                'insertTable',
                'mediaEmbed',
                'undo',
                'redo'
            ]
        },
        image: {
            toolbar: [
                'imageTextAlternative',
                // 'imageStyle:full',
                // 'imageStyle:side'
            ]
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        },
        ckfinder: {
            // Upload the images to the server using the CKFinder QuickUpload command.
            uploadUrl: `${window.location.origin}/ckfinder/connector?command=QuickUpload&type=Images&responseType=json`
        }
    })
    .catch( error => {
        console.error( error );
    } );