<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- BEGIN: Page JS-->
<!--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>-->
<script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
<!-- END: Page JS-->
<!-- BEGIN: Vendor JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset ('app-assets/js/select2/select2.full.min.js') }}"></script>

<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->

<script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>

<script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
  <script src="{{asset('app-assets/js/scripts/components/components-alerts.js')}}"></script>
<!-- END: Page JS-->
<!-- BEGIN: Page JS-->
<!--<script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>-->
<!--<script src="{{asset('common')}}/lib/select2/js/select2.min.js"></script>
<script src="{{ asset('common') }}/lib/search/code.js"></script>-->
<!-- END: Page JS-->
<script src="{{ asset('backend') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('app-assets/js/custom.js')}}"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
    } );
</script>
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>


@stack('scripts')
