( function( wp ) {
    var el = wp.element.createElement;
    var registerBlockType = wp.blocks.registerBlockType;
    
    //BACKGROUND
    registerBlockType( 'regenmed/casebackground', {
        title: 'Background Text',
        icon: 'editor-table',
        category: 'common',
 
        attributes: {
            background: {
                type: 'array',
                source: 'meta',
                meta: '_case_study_background_value_key'
            }
        },
 
        edit: function( props ) {
            var className = props.className;
            var background = props.attributes.background;
            var setAttributes = props.setAttributes;
 
            function updateBackground( newBackground ) {
                setAttributes({ background: newBackground });
            }
            return el(
                'div',
                { className: className },
                el( wp.editor.RichText, {
                    tagName: "p",
                    label: 'Background Field',
                    value: background,
                    onChange: updateBackground
                } )
            );
        },
 
        // No information saved to the block
        // Data is saved to post meta via attributes
        save: function() {
            return null;
        }
    } );
    //HEADLINE
    registerBlockType( 'regenmed/caseheadline', {
        title: 'Headline',
        icon: 'welcome-widgets-menus',
        category: 'common',
 
        attributes: {
            headline: {
                type: 'array',
                source: 'meta',
                meta: '_case_study_headline_value_key'
            }
        },
 
        edit: function( props ) {
            var className = props.className;
            var headline = props.attributes.headline;
            var setAttributes = props.setAttributes;
 
            function updateHeadline( newHeadline ) {
                setAttributes({ headline: newHeadline});
            }
            return el(
                'div',
                { className: className },
                el( wp.editor.RichText, {
                    tagName: "p",
                    label: 'Headline Field',
                    value: headline,
                    onChange: updateHeadline
                } )
            );
        },
 
        // No information saved to the block
        // Data is saved to post meta via attributes
        save: function() {
            return null;
        }
    } );
} )( window.wp );
