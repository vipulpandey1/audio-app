$('#category').validate({
    rules: {
        name: {
            required: true,
        },
        meta: {
            required: true,
        },
        title: {
            required: true,
        },
        description: {
            required: true,
        },
        desktop_image: {
            required: true,
        },
        mobile_image: {
            required: true,
        },

    },
    messages: {
        name: {
            required: "name is required",

        },
        meta: {
            required: "meta is required",
        },
        title: {
            required: "title is required",
        },
        description: {
            required: "description is required",
        },
        desktop_image: {
            required: "desktop image is required",
        },
        mobile_image: {
            required: "mobile image is required",
        },
    },

});