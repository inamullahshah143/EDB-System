<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <form id="issuanceForm" name="issuanceForm" method="POST" action="{{ route('issuances.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="card" style="display: none" id="applicationForm">
                <div class="card-header">
                    <div class="d-flex">
                        <h2 class="col">{{ $title }}</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Vehicle Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="vehicle_name" required
                                        onchange="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Please enter your Vehicle Name')" />
                                    <span class="form-text text-muted">Civic VTI, Corola, etc...</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Model <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="vehicle_model" required
                                        onchange="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Please enter your Vehicle Model')" />
                                    <span class="form-text text-muted">VTI Oriel, VX, etc...</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Make <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="vehicle_maker" required
                                        onchange="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Please enter your Vehicle Maker')" />
                                    <span class="form-text text-muted">Toyota, Honda, etc...</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="vehicle_hs_code">Vehicle HS Code <span
                                            class="text-danger">*</span></label>
                                    <input type="number" step="any" class="form-control" id="vehicle_hs_code"
                                        name="vehicle_hs_code" required pattern="^\d*(\.\d{4,4})?$"
                                        onchange="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Please enter your Vehicle HS Code')" />
                                    <span class="form-text text-muted">####.####</span>
                                </div>
                            </div>
                            <div class="col">
                                <label for="vehicle_category">Category <span class="text-danger">*</span></label>
                                <select class="form-control" id="vehicle_category" name="vehicle_category" required
                                    onchange="this.setCustomValidity('')"
                                    oninvalid="this.setCustomValidity('Please select your Vehicle Category')">
                                    <option disabled selected value="">-- Choose Category --</option>
                                    <option value="2/3 Wheelers">2/3 Wheelers</option>
                                    <option value="4 Wheelers/ HCV">4 Wheelers/ HCV</option>
                                    <option value="Electric Vechiles">Electric Vechiles</option>
                                    <option value="Direct Material">Direct Material</option>
                                    <option value="Raw Material">Raw Material</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="under_sro">Under SRO <span class="text-danger">*</span></label>
                                <select class="form-control" id="under_sro" name="under_sro" required
                                    onchange="this.setCustomValidity('')"
                                    oninvalid="this.setCustomValidity('Please select SRO under which vehicle lies')">
                                    <option disabled selected value="">-- Choose SRO --</option>
                                    <option value="SRO-656">SRO-656</option>
                                    <option value="SRO-655">SRO-655</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="format_one">Format I <span class="text-danger">*</span></label>
                                <div class="input-group-append">
                                    <a href="{{ route('download.format_one_download') }}">
                                        <button class="btn" style="color: transparent" type="button">
                                            <i class="fas fa-download text-dark" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Download (Format I) Template"></i></button></a>
                                    <div class="custom-file">
                                        <input type="file" accept=".xls, .xlsx" class="custom-file-input" required
                                            name="format_one" id="format_one" onchange="this.setCustomValidity('')"
                                            oninvalid="this.setCustomValidity('Please upload 100% CKD Under SRO-656')" />
                                        <label class="custom-file-label" for="format_one">Choose file</label>
                                        <span class="form-text text-muted">List of 100% parts with %age index
                                            constituting
                                            a
                                            complete vehicle.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label for="format_two">Format II <span class="text-danger">*</span></label>
                                <div class="input-group-append">
                                    <a href="{{ route('download.format_two_download') }}">
                                        <button class="btn" style="color: transparent" type="button">
                                            <i class="fas fa-download text-dark" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Download (Format II) Template"></i></button></a>
                                    <div class="custom-file">
                                        <input type="file" accept=".xls, .xlsx" class="custom-file-input" required
                                            onchange="this.setCustomValidity('')"
                                            oninvalid="this.setCustomValidity('Please upload 100% CKD Under SRO-693')"
                                            name="format_two" id="format_two" />
                                        <label class="custom-file-label" for="format_two">Choose file</label>
                                        <span class="form-text text-muted">Comparison of parts contained under SRO
                                            693(1)/2006</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <h5><strong>Supporting Documents</strong></h5>

                        <div class="form-row form-group">
                            <div class="col">
                                <label for="technical_agreement_doc" class="form-label">Technical assistance agreement
                                    with the foreign principal, (if any.)</label>
                                <div class="custom-file">
                                    <input class="custom-file-input" type="file" id="technical_agreement_doc"
                                        name="technical_agreement_doc" accept=".pdf">
                                    <label class="custom-file-label" for="list_of_plant">Choose file</label>
                                    <span class="form-text text-muted">your technical assistance agreement must be
                                        valid for at-least
                                        3 year's</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="technical_assistance_agreement">Validate Till</label>
                                    <input type="date" class="form-control" id="technical_assistance_agreement"
                                        name="technical_assistance_agreement" />
                                </div>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <div class="col">
                                <label for="purchase_doc_of_plant" class="form-label">Purchase documents of
                                    plant/machinery/equipment installed as in-house facilities. <span
                                        class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input class="custom-file-input" type="file" id="purchase_doc_of_plant"
                                        name="purchase_doc_of_plant" accept=".pdf" required
                                        onchange="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Please upload purchase documents of plant/machinery/equipment installed as in-house facilities')">
                                    <label class="custom-file-label" for="purchase_doc_of_plant">Choose file</label>
                                    <span class="form-text text-muted">your purchase documents must be valid for
                                        at-least
                                        3 year's</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="purchase_doc_of_plant_validity"><br>Validate Till <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" required
                                        id="purchase_doc_of_plant_validity" onchange="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Please enter purchase documents validity')"
                                        name="purchase_doc_of_plant_validity" />
                                </div>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <div class="col">
                                <label for="lease_agreement">Copy of lease agreement if premises on rent/ownership
                                    documents. <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" accept=".pdf" class="custom-file-input" required
                                        onchange="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('please upload Copy of lease agreement if premises on rent/ownership')"
                                        name="lease_agreement" id="lease_agreement" />
                                    <label class="custom-file-label" for="lease_agreement">Choose file</label>
                                    <span class="form-text text-muted">your lease agreement must be valid for at-least
                                        3 year's</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="lease_agreement_validity">Validate Till <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" required
                                        onchange="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Please enter lease agreement validity')"
                                        name="lease_agreement_validity" />
                                </div>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <div class="col">
                                <label for="snaps_of_inhouse_facilities">Snaps of in-house facilities e.g. engine
                                    assembly & testing,
                                    vehicle final assembly, paint shop, vehicle performance testing facilities and
                                    inspection equipment etc. <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" accept=".pdf" class="custom-file-input" required
                                        onchange="this.setCustomValidity('')" name="snaps_of_inhouse_facilities"
                                        id="snaps_of_inhouse_facilities"
                                        oninvalid="this.setCustomValidity('Please upload Snaps of in-house facilities e.g. engine assembly & testing, vehicle final assembly, paint shop, vehicle performance testing facilities and inspection equipment etc.')" />
                                    <label class="custom-file-label" for="snaps_of_inhouse_facilities">Choose
                                        file</label>
                                </div>
                            </div>
                            <div class="col">
                                <label for="copies_of_sales_tax_certificate">Copies of Sales Tax Certificate (STN)
                                    containing the status as importer-cumassembler or manufacturer & National Tax Number
                                    (NTN) certificates in the name of the company. <span
                                        class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" accept=".pdf" class="custom-file-input" required
                                        onchange="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Please upload Copies of Sales Tax Certificate (STN) containing the status as importer-cumassembler or manufacturer & National Tax Number (NTN) certificates in the name of the company.')"
                                        name="copies_of_sales_tax_certificate" id="copies_of_sales_tax_certificate" />
                                    <label class="custom-file-label" for="copies_of_sales_tax_certificate">Choose
                                        file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <div class="col">
                                <label for="list_of_plant">List of plant/machinery/equipment with
                                    complete specification, make/model, local/imported, if imported, name of the
                                    company as defined in 'Annexure-A' of the SRO. <span
                                        class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" accept=".pdf" class="custom-file-input" required
                                        onchange="this.setCustomValidity('')" name="list_of_plant" id="list_of_plant"
                                        oninvalid="this.setCustomValidity('Please upload List of plant/machinery/equipment with complete specification, make/model, local/imported, if imported, name of the company as defined in 'Annexure-A' of the SRO')" />
                                    <label class="custom-file-label" for="list_of_plant">Choose file</label>
                                </div>
                            </div>
                            <div class="col">
                                <label for="brand_detail">Product(s) brand name to be
                                    assembled/manufactured in-house with a copy of Trademark Registration
                                    Certificate or acknowledgement receipt issued by the IPO/Trademark Registry
                                    office <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" accept=".pdf" class="custom-file-input" required
                                        onchange="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Please upload Product(s) brand name to be assembled/manufactured in-house with a copy of Trademark Registration Certificate or acknowledgement receipt issued by the IPO/Trademark Registry office')"
                                        name="brand_detail" id="brand_detail" />
                                    <label class="custom-file-label" for="brand_detail">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <div class="col">
                                <label for="list_of_vendor">List of vendors’ components to be purchased with complete
                                    description of
                                    items
                                    from the local vendors along with their complete addresses, phone, fax, email
                                    etc.
                                    <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" accept=".pdf" class="custom-file-input" required
                                        onchange="this.setCustomValidity('')" oninvalid="this.setCustomValidity('')"
                                        name="list_of_vendor" id="list_of_vendor" />
                                    <label class="custom-file-label" for="list_of_vendor">Choose file</label>
                                </div>
                            </div>
                            <div class="col">
                                <label for="parts_catalogue"><br><br>Parts catalogue/brochures of vehicle duly signed
                                    and stamped. <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" accept=".pdf" class="custom-file-input" required
                                        onchange="this.setCustomValidity('')" oninvalid="this.setCustomValidity('')"
                                        name="parts_catalogue" id="parts_catalogue" />
                                    <label class="custom-file-label" for="parts_catalogue">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <div class="col">
                                <label for="factory_map">Complete factory map / lay out.
                                    <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" accept=".pdf" class="custom-file-input" required
                                        onchange="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Please upload Complete factory map / lay out.')"
                                        name="factory_map" id="factory_map" />
                                    <label class="custom-file-label" for="factory_map">Choose file</label>
                                </div>
                            </div>
                            <div class="col">
                                <label for="manpower_break_up">Manpower break up as technical/non technical, (if
                                    any.)</label>
                                <div class="custom-file">
                                    <input type="file" accept=".pdf" class="custom-file-input"
                                        name="manpower_break_up" id="manpower_break_up" />
                                    <label class="custom-file-label" for="manpower_break_up">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <div class="col">
                                <label for="address_of_factory">Complete address of the factory and registered office
                                    with phone, fax and email etc.
                                    <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" accept=".pdf" class="custom-file-input" required
                                        onchange="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Please upload Complete address of the factory and registered office with phone, fax and email etc.')"
                                        name="address_of_factory" id="address_of_factory" />
                                    <label class="custom-file-label" for="address_of_factory">Choose file</label>
                                </div>
                            </div>
                            <div class="col">
                                <label for="name_of_chief_executive">Name of the Chief Executive /Managing Director or
                                    an authorized officer of the firm for correspondence with EDB. <span
                                        class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" accept=".pdf" class="custom-file-input" required
                                        onchange="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Please upload Name of the Chief Executive /Managing Director or an authorized officer of the firm for correspondence with EDB. ')"
                                        name="name_of_chief_executive" id="name_of_chief_executive" />
                                    <label class="custom-file-label" for="name_of_chief_executive">Choose file</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary font-weight-bold" id="">Apply</button>
                </div>
            </div>
        </form>
        <div class="card text-center" style="display: none" id="applicationTracking">
            <div class="card-header">
                <div class="col">
                    <h2 class="row">Your Application is Submitted</h2>
                    <h5 class="row">we'll let you know about the deficiencies (if any) </h5>
                </div>
            </div>
            <div class="card-body">
                <label>Your Tracking ID is:</label>
                <br><br>
                <h1>{{ $trackingId }}</h1>
            </div>

            <div class="card-footer">
                <button type="button" class="btn btn-primary font-weight-bold" id="viewStatusBtn">View Application
                    Status</button>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#applicationForm').hide();
            $('#applicationTracking').hide();

            if ({{ $isApplied }} == 1) {
                $('#applicationForm').hide();
                $('#applicationTracking').show();
            } else {
                $('#applicationTracking').hide();
                $('#applicationForm').show();
            }
            // success alert
            function swal_success(data) {
                Swal.fire({
                    position: 'centered',
                    icon: 'success',
                    title: data.responseJSON,
                    showConfirmButton: false,
                    timer: 2500
                })
            }
            // error alert
            function swal_error(data) {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: data.responseJSON,
                    showConfirmButton: true,
                })
            }

            // csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // initialize btn save
            $('#saveBtn').click(function(e) {
                e.preventDefault();
                var form = $('#issuanceForm')[0];
                var data = new FormData(form);
                $.ajax({
                    url: "{{ route('issuances.store') }}",
                    enctype: 'multipart/form-data',
                    data: data,
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#issuanceForm').trigger("reset");
                        swal_success();
                        $('#applicationForm').hide();
                        $('#applicationTracking').show();
                    },
                    error: function(data) {
                        $('#issuanceForm').trigger("reset");
                        swal_error();
                    }
                });
            });
        });
    </script>
@endpush
