/***************************************
  ******* IsDelete_Multiple**************
   ***************************************/
function getDataToDelete() {

    var url = window.location.pathname.split("/");
    var Area = url[1];
    var controller = "";
    if (Area == "admin") {
        controller = url[2];
    }
    else {
        controller = url[1];
    }


    var IsDeleteList = Array.from($(".selected").get());//.each(function () {});

    //var oTable = $('.data-table').dataTable();

    var oTable = $('#table');
    var Ids = "";

    IsDeleteList.forEach(function (Id) {
        console.log(Id.getAttribute("data-uniqueid"));
        //alert(Id.getAttribute("data-uniqueid"));
        var listId = Id.getAttribute("data-uniqueid");
        Ids += "," + listId;

    });


    Ids = Ids.substr(1, Ids.length);
    var jqueryurl = "";

    if (Area == "admin") {
        jqueryurl = '/' + 'admin/' + controller + '/IsDelete_Multiple';
    }
    else {
        jqueryurl = '/' + controller + '/IsDelete_Multiple';
    }


    swal({
        title: 'Are you sure?',
        text: "You wants to delete records.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0CC27E',
        cancelButtonColor: '#FF586B',
        confirmButtonText: 'Yes, Delete it!',
        cancelButtonText: 'No, Cancel!',
        confirmButtonClass: 'btn btn-success btn-raised mr-5',
        cancelButtonClass: 'btn btn-danger btn-raised',
        buttonsStyling: false
    }).then(function () {
        if (Ids != "") {

            $.get(
                jqueryurl,
                { Ids: Ids },
                function (data) {
                    if (data != null) {
                        var opts = data;
                        swal(
                            'Deleted!',
                            'Your record(s) has been Deleted.',
                            'success'
                        )

                        if (Area == "admin") {
                            location = '/admin/' + controller;
                        }
                        else {
                            location = '/' + controller;
                        }
                    }
                    else {
                        swal(
                            'Error!',
                            'Error in data delete.\nTry again.',
                            'error'
                        )
                    }
                });
        }
        else {
            //Error: No selection
            swal(
                'Error!',
                'You have not selected any record.\nPlease, select atleast one record.',
                'error'
            )
        }
    }, function (dismiss) {
        // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelled',
                'No delete.',
                'error'
            )
        }
    })
}


/***************************************
   ******* IsActive_Multiple**************
     ***************************************/
function getDataToActiveDeactive(tblId) {
    
    var url = window.location.pathname.split("/");
    var Agency = url[1];
    var Area = url[2];
    
    var controller = "";
    if (Area == "admin") {
        controller = url[3];
    }
    else {
        controller = url[2];
    }
    //debugger;
    //if (controllerName != undefined && controllerName != "" && controllerName != null) {
    //    if (controller != controllerName) {
    //        controller = controllerName;
    //    }
    //}

    var IsActiveList = Array.from($(".item-isactive").get());

    
    var IsActiveIds = "";
    var IsDeactiveIds = "";

    IsActiveList.forEach(function (Id) {
        console.log(Id.getAttribute("data-val"));
        console.log(String(Id.checked));
        

        if (String(Id.checked) == "false") {
            IsDeactiveIds += "," + Id.id.split("-")[1];
        }
        else if (String(Id.checked) == "true") {
            IsActiveIds += "," + Id.id.split("-")[1];
        }
    });
    IsDeactiveIds = IsDeactiveIds.substr(1, IsDeactiveIds.length);
    IsActiveIds = IsActiveIds.substr(1, IsActiveIds.length);
    debugger;
    //var jqueryurl = '/' + controller + '/IsActive_Multiple';
    var jqueryurl = "";

    if (Area == "admin") {
        jqueryurl = '/' + Agency + '/' + 'admin/' + controller + '/IsActive_Multiple';
    }
    else {
        jqueryurl = '/' + Agency + '/' + controller + '/IsActive_Multiple';
    }
    debugger;
    swal({
        title: 'Are you sure?',
        text: "You wants to update records.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0CC27E',
        cancelButtonColor: '#FF586B',
        confirmButtonText: 'Yes, Update it!',
        cancelButtonText: 'No, Cancel!',
        confirmButtonClass: 'btn btn-success btn-raised mr-5',
        cancelButtonClass: 'btn btn-danger btn-raised',
        buttonsStyling: false
    }).then(function () {
        if (IsActiveIds != "" || IsDeactiveIds != "") {
            $.get(
                jqueryurl,
                {
                    IsActiveIds: IsActiveIds,
                    IsDeactiveIds: IsDeactiveIds
                },
                function (data) {
                    $(tblId).bootstrapTable('refresh');
                    
                    if (data != null) {
                        var opts = data;
                        //Alert: Delete Successful
                        swal(
                            'Updated!',
                            'Your record(s) has been updated.',
                            'success'
                        )
                    }
                    else {
                        swal(
                            'Error!',
                            'Error in record activate or deactive.\nPlease, try again.',
                            'error'
                        )
                    }
                });
        }
        else {
            //Error: No selection
            swal(
                'Error!',
                'There is not change records.\nPlease, change if you wants to update.',
                'error'
            )
        }
    }, function (dismiss) {
        // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelled',
                'No update.',
                'error'
            )
        }
    })

}//getDataToActiveDeactive


