    $(document).ready(function () {
        $("#list_records").jqGrid({
            url: "adminpost.php",
            datatype: "json",
            mtype: "POST",
            colNames: ["User Id","First Name", "Last Name",
                        "Middle Name",
                        "Date of Birth","Email_id",
                        "Employement","Employer","Gender",
                        "Marital-Status","Phone no","Manage"
                        ],
            colModel: [
                { name: "id",align:"right",width:100},
                { name: "first_name",width:70,editable:true},
                { name: "last_name",width:70,editable:true},
                { name: "middle_name",width:70,editable:true},
                { name: "dob",width:70,editable:true},
                { name: "email_id",width:200,editable:true},
                { name: "employement",width:70,editable:true},
                { name: "employer",width:70,editable:true},
                { name: "gender",width:70,editable:true},
                { name: "marital",width:70,editable:true},
                { name: "phone",width:100,editable:true},
                { name: "actions",width: 60,formatter: "actions",
                    formatoptions: {
                        keys: true,
                        editOptions: {},
                        addOptions: {},
                        delOptions: {}
                    }   }, 
            ],
            
            rowNum: 10,
            rowList: [10,20],
            sortname: "id",
            sortorder: "asc",
            search: true,
            height: '100%',
            width: '1030',
            loadonce:true,
            viewrecords: true,
            gridview: true,
            multiselect: true,
            caption: "Employee Details",
            pager: "#perpage",
          /*idComplete: function(){
                var ids = jQuery("#list_records").jqGrid('getDataIDs');
                for(var i=0;i<ids.length;i++){
                var cl = ids[i];
                be = "<input style='height:22px;width:40px;' type='button' value='Edit' onclick=\"jQuery('#list_records')";
                be += ".jqGrid('editRow','"+cl+"');\"  />"; 
                se = "<input style='height:22px;width:40px;' type='button' value='Save' onclick=\"jQuery('#list_records')";
                se += ".jqGrid('saveRow','"+cl+"');\"  />"; 
                ce = "<input style='height:22px;width:50px;' type='button' value='Cancel' onclick=\"jQuery('#list_records')";
                ce += ".jqGrid('restoreRow','"+cl+"');\" />"; 
                de = "<input style='height:22px;width:80px;' type='submit' value='Delete' onclick=\"jQuery('#list_records')";
                de += ".jqGrid('delRowData','"+cl+"');\" />"; 
                jQuery("#list_records").jqGrid('setRowData',ids[i],{act:be+se+ce+de});
                }   
            },*/
            editurl: 'adminupdate.php'
           //editurl: 'delete.php'
        });  
            
            $('#list_records').navGrid('#perpage', { edit: true, add: false, del: true, search: true, refresh: true, view: false, position: "left", cloneToTop: true });

    });