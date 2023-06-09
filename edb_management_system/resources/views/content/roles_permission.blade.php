<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h2 class="col">{{ $title }}</h2>
                    <button class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder m-1" id="createRole"><i
                            class="fas fa-plus"></i>Add Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table text-nowrap" id="tableRole">
                            <thead class="font-weight-bold text-center">
                                <thead class="font-weight-bold text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Guard Name</th>
                                        <th style="width:90px;">Action</th>
                                    </tr>
                                </thead>
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
<div class="modal fade" id="modal-create-role" data-backdrop="static" tabindex="-1" role="dialog"
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
                <form id="formAddRole" name="formAddRole">
                    <input type="hidden" name="record_id" id="record_id" value="">
                    <div class="form-group">
                        <label for="role_title">Role Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="role_title" name="role_title" required />
                        <span class="form-text text-muted">Manager, Assistant Manager, etc...</span>
                    </div>

                    <div class="form-group">
                        <label for="guard_name">Guard Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="guard_name" name="guard_name" required />
                        <span class="form-text text-muted">GM, DM, AM, etc...</span>
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

            var table = $('#tableRole').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                bDestroy: true,
                bJQueryUI: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ],
                ajax: "{{ route('role.index') }}",
                className: "text-right",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: "text-center",
                    },
                    {
                        data: 'guard_name',
                        name: 'guard_name',
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
            $('#createRole').click(function() {
                $('#modal-create-role').modal('show');
            });


            $('#modal-create-role').on('hidden.bs.modal', function(e) {
                $(this).find('#formAddRole')[0].reset();
            });


            // initialize btn add
            $('#addBtn').click(function(e) {
                e.preventDefault();
                var form = $('#formAddRole')[0];
                var data = new FormData(form);
                $.ajax({
                    url: "{{ route('role.store') }}",
                    data: data,
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#formAddRole').trigger("reset");
                        $('#modal-create-role').modal('hide');
                        swal_success();
                        table.draw();
                    },
                    error: function(data) {
                        $('#formAddRole').trigger("reset");
                        $('#modal-create-role').modal('hide');
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
                            url: "{{ route('role.store') }}" + '/' + record_id,
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
                $.get("{{ route('role.index') }}" + '/' + record_id + '/edit', function(data) {
                    $('#addBtn').val("edit-record");
                    $('#addBtn').html("Update");
                    $('#modal-create-role').modal('show');
                    $('#record_id').val(data.id);
                    $('#role_title').val(data.name);
                    $('#guard_name').val(data.guard_name);
                })
            });
        });
    </script>
@endpush
