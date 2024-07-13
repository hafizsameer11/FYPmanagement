<div class="modal fade" id="fileViewModal" tabindex="-1" aria-labelledby="fileViewModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <img src="" class="w-100" height="350px" alt="" />
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<script src="{{ asset('assets/admin/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/stisla.js') }}"></script>
<script src="{{ asset('assets/default/vendors/toast/jquery.toast.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/daterangepicker/daterangepicker.min.js') }}"></script>
<script src="{{ asset('assets/default/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
<script src="{{ asset('assets/default/vendors/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/default/vendors/flagstrap/js/jquery.flagstrap.min.js') }}"></script>
<script src="{{ asset('assets/default/js/parts/top_nav_flags.min.js') }}"></script>
<script src="{{ asset('assets/default/js/panel/ai-content-generator.min.js') }}"></script>


<script>
    (function() {
        "use strict";

        window.csrfToken = $('meta[name="csrf-token"]');
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        window.adminPanelPrefix = "/admin";
    })(jQuery);
</script>
<script>
    var deleteAlertTitle = "Are you sure?";
    var deleteAlertHint = "This action cannot be undone!";
    var deleteAlertConfirm = "Delete";
    var deleteAlertCancel = "Cancel";
    var deleteAlertSuccess = "Success";
    var deleteAlertFail = "Failed";
    var deleteAlertFailHint = "Error while deleting item!";
    var deleteAlertSuccessHint = "Item successfully deleted.";
    var forbiddenRequestToastTitleLang = "&quot;FORBIDDEN&quot; Request";
    var forbiddenRequestToastMsgLang = "You not access to this content.";
    var generatedContentLang = "Generated Content";
    var copyLang = "Copy";
    var doneLang = "Done";
</script>

<script></script>
