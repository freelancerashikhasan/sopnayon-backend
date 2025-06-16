  <!-- Plugin -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="{{ asset('app-assets') }}/js/plugin/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('app-assets') }}/js/plugin/swiper-bundle.min.js"></script>
  <script src="{{ asset('app-assets') }}/js/plugin/jquery.mask.min.js"></script>
  <script src="{{ asset('app-assets') }}/js/plugin/autocomplete.min.js"></script>
  <script src="{{ asset('app-assets') }}/js/plugin/moment.min.js"></script>

  <!-- Layouts -->
  <script src="{{ asset('app-assets') }}/js/layouts/header-search.js"></script>
  <script src="{{ asset('app-assets') }}/js/layouts/sider.js"></script>
  <script src="{{ asset('app-assets') }}/js/components/input-number.js"></script>

  <!-- Base -->
  <script src="{{ asset('app-assets') }}/js/base/index.js"></script>
  <!-- Customizer -->
  <script src="{{ asset('app-assets') }}/js/customizer.js"></script>

  <!-- Charts -->
  <script src="{{ asset('app-assets') }}/js/plugin/apexcharts.min.js"></script>
  {{-- <script src="{{ asset('app-assets') }}/js/charts/apex-chart.js"></script> --}}

  <!-- Cards -->
  <script src="{{ asset('app-assets') }}/js/cards/card-analytic.js"></script>
  <script src="{{ asset('app-assets') }}/js/cards/card-advance.js"></script>
  <script src="{{ asset('app-assets') }}/js/cards/card-statistic.js"></script>

  <!-- Custom -->
  <script src="{{ asset('assets') }}/js/main.js"></script>

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <!-- Buttons JS -->
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


    @stack('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr('.date-picker', {
            dateFormat: 'Y-m-d',
            maxDate: new Date(), // Optional: Prevent selecting future dates
        });
    });
</script>
