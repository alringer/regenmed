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
    addButton.addEventListener( 'click', function(){
        if(customUploader){
            customUploader.open();
        }
    });
    
    customUploader.on('select', function(){
        var attachment = customUploader.state().get('selection').first().toJSON();
        img.setAttribute('src',attachment.url);
        img.setAttribute('style','width:100%');
        hiddenField.setAttribute('value', JSON.stringify( [{ id: attachment.id, url: attachment.url }] ));
    })
    
    deleteButton.addEventListener('click', function(){
        img.removeAttribute('src');
        img.removeAttribute('style');
        hiddenField.removeAttribute('value');
    })

    window.addEventListener('DOMContentLoaded', function(){
        if(customUploads && customUploads.imageData){
            console.log(customUploads.imageData);
            if(customUploads.imageData.src){
                img.setAttribute( 'src', customUploads.imageData.src);
                img.setAttribute('style','width:100%');
                var value = JSON.stringify( [customUploads.imageData]);
                console.log(value);
                console.log(hiddenField);
                hiddenField.setAttribute( 'value', value );
            }            
        }
    })
}