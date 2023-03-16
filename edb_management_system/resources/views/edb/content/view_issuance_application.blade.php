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
                <input type="text" name="application_id" id="application_id" hidden>
                <input type="text" name="manufecturer_id" id="manufecturer_id" hidden>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="technical_agreement_doc_check" name="technical_agreement_doc_check">
                        <label class="form-check-label" for="technical_agreement_doc_check">Technical assistance
                            agreement with the foreign principal, (if any.)</label>
                    </div>
                    <div class="form-group" id="technical_agreement_doc_div">
                        <label for="technical_agreement_doc_remarks">Deficiencies/ Remarks<span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" id="technical_agreement_doc_remarks" name="technical_agreement_doc_remarks"
                            rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="technical_agreement_doc_validatity_check"
                            name="technical_agreement_doc_validatity_check">
                        <label for="technical_agreement_doc_validatity_check" class="form-check-label">Technical
                            Agreement Document Validatity</label>
                    </div>
                    <div class="form-group" id="technical_agreement_doc_validatity_div">
                        <label for="technical_agreement_doc_validatity_remarks">Deficiencies/ Remarks <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" id="technical_agreement_doc_validatity_remarks"
                            name="technical_agreement_doc_validatity_remarks" rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory" id="list_of_plant_check"
                            name="list_of_plant_check">
                        <label class="form-check-label" for="list_of_plant_check">List of plant / machinery
                            / equipment with
                            complete specification, make /
                            model, local/ imported, if imported, name of the company as defined in
                            ‘Annexure-A’ of the SRO.</label>
                    </div>
                    <div class="form-group" id="list_of_plant_div">
                        <label for="list_of_plant_remarks">Deficiencies/ Remarks
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="list_of_plant_remarks" id="list_of_plant_remarks" rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="purchase_documents_of_plant_check" name="purchase_documents_of_plant_check">
                        <label class="form-check-label" for="purchase_documents_of_plant_check">Purchase documents
                            of plant/
                            machinery/equipment
                            installed as in-house
                            facilities.</label>
                    </div>
                    <div class="form-group" id="purchase_documents_of_plant_div">
                        <label for="purchase_documents_of_plant_remarks">Deficiencies/ Remarks
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="purchase_documents_of_plant_remarks" id="purchase_documents_of_plant_remarks"
                            rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="snaps_of_inhouse_facilities_check" name="snaps_of_inhouse_facilities_check">
                        <label class="form-check-label" for="snaps_of_inhouse_facilities_check">Snaps of in-house
                            facilities
                            e.g.
                            engine assembly & testing, vehicle final
                            assembly, paint shop, vehicle performance testing facilities and inspection
                            equipment etc.</label>
                    </div>
                    <div class="form-group" id="snaps_of_inhouse_facilities_div">
                        <label for="snaps_of_inhouse_facilities_remarks">Deficiencies/ Remarks
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="snaps_of_inhouse_facilities_remarks" id="snaps_of_inhouse_facilities_remarks"
                            rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="copies_of_sales_tax_check" name="copies_of_sales_tax_check">
                        <label class="form-check-label" for="copies_of_sales_tax_check">Copies
                            of Sales Tax
                            Certificate (STN)
                            containing the status as importer-cumassembler or manufacturer & National Tax
                            Number (NTN) certificates in the
                            name of the company.</label>
                    </div>
                    <div class="form-group" id="copies_of_sales_tax_div">
                        <label for="copies_of_sales_tax_remarks">Deficiencies/ Remarks
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="copies_of_sales_tax_remarks" id="copies_of_sales_tax_remarks" rows="3"
                            required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="products_brand_name_check" name="products_brand_name_check">
                        <label class="form-check-label" for="products_brand_name_check">Product (s) brand name to
                            be
                            assembled
                            / manufactured in-house with a copy
                            of Trade Mark Registration Certificate or acknowledgement receipt issued by
                            the IPO/ Trade Mark Registry office.</label>
                    </div>
                    <div class="form-group" id="products_brand_name_div">
                        <label for="products_brand_name_remarks">Deficiencies/ Remarks
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="products_brand_name_remarks" id="products_brand_name_remarks" rows="3"
                            required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="proof_of_factory_check" name="proof_of_factory_check">
                        <label class="form-check-label" for="proof_of_factory_check">Proof of factory premises
                            ownership or
                            copy of lease agreement, if premises
                            on rent.</label>
                    </div>
                    <div class="form-group" id="proof_of_factory_div">
                        <label for="proof_of_factory_remarks">Deficiencies/ Remarks
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="proof_of_factory_remarks" id="proof_of_factory_remarks" rows="3"
                            required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="complete_factory_map_check" name="complete_factory_map_check">
                        <label class="form-check-label" for="complete_factory_map_check">Complete factory map /
                            lay
                            out.</label>
                    </div>
                    <div class="form-group" id="complete_factory_map_div">
                        <label for="complete_factory_map_remarks">Deficiencies/ Remarks
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="complete_factory_map_remarks" id="complete_factory_map_remarks" rows="3"
                            required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="address_of_factory_check" name="address_of_factory_check">
                        <label class="form-check-label" for="address_of_factory_check">Complete address of the
                            factory and
                            registered office with phone, fax and email etc.</label>
                    </div>
                    <div class="form-group" id="address_of_factory_div">
                        <label for="address_of_factory_remarks">Deficiencies/ Remarks
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="address_of_factory_remarks" id="address_of_factory_remarks" rows="3"
                            required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="name_of_chief_executive_check" name="name_of_chief_executive_check">
                        <label class="form-check-label" for="name_of_chief_executive_check">Name of the Chief
                            Executive /
                            Managing
                            Director or an authorized officer of
                            the firm for correspondence with EDB.</label>
                    </div>
                    <div class="form-group" id="name_of_chief_executive_div">
                        <label for="name_of_chief_executive_remarks">Deficiencies/ Remarks
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="name_of_chief_executive_remarks" id="name_of_chief_executive_remarks"
                            rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="manpower_break_up_check" name="manpower_break_up_check">
                        <label class="form-check-label" for="manpower_break_up_check">Manpower break up as
                            technical/non
                            technical, (if any.)</label>
                    </div>
                    <div class="form-group" id="manpower_break_up_div">
                        <label for="manpower_break_up_remarks">Deficiencies/ Remarks
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="manpower_break_up_remarks" id="manpower_break_up_remarks" rows="3"
                            required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="parts_catalogue_check" name="parts_catalogue_check">
                        <label class="form-check-label" for="parts_catalogue_check">Parts Catalogue of vehicle
                            duly
                            signed
                            and stamped.</label>
                    </div>
                    <div class="form-group" id="parts_catalogue_div">
                        <label for="parts_catalogue_remarks">Deficiencies/ Remarks
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="parts_catalogue_remarks" id="parts_catalogue_remarks" rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="noc_from_municipal_check" name="noc_from_municipal_check">
                        <label class="form-check-label" for="noc_from_municipal_check">An NOC from the Municipal
                            Committee /
                            Town Committee.</label>
                    </div>
                    <div class="form-group" id="noc_from_municipal_div">
                        <label for="noc_from_municipal_remarks">Deficiencies/ Remarks
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="noc_from_municipal_remarks" id="noc_from_municipal_remarks" rows="3"
                            required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory"
                            id="registration_of_firm_check" name="registration_of_firm_check">
                        <label class="form-check-label" for="registration_of_firm_check">Copy of the registration
                            of
                            firm with
                            SECP in case of Private Limited or Public
                            Limited compay and registration with The Registrar of Firms in case of AOP.</label>
                    </div>
                    <div class="form-group" id="registration_of_firm_div">
                        <label for="registration_of_firm_remarks">Deficiencies/ Remarks
                            <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="registration_of_firm_remarks" id="registration_of_firm_remarks" rows="3"
                            required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory" id="format_I_check"
                            name="format_I_check">
                        <label class="form-check-label" for="format_I_check">List of 100% parts with %age index
                            constituting a
                            complte vehicle as per the
                            attached Format-I and comprising off:-<br>
                            i- Importable components.<br>
                            ii- Localized components to be procured from the vendors with their names &
                            contacts against each item.<br>
                            iii- List of componnts to be manufactured in-house.<br>
                            iv- Comparison of parts with parts contained under SRO 693(I)/2006.</label>
                    </div>
                    <div class="form-group" id="format_I_div">
                        <label for="format_I_remarks">Deficiencies/ Remarks <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="format_I_remarks" id="format_I_remarks" rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" class="compulsory" id="format_II_check"
                            name="format_II_check">
                        <label class="form-check-label" for="format_II_check">List of CKD parts to be imported
                            under
                            condition (iii) of
                            the
                            SRO for
                            verification as per attached Format-II.</label>
                    </div>
                    <div class="form-group" id="format_II_div">
                        <label for="format_II_remarks">Deficiencies/ Remarks <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" name="format_II_remarks" id="format_II_remarks" rows="3" required></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-fotter">
                <button class="btn btn-primary  btn-sm" class="close" data-dismiss="modal" type="button"
                    data-toggle="modal" data-target="#forward_application" id="accept_btn">Forward for futher
                    processing</button>
                <button class="btn btn-danger  btn-sm" name="action" type="submit" value="revision"
                    id="revision_btn">Return to OEM</button>
            </div>
        </div>
    </div>
