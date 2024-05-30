/*=========================================================================================
    File Name: jsgrid.js
    Description: jsgrid Datatable.
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Version: 1.0
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function() {

/****************************
*      Basic Scenario       *
****************************/

$("#basicScenario").jsGrid({
width: "100%",
filtering: true,
editing: true,
inserting: true,
sorting: true,
paging: true,
autoload: true,
pageSize: 15,
pageButtonCount: 5,
deleteConfirm: "Do you really want to delete the client?",
controller: db,
fields: [
    { name: "Name", type: "text", width: 150 },
    { name: "Age", type: "number", width: 50 },
    { name: "Address", type: "text", width: 200 },
    { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
    { name: "Married", type: "checkbox", title: "vvvvvvvvvv", sorting: false },
    { type: "control" }
]
});


});
