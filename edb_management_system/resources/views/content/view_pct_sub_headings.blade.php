<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{ $title }}</h2>
                <div class="d-flex flex-row-reverse">
                    <button class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder m-1" id="createNewPCTSub"><i
                            class="fas fa-plus"></i>Add Data
                    </button>
                    <button class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder m-1" id="uploadPCTSub"><i
                            class="fas fa-plus"></i>Upload Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table text-nowrap" id="tablePCTSubHeading">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Heading</th>
                                    <th>Description</th>
                                    <th>CD Rate(%)</th>
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

<!-- Modal-->
<div class="modal fade" id="modal-create-pct-sub-heading" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Add PCT Sub Headings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAddPCTSubHeading" name="formAddPCTSubHeading">
                    <input type="hidden" name="record_id" id="record_id" value="">
                    <div class="form-group">
                        <label>PCT Heading <span class="text-danger">*</span></label>
                        <select class="form-control" name="pct_heading" required>
                            <option value="" disabled selected>-- Select PCT Heading --</option>
                            @foreach ($pct_heading_list as $pct_heading)
                                <option value="{{ $pct_heading['value'] }}">{{ $pct_heading['name'] }}</option>
                            @endforeach
                        </select>
                        <span class="form-text text-muted">Please select PCT Heading</span>
                    </div>
                    <div class="form-group">
                        <label for="pct_sub_heading">PCT Sub Heading <span class="text-danger">*</span></label>
                        <input type="number" step="any" class="form-control" id="pct_sub_heading"
                            name="pct_sub_heading" required pattern="^\d*(\.\d{4,4})?$" />
                        <span class="form-text text-muted">####.####</span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" required rows="3"></textarea>
                        <span class="form-text text-muted">Detail description of respective PCT Heading</span>
                    </div>
                    <div class="form-group">
                        <label for="cd_rate">CD (%) <span class="text-danger">*</span></label>
                        <input type="number" step="any" class="form-control" id="cd_rate" name="cd_rate"
                            required />
                        <span class="form-text text-muted">custom duty in percentage</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary font-weight-bold" id="addBtn">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="modal-upload-pct-sub-heading" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Upload PCT Sub Headings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formUploadPCTSubHeading" name="formUploadPCTSubHeading">
                    <div class="form-group">
                        <label>PCT Heading <span class="text-danger">*</span></label>
                        <select class="form-control" name="pct_heading" required>
                            <option value="" disabled selected>-- Select PCT Heading --</option>
                            @foreach ($pct_heading_list as $pct_heading)
                                <option value="{{ $pct_heading['value'] }}">{{ $pct_heading['name'] }}</option>
                            @endforeach
                        </select>
                        <span class="form-text text-muted">Please select PCT Heading</span>
                    </div>
                    <div class="form-group">
                        <label>PCT Sub Headings (Excel File)</label>
                        <div class="custom-file">
                            <input type="file" accept=".xls, .xlsx" class="custom-file-input" id="pctSubHeading"
                                name="pct_sub_heading" />
                            <label class="custom-file-label" for="pctSubHeading">Choose file</label>
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
                    title: 'Something goes wrong!',
                    showConfirmButton: true,
                })
            }
            // table serverside
            var table = $('#tablePCTSubHeading').DataTable({
                processing: false,
                serverSide: true,
                ordering: false,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ],
                ajax: "{{ route('pct_sub_headings.index') }}",
                className: "text-right",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'sub_pct_heading',
                        name: 'sub_pct_heading',
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




            // initialize btn add
            $('#createNewPCTSub').click(function() {
                $('#modal-create-pct-sub-heading').modal('show');
            });

            // initialize btn upload
            $('#uploadPCTSub').click(function() {
                $('#modal-upload-pct-sub-heading').modal('show');
            });

            $('#modal-create-pct-sub-heading').on('hidden.bs.modal', function(e) {
                $(this).find('#formAddPCTSubHeading')[0].reset();
            });

            // initialize btn save
            $('#uploadBtn').click(function(e) {
                e.preventDefault();
                var form = $('#formUploadPCTSubHeading')[0];
                var data = new FormData(form);
                $.ajax({
                    url: "{{ route('pct_sub_headings.upload') }}",
                    enctype: 'multipart/form-data',
                    data: data,
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#formUploadPCTSubHeading').trigger("reset");
                        $('#modal-upload-pct-sub-heading').modal('hide');
                        swal_success();
                        table.draw();
                    },
                    error: function(data) {
                        $('#formUploadPCTSubHeading').trigger("reset");
                        $('#modal-upload-pct-sub-heading').modal('hide');
                        swal_error();
                    }
                });
            });

            // initialize btn add
            $('#addBtn').click(function(e) {
                e.preventDefault();
                var form = $('#formAddPCTSubHeading')[0];
                var data = new FormData(form);
                $.ajax({
                    url: "{{ route('pct_sub_headings.store') }}",
                    data: data,
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#formAddPCTSubHeading').trigger("reset");
                        $('#modal-create-pct-sub-heading').modal('hide');
                        swal_success();
                        table.draw();
                    },
                    error: function(data) {
                        $('#formAddPCTSubHeading').trigger("reset");
                        $('#modal-create-pct-sub-heading').modal('hide');
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
                            url: "{{ route('pct_sub_headings.store') }}" + '/' + record_id,
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
                $.get("{{ route('pct_sub_headings.index') }}" + '/' + record_id + '/edit', function(data) {
                    $('#addBtn').val("edit-record");
                    $('#addBtn').html("Update");
                    $('#modal-create-pct-sub-heading').modal('show');
                    $('#record_id').val(data.id);
                    $('#pct_heading').val(data.pct_heading_id);
                    $('#pct_sub_heading').val(data.sub_pct_heading);
                    $('#description').val(data.description);
                    $('#cd_rate').val((data.cd_rate) * 100);
                })
            });
        });
    </script>
@endpush
