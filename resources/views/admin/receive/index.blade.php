@extends('layouts.admin.app')

@section('content')
<div class="row mb-32 gy-32">
    <div class="col-12">
            <div class="col-12 col-md-12">
                <div class="row g-16 align-items-center justify-content-end">
                    <div class=" col-md-3">
                        <select id="monthFilter" class="form-select">
                            <option value="">Select Month</option>
                            @for ($m = 1; $m <= 12; $m++)
                                <option value="{{ $m }}" {{ $m == date('n') ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class=" col-md-3">
                        <select id="yearFilter" class="form-select">
                            <option value="">Select Year</option>
                            @for ($i = date('Y') + 2; $i >= date('Y') - 10; $i--)
                                <option value="{{ $i }}" {{ $i == date('Y') ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>

                    </div>
                    <div class=" col-md-3">
                        <button id="clearFilter" class="btn btn-secondary">Clear Filter</button>
                     </div>


                    @canany(['access-all','receive-create'])
                    <div class="col hp-flex-none w-auto">
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addNewUser">
                            <i class="ri-user-add-line remix-icon"></i>
                            <span>Add New Receive</span>
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
                                <th>Month</th>
                                <th>Year</th>
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
@include('admin.receive.receive-modal')

@endsection
@push('script')
    <script>
      var table = $('#memberTable').DataTable({
            processing: true,
            serverSide: true,
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            paging: true,
            searching: true,
            ordering: true,
            responsive: true,
            ajax: {
                url: '{{ url()->current() }}',
                data: function(d) {
                    d.month = $('#monthFilter').val();
                    d.year = $('#yearFilter').val();
                }
            },
            columns: [
                { data: 'id', orderable: false },
                { data: 'member_id' },
                { data: 'account_id' },
                { data: 'category_id' },
                { data: 'amount' },
                { data: 'month' },
                { data: 'year' },
                { data: 'date' },
                { data: 'action', orderable: false }
            ]
        });

        // Apply filters on change
        $('#monthFilter, #yearFilter').on('change', function () {
            table.ajax.reload();
        });
        $('#clearFilter').on('click', function () {
            $('#monthFilter').val('').trigger('change');
            $('#yearFilter').val('').trigger('change');
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
                    var url = '{{ route('receive.destroy', ':id') }}';
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
                                title: 'Receive deleted successfully!',
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
