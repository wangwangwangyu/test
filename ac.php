sasa
        field: 'Actions',
            OrderID:'OrderID',
            title: 'Actions',
            sortable: false,
            width: 110,
            overflow: 'visible',
            textAlign: 'left',
	        autoHide: false,

            template: function(OrderID) {

	            return '\
                    <div class="dropdown">\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-sm" data-toggle="dropdown">\
                            <i class="flaticon2-settings"></i>\
                        </a>\
                        <div class="dropdown-menu dropdown-menu-right">\
                            <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\
                            <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\
                            <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>\
                        </div>\
                    </div>\
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-sm " data-record-id="'+OrderID.OrderID+'"title="Edit details">\
                        <i class="flaticon2-file"></i>\
                    </a>\
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Deletex" ">\
                       x<i class="flaticon2-delete"></i>\
                    </a>\
                ';
            },
        }],
    };


    // basic demo
    var localSelectorDemo = function() {

        options.search = {
            input: $('#generalSearch'),
        };

        var datatable = $('#local_record_selection').KTDatatable(options);

        $('#kt_form_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_form_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_form_status,#kt_form_type').selectpicker();

        datatable.on(
            'kt-datatable--on-check kt-datatable--on-uncheck kt-datatable--on-layout-updated',
            function(e) {
                var checkedNodes = datatable.rows('.kt-datatable__row--active').nodes();

                var count = checkedNodes.length;
                $('#kt_datatable_selected_number').html(count);
                if (count > 0) {
                    $('#kt_datatable_group_action_form').collapse('show');
                } else {
                    $('#kt_datatable_group_action_form').collapse('hide');
                }
            });
        datatable.on('click', '[data-record-id]', function() {
            var x= 'id:'+$(this).attr('data-record-id');
            swal.fire(x);
            console.log(x);
        });
