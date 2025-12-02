//var url = window.location.pathname.split("/");
//var controller = url[1]; 

/***************************************
************** Page Status************** 
  ***************************************/
function GetPSMessage(PSCode) {
    switch (PSCode) {
        case 1:
            return "Detail has been inserted successfully.";
        case 2:
            return "Detail has not been inserted successfully.";
        case 3:
            return "Detail has been updated successfully.";
        case 4:
            return "Detail has not been updated successfully.";
        case 5:
            return "Detail has been deleted successfully.";
        case 6:
            return "Detail has not been deleted successfully.";
    }
}
function GetPSType(PSCode) {
    switch (PSCode) {
        case 1:
            return "success";
        case 2:
            return "warning";
        case 3:
            return "question";
        case 4:
            return "info";
        case 101:
            return "error";
        case 6:
            return "Detail has not been deleted successfully.";
        default:
            return "success";
    }
}

function PSNormal(PSCode, PS, PSTitle, PSMsg, UrlRedirect = '') {
    
    swal({
        title: PSTitle,
        text: PSMsg, //GetPSMessage(PSCode),
        type: GetPSType(PSCode),//'success', 
        showCancelButton: false,
        confirmButtonColor: '#58085d',
        cancelButtonColor: '#58085d',
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok',
        //cancelButtonText: "No, cancel"
        showLoaderOnConfirm: true,
        allowOutsideClick: false
    }).then(function (isConfirm) {
        if (isConfirm) {
            console.log(GetPSType(PSCode));
            if (UrlRedirect != "") {
                window.location.href = UrlRedirect;
            }
        }
    }).catch(swal.noop);
}

function PageStatus(Title,Status, Url, Err) {
       
    if (Status == "Insert") {
        swal({
            title: Title,
            text: Title+' inserted successfully.',
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#58085d',
            cancelButtonColor: '#58085d',
            confirmButtonText: 'Ok'
            //cancelButtonText: "No, cancel"
        }).then(function (isConfirm) {
            if (isConfirm) {
                window.location.href = Url;
            }
        }).catch(swal.noop);
    }
    else if (Status == "Register") {
        swal({
            title: Title,
            text: Title + ' inserted successfully.',
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#0CC27E',
            cancelButtonColor: '#FF586B',
            confirmButtonText: 'Ok'
            //cancelButtonText: "No, cancel"
        }).then(function (isConfirm) {
            if (isConfirm) {
                window.location.href = Url;
            }
        }).catch(swal.noop);
    }
    else if (Status == "Raised") {
        swal({
            title: Title,
            text: 'Query Raised.',
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#0CC27E',
            cancelButtonColor: '#FF586B',
            confirmButtonText: 'Ok'
            //cancelButtonText: "No, cancel"
        }).then(function (isConfirm) {
            if (isConfirm) {
                window.location.href = Url;
            }
        }).catch(swal.noop);
    }
    else if (Status == "Error") {
        toastr.error(Err, 'Error!', {
            "closeButton": true, "progressBar": true, positionClass: 'toast-top-full-width', containerId: 'toast-top-full-width'
        });
    }
}

function readURL(input) {
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#PreviewImage').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function Validate_Page() {
    
    var URL = window.location.pathname.split("/");
    //var Controller = URL[1];
    //var Page = URL[2];
    var Area = URL[1];
    var controller = "";
    
    if (Area == "Event") {
        controller = URL[2];
    }
    else {
        controller = URL[1];
    }
    var Err = false;
    var RequiredObject = Array.from($('.required').get())
    var OptionalRequiredObject = Array.from($('.optional-required').get());
    //var ControlArray = RequiredObject.concat(OptionalRequiredObject);
    //console.log(ControlArray);
    //Array.from($('.optional-required').get());

    var OptionalCnt = 0;
    OptionalRequiredObject.forEach(function (Id) {
        var ControlName = Id.getAttribute("data-name");
        if (Id.tagName.toLowerCase() == "select") {
            if (Id.value == "0" || Id.value == "") {
                OptionalCnt++;
                //Err = true;
                //Notification(ControlName);
            }
        }
        else if (Id.tagName.toLowerCase() == "input") {
            var Type = Id.type.toLowerCase();
            if (Type == "text") {
                if (Id.value == "") {
                    OptionalCnt++;
                    //Err = true;
                    //Notification(ControlName);
                }
            }
            else if (Type == "number") {
                if (Id.value == "" || Id.value <= 0) {
                    OptionalCnt++;
                    //Err = true;
                    //Notification(ControlName);
                }
            }
        }
        else if (Id.tagName.toLowerCase() == "textarea") {
            if (Id.value == "") {
                OptionalCnt++;
                //Err = true;
                //Notification(ControlName);
            }
        }
    });
    if (OptionalRequiredObject.length > 0 && OptionalRequiredObject.length == OptionalCnt) {
        Notification('Plese Select to Search');
        return "invalid";
    }
    //else {
    //    return "valid";
    //}

    var ControlArray = RequiredObject;
    ControlArray.forEach(function (Id) {
        var ControlName = Id.getAttribute("data-name");

        if (Id.tagName.toLowerCase() == "select") {
            if (Id.value == "0" || Id.value == "") {
                Err = true;
                Notification("Please Select "+ControlName);
            }
        }
        else if (Id.tagName.toLowerCase() == "input") {
            var Type = Id.type.toLowerCase();

            if (Type == "text") {
                if (Id.value == "") {
                    Err = true;
                    Notification("Please Enter "+ControlName);
                }
            }
            else if (Type == "date") {
                if (Id.value == "") {
                    Err = true;
                    Notification("Please Select " + ControlName);
                }
            }
            else if (Type == "number") {
                if (Id.value == "" || Id.value <= 0) {
                    Err = true;
                    Notification("Please Enter "+ControlName);
                }
            }
            else if (Type == "file") {
                
                if (Id.value == "" || Id.value <= 0 || Id.value == null) {
                    Err = true;
                    Notification(ControlName);
                }
            }
        }
        else if (Id.tagName.toLowerCase() == "textarea") {
            var Content = tinyMCE.activeEditor.getContent();
            if (Content == "") {
                Err = true;
                Notification("Please Enter " +ControlName);
            }
        }
    });
    if (Err == true) {
        return "invalid";
    }
    else {
        return "valid";
    }
}
function PopupValidate_Page() {
    var URL = window.location.pathname.split("/");
    var Controller = URL[1];
    var Page = URL[2];
    var Err = false;
    var RequiredObject = Array.from($('.popup.required').get());

    RequiredObject.forEach(function (Id) {
        var ControlName = Id.getAttribute("data-name");

        if (Id.tagName.toLowerCase() == "select") {
            if (Id.value == "0" || Id.value == "") {
                Err = true;
                Notification("Please Select " + ControlName);
            }
        }
        else if (Id.tagName.toLowerCase() == "input") {
            var Type = Id.type.toLowerCase();

            if (Type == "text") {
                if (Id.value == "") {
                    Err = true;
                    Notification("Please Enter " + ControlName);
                }
            }
            else if (Type == "datetime") {
                if (Id.value == "") {
                    Err = true;
                    Notification("Please Select " + ControlName);
                }
            }
            else if (Type == "number") {
                if (Id.value == "" || Id.value <= 0) {
                    Err = true;
                    Notification("Please Enter " + ControlName);
                }
            }
        }
        else if (Id.tagName.toLowerCase() == "textarea") {
            if (Id.value == "") {
                Err = true;
                Notification("Please Enter " + ControlName);
            }
        }
    });
    if (Err == true) {
        return "invalid";
    }
    else {
        return "valid";
    }
}
/**
 * for error toast notification
 */
