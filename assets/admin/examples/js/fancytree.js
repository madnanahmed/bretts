(function ($) {

    //FANCY

    var tree_glyph_options = {
            map: {
                checkbox: "fa fa-square-o fa-fw",
                checkboxSelected: "fa fa-check-square fa-fw",
                checkboxUnknown: "fa fa-check-square fa-fw fa-muted",
                error: "fa fa-exclamation-triangle fa-fw",
                expanderClosed: "fa fa-caret-right fa-fw",
                expanderLazy: "fa fa-angle-right fa-fw",
                expanderOpen: "fa fa-caret-down fa-fw",
                doc: "fa fa-file-o fa-fw",
                noExpander: "",
                docOpen: "fa fa-file fa-fw",
                loading: "fa fa-refresh fa-spin fa-fw",
                folder: "fa fa-folder fa-fw",
                folderOpen: "fa fa-folder-open fa-fw"
            }
        },
        tree_dnd_options = {
            autoExpandMS: 400,
            focusOnClick: true,
            preventVoidMoves: true, // Prevent dropping nodes 'before self', etc.
            preventRecursiveMoves: true, // Prevent dropping nodes on own descendants
            dragStart: function(node, data) {
                /** This function MUST be defined to enable dragging for the tree.
                 *  Return false to cancel dragging of node.
                 */
                return true;
            },
            dragEnter: function(node, data) {
                /** data.otherNode may be null for non-fancytree droppables.
                 *  Return false to disallow dropping on node. In this case
                 *  dragOver and dragLeave are not called.
                 *  Return 'over', 'before, or 'after' to force a hitMode.
                 *  Return ['before', 'after'] to restrict available hitModes.
                 *  Any other return value will calc the hitMode from the cursor position.
                 */
                // Prevent dropping a parent below another parent (only sort
                // nodes under the same parent)
                /*
                 if(node.parent !== data.otherNode.parent){
                 return false;
                 }
                 // Don't allow dropping *over* a node (would create a child)
                 return ["before", "after"];
                 */
                return true;
            },
            dragDrop: function(node, data) {
                /** This function MUST be defined to enable dropping of items on
                 *  the tree.
                 */
                data.otherNode.moveTo(node, data.hitMode);
            }
        };

    /**
     * jQuery plugin wrapper for compatibility
     */
    $.fn.APFancyTree = function(){

        if (! this.length) return;

        if (typeof $.fn.fancytree == 'undefined') return;

        var extensions = [ "glyph" ];
        if (typeof this.attr('data-tree-dnd') !== "undefined") {
            extensions.push( "dnd" );
        }
        this.fancytree({
            extensions: extensions,
            glyph: tree_glyph_options,
            dnd: tree_dnd_options,
            clickFolderMode: 3,
            checkbox: typeof this.attr('data-tree-checkbox') !== "undefined" || false,
            selectMode: typeof this.attr('data-tree-select') !== "undefined" ? parseInt(this.attr('data-tree-select')) : 2
        });

    };

    // using default options
    $('[data-toggle="tree"]').each(function () {
        $(this).APFancyTree();
    });


}(jQuery));