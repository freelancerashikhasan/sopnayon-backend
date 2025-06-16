<div class="modal fade" id="addNewUser" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-16 px-24">
                <h5 class="modal-title" id="addNewUserLabel">Add Receive</h5>
                <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                </button>
            </div>

            <div class="divider m-0"></div>

            <form id="memberForm" action="{{ route('receive.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="POST">

                <div class="modal-body">
                    <div class="row gx-8">
                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Select an account
                                </label>
                                <select id="account_id" style="width: 100%" name="account_id"></select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Select Receive Category
                                </label>
                                <select id="category_id" style="width: 100%" name="category_id"></select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Select Member
                                </label>
                                <select id="member_id" style="width: 100%" name="member_id"></select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Amount
                                </label>
                                <input type="text" class="form-control" id="amount" name="amount">
                            </div>
                        </div>
                        @php
                            $currentMonth = date('m');
                            $currentYear = date('Y');
                        @endphp

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="month" class="form-label">Select Month</label>
                                <select id="month" class="select2" style="width: 100%" name="month">
                                    <option value="">Select Month</option>
                                    @foreach ([
                                        '1' => 'January', '2' => 'February', '3' => 'March',
                                        '4' => 'April', '5' => 'May', '6' => 'June',
                                        '7' => 'July', '8' => 'August', '9' => 'September',
                                        '10' => 'October', '11' => 'November', '12' => 'December'
                                    ] as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $currentMonth ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="year" class="form-label">Select Year</label>
                                <select id="year" class="form-control select2" style="width: 100%" name="year">
                                    <option value="">Select Year</option>
                                    @for ($i = date('Y'); $i >= 2020; $i--)
                                        <option value="{{ $i }}" {{ $i == $currentYear ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Description
                                </label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer pt-0 px-24 pb-24">
                    <div class="divider"></div>

                    <button type="submit" class="m-0 btn btn-primary w-100">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function () {
        function initializeSelect2(selector, url, placeholder) {
            $.ajax({
                url: url,
                dataType: 'json',
                success: function (data) {
                    let options = data.map(account => ({
                        id: account.id,
                        text: account.name
                    }));
                    $(selector).select2({
                        placeholder: placeholder,
                        dropdownParent: $('#addNewUser'),
                        data: options, // Preload data
                        ajax: {
                            url: url,
                            dataType: 'json',
                            delay: 250,
                            processResults: function (data) {
                                return {
                                    results: data.map(account => ({
                                        id: account.id,
                                        text: account.name
                                    }))
                                };
                            },
                            cache: true,
                        }
                    });
                }
            });
        }

        initializeSelect2('#account_id', '{{ route("get-accounts") }}', 'Select an Account');
        initializeSelect2('#category_id', '{{ route("get-receive-category") }}', 'Select a Category');
        initializeSelect2('#member_id', '{{ route("get-members") }}', 'Select a Member');
    });

    $('#month').select2({
        placeholder: 'Select Month',
        dropdownParent: $('#addNewUser'),

    });
    $('#year').select2({
        placeholder: 'Select Year',
        dropdownParent: $('#addNewUser'),

    });
    $(document).ready(function() {
        // Handle form submission
        $('form').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let url = $(this).attr('action'); // Form action URL

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        $('#addNewUser').modal('hide');
                        $('#memberTable').DataTable().ajax.reload();
                    }
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '<ul>';

                    $.each(errors, function(key, value) {
                        errorMessage += `<li>${value}</li>`;

                        let errorField = $(`#${key}`);
                        if (errorField.length) {
                            errorField.addClass('is-invalid');
                            errorField.siblings('.invalid-feedback').remove();
                            errorField.after(`<div class="invalid-feedback">${value}</div>`);
                        }
                    });

                    errorMessage += '</ul>';


                }
            });
        });


    });
function edit(id) {
    let memberId = id;
    var url = '{{ route('receive.edit', ['id' => ':id']) }}';
    var updateRoute = '{{ route('receive.update', ['id' => ':id']) }}';
    url = url.replace(':id', memberId);

    $.ajax({
        url: url,
        type: 'GET',
        success: function(data) {
            // Reset and update select fields properly
            $('#account_id').val(data.account_id).trigger('change');
            $('#category_id').val(data.category_id).trigger('change');
            $('#member_id').val(data.member_id).trigger('change');

            $('#month').val(data.month).trigger('change');
            $('#year').val(data.year).trigger('change');
            $('#amount').val(data.credit);
            $('#description').val(data.description);

            // Update form action
            const actionUrl = updateRoute.replace(':id', data.id);
            $('form').attr('action', actionUrl);
            $('form').append('<input type="hidden" name="_method" value="PUT">');

            // Show modal
            $('#addNewUser').modal('show');
        },
        error: function(xhr) {
            alert('Failed to fetch member details.');
        }
    });
}

</script>

@endpush
