<div class="modal fade" id="addNewUser" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-16 px-24">
                <h5 class="modal-title" id="addNewUserLabel">Add Keyword</h5>
                <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                </button>
            </div>

            <div class="divider m-0"></div>

            <form id="memberForm" action="{{ route('site_keyword.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="POST">

                <div class="modal-body">
                    <div class="row gx-8">
                        <div class="col-12">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    keyword
                                </label>
                                <input type="text" class="form-control" id="keyword" name="keyword">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    English
                                </label>
                                <input type="text" class="form-control" id="en" name="en">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Bangla
                                </label>
                                <input type="text" class="form-control" id="bn" name="bn">
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
            var url = '{{ route('site_keyword.edit', ['id' => ':id']) }}';
            var  updateRoute = '{{ route('site_keyword.update', ['id' => ':id']) }}';
            url = url.replace(':id', memberId);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#keyword').val(data.keyword);
                    $('#en').val(data.en);
                    $('#bn').val(data.bn);

                    const actionUrl = updateRoute.replace(':id', data.id);
                    $('form').attr('action', actionUrl);
                    $('#addNewUser').modal('show');
                    $('form').append('<input type="hidden" name="_method" value="PUT">');
                },
                error: function(xhr) {
                    alert('Failed to fetch member details.');
                }
            });
        }
</script>
@endpush
