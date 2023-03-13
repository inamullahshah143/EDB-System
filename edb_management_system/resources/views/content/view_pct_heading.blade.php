<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{ $title }}</h2>
                <div class="d-flex flex-row-reverse">
                    <button class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder m-1" id="createNewPCT"><i
                            class="fas fa-plus"></i>Add Data
                    </button>
                    <button class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder m-1" id="uploadPCT"><i
                            class="fas fa-plus"></i>Upload Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table text-nowrap" id="tablePCTHeading">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Heading</th>
                                    <th>Description</th>
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
<div class="modal fade" id="modal-create-pct-heading" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        @csrf
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Add PCT Headings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAddPCTHeading" name="formAddPCTHeading">
                    <input type="hidden" name="record_id" id="record_id" value="">
                    <div class="form-group">
                        <label for="pct_heading">PCT Heading <span class="text-danger">*</span></label>
                        <input type="number" step="any" class="form-control" id="pct_heading" name="pct_heading"
                            required pattern="^\d*(\.\d{2,2})?$" />
                        <span class="form-text text-muted">##.##</span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" required rows="4"></textarea>
                        <span class="form-text text-muted">Detail description of respective PCT Heading</span>
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
<div class="modal fade" id="modal-upload-pct-heading" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Upload PCT Headings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formUploadPCTHeading" name="formUploadPCTHeading">
                    <div class="form-group">
                        <label>PCT Headings (Excel File)</label>
                        <div class="custom-file">
                            <input type="file" accept=".xls, .xlsx" class="custom-file-input" id="pctHeading"
                                name="pct_heading" />
                            <label class="custom-file-label" for="pctHeading">Choose file</label>
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
                    title: 'Something goes wrong !',
                    showConfirmButton: true,
                })
            }
            // table serverside
            var table = $('#tablePCTHeading').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                bDestroy: true,
                bJQueryUI: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ],
                ajax: "{{ route('pct_headings.index') }}",
                className: "text-right",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'pct_heading',
                        name: 'pct_heading',
                        className: "text-left",
                        render: $.fn.dataTable.render.number(',', '.', 2),
                    },
                    {
                        data: 'description',
                        name: 'description',
                        className: "text-left",
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
            $('#createNewPCT').click(function() {
                $('#modal-create-pct-heading').modal('show');
            });

            // initialize btn upload
            $('#uploadPCT').click(function() {
                $('#modal-upload-pct-heading').modal('show');
            });

            $('#modal-create-pct-heading').on('hidden.bs.modal', function(e) {
                $(this).find('#formAddPCTHeading')[0].reset();
            });

            // initialize btn save
            $('#uploadBtn').click(function(e) {
                e.preventDefault();
                var form = $('#formUploadPCTHeading')[0];
                var data = new FormData(form);
                $.ajax({
                    url: "{{ route('pct_headings.upload') }}",
                    enctype: 'multipart/form-data',
                    data: data,
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#formUploadPCTHeading').trigger("reset");
                        $('#modal-upload-pct-heading').modal('hide');
                        swal_success();
                        table.draw();
                    },
                    error: function(data) {
                        $('#formUploadPCTHeading').trigger("reset");
                        $('#modal-upload-pct-heading').modal('hide');
                        swal_error();
                    }
                });
            });

            // initialize btn add
            $('#addBtn').click(function(e) {
                e.preventDefault();
                var form = $('#formAddPCTHeading')[0];
                var data = new FormData(form);
                $.ajax({
                    url: "{{ route('pct_headings.store') }}",
                    data: data,
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#formAddPCTHeading').trigger("reset");
                        $('#modal-create-pct-heading').modal('hide');
                        swal_success();
                        table.draw();
                    },
                    error: function(data) {
                        $('#formAddPCTHeading').trigger("reset");
                        $('#modal-create-pct-heading').modal('hide');
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
                            url: "{{ route('pct_headings.store') }}" + '/' + record_id,
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
                $.get("{{ route('pct_headings.index') }}" + '/' + record_id + '/edit', function(data) {
                    $('#addBtn').val("edit-record");
                    $('#addBtn').html("Update");
                    $('#modal-create-pct-heading').modal('show');
                    $('#record_id').val(data.id);
                    $('#pct_heading').val(data.pct_heading);
                    $('#description').val(data.description);
                })
            });
        });
    </script>
@endpush
