//import { log } from "util";

 //console.log(this.getAttribute("data-value"));

$(document).ready(function () {
	/***************************************
     ******* IsDelete-Selectall**************
     * **************************************/
	$('#IsDelete-SelectAll').on('click', function () {
		
		var arrIsDelete = Array.from($(".item-isdelete").get());

        if ($('#IsDelete-SelectAll').is(':checked') == true) {
            arrIsDelete.forEach(function (Id) {
                
				if (String(Id.checked) == "false") {
                    Id.checked = true;
                    Id.setAttribute('data-val', 'true');
                    Id.classList.add('delete-now');
                    //Id.addClass('Hardik');
				}
			});
		}
		else {
			arrIsDelete.forEach(function (Id) {
				if (String(Id.checked) == "true") {
                    Id.checked = false;
                    Id.setAttribute('data-val', 'false');
                    Id.classList.remove('delete-now');
				}
			});
        }

        //e.stopPropagation();
    });

	$('#IsRetrive-SelectAll').on('click', function () {
		
		var arrIsDelete = Array.from($(".item-isretrive").get());

		if ($('#IsRetrive-SelectAll').is(':checked') == true) {
			arrIsDelete.forEach(function (Id) {

				if (String(Id.checked) == "false") {
					Id.checked = true;
					Id.setAttribute('data-val', 'true');
					Id.classList.add('delete-now');
					//Id.addClass('Hardik');
				}
			});
		}
		else {
			arrIsDelete.forEach(function (Id) {
				if (String(Id.checked) == "true") {
					Id.checked = false;
					Id.setAttribute('data-val', 'false');
					Id.classList.remove('delete-now');
				}
			});
		}

		//e.stopPropagation();
	});

	/***************************************
     ******* IsActive_Multiple**************
     * **************************************/
	$('#isactive-multiple').on('click', function () {
        
        alert('call');
		//var Id = $(this).attr('data-value');
		//console.log(Id);
		var url = window.location.pathname.split("/");
        var Area = url[1];
        var controller = "";
        if (Area == "Event") {
            controller = url[2];
        }
        else {
            controller = url[1];
        }
		var IsActiveList = Array.from($(".item-isactive").get());//.each(function () {});
		//console.log(IsActiveList);
		//console.log(IsActiveList["val"]);
		//console.log(IsActiveList[1]);
		//console.log(IsActiveList[1].id);
		//console.log(IsActiveList[1].checked);
		//console.log(IsActiveList[1].id.split("-")[1]);

		var IsActiveIds = "";
		var IsDeactiveIds = "";

		IsActiveList.forEach(function (Id)
		{
			console.log(Id.getAttribute("data-val"));
			console.log(String(Id.checked));
			if (String(Id.checked) == Id.getAttribute("data-val") && String(Id.checked) == "false") {
				IsDeactiveIds += "," + Id.id.split("-")[1];
			}
			else if (String(Id.checked) == Id.getAttribute("data-val") && String(Id.checked) == "true") {
				IsActiveIds += "," + Id.id.split("-")[1];
			}
		});
		IsDeactiveIds = IsDeactiveIds.substr(1, IsDeactiveIds.length);
		IsActiveIds = IsActiveIds.substr(1, IsActiveIds.length);

        //var jqueryurl = '/' + controller + '/IsActive_Multiple';
        var jqueryurl = "";

        if (Area == "Event") {
            jqueryurl = '/' + 'Event/' + controller + '/IsActive_Multiple';
        }
        else {
            jqueryurl = '/' + controller + '/IsActive_Multiple';
        }

		swal({
			title: 'Are you sure?',
			text: "You wants to update records.",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#0CC27E',
			cancelButtonColor: '#FF586B',
			confirmButtonText: 'Yes, update it!',
			cancelButtonText: 'No, cancel!',
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
	});

	/***************************************
     ******* IsDelete_Multiple**************
     * **************************************/
	$('#isdelete-multiple').on('click', function () {
                
		var url = window.location.pathname.split("/");
        var Area = url[1];
        var controller = "";
        if (Area == "Event") {
            controller = url[2];
        }
        else {
            controller = url[1];
        }
        //var IsDeleteList = Array.from($(".item-isdelete").get());//.each(function () {});

        var oTable = $('.data-table').dataTable();
        var Ids = "";

        $(".item-isdelete:checked", oTable.fnGetNodes()).each(function () {
              Ids += "," + this.id.split("-")[1];
        });

        //  IsDeleteList.forEach(function (Id) {
        //  console.log(Id.getAttribute("data-val"));
		//	if (String(Id.checked) != Id.getAttribute("data-val")) {
		//		Ids += "," + Id.id.split("-")[1];
		//	}
		//});
		
		Ids = Ids.substr(1, Ids.length);
        var jqueryurl = "";

        if (Area == "Event") {
            jqueryurl = '/' + 'Event/' + controller + '/IsDelete_Multiple';
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
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, cancel!',
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
                                'Your record(s) has been deleted.',
                                'success'
                            )
                            
                            if (Area == "Event") {
                                location = '/' + 'Event/' + controller + '/Index';
                            }
                            else {
                                location = '/' + controller + '/Index';
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
	});

	/***************************************
     ******* IsRetrive_Multiple**************
     * **************************************/
	$('#isretrive-multiple').on('click', function () {
		
		var url = window.location.pathname.split("/");
		var controller = url[1];
		
		var oTable = $('.data-table').dataTable();
		var Ids = "";

		$(".item-isretrive:checked", oTable.fnGetNodes()).each(function () {
			Ids += "," + this.id.split("-")[1];
		});

		
		
		Ids = Ids.substr(1, Ids.length);
		var jqueryurl = '/' + controller + '/IsRetrive_Multiple';
		
		swal({
			title: 'Are you sure?',
			text: "You wants to retrive records.",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#0CC27E',
			cancelButtonColor: '#FF586B',
			confirmButtonText: 'Yes, retrive it!',
			cancelButtonText: 'No, cancel!',
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
								'Retrived!',
								'Your record(s) has been retrived.',
								'success'
							)
							location = '/' + controller + '/GetAll_ByDeleted';
						}
						else {
							swal(
								'Error!',
								'Error in data retrive.\nTry again.',
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
					'No retrive.',
					'error'
				)
			}
		})
	});


	/***************************************
     ******* IsRetrive_Multiple**************
     * **************************************/
	$('#isretrive-multiple').on('click', function () {
		
		var url = window.location.pathname.split("/");
		var controller = url[1];
		
		var oTable = $('.data-table').dataTable();
		var Ids = "";

		$(".item-isretrive:checked", oTable.fnGetNodes()).each(function () {
			Ids += "," + this.id.split("-")[1];
		});

		
		
		Ids = Ids.substr(1, Ids.length);
		var jqueryurl = '/' + controller + '/IsRetrive_Multiple';
		
		swal({
			title: 'Are you sure?',
			text: "You wants to retrive records.",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#0CC27E',
			cancelButtonColor: '#FF586B',
			confirmButtonText: 'Yes, retrive it!',
			cancelButtonText: 'No, cancel!',
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
								'Retrived!',
								'Your record(s) has been retrived.',
								'success'
							)
							location = '/' + controller + '/GetAll_ByDeleted';
						}
						else {
							swal(
								'Error!',
								'Error in data retrive.\nTry again.',
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
					'No retrive.',
					'error'
				)
			}
		})
	});


	/***************************************
     ******* IsDelete**************
     * **************************************/
	$('.deleteItem').on('click', function () {
		var Id = $(this).attr('data-value');
		var url = window.location.pathname.split("/");
		var controller = url[1];

		swal({
			title: 'Are you sure?',
			text: "You wants to delete this record. <br/> <br/> You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#0CC27E',
			cancelButtonColor: '#FF586B',
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, cancel!',
			confirmButtonClass: 'btn btn-success btn-raised mr-5',
			cancelButtonClass: 'btn btn-danger btn-raised',
			buttonsStyling: false
        }).then(function () {            
            if (Id > 0) {                
                $.get('/' + controller + '/IsDelete', { Id: Id }, function (data) {                    
					if (data != null) {
						var opts = data;
						//Alert: Delete Successful
						swal(
                            'Deleted!',
                            'Your imaginary file has been deleted.',
                            'success'
                        )
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
                    'Your imaginary file is safe :)',
                    'error'
                )
			}
		})
    });

	$('.item-isdelete').on('click', function () { 
		//console.log($(this).attr('data-val'));
		var tr = $(this).closest('tr');
		if ($(this).attr('data-val') == "true")
		{
			$(this).attr('checked', false);
			$(this).attr('data-val', 'false');
			$(this).checked = false;
			$(this).removeClass("delete-now");
			tr.addClass('selected');
		}
		else {
			$(this).attr('checked', true);
			$(this).attr('data-val', 'true');
			$(this).checked = true;
			$(this).addClass("delete-now");
			tr.removeClass('selected');
		}
        //$(this).setAttribute('data-val', 'true');
	});

	$('.item-isactive').on('click', function () {
		
		//console.log($(this).attr('data-val'));
		var tr = $(this).closest('tr');
		if ($(this).attr('data-val') == "true") {
			$(this).attr('checked', false);
			$(this).attr('data-val', 'false');
			$(this).checked = false;
			$(this).removeClass("active-now");
			tr.addClass('selected');
		}
		else {
			$(this).attr('checked', true);
			$(this).attr('data-val', 'true');
			$(this).checked = true;
			$(this).addClass("active-now");
			tr.removeClass('selected');
		}
		//$(this).setAttribute('data-val', 'true');
		//var tr = $(this).closest('tr');
		//tr.addClass('selected');
	});

  //  $('.custom-control-label').on('click', function () {
		////var cbIsDelete = $(this).siblings('input');
		////cbIsDelete.attr('data-val', 'true');
		////cbIsDelete.addClass('delete-now');
		////var cbIsDeleteRow = $(this).closest('tr');
		////cbIsDeleteRow.addClass('selected');

		//console.log(this);
		//var cbItem = $(this).siblings('input');
		//console.log(cbItem.checked);
		//if (cbItem.checked) {
		//	cbItem.attr('data-val', 'false');
		//	cbItem.removeClass('delete-now');
		//	cbItem.checked = false;
		//} else {
		//	cbItem.attr('data-val', 'true');
		//	cbItem.addClass('delete-now');
		//	cbItem.checked = true;
		//}
		//if (cbItem.hasClass('item-isdelete')) {
		//	var cbItemRow = $(this).closest('tr');
		//	cbItemRow.addClass('selected');
		//}
		//else if (cbItem.hasClass('item-isactive')) {
		//	var cbItemRow = $(this).closest('tr');
		//	cbItemRow.addClass('selected');
		//}



  //      //var arrRow = Array.from($("tr.selected").get());
  //      //console.log(arrRow);

  //      //var arrCB = Array.from($(".delete-now").get());
  //      //console.log(arrCB);

  //      //var $table = $('.data-table').dataTable();
  //      //var allNodes = $table.fnGetNodes();

  //      //var deleteRows = $('.data-table').DataTable().rows({ selected: true }).ids(true);  

  //      //console.log(deleteRows);

  //      //var count = table.rows({ selected: true }).count();
  //      //console.log(allNodes.id);
  //  });
});
