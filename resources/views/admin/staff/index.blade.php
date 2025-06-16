@extends('layouts.admin.app')
@section('content')
    <div class="row mb-32 gy-32">
        <div class="col-12">
                <div class="col-12 col-md-7">
                    <div class="row g-16 align-items-center justify-content-end">
                        @canany(['access-all','staff-create'])
                        <div class="col hp-flex-none w-auto">
                            <a href="{{ route('staff.create') }}" class="btn btn-primary w-100">
                                <i class="ri-user-add-line remix-icon"></i>
                                <span>Add New Staff</span>
                            </a>
                        </div>
                        @endcanany
                    </div>
                </div>
        </div>
        <div class="col-12">
            <div class="card hp-contact-card mb-32">
                <div class="card-body px-10">
                   <div class="row">

                   </div>
                    <div class="table-responsive">
                        {!! $dataTable->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {!! $dataTable->scripts() !!}

    <script>
        function destroy(id) {
            console.log(id);
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
                    var url = '{{ route('staff.destroy', ':id') }}';
                    url = url.replace(':id', data_id);
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: url,
                        success: function(data) {
                            $('#file-export-datatable').DataTable().ajax.reload();
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'Payment deleted successfully!',
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
