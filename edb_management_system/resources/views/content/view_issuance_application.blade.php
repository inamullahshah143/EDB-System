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
                                    <th> List of Plants</th>
                                    <th> List of Vendors</th>
                                    <th> Brand Details</th>
                                    <th> Parts Catalogue</th>
                                    <th> Lease Aggrement</th>
                                    <th> Lease Aggrement Validity</th>
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
                            <h6>Name:</h6>
                            <h6>Email:</h6>
                            <h6>Phone No.:</h6>
                            <h6>Under SRO:</h6>
                            <h6>Category:</h6>
                            <h6>SECP Registration No.:</h6>
                            <h6>NTN:</h6>
                            <h6>STRN:</h6>
                            <h6>Brand Name:</h6>
                            <h6>POC:</h6>
                            <h6>POC Cell:</h6>
                            <h6>Registration Address:</h6>
                            <h6>Factory Address:</h6>
                            <h6>Name of Organization:</h6>
                        </div>
                        <div class="col-sm-8">
                            <h6 id="name"></h6>
                            <h6 id="email"></h6>
                            <h6 id="tel"></h6>
                            <h6 id="sro"></h6>
                            <h6 id="type_of_wheeler"></h6>
                            <h6 id="secp_registration_no"></h6>
                            <h6 id="ntn"></h6>
                            <h6 id="strn"></h6>
                            <h6 id="product_brand"></h6>
                            <h6 id="poc"></h6>
                            <h6 id="poc_cell"></h6>
                            <h6 id="registration_address"></h6>
                            <h6 id="factory_address"></h6>
                            <h6 id="name_of_organization"></h6>
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
                        <h6>Vehicle Name:</h6>
                        <h6>Vehicle Maker:</h6>
                        <h6>Vehicle Model:</h6>
                        <h6>Vehicle HS Code:</h6>
                        <h6>Category:</h6>
                        <h6>Under SRO:</h6>
                    </div>
                    <div class="col-sm-8">
                        <h6 id="vehicle_name"></h6>
                        <h6 id="vehicle_make"></h6>
                        <h6 id="vehicle_model"></h6>
                        <h6 id="vehicle_hs_code"></h6>
                        <h6 id="category"></h6>
                        <h6 id="under_sro"></h6>
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
