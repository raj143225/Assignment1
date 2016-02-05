    $(document).ready(function () {
        $("#list_records").jqGrid({
            url: "adminpost.php",
            datatype: "json",
            mtype: "POST",
            colNames: ["Id","First Name", "Last Name",
                        "Middle Name",
                        "Date of Birth","Email_id",
                        "Employement","Employer","Gender",
                        "Marital-Status","Phone no","Manage"
                        ],
            colModel: [
                { name: "id",width:70},
                { name: "first_name",width:70,editable:true},
                { name: "last_name",width:70,editable:true},
                { name: "middle_name",width:70,editable:true},
                { name: "dob",edittype:"text",width:70,editable:truesearchoptions: {
                            // dataInit is the client-side event that fires upon initializing the toolbar search field for a column
                            // use it to place a third party control to customize the toolbar
                            dataInit: function (element) {
                                $(element).datepicker({
                                    id: 'orderDate_datePicker',
                                    dateFormat: 'yy-mm-dd',
                                    //minDate: new Date(2010, 0, 1),
                                    maxDate: new Date(2020, 0, 1),
                                    showOn: 'focus'
                                });
                            }
                        }},
                { name: "email_id",width:150,editable:true},
                { name: "employement",width:70,editable:true},
                { name: "employer",width:70,editable:true},
                { name: "gender",width:70,editable:true},
                { name: "marital",width:70,editable:true},
                { name: "phone",width:150,editable:true},
                { name: "actions",width: 60,formatter: "actions",filterToolbar: false,
                    formatoptions: {
                        keys: true,
                        editOptions: {},
                        addOptions: {},
                        delOptions: {}
                    }   } 
            ],
            
            rowNum: 10,
            rowList: [10,20],
            sortname: "id",
            sortorder: "asc",
            search: true,
            height: '100%',
            width: '100%',
            loadonce:true,
            viewrecords: true,
            gridview: true,
            multiselect: true,
            caption: "Employee Details",
            editurl: 'adminupdate.php',
            subGrid: true, subgridtype: 'json', // set the subgrid type to json
            subGridUrl: "sub.php",
            //shrinkToFit: false,
            //altRows: true,
            subGridModel:[{
                    //url: 'adminupdate.php',
                        name: ["R-Street","R-City","R-State","R-fax","O-Street","O-City","O-State","O-fax"],
                        width: [100,100,100,100,100,100,100,100],
                       // editable [true,true,true,true,true,true,true,true],
                        align: ["center","center","center","center","center","center","center","center"],
                        params: false
                       
            }],
            
           // editurl: 'subgrid.php',
            /*success: function(msg) {
                              if(msg.not_found == 'true') {
                                    var error = '<div class="alert-danger" role="alert">' +
                                    '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' +
                                    '<span class="sr-only">Error:</span>' +
                                    'No Results Found' +
                                    '</div>';
                                  $("div#warning").html(error);
                              }
                        }*/
           //editurl: 'delete.php'
             pager: "#perpage",
        });  
            $('#list_records').jqGrid('filterToolbar');
            $('#list_records').navGrid('#perpage', { edit: true, add: false, del: true, search: true, refresh: true, view: false, position: "left", cloneToTop: true });
});
