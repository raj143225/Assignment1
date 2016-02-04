    $(document).ready(function () {
        $("#list_records").jqGrid({
            url: "adminpost.php",
            datatype: "json",
            mtype: "POST",
            colNames: ["User Id","First Name", "Last Name",
                        "Middle Name",
                        "Date of Birth","Email_id",
                        "Employement","Employer","Gender",
                        "Marital-Status","Phone no","manage"
                        ],
            colModel: [
                { name: "id",align:"right",width:30},
                { name: "first_name",width:60,editable:true},
                { name: "last_name",width:60,editable:true},
                { name: "middle_name",width:60,editable:true},
                { name: "dob",width:60,editable:true},
                { name: "email_id",width:200,editable:true},
                { name: "employement",width:60,editable:true},
                { name: "employer",width:60,editable:true},
                { name: "gender",width:50,editable:true},
                { name: "marital",width:60,editable:true},
                { name: "phone",width:100,editable:true},
                { name:'act',index:'act', width:150,sortable:false}
            ],
            pager: "#perpage",
            rowNum: 10,
            rowList: [10,20],
            sortname: "id",
            sortorder: "asc",
            loadonce:'true',
            height: '500',
            
            viewrecords: true,
            gridview: true,
            caption: "Employee Details",
            gridComplete: function(){
                var ids = jQuery("#list_records").jqGrid('getDataIDs');
                for(var i=0;i<ids.length;i++){
                var cl = ids[i];
                be = "<input style='height:22px;width:40px;' type='button' value='Edit' onclick=\"jQuery('#list_records')";
                be += ".jqGrid('editRow','"+cl+"');\"  />"; 
                se = "<input style='height:22px;width:40px;' type='button' value='Save' onclick=\"jQuery('#list_records')";
                se += ".jqGrid('saveRow','"+cl+"');\"  />"; 
                ce = "<input style='height:22px;width:50px;' type='button' value='Cancel' onclick=\"jQuery('#list_records')";
                ce += ".jqGrid('restoreRow','"+cl+"');\" />"; 
                jQuery("#list_records").jqGrid('setRowData',ids[i],{act:be+se+ce});
                }   
            },
            editurl: 'adminupdate.php',
            editurl: 'delete.php'
        });  
            jQuery("#list_records").jqGrid('navGrid',"#list_records",{edit:false,search:true,add:false,del:false});     
    });