/***************************************
   ******* IsActive_Multiple**************
     ***************************************/
function getDataToRetrieve() {
    var url = window.location.pathname.split("/");
    var Area = url[1];
    var controller = "";
    if (Area == "admin") {
        controller = url[2];
    }
    else {
        controller = url[1];
    }

    
    var IsRetieveList = Array.from($(".selected").get());//.each(function () {});

    //var oTable = $('.data-table').dataTable();

    var oTable = $('#table');
    var Ids = "";

    IsRetieveList.forEach(function (Id) {
        console.log(Id.getAttribute("data-uniqueid"));
        //alert(Id.getAttribute("data-uniqueid"));
        var listId = Id.getAttribute("data-uniqueid");
        Ids += "," + listId;

    });

    
    Ids = Ids.substr(1, Ids.length);
    var jqueryurl = "";

    if (Area == "admin") {
        jqueryurl = '/' + 'admin/' + controller + '/IsRetrieve_Multiple';
    }
    else {
        jqueryurl = '/' + controller + '/IsRetrieve_Multiple';
    }


    swal({
        title: 'Are you sure?',
        text: "You wants to retrieve records.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0CC27E',
        cancelButtonColor: '#FF586B',
        confirmButtonText: 'Yes, Retrieve it!',
        cancelButtonText: 'No, Cancel!',
        confirmButtonClass: 'btn btn-success btn-raised mr-5',
        cancelButtonClass: 'btn btn-danger btn-raised',
        buttonsStyling: false
    }).then(function () {
        if (Ids != "") {

            $.get(
                jqueryurl,
                { Ids: Ids },
                function (data) {
                    if (data != null) {
                        var opts = data;
                        
                        swal(
                            'Retrieved!',
                            'Your record(s) has been Retrieved.',
                            'success'
                        )
                        
                        if (Area == "admin") {
                            location = '/admin/' + controller;
                        }
                        else {
                            location = '/' + controller;
                        }
                    }
                    else {
                        swal(
                            'Error!',
                            'Error in data Retrieve.\nTry again.',
                            'error'
                        )
                    }
                });
        }
        else {
            //Error: No selection
            swal(
                'Error!',
                'You have not selected any record.\nPlease, select atleast one record.',
                'error'
            )
        }
    }, function (dismiss) {
        // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelled',
                'No Retrieve.',
                'error'
            )
        }
    })

}//getDataToActiveDeactive


/***************************************
   ******* Custom_fuctions_for_Bootstrap_Grid**************
     ***************************************/
function setStaticFooter(colName) {
    return colName;
}

function checkBoxFooter() {
    return [
        '<a class="btn btn-raised btn-outline-danger danger isdelete-multiple" id="isdelete-multiple" onclick="getDataToDelete()"><i class="fa fa-trash-o font-medium-5"></i></a>'
    ].join('')
}

function multipleActiveDetactiveButton(tblId) {    
    return [
        '<button class="btn btn-raised btn-outline-primary primary isactive-multiple" id="isactive-multiple" onclick="getDataToActiveDeactive(' + tblId + ')" title="Save Active/Deactive action"><i class="fa fa-save font-medium-5"></i></button>'
    ].join('')
}

function DeletedRecordCheckBoxFooter() {
    return [
        '<a class="btn btn-raised btn-outline-primary primary isretrieve-multiple" id="isretrieve-multiple" onclick="getDataToRetrieve()"><i class="fa fa-recycle font-medium-5"></i></a>'
    ].join('')
}

function dateFormatter(value, row, index) {    

    if (value != null && value != '' && value != undefined) {
        return moment(value).format('DD/MM/YYYY');
    }
    else {
        return '-';
    }
};

//Processing export content, this method can customize the content of a row, column, or even cell, that is, set its value to what you want.
function CellFormatingOnExport(cell, row, col, data) {
    //ignoring table header titles    
    if (row == 0) {
        return data;
    }
    else {                               
        var HasCheckbox = data.includes('<input type="checkbox"'); //checking data has checkbox
        if (HasCheckbox) {                   
            var IsChecked = $(data).find('input:checkbox:first').is(":checked");  //testing checkbox is checked/unchecked                 
            if (IsChecked) {
                data = "Yes";
            }
            else {
                data = "No";
            }                    
        }            
    }
    return data;
}//CellFormatingOnExport

function goBack() {    
    window.history.back();
}

function SetURL() {
    var pageURL = window.location.pathname;
    sessionStorage.setItem("PreviousURL", pageURL);    
}

function GetURL() {
    var PreviousURL = sessionStorage.getItem("PreviousURL");
    return PreviousURL;
}