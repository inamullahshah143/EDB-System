<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{ $title }}</h2>
                <div class="d-flex flex-row-reverse">
                    <button class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder m-1" id="create"><i
                            class="fas fa-plus"></i>Add Data
                    </button>
                    <button class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder m-1" id="upload"><i
                            class="fas fa-plus"></i>Upload Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table text-nowrap" id="tableSRO693">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Heading</th>
                                    <th>Description</th>
                                    <th>CD (%)</th>
                                    <th>ACD (%)</th>
                                    <th style="width:90px;">Action</th>
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


<!-- Upload Modal-->
<div class="modal fade" id="modal-upload-sro-693" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Upload SRO 693 Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formSRO693" name="formSRO693">
                    <div class="form-group">
                        <label>SRO 693 (Excel File)</label>
                        <div class="custom-file">
                            <input type="file" accept=".xls, .xlsx" class="custom-file-input" id="sro_693_heading"
                                name="sro_693_heading" />
                            <label class="custom-file-label" for="sro_693_heading">Choose file</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary font-weight-bold" id="uploadBtn">Upload</button>
            </div>
        </div>
    </div>
</div>


<!-- Upload Modal-->
<div class="modal fade" id="modal-create-sro-693" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Create SRO 693 Data Field</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAddSRO693" name="formAddSRO693">
                    <input type="hidden" name="record_id" id="record_id" value="">
                    <div class="form-group">
                        <label for="pct_heading">PCT Heading <span class="text-danger">*</span></label>
                        <input type="number" step="any" class="form-control" id="pct_heading" name="pct_heading"
                            required pattern="^\d*(\.\d{4,4})?$" />
                        <span class="form-text text-muted">####.####</span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" required rows="4"></textarea>
                        <span class="form-text text-muted">Detail description of respective PCT Heading</span>
                    </div>
                    <div class="form-group form-row">
                        <div class="col">
                            <label for="cd_rate">CD (%) <span class="text-danger">*</span></label>
                            <input type="number" step="any" class="form-control" id="cd_rate" name="cd_rate"
                                required />
                            <span class="form-text text-muted">custom duty in percentage</span>

                        </div>
                        <div class="col">
                            <label for="acd_rate">ACD (%) <span class="text-danger">*</span></label>
                            <input type="number" step="any" class="form-control" id="acd_rate"
                                name="acd_rate" required />
                            <span class="form-text text-muted">additional custom duty in percentage</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary font-weight-bold" id="addBtn">Create</button>
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
            var table = $('#tableSRO693').DataTable({
                processing: false,
                serverSide: true,
                ordering: false,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ],
                ajax: "{{ route('sro693.index') }}",

                className: "text-right",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'pct_heading',
                        name: 'pct_heading',
                        className: "text-left",
                        render: $.fn.dataTable.render.number(',', '.', 4),
                    },
                    {
                        data: 'description',
                        name: 'description',
                        className: "text-left",
                    },
                    {
                        data: 'cd_rate_applicable',
                        name: 'cd_rate_applicable',
                        className: "text-center",
                    },
                    {
                        data: 'acd_rate_applicable',
                        name: 'acd_rate_applicable',
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

            // initialize btn upload
            $('#upload').click(function() {
                $('#modal-upload-sro-693').modal('show');
            });

            // initialize btn create
            $('#create').click(function() {
                $('#modal-create-sro-693').modal('show');
            });

            
            $('#modal-create-sro-693').on('hidden.bs.modal', function(e) {
                $(this).find('#formAddSRO693')[0].reset();
            });

            // initialize btn upload
            $('#uploadBtn').click(function(e) {
                e.preventDefault();
                var form = $('#formSRO693')[0];
                var data = new FormData(form);
                $.ajax({
                    url: "{{ route('sro693.upload') }}",
                    enctype: 'multipart/form-data',
                    data: data,
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#formSRO693').trigger("reset");
                        $('#modal-upload-sro-693').modal('hide');
                        swal_success();
                        table.draw();
                    },
                    error: function(data) {
                        $('#formSRO693').trigger("reset");
                        $('#modal-upload-sro-693').modal('hide');
                        swal_error();
                    }
                });
            });

            // initialize btn add
            $('#addBtn').click(function(e) {
                e.preventDefault();
                var form = $('#formAddSRO693')[0];
                var data = new FormData(form);
                $.ajax({
                    url: "{{ route('sro693.store') }}",
                    data: data,
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#formAddSRO693').trigger("reset");
                        $('#modal-create-sro-693').modal('hide');
                        swal_success();
                        table.draw();
                    },
                    error: function(data) {
                        $('#formAddSRO693').trigger("reset");
                        $('#modal-create-sro-693').modal('hide');
                        swal_error();
                    }
                });
            });

            // initialize btn delete
            $('body').on('click', '.deleteRecord', function() {
                var record_id = $(this).data("id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('sro693.store') }}" + '/' + record_id,
                            success: function(data) {
                                swal_success();
                                table.draw();
                            },
                            error: function(data) {
                                swal_error();
                            }
                        });
                    }
                })
            });

            // initialize btn edit
            $('body').on('click', '.editRecord', function() {
                var record_id = $(this).data('id');
                $.get("{{ route('sro693.index') }}" + '/' + record_id + '/edit', function(data) {
                    $('#addBtn').val("edit-record");
                    $('#addBtn').html("Update");
                    $('#modal-create-sro-693').modal('show');
                    $('#record_id').val(data.id);
                    $('#pct_heading').val(data.pct_heading);
                    $('#description').val(data.description);
                    $('#cd_rate').val((data.cd_rate) * 100);
                    $('#acd_rate').val((data.acd_rate) * 100);
                })
            });
        });
    </script>
@endpush
