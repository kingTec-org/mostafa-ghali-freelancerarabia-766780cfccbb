"use strict";
// Class definition

var KTDatatableRemoteAjaxDemo = function () {
    // Private functions

    // basic demo
    var demo = function () {

        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote', source: {
                    read: {
                        url: baseUrl + '/admin/sub-category', method: "GET", // sample custom headers
                        // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        map: function (raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                }, pageSize: 10, serverPaging: true, serverFiltering: true, serverSorting: true,
            },

            // layout definition
            layout: {
                scroll: false, footer: false,
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#kt_datatable_search_query'), key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'id',
                title: '#',
                width: 30,
                type: 'number',
                selector: false,
                textAlign: 'center',
                template: function (row) {
                    return row.id;
                },
            },
                 {
                field: 'name_ar',
                     title: 'Sub Name Arabic',
                     textAlign: "center",
                     template: function (row) {

                    return row.name_ar;
                }
            },  {
                    field: 'name_en',
                    title: 'Sub Name english',
                    textAlign: 'center',
                    template: function (row) {
                        return row.name_en;
                    },
                },{
                field: 'owner_category_en',
                    title: 'Category english',
                    textAlign: 'center',
                    template: function (row) {
                    return row.category.name_en;
                },
            }, {
                field: 'owner_category_ar',
                    title: 'Category Arabic',
                    textAlign: "center",
                    template: function (row) {

                        return row.category.name_ar;
                }
            },

                {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    width: 125,
                    overflow: 'visible',
                    autoHide: false,
                    textAlign: 'center',
                    template: function (row) {
                        return '\
                    \<a href="sub-category/show/' + row.id + '"  class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
                    \<di class="btn btn-sm-danger">\
                            <span class="svg-icon svg-icon-primary">\
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\
                                        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>\
                                         <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                    </g>\
                                </svg>\
                            </span>\
                        </a>\
                </di>\
                \<a href="sub-category/edit/' + row.id + '" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
                            <span class="svg-icon svg-icon-warning">\
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                    </g>\
                                </svg>\
                            </span>\
                        </a>\
                        <a href="sub-category/delete/' + row.id + '" class="delete_sub_category btn btn-sm btn-clean btn-icon SubCcategoryRow' + row.id + '" id="btn_delete_sub_category_' + row.id + '" title="Delete" data-id="' + row.id + '"  >\   \
                                                 <span class="svg-icon svg-icon-danger">\
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                                    </g>\
                                </svg>\
                            </span>\
                        </a>\
                    ';
                    },
                }],

        });

        $('#kt_datatable_search_status').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'is_active');
        });

        $('#kt_datatable_search_type').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    };

    return {
        // public functions
        init: function () {
            demo();
        },
    };
}();

jQuery(document).ready(function () {
    KTDatatableRemoteAjaxDemo.init();
});
