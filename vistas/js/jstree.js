$(document).ready(function() {
    //fill data to tree  with AJAX call
    $('#tree-container').jstree({
        'plugins': ["sort", "types", "themes"],
        types: {
            "root": {
                "icon": "glyphicon glyphicon-plus"
            },
            "child": {
                "icon": "glyphicon glyphicon-leaf"
            },
            "default": {}
        },
        // Using types - most of the time this is an overkill

        // read the docs carefully to decide whether you need types



        'core': {
            'data': {
                "url": "ajax/tree_data.php",
                contentType: "application/x-javascript; charset:utf-8",
                "dataType": "json" // needed only if you do not supply JSON headers
            }
        },
    })
});







/*$('#tree-container').jstree({
    'core': {

        'data': [{
            "id": "1.0",
            "text": "Fresh Products",
            "icon": "fas fa-user-graduate",
            "state": {
                "opened": false,
                "disabled": false,
                "selected": false
            },
            "children": [{
                "id": "2.06.0",
                "text": "Ethnic & Specialty",
                "icon": "fas fa-user-md",
                "state": {
                    "opened": false,
                    "disabled": false,
                    "selected": false
                },
                "children": false,
                "liAttributes": null,
                "aAttributes": null
            }, {
                "id": "2.07.0",
                "text": "Natural & Organic",
                "icon": "",
                "state": {
                    "opened": false,
                    "disabled": false,
                    "selected": false
                },
                "children": false,
                "liAttributes": null,
                "aAttributes": null
            }, {
                "id": "2.08.0",
                "text": "Prepared Foods",
                "icon": "",
                "state": {
                    "opened": false,
                    "disabled": false,
                    "selected": false
                },
                "children": false,
                "liAttributes": null,
                "aAttributes": null
            }, {
                "id": "2.09.0",
                "text": "Seafood",
                "icon": "",
                "state": {
                    "opened": false,
                    "disabled": false,
                    "selected": false
                },
                "children": false,
                "liAttributes": null,
                "aAttributes": null
            }, {
                "id": "2.010.0",
                "text": "Seafood",
                "icon": "",
                "state": {
                    "opened": false,
                    "disabled": false,
                    "selected": false
                },
                "children": false,
                "liAttributes": null,
                "aAttributes": null
            }],
            "liAttributes": null,
            "aAttributes": null
        }, {
            "id": "2.0",
            "text": "Frozen Products",
            "icon": "",
            "state": {
                "opened": false,
                "disabled": false,
                "selected": false
            },
            "children": [],
            "liAttributes": null,
            "aAttributes": null
        }, {
            "id": "3.0",
            "text": "Store Equipment ",
            "icon": "",
            "state": {
                "opened": false,
                "disabled": false,
                "selected": false
            },
            "children": [],
            "liAttributes": null,
            "aAttributes": null
        }, {
            "id": "4.0",
            "text": "Packaged Grocery",
            "icon": "",
            "state": {
                "opened": false,
                "disabled": false,
                "selected": false
            },
            "children": [],
            "liAttributes": null,
            "aAttributes": null
        }, {
            "id": "5.0",
            "text": "Retail Technology",
            "icon": "",
            "state": {
                "opened": false,
                "disabled": false,
                "selected": false
            },
            "children": [],
            "liAttributes": null,
            "aAttributes": null
        }, {
            "id": "6.0",
            "text": "HBC/Non-Foods",
            "icon": "",
            "state": {
                "opened": false,
                "disabled": false,
                "selected": false
            },
            "children": [],
            "liAttributes": null,
            "aAttributes": null
        }]



    },
    "search": {

        "case_insensitive": true,
        "show_only_matches": true


    },

    "plugins": ["search"]


});
});*/