function Notification(Message) {
    toastr.error(Message, 'Error!', {
        "closeButton": true, "progressBar": true, positionClass: 'toast-top-full-width', containerId: 'toast-top-full-width', timeOut:8000
    });
}
/*****
 * clear drop down
 */
function ClearSelect(Control, Label) {
    $('#' + Control).find("option").remove();
    $('#' + Control).append(
        $('<option>', {
            value: "0",
            text: "- Select " + Label + " -"
        })
    );
}

function ClearMultiSelect(Control) {
    $('#' + Control + 'Id').empty();
}

function AddSelectOption(Control, OptionText, OptionValue) {
    $('#' + Control).append($('<option>', {
        value: OptionValue,
        text: OptionText
    }));
}

/**
 * for IsMarkAsCompleted Switch with Custom label
 * Developer: Neel
 * Date: 18-07-2020
 */
function Switch_MarkAsCompleted() {
    
    if ($("#IsMarkAsCompleted").is(":checked") == true) {
        $('#lblIsMarkAsCompleted').html("Project requirements submission is completed.");
    }
    else {
        $('#lblIsMarkAsCompleted').html("Project requirements submission is not completed.");
    }

    $('.switchery').on('change', function () {
        if (this.id == 'IsMarkAsCompleted') {
            if (this.checked == true) {
                $('#lblIsMarkAsCompleted').html("Project requirements submission is completed.");
                this.value = true;
                $(this).attr('data-val', true);
            }
            else {
                $('#lblIsMarkAsCompleted').html("Project requirements submission is not completed.");
                this.value = false;
                $(this).attr('data-val', false);
            }
        }
    });
}


/**
 * for IsActive Switch with Active - Deactive label
 * Developer: Neel
 * Date: 06-06-2020
 */
function Switch_Switchery() {

    if ($("#IsActive").is(":checked") == true) {
        $('#lblIsActive').html('Active');
    }
    else {
        $('#lblIsActive').html('Deactive');
    }

    $('.switchery').on('change', function () {
        if (this.id == 'IsActive') {
            if (this.checked == true) {
                $('#lblIsActive').html('Active');
                this.value = true;
                $(this).attr('data-val', true);
            }
            else {
                $('#lblIsActive').html('Deactive');
                this.value = false;
                $(this).attr('data-val', false);
            }
        }
    });
}

function Switch_Switchery_Notifications() {

    if ($("#ReceiveNotifications").is(":checked") == true) {
        $('#lblIsActive').html('Yes');
    }
    else {
        $('#lblIsActive').html('No');
    }

    $('.switchery').on('change', function () {
        if (this.id == 'ReceiveNotifications') {
            if (this.checked == true) {
                $('#lblIsActive').html('Yes');
                this.value = true;
                $(this).attr('data-val', true);
            }
            else {
                $('#lblIsActive').html('No');
                this.value = false;
                $(this).attr('data-val', false);
            }
        }
    });
}

function Switch_Communication_Notifications() {

    if ($("#CommunicationNotifications").is(":checked") == true) {
        $('#lblCommunicationNotifications').html('Yes');
    }
    else {
        $('#lblCommunicationNotifications').html('No');
    }

    $('.switchery').on('change', function () {
        if (this.id == 'CommunicationNotifications') {
            if (this.checked == true) {
                $('#lblCommunicationNotifications').html('Yes');
                this.value = true;
                $(this).attr('data-val', true);
            }
            else {
                $('#lblCommunicationNotifications').html('No');
                this.value = false;
                $(this).attr('data-val', false);
            }
        }
    });
}


/********************************************************************************
***********************Common Message Box Function*******************************
*******************************************************************************/
