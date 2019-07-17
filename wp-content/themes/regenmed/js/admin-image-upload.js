if(wp.media){
    var addButton = document.getElementById('regenmed_alt_image_upload');
    var deleteButton = document.getElementById('regenmed_alt_image_delete');
    var hiddenField = document.getElementById('regenmed_alt_image_field');
    var img = document.getElementById('regenmed_alt_image_tag');
    var customUploader = wp.media({
        title: 'Select and Image',
        button: {
            text: 'Use this Image'
        },
        multiple: false
    })

    var setVisibility = function( action ){
        if( action === 'ADD'){
            addButton.style.display="none";
            deleteButton.style.display="";
            img.setAttribute( 'style', 'width: 100%');
        }
        if( action === 'DELETE'){
            addButton.style.display="";
            deleteButton.style.display="none";
            img.removeAttribute( 'style' );
        }
    }


    addButton.addEventListener( 'click', function(){
        if(customUploader){
            customUploader.open();
        }
    });
    
    customUploader.on('select', function(){
        var attachment = customUploader.state().get('selection').first().toJSON();
        img.setAttribute('src',attachment.url);
        img.setAttribute('style','width:100%');
        hiddenField.setAttribute('value', JSON.stringify( [{ id: attachment.id, src: attachment.url }] ));
        setVisibility("ADD");
    })
    
    deleteButton.addEventListener('click', function(){
        img.removeAttribute('src');
        img.removeAttribute('style');
        hiddenField.removeAttribute('value');
    })

    window.addEventListener('DOMContentLoaded', function(){
        if( customUploads.imageData === "" || customUploads.imageData.length === 0){
            setVisibility("DELETE");
        }
        else{
            img.setAttribute( 'src', customUploads.imageData[0].src);
            var value = JSON.stringify( customUploads.imageData);
            hiddenField.setAttribute( 'value', value );
            setVisibility("ADD");
        }
    })
}