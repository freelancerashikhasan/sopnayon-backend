@extends('layouts.admin.app')

@section('content')
@push('css')
    <style>
        div.dataTables_filter {
    display: none;
}

    </style>
@endpush
<div class="row mb-32 gy-32">
    <div class="col-12">
            <div class="col-12 col-md-7">
                <div class="row g-16 align-items-center justify-content-end">
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="input-group align-items-center">
                            <span class="input-group-text bg-white hp-bg-dark-100 border-end-0 pe-0">
                                <i class="iconly-Curved-User text-black-80" style="font-size: 16px;"></i>
                            </span>
                            <input type="text" id="customSearch" class="form-control border-start-0 ps-8" placeholder="Search">
                            <span class="input-group-text bg-white hp-bg-dark-100 border-end-0 " id="clearFilter">
                                <i class="hp-text-color-dark-0 ri-2x ri-close-line" style="font-size: 16px;"></i>
                            </span>
                        </div>
                    </div>
                    @canany(['access-all','member-create'])
                    <div class="col hp-flex-none w-auto">
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addNewUser">
                            <i class="ri-user-add-line remix-icon"></i>
                            <span>Add New Member</span>
                        </button>
                    </div>
                    @endcanany
                </div>
            </div>
    </div>

    <div class="col-12">
        <div class="card hp-contact-card mb-32">
            <div class="card-body px-10">
                <div class="table-responsive">
                    <table id="memberTable" class="table align-middle table-hover table-borderless">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Designation</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
@include('admin.member.member-modal')

@endsection
@push('script')
    <script>
       var table =  $('#memberTable').DataTable({
            processing: true,
            serverSide: true,
            dom: 'Blfrtip', // Define where buttons appear: 'B' is for buttons
            buttons: [
                'copy',    // Copy to clipboard
                'csv',     // Export to CSV
                'excel',   // Export to Excel
                'pdf',     // Export to PDF
                'print'    // Print the table
            ],
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            pageLength: 10,
            ajax: '{{ url()->current() }}',
            columns: [
                { data: 'id', orderable: false },
                { data: 'name' },
                { data: 'username' },
                { data: 'show_password' },
                { data: 'designation' },
                { data: 'phone' },
                { data: 'email' },
                { data: 'address' },
                { data: 'image', orderable: false},
                { data: 'status', orderable: false},
                { data: 'action', orderable: false }
            ]
        });
       $(document).ready(function(){
            $('#customSearch').on('input', function () {
                table.search(this.value).draw();
            });
            $('#clearFilter').on('click', function () {
                $('#customSearch').val('');
                table.search('').draw();
            });
       });

        function destroy(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var data_id = id;
                    var url = '{{ route('member.destroy', ':id') }}';
                    url = url.replace(':id', data_id);
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: url,
                        success: function(data) {
                            $('#memberTable').DataTable().ajax.reload();
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'Member deleted successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            })
        }
        function status(id) {
            let memberId = id;
            var url = '{{ route('member.changeStatus', ['id' => ':id']) }}';
            url = url.replace(':id', memberId);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#memberTable').DataTable().ajax.reload();
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Member activated successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(xhr) {
                    alert('Failed to fetch member details.');
                }
            });
        }
    </script>
@endpush
