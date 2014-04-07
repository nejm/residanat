$(function() {
    // there's the gallery and the trash
    var $specialite = $( "#specialite" ),
        $choix = $( "#choix" );

    // let the gallery items be draggable
    $( "li", $specialite ).draggable({
        cancel: "a.ui-icon", // clicking an icon won't initiate dragging
        revert: "invalid", // when not dropped, the item will revert back to its initial position
        containment: "document",
        helper: "clone",
        cursor: "move"
    });

    // let the trash be droppable, accepting the gallery items
    $choix.droppable({
        accept: "#specialite > li",
        activeClass: "ui-state-highlight",
        drop: function( event, ui ) {
            deleteImage( ui.draggable );
        }
    });

    // let the gallery be droppable as well, accepting items from the trash
    $specialite.droppable({
        accept: "#trash li",
        activeClass: "custom-state-active",
        drop: function( event, ui ) {
            recycleImage( ui.draggable );
        }
    });

    // image deletion function
    var recycle_icon = "<a href='#' title='Recycle this image' class='ui-icon ui-icon-refresh'>Recycle image</a>";
    function deleteImage( $item ) {
        $item.fadeOut(function() {
            var $list = $( "ul", $choix ).length ?
                $( "ul", $choix ) :
                $( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $choix );

            $item.find( "a.ui-icon-trash" ).remove();
            $item.appendTo( $list ).fadeIn(function() {
                $item
                    //.animate({ width: "48px" })
                    .find( "img" )
                    //.animate({ height: "36px" });
            });
        });
    }

    // image recycle function
    var trash_icon = "<a href='link/to/trash/script/when/we/have/js/off' title='Delete this image' class='ui-icon ui-icon-trash'>Delete image</a>";
    function recycleImage( $item ) {
        $item.fadeOut(function() {
            $item
                .find( "a.ui-icon-refresh" )
                .remove()
                .end()

                .append( trash_icon )
                .find( "img" )

                .end()
                .appendTo( $specialite )
                .fadeIn();
        });
    }

    // resolve the icons behavior with event delegation
    $( "ul.gallery > li" ).click(function( event ) {
        var $item = $( this ),
            $target = $( event.target );

        if ( $target.is( "a.ui-icon-trash" ) ) {
            deleteImage( $item );
        //} else if ( $target.is( "a.ui-icon-zoomin" ) ) {
            //viewLargerImage( $target );
        } else if ( $target.is( "a.ui-icon-refresh" ) ) {
            recycleImage( $item );
        }

        return false;
    });
});