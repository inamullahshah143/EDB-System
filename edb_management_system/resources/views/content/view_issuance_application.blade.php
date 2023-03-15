<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .fa-file-pdf-o {
        color: red;
    }

    .fa-file-excel-o {
        color: green;
    }
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{ $title }}</h2>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table text-nowrap" id="tableIssunaceApplication">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th> # </th>
                                    <th> Tracking ID</th>
                                    <th> OEM Details</th>
                                    <th> Vehcile Details</th>
                                    <th> Technical Agreement</th>
                                    <th> Technical Aggrement Validity</th>
                                    <th> Purchase Document</th>
                                    <th> Purchase Document Validity</th>
                                    <th> Lease Aggrement</th>
                                    <th> Lease Aggrement Validity</th>
                                    <th> Snaps of Inhouse Facilities</th>
                                    <th> Copies of STC</th>
                                    <th> Factory Map</th>
                                    <th> Manpower Breakup</th>
                                    <th> Factory Address</th>
                                    <th> Executive Details</th>
                                    <th> List of Plants</th>
                                    <th> List of Vendors</th>
                                    <th> Brand Details</th>
                                    <th> Parts Catalogue</th>
                                    <th> SRO-656 CKD</th>
                                    <th> SRO-693 CKD</th>
                                    <th> Action</th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="pdf_modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="pdf-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close  text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <iframe type="application/pdf" id="pdf" width="100%" style="height: 65vh;">No
                    Support</iframe>
            </div>
        </div>
    </div>
</div>


<!-- OEM Modal-->
<div class="modal fade" id="oem_details" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">OEM Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close  text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="row m-3">
                        <div class="col-sm-4 justify-content-start">
                            <p>Name:</p>
                            <p>Email:</p>
                            <p>Phone No.:</p>
                            <p>SECP Registration No.:</p>
                            <p>NTN:</p>
                            <p>STRN:</p>
                            <p>Brand Name:</p>
                            <p>POC:</p>
                            <p>POC Cell:</p>
                            <p>Registration Address:</p>
                            <p>Factory Address:</p>
                        </div>
                        <div class="col-sm-8">
                            <strong>
                                <p id="oem_name"></p>
                            </strong>
                            <strong>
                                <p id="oem_email"></p>
                            </strong>
                            <strong>
                                <p id="oem_phone"></p>
                            </strong>
                            <strong>
                                <p id="oem_secp_registration_no"></p>
                            </strong>
                            <strong>
                                <p id="oem_ntn_no"></p>
                            </strong>
                            <strong>
                                <p id="oem_strn_no"></p>
                            </strong>
                            <strong>
                                <p id="oem_product_brand"></p>
                            </strong>
                            <strong>
                                <p id="oem_poc"></p>
                            </strong>
                            <strong>
                                <p id="oem_poc_cell"></p>
                            </strong>
                            <strong>
                                <p id="oem_registration_address"></p>
                            </strong>
                            <strong>
                                <p id="oem_factory_address"></p>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vehicle Modal-->
<div class="modal fade" id="vehicle_details" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Vehicle Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close  text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row m-3">
                    <div class="col-sm-4 justify-content-start">
                        <p>Vehicle Name:</p>
                        <p>Vehicle Maker:</p>
                        <p>Vehicle Model:</p>
                        <p>Vehicle HS Code:</p>
                        <p>Category:</p>
                        <p>Under SRO:</p>
                    </div>
                    <div class="col-sm-8">
                        <strong>
                            <p id="vehicle_name"></p>
                        </strong>
                        <strong>
                            <p id="vehicle_make"></p>
                        </strong>
                        <strong>
                            <p id="vehicle_model"></p>
                        </strong>
                        <strong>
                            <p id="vehicle_hs_code"></p>
                        </strong>
                        <strong>
                            <p id="category"></p>
                        </strong>
                        <strong>
                            <p id="under_sro"></p>
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Proceed Application-->
<div class="modal fade" id="proceed_application" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="col text-white">
                    <h3>Process Application</h3>
                    <p>Check-boxes if documents are found to be valid</p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close  text-white"></i>
                </button>
            </div>
            <div class="modal-body">
            </div>

            <div class="modal-fotter">

            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('document').ready(function() {
            // success alert
            function swal_success() {
                Swal.fire({
                    position: 'centered',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
            // error alert
            function swal_error() {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: 'Something goes wrong !',
                    showConfirmButton: true,
                })
            }
            // table serverside
            var table = $('#tableIssunaceApplication').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                bDestroy: true,
                bJQueryUI: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ],
                ajax: "{{ route('issuance.index') }}",
                className: "text-right",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'tracking_id',
                        name: 'tracking_id',
                        className: "text-left",
                    },

                    {
                        data: 'oem_details',
                        name: 'oem_details',
                        className: "text-center",
                    },

                    {
                        data: 'vehicle_details',
                        name: 'vehicle_details',
                        className: "text-center",
                    },

                    {
                        data: 'technical_agreement_doc',
                        name: 'technical_agreement_doc',
                        className: "text-center",
                    },

                    {
                        data: 'technical_assistance_agreement',
                        name: 'technical_assistance_agreement',
                        className: "text-center",
                    },

                    {
                        data: 'purchase_doc_of_plant',
                        name: 'purchase_doc_of_plant',
                        className: "text-center",
                    },

                    {
                        data: 'purchase_doc_of_plant_validity',
                        name: 'purchase_doc_of_plant_validity',
                        className: "text-center",
                    },

                    {
                        data: 'lease_agreement',
                        name: 'lease_agreement',
                        className: "text-center",
                    },
                    {
                        data: 'lease_agreement_validity',
                        name: 'lease_agreement_validity',
                        className: "text-center",
                    },

                    {
                        data: 'snaps_of_inhouse_facilities',
                        name: 'snaps_of_inhouse_facilities',
                        className: "text-center",
                    },

                    {
                        data: 'copies_of_sales_tax_certificate',
                        name: 'copies_of_sales_tax_certificate',
                        className: "text-center",
                    },

                    {
                        data: 'factory_map',
                        name: 'factory_map',
                        className: "text-center",
                    },

                    {
                        data: 'manpower_break_up',
                        name: 'manpower_break_up',
                        className: "text-center",
                    },

                    {
                        data: 'address_of_factory',
                        name: 'address_of_factory',
                        className: "text-center",
                    },

                    {
                        data: 'name_of_chief_executive',
                        name: 'name_of_chief_executive',
                        className: "text-center",
                    },

                    {
                        data: 'list_of_plant',
                        name: 'list_of_plant',
                        className: "text-center",
                    },
                    {
                        data: 'list_of_vendor',
                        name: 'list_of_vendor',
                        className: "text-center",
                    },
                    {
                        data: 'brand_details',
                        name: 'brand_details',
                        className: "text-center",
                    },
                    {
                        data: 'parts_catalogue',
                        name: 'parts_catalogue',
                        className: "text-center",
                    },
                    {
                        data: 'ckd_under_656',
                        name: 'ckd_under_656',
                        className: "text-center",
                    },
                    {
                        data: 'ckd_under_693',
                        name: 'ckd_under_693',
                        className: "text-center",
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            // csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '#pdfBtn', function() {
                var file = $(this).attr('data-file');
                var title = $(this).attr('data-title');
                $('#pdf-title').html(title);
                $('#pdf').attr("src", file);
            });


            $(document).on('click', '#oemDetailBtn', function() {
                var oem_name = $(this).attr('data-username');
                var oem_email = $(this).attr('data-email');
                var oem_phone = $(this).attr('data-phone');
                var oem_secp_registration_no = $(this).attr('data-secp-registration-no');
                var oem_ntn_no = $(this).attr('data-ntn-no');
                var oem_strn_no = $(this).attr('data-strn-no');
                var oem_product_brand = $(this).attr('data-product-brand');
                var oem_poc = $(this).attr('data-poc');
                var oem_poc_cell = $(this).attr('data-poc-cell');
                var oem_contact = $(this).attr('data-contact');
                var oem_registration_address = $(this).attr('data-registration-address');
                var oem_factory_address = $(this).attr('data-factory-address');
                $('#oem_name').html(oem_name);
                $('#oem_email').html(oem_email);
                $('#oem_phone').html(oem_phone);
                $('#oem_secp_registration_no').html(oem_secp_registration_no);
                $('#oem_ntn_no').html(oem_ntn_no);
                $('#oem_strn_no').html(oem_strn_no);
                $('#oem_product_brand').html(oem_product_brand);
                $('#oem_poc').html(oem_poc);
                $('#oem_poc_cell').html(oem_poc_cell);
                $('#oem_poc_cell').html(oem_poc_cell);
                $('#oem_registration_address').html(oem_registration_address);
                $('#oem_factory_address').html(oem_factory_address);
            });

            $(document).on('click', '#vehicleDetailBtn', function() {
                var name = $(this).attr('data-name');
                var make = $(this).attr('data-make');
                var model = $(this).attr('data-model');
                var hs_code = $(this).attr('data-hs-code');
                var category = $(this).attr('data-category');
                var sro = $(this).attr('data-sro');
                $('#vehicle_name').html(name);
                $('#vehicle_make').html(make);
                $('#vehicle_model').html(model);
                $('#vehicle_hs_code').html(hs_code);
                $('#category').html(category);
                $('#under_sro').html(sro);
            });

            $(document).on('click', '#proceedBtn', function() {});
        });
    </script>
@endpush
