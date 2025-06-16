@extends('layouts.admin.app')

@section('content')
<div class="row mb-32 gy-32">
    <div class="col-12">
            <div class="col-12 col-md-7">
                <div class="row g-16 align-items-center justify-content-end">
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="input-group align-items-center">
                            <span class="input-group-text bg-white hp-bg-dark-100 border-end-0 pe-0">
                                <i class="iconly-Curved-User text-black-80" style="font-size: 16px;"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-8" placeholder="Search">
                        </div>
                    </div>
                    @canany(['access-all','expense-create'])
                    <div class="col hp-flex-none w-auto">
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addNewUser">
                            <i class="ri-user-add-line remix-icon"></i>
                            <span>Add New Expense</span>
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
                                <th>Member Name</th>
                                <th>Account</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Date</th>

                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
@include('admin.expense.expense-modal')

@endsection
@push('script')
    <script>
        $('#memberTable').DataTable({
            processing: true,
            serverSide: true,
            dom: 'Bfrtip', // Define where buttons appear: 'B' is for buttons
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
            ajax: '{{ url()->current() }}',
            columns: [
                { data: 'id', orderable: false },
                { data: 'member_id' },
                { data: 'account_id' },
                { data: 'category_id' },
                { data: 'amount' },
                { data: 'date' },

                { data: 'action', orderable: false }
            ]
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
                    var url = '{{ route('expense.destroy', ':id') }}';
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
                                title: 'Expense deleted successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            })
        }
    </script>
@endpush
