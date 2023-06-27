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
        
    },

});


$('#subCategory').validate({
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
       
    },

});