</div>

<!-- Forward Modal -->
<div class="modal custom-modal fade" id="forward_application" role="dialog">
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title m-2">Forward Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-2">
                <div class="form-group">
                    <label>Designation</label>
                    <select class="form-control default-select wide @error('role_name') is-invalid @enderror"
                        name="role_name" id="role_name">
                        <option selected disabled>-- Select Designation --</option>
                        <option value="1">Assistant Manager</option>
                        <option value="2">Deputy Manager</option>
                        <option value="3">General Manager</option>
                        <option value="4">Chief Executive Officer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Remarks <span class="text-danger">*</span>></label>
                    <textarea class="form-control" name="" id=""></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary m-1 btn-sm" class="close" data-dismiss="modal"
                    type="submit">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- /Forward Modal -->

@push('scripts')
    <script>
        $('document').ready(function() {
            $('#technical_agreement_doc_div').show();
            $('#technical_agreement_doc_validatity_div').show();
            $('#list_of_plant_div').show();
            $('#purchase_documents_of_plant_div').show();
            $('#snaps_of_inhouse_facilities_div').show();
            $('#copies_of_sales_tax_div').show();
            $('#products_brand_name_div').show();
            $('#proof_of_factory_div').show();
            $('#complete_factory_map_div').show();
            $('#address_of_factory_div').show();
            $('#name_of_chief_executive_div').show();
            $('#manpower_break_up_div').show();
            $('#parts_catalogue_div').show();
            $('#noc_from_municipal_div').show();
            $('#registration_of_firm_div').show();
            $('#format_I_div').show();
            $('#format_II_div').show();
            var acceptBtn = document.getElementById("accept_btn").disabled = true;
            var revisionBtn = document.getElementById("revision_btn").disabled = false;

            $('.form-check-input').on('change', function() {
                if ($('.form-check-input:checked').length == $('.form-check-input').length) {
                    $('#accept_btn').prop('disabled', false);
                    $('#revision_btn').prop('disabled', true);
                } else {
                    $('#accept_btn').prop('disabled', true);
                    $('#revision_btn').prop('disabled', false);
                }
            });


            $('#technical_agreement_doc_check').on('change', function() {
                $('#technical_agreement_doc_div').toggle();
                if ($('#technical_agreement_doc_remarks').prop('required')) {
                    $('#technical_agreement_doc_remarks').prop('required', true);
                } else {
                    $('#technical_agreement_doc_remarks').prop('required', false);
                }
            });
            $('#technical_agreement_doc_validatity_check').on('change', function() {
                $('#technical_agreement_doc_validatity_div').toggle();
                if ($('#technical_agreement_doc_validatity_remarks').prop('required')) {
                    $('#technical_agreement_doc_validatity_remarks').prop('required', true);
                } else {
                    $('#technical_agreement_doc_validatity_remarks').prop('required', false);
                }
            });
            $('#list_of_plant_check').on('change', function() {
                $('#list_of_plant_div').toggle();
                if ($('#list_of_plant_remarks').prop('required')) {
                    $('#list_of_plant_remarks').prop('required', true);
                } else {
                    $('#list_of_plant_remarks').prop('required', false);
                }
            });
            $('#purchase_documents_of_plant_check').on('change', function() {
                $('#purchase_documents_of_plant_div').toggle();
                if ($('#purchase_documents_of_plant_remarks').prop('required')) {
                    $('#purchase_documents_of_plant_remarks').prop('required', true);
                } else {
                    $('#purchase_documents_of_plant_remarks').prop('required', false);
                }
            });
            $('#snaps_of_inhouse_facilities_check').on('change', function() {
                $('#snaps_of_inhouse_facilities_div').toggle();
                if ($('#snaps_of_inhouse_facilities_remarks').prop('required')) {
                    $('#snaps_of_inhouse_facilities_remarks').prop('required', true);
                } else {
                    $('#snaps_of_inhouse_facilities_remarks').prop('required', false);
                }
            });
            $('#copies_of_sales_tax_check').on('change', function() {
                $('#copies_of_sales_tax_div').toggle();
                if ($('#copies_of_sales_tax_remarks').prop('required')) {
                    $('#copies_of_sales_tax_remarks').prop('required', true);
                } else {
                    $('#copies_of_sales_tax_remarks').prop('required', false);
                }
            });
            $('#products_brand_name_check').on('change', function() {
                $('#products_brand_name_div').toggle();
                if ($('#products_brand_name_remarks').prop('required')) {
                    $('#products_brand_name_remarks').prop('required', true);
                } else {
                    $('#products_brand_name_remarks').prop('required', false);
                }
            });
            $('#proof_of_factory_check').on('change', function() {
                $('#proof_of_factory_div').toggle();
                if ($('#proof_of_factory_remarks').prop('required')) {
                    $('#proof_of_factory_remarks').prop('required', true);
                } else {
                    $('#proof_of_factory_remarks').prop('required', false);
                }
            });
            $('#complete_factory_map_check').on('change', function() {
                $('#complete_factory_map_div').toggle();
                if ($('#complete_factory_map_remarks').prop('required')) {
                    $('#complete_factory_map_remarks').prop('required', true);
                } else {
                    $('#complete_factory_map_remarks').prop('required', false);
                }
            });
            $('#address_of_factory_check').on('change', function() {
                $('#address_of_factory_div').toggle();
                if ($('#address_of_factory_remarks').prop('required')) {
                    $('#address_of_factory_remarks').prop('required', true);
                } else {
                    $('#technical_agreement_doc_remarks').prop('required', false);
                }
            });
            $('#name_of_chief_executive_check').on('change', function() {
                $('#name_of_chief_executive_div').toggle();
                if ($('#name_of_chief_executive_remarks').prop('required')) {
                    $('#name_of_chief_executive_remarks').prop('required', true);
                } else {
                    $('#name_of_chief_executive_remarks').prop('required', false);
                }
            });
            $('#manpower_break_up_check').on('change', function() {
                $('#manpower_break_up_div').toggle();
                if ($('#manpower_break_up_remarks').prop('required')) {
                    $('#manpower_break_up_remarks').prop('required', true);
                } else {
                    $('#manpower_break_up_remarks').prop('required', false);
                }
            });
            $('#parts_catalogue_check').on('change', function() {
                $('#parts_catalogue_div').toggle();
                if ($('#parts_catalogue_remarks').prop('required')) {
                    $('#parts_catalogue_remarks').prop('required', true);
                } else {
                    $('#parts_catalogue_remarks').prop('required', false);
                }
            });
            $('#noc_from_municipal_check').on('change', function() {
                $('#noc_from_municipal_div').toggle();
                if ($('#noc_from_municipal_remarks').prop('required')) {
                    $('#noc_from_municipal_remarks').prop('required', true);
                } else {
                    $('#noc_from_municipal_remarks').prop('required', false);
                }
            });
            $('#registration_of_firm_check').on('change', function() {
                $('#registration_of_firm_div').toggle();
                if ($('#registration_of_firm_remarks').prop('required')) {
                    $('#registration_of_firm_remarks').prop('required', true);
                } else {
                    $('#registration_of_firm_remarks').prop('required', false);
                }
            });
            $('#format_I_check').on('change', function() {
                $('#format_I_div').toggle();
                if ($('#format_I_remarks').prop('required')) {
                    $('#format_I_remarks').prop('required', true);
                } else {
                    $('#format_I_remarks').prop('required', false);
                }
            });
            $('#format_II_check').on('change', function() {
                $('#format_II_div').toggle();
                if ($('#format_II_remarks').prop('required')) {
                    $('#format_II_remarks').prop('required', true);
                } else {
                    $('#format_II_remarks').prop('required', false);
                }
            });


            $(document).on('click', '#proceed', function() {

                var $application_id = $(this).attr('data-application-id');
                var $manufecturer_id = $(this).attr('data-manufactuter-id');

                $('#manufecturer_id').val($manufecturer_id);
                $('#application_id').val($application_id);
            });

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
