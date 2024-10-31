/* This section of the code registers a new block, sets an icon and a category, and indicates what type of fields it'll include. */

wp.blocks.registerBlockType(`${window.smartAffiliateLinks.prefix}/affiliate-link`, {
    title: 'Affiliate Link',
    icon: 'smiley',
    category: 'common',
    attributes: {
        link: {type: 'string'},
    },

    /* This configures how the content and color fields will work, and sets up the necessary elements */

    edit: function (props) {
        function updateLink(event) {
            props.setAttributes({link: event.target.value})
        }

        return React.createElement(
            "div",
            null,
            React.createElement("input", {type: "select", value: props.attributes.content, onChange: updateLink},
                React.createElement, 'option'),
        );
    },


    save: function (props) {
        return wp.element.createElement(
            "h3",
            {style: {border: "3px solid " + props.attributes.color}},
            props.attributes.content
        );
    }
});
