@extends('layouts.admin.app')

@section('content')
<div class="row mb-32 gy-32">
    <div class="col-12">
            <div class="col-12 col-md-7">
                <div class="row g-16 align-items-center justify-content-end">
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="input-group align-items-center">

                            <select id="account_id" style="width: 100%" name="account_id"></select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="input-group align-items-center">

                            <select id="type" style="width: 100%" name="type">
                                <option></option>
                                <option value="deposit">Deposit</option>
                                <option value="cost">Cost</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="input-group align-items-center">
                           <button class="btn btn-lg btn-black-100" id="refresh">Refresh</button>
                        </div>
                    </div>
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
                                <th>Type</th>
                                <th>Account</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Credit</th>
                                <th>Debit</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="5"></th>
                                <th>Total:</th>
                                <th></th> <!-- Debit total -->
                                <th></th> <!-- Credit total -->
                                <th></th> <!-- Last row balance -->
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.account.account-modal')

@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#account_id').select2({
                placeholder: 'Select an Account',
                ajax: {
                    url: '{{ route("get-accounts") }}', // Adjust URL if necessary
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        // Transform the data to fit Select2's format
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
        });
        $(document).ready(function () {
            // Initialize DataTable
            const table = $('#memberTable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip', // Define where buttons appear: 'B' is for buttons
                buttons: [
                    'copy',    // Copy to clipboard
                    'csv',     // Export to CSV
                    'excel',   // Export to Excel
                    'pdf',     // Export to PDF
                    {
                        extend: 'print',
                        footer: true, // Ensure the footer is enabled in the print

                    }
                ],
                paging: true,
                searching: false, // Disable default searching since we are using custom filters
                ordering: true,
                responsive: true,
                ajax: {
                    url: '{{ url()->current() }}',
                    data: function (d) {
                        d.account_id = $('#account_id').val(); // Add account_id filter
                        d.type = $('#type').val();            // Add type filter
                    }
                },
                columns: [
                    { data: 'id', orderable: false },
                    { data: 'account_id' },
                    { data: 'category_id' },
                    { data: 'member_id' },
                    { data: 'date' },
                    { data: 'description' },
                    { data: 'debit' },
                    { data: 'credit' },
                    { data: 'balance' },
                ],
                footerCallback: function (row, data, start, end, display) {
                    var api = this.api();

                    // Helper function to parse int values
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };

                    // Total debit
                    var totalDebit = api
                        .column(6, { page: 'current' })
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total credit
                    var totalCredit = api
                        .column(7, { page: 'current' })
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Last row balance
                    var lastRowBalance = data.length > 0 ? data[data.length - 1].balance : 0;

                    // Update footer
                    $(api.column(6).footer()).html(totalDebit.toFixed(2));
                    $(api.column(7).footer()).html(totalCredit.toFixed(2));
                    $(api.column(8).footer()).html(lastRowBalance.toFixed(2));
                }
            });

            // Reload DataTable on filter change
            $('#account_id, #type').change(function () {
                table.ajax.reload();
            });
            $('#refresh').click(function () {
                // Reset the account_id and type dropdowns
                $('#account_id').val('').trigger('change');
                $('#type').val('').trigger('change');
            });

            // Initialize Select2 for dropdowns
            $('#type').select2({
                placeholder: 'Select a Type',
            })
        });

    </script>
@endpush
