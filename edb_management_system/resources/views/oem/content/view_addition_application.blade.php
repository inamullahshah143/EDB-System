<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    <h2 class="col">{{ $title }}</h2>
                    <button class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder col-sm-2"
                        id="applyAddition">
                        <i class="fas fa-plus"></i> Apply
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="font-weight-bold text-center">
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
<div class="modal fade" id="modal-apply-addition" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="" name="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary font-weight-bold" id="saveBtn">Apply</button>
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
                    position: 'top-end',
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
                processing: false,
                serverSide: true,
                ordering: false,
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
            $('#applyAddition').click(function() {
                $('#modal-apply-addition').modal('show');
            });

            // initialize btn save
            $('#saveBtn').click(function(e) {
                e.preventDefault();
                var form = $('#formPCTHeading')[0];
                var data = new FormData(form);
                $.ajax({
                    url: "{{ route('pct_headings.store') }}",
                    enctype: 'multipart/form-data',
                    data: data,
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#formPCTHeading').trigger("reset");
                        $('#modal-pct-heading').modal('hide');
                        swal_success();
                        table.draw();
                    },
                    error: function(data) {
                        $('#formPCTHeading').trigger("reset");
                        $('#modal-pct-heading').modal('hide');
                        swal_error();
                    }
                });
            });
        });
    </script>
@endpush
