if(wp.media){
    var addButton = document.getElementById('regenmed_attatchment_upload');
    var deleteButton = document.getElementById('regenmed_attatchment_delete');
    var hiddenField = document.getElementById('regenmed_attatchment_field');
    var attName = document.getElementById('regenmed_attatchment_value');
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
        }
        if( action === 'DELETE'){
            addButton.style.display="";
            deleteButton.style.display="none";
        }
    }


    addButton.addEventListener( 'click', function(){
        if(customUploader){
            customUploader.open();
        }
    });
    
    customUploader.on('select', function(){
        var attachment = customUploader.state().get('selection').first().toJSON();
        hiddenField.setAttribute('value', JSON.stringify( [{ id: attachment.id, src: attachment.url }] ));
        // customUploads.attData[0].src
        attName.setAttribute( 'href', attachment.url );
        attName.text = attachment.url;
        setVisibility("ADD");
    })
    
    deleteButton.addEventListener('click', function(){
        hiddenField.removeAttribute('value');
        attName.removeAttribute("href");
        attName.text = "";
        setVisibility("DELETE");
    })

    window.addEventListener('DOMContentLoaded', function(){
        console.log(customUploads);
        if( !customUploads.attData || customUploads.attData === "" || customUploads.attData.length === 0){
            setVisibility("DELETE");
        }
        else{
            var value = JSON.stringify( customUploads.attData);
            hiddenField.setAttribute( 'value', value );
            attName.setAttribute( 'href', customUploads.attData[0].src );
            attName.text = customUploads.attData[0].src;
            setVisibility("ADD");
        }
    })
}