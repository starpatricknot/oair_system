

    <!-- Modal for Editing the payment for Crop Insurance-->
    <div class="modal fade" id="editCI" aria-hidden="true" aria-labelledby="editCI" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-left mx-3" id="exampleModalLabel">Edit Payment</h3>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <td class="namer">Crop Insurance Payment</td>
                            <td>
                                <form action="#" method="POST">
                                    <select class="selectpicker" data-style="select-with-transition" title="Approve or Reject?" name="ci_ps">
                                        <option disabled selected>Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    <input class="form-control" type="text" name="ci_ap" number="true" required="true" placeholder="Enter Payment Amount" />
                                    <input type="text" name="ci_tbp" value="<?php echo $q['ci_tbp'] ?>" hidden>
                                    <input type="text" name="ci_amount_paid" value="<?php echo $q['ci_ap'] ?>" hidden>

                                    <?php
                                    $month = date('m');
                                    $day = date('d');
                                    $year = date('Y');

                                    $today = $year . '-' . $month . '-' . $day;
                                    ?>

                                    <input type="date" value="<?php echo $today; ?>" class="form-control" id="date" name="ci_pd" hidden>
                            </td>
                            <td>
                                <button type="submit" name="editPaymentCI" class="btn btn-info btn-sm">Submit</button>
                            </td>
                            </form>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <td>
                        <button class="btn btn-danger mx-2" data-bs-target="" data-bs-toggle="modal">Close</button>
                    </td>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing the payment for High Value Crop Insurance-->
    <div class="modal fade" id="editHVCI" aria-hidden="true" aria-labelledby="editHVCI" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-left mx-3" id="exampleModalLabel">Edit Payment</h3>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <td class="namer">High Value Crop Insurance Payment</td>
                            <td>
                                <form action="#" method="POST">
                                    <select class="selectpicker" data-style="select-with-transition" title="Approve or Reject?" name="hvci_ps">
                                        <option disabled selected>Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    <input class="form-control" type="text" name="hvci_ap" number="true" required="true" placeholder="Enter Payment Amount" />
                                    <input type="text" name="hvci_tbp" value="<?php echo $q['hvci_tbp'] ?>" hidden>
                                    <input type="text" name="hvci_amount_paid" value="<?php echo $q['hvci_ap'] ?>" hidden>

                                    <?php
                                    $month = date('m');
                                    $day = date('d');
                                    $year = date('Y');

                                    $today = $year . '-' . $month . '-' . $day;
                                    ?>

                                    <input type="date" value="<?php echo $today; ?>" class="form-control" id="date" name="hvci_pd" hidden>
                            </td>
                            <td>
                                <button type="submit" name="editPaymentHVCI" class="btn btn-info btn-sm">Submit</button>
                            </td>
                            </form>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <td>
                        <button class="btn btn-danger mx-2" data-bs-target="" data-bs-toggle="modal">Close</button>
                    </td>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing the payment for Livestock Mortality Insurance-->
    <div class="modal fade" id="editLMI" aria-hidden="true" aria-labelledby="editLMI" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-left mx-3" id="exampleModalLabel">Edit Payment</h3>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover">
                        <tr>
                            <td class="namer">Livestock Mortality Insurance Payment</td>
                            <td>
                                <form action="#" method="POST">
                                    <select class="selectpicker" data-style="select-with-transition" title="Approve or Reject?" name="lmi_ps">
                                        <option disabled selected>Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    <input class="form-control" type="text" name="lmi_ap" number="true" required="true" placeholder="Enter Payment Amount" />
                                    <input type="text" name="lmi_tbp" value="<?php echo $q['lmi_tbp'] ?>" hidden>
                                    <input type="text" name="lmi_amount_paid" value="<?php echo $q['lmi_ap'] ?>" hidden>

                                    <?php
                                    $month = date('m');
                                    $day = date('d');
                                    $year = date('Y');

                                    $today = $year . '-' . $month . '-' . $day;
                                    ?>

                                    <input type="date" value="<?php echo $today; ?>" class="form-control" id="date" name="lmi_pd" hidden>
                            </td>
                            <td>
                                <button type="submit" name="editPaymentLMI" class="btn btn-info btn-sm">Submit</button>
                            </td>
                            </form>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <td>
                        <button class="btn btn-danger mx-2" data-bs-target="" data-bs-toggle="modal">Close</button>
                    </td>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Viewing the CI Application Form -->
    <div class="modal fade" id="ci_view_form" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crop Insurance Form</h1>
                </div>
                <div class="modal-body">
                    <?php
                    if (!empty($q['ci_form'])) {
                        echo '<iframe src="uploaded_pdfs/' . $q['ci_form'] . '" class="embed-responsive custom-iframe" frameborder="0" style="width: 100%; height: 80vh;"></iframe>';
                    } else {
                        // Display alternative content when ci_form is empty
                        echo '<p>This client has not yet uploaded an application for this insurance.</p>';
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <td>
                        <?php echo empty($q['ci_form']) ? '<button class="btn btn-default" data-bs-target="" data-bs-toggle="modal">Close</button>' : '<button class="btn btn-default" data-bs-target="#ci_view_form2" data-bs-toggle="modal">Next</button>' ?>
                    </td>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ci_view_form2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">task</i>
                            </div>
                            <h4 class="card-title">How's the Application?</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!-- Additional buttons/actions for the toolbar can be placed here -->
                            </div>
                            <div class="">
                                <div class="container-fluid px-4">
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <td class="namer">Crop Insurance Application</td>
                                                    <td>
                                                        <form action="#" method="POST">
                                                            <select class="selectpicker" data-style="select-with-transition" title="Approve or Reject?" name="ci_stat" id="ci_stat">
                                                                <option value="Approved">Approve</option>
                                                                <option value="Rejected">Reject</option>
                                                            </select>

                                                            <textarea class="form-control" id="rejectReason1" name="reject_reason" style="display: none;" placeholder="Enter Rejection Reason"></textarea>
                                                            <input class="form-control" type="text" name="ci_tbp" number="true" required="true" placeholder="Enter the Insurance Amount" id="insuranceAmount1" />

                                                            <?php
                                                            $month = date('m');
                                                            $day = date('d');
                                                            $year = date('Y');

                                                            $today = $year . '-' . $month . '-' . $day;
                                                            ?>

                                                            <input type="date" value="<?php echo $today; ?>" class="form-control" id="date" name="ci_approval_date" hidden>
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="submit_ci" class="btn btn-info btn-sm">Submit</button>
                                                    </td>
                                                    </form>

                                                    <script>
                                                        document.getElementById('ci_stat').addEventListener('change', function() {
                                                            var rejectReasonField = document.getElementById('rejectReason1');
                                                            var insuranceAmountField = document.getElementById('insuranceAmount1');

                                                            if (this.value === 'Rejected') {
                                                                rejectReasonField.style.display = 'block';
                                                                insuranceAmountField.disabled = true;
                                                            } else {
                                                                rejectReasonField.style.display = 'none';
                                                                insuranceAmountField.disabled = false;
                                                            }
                                                        });
                                                    </script>

                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-bs-target="#ci_view_form" data-bs-toggle="modal">Back to first</button>
                    <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for Viewing the HVCI Application Form -->
    <div class="modal fade" id="hvci_view_form" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">High Value Crop Insurance Application</h1>
                </div>
                <div class="modal-body">
                    <?php
                    if (!empty($q['hvci_form'])) {
                        echo '<iframe src="uploaded_pdfs/' . $q['hvci_form'] . '" class="embed-responsive custom-iframe" frameborder="0" style="width: 100%; height: 80vh;"></iframe>';
                    } else {
                        // Display alternative content when ci_form is empty
                        echo '<p>This client has not yet uploaded an application for this insurance.</p>';
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <td>
                        <?php echo empty($q['hvci_form']) ? '<button class="btn btn-default" data-bs-target="" data-bs-toggle="modal">Close</button>' : '<button class="btn btn-default" data-bs-target="#hvci_view_form2" data-bs-toggle="modal">Next</button>' ?>
                    </td>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hvci_view_form2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">task</i>
                            </div>
                            <h4 class="card-title">How's the Application?</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!-- Additional buttons/actions for the toolbar can be placed here -->
                            </div>
                            <div class="">
                                <div class="container-fluid px-4">
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <td class="namer">High Value Crop Insurance Application</td>
                                                    <td>
                                                        <form action="#" method="POST">
                                                            <select class="selectpicker" data-style="select-with-transition" title="Approve or Reject?" name="hvci_stat" id="hvci_stat">
                                                                <option value="Approved">Approve</option>
                                                                <option value="Rejected">Reject</option>
                                                            </select>

                                                            <textarea class="form-control" id="rejectReason2" name="reject_reason" style="display: none;" placeholder="Enter Rejection Reason"></textarea>
                                                            <input class="form-control" type="text" name="hvci_tbp" number="true" required="true" placeholder="Enter the Insurance Amount" id="insuranceAmount2" />

                                                            <?php
                                                            $month = date('m');
                                                            $day = date('d');
                                                            $year = date('Y');

                                                            $today = $year . '-' . $month . '-' . $day;
                                                            ?>

                                                            <input type="date" value="<?php echo $today; ?>" class="form-control" id="date" name="hvci_approval_date" hidden>
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="submit_hvci" class="btn btn-info btn-sm">Submit</button>
                                                    </td>
                                                    </form>

                                                    <script>
                                                        document.getElementById('hvci_stat').addEventListener('change', function() {
                                                            var rejectReasonField = document.getElementById('rejectReason2');
                                                            var insuranceAmountField = document.getElementById('insuranceAmount2');

                                                            if (this.value === 'Rejected') {
                                                                rejectReasonField.style.display = 'block';
                                                                insuranceAmountField.disabled = true;
                                                            } else {
                                                                rejectReasonField.style.display = 'none';
                                                                insuranceAmountField.disabled = false;
                                                            }
                                                        });
                                                    </script>

                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-bs-target="#hvci_view_form" data-bs-toggle="modal">Back to first</button>
                    <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for Viewing the LMI Application Form -->
    <div class="modal fade" id="lmi_view_form" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Livestock Mortality Insurance Application</h1>
                </div>
                <div class="modal-body">
                    <?php
                    if (!empty($q['lmi_form'])) {
                        echo '<iframe src="uploaded_pdfs/' . $q['lmi_form'] . '" class="embed-responsive custom-iframe" frameborder="0" style="width: 100%; height: 80vh;"></iframe>';
                    } else {
                        // Display alternative content when ci_form is empty
                        echo '<p>This client has not yet uploaded an application for this insurance.</p>';
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <td>
                        <?php echo empty($q['lmi_form']) ? '<button class="btn btn-default" data-bs-target="" data-bs-toggle="modal">Close</button>' : '<button class="btn btn-default" data-bs-target="#lmi_view_form2" data-bs-toggle="modal">Next</button>' ?>
                    </td>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="lmi_view_form2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">task</i>
                            </div>
                            <h4 class="card-title">How's the Application?</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!-- Additional buttons/actions for the toolbar can be placed here -->
                            </div>
                            <div class="">
                                <div class="container-fluid px-4">
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <td class="namer">Livestock Mortality Insurance Application</td>
                                                    <td>
                                                        <form action="#" method="POST">
                                                            <select class="selectpicker" data-style="select-with-transition" title="Approve or Reject?" name="lmi_stat" id="lmi_stat">
                                                                <option value="Approved">Approve</option>
                                                                <option value="Rejected">Reject</option>
                                                            </select>

                                                            <textarea class="form-control" id="rejectReason3" name="reject_reason" style="display: none;" placeholder="Enter Rejection Reason"></textarea>
                                                            <input class="form-control" type="text" name="lmi_tbp" number="true" required="true" placeholder="Enter the Insurance Amount" id="insuranceAmount3" />

                                                            <?php
                                                            $month = date('m');
                                                            $day = date('d');
                                                            $year = date('Y');

                                                            $today = $year . '-' . $month . '-' . $day;
                                                            ?>

                                                            <input type="date" value="<?php echo $today; ?>" class="form-control" id="date" name="lmi_approval_date" hidden>
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="submit_lmi" class="btn btn-info btn-sm">Submit</button>
                                                    </td>
                                                    </form>

                                                    <script>
                                                        document.getElementById('lmi_stat').addEventListener('change', function() {
                                                            var rejectReasonField = document.getElementById('rejectReason3');
                                                            var insuranceAmountField = document.getElementById('insuranceAmount3');

                                                            if (this.value === 'Rejected') {
                                                                rejectReasonField.style.display = 'block';
                                                                insuranceAmountField.disabled = true;
                                                            } else {
                                                                rejectReasonField.style.display = 'none';
                                                                insuranceAmountField.disabled = false;
                                                            }
                                                        });
                                                    </script>

                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-bs-target="#hvci_view_form" data-bs-toggle="modal">Back to first</button>
                    <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- CI Claim Application Modal -->
    <div class="modal fade" id="ci_view_claim" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Livestock Mortality Insurance Application</h1>
                </div>
                <div class="modal-body">
                    <?php
                    if (!empty($q['ci_claim_application'])) {
                        echo '<iframe src="uploaded_pdfs_claim/' . $q['ci_claim_application'] . '" class="embed-responsive custom-iframe" frameborder="0" style="width: 100%; height: 80vh;"></iframe>';
                    } else {
                        // Display alternative content when ci_form is empty
                        echo '<p>This client has not yet uploaded an application for this insurance.</p>';
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <td>
                        <button class="btn btn-default" data-bs-target="#ci_view_claim2" data-bs-toggle="modal">Next</button>
                    </td>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ci_view_claim2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">task</i>
                            </div>
                            <h4 class="card-title">How's the Application?</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!-- Additional buttons/actions for the toolbar can be placed here -->
                            </div>
                            <div class="">
                                <div class="container-fluid px-4">
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <td class="namer text-center">Crop Insurance Claim <br> Application</td>
                                                    <td>
                                                        <form action="#" method="POST">
                                                            <select class="selectpicker" data-style="select-with-transition" title="Approve or Reject?" name="ci_claim_stat" id="ci_claim_stat">
                                                                <option value="Approved">Approve</option>
                                                                <option value="Rejected">Reject</option>
                                                            </select>

                                                            <textarea class="form-control" id="ci_reject_reason" name="ci_reject_reason" style="display: none;" placeholder="Enter Rejection Reason"></textarea>
                                                            <input type="text" name="ci_amount_paid" value="<?php echo $q['ci_ap'] ?>" hidden>
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="submitClaimCI" class="btn btn-info btn-sm">Submit</button>
                                                    </td>
                                                    </form>

                                                    <script>
                                                        document.getElementById('ci_claim_stat').addEventListener('change', function() {
                                                            var rejectReasonField = document.getElementById('ci_reject_reason');

                                                            if (this.value === 'Rejected') {
                                                                rejectReasonField.style.display = 'block';
                                                            } else {
                                                                rejectReasonField.style.display = 'none';
                                                            }
                                                        });
                                                    </script>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-bs-target="#ci_view_claim" data-bs-toggle="modal">Back to first</button>
                    <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- HVCI Claim Application Modal -->
    <div class="modal fade" id="hvci_view_claim" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Livestock Mortality Insurance Application</h1>
                </div>
                <div class="modal-body">
                    <?php
                    if (!empty($q['hvci_claim_application'])) {
                        echo '<iframe src="uploaded_pdfs_claim/' . $q['hvci_claim_application'] . '" class="embed-responsive custom-iframe" frameborder="0" style="width: 100%; height: 80vh;"></iframe>';
                    } else {
                        // Display alternative content when ci_form is empty
                        echo '<p>This client has not yet uploaded an application for this insurance.</p>';
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <td>
                        <button class="btn btn-default" data-bs-target="#hvci_view_claim2" data-bs-toggle="modal">Next</button>
                    </td>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hvci_view_claim2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">task</i>
                            </div>
                            <h4 class="card-title">How's the Application?</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!-- Additional buttons/actions for the toolbar can be placed here -->
                            </div>
                            <div class="">
                                <div class="container-fluid px-4">
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <td class="namer text-center">Crop Insurance Claim <br> Application</td>
                                                    <td>
                                                        <form action="#" method="POST">
                                                            <select class="selectpicker" data-style="select-with-transition" title="Approve or Reject?" name="hvci_claim_stat" id="hvci_claim_stat">
                                                                <option value="Approved">Approve</option>
                                                                <option value="Rejected">Reject</option>
                                                            </select>

                                                            <textarea class="form-control" id="hvci_reject_reason" name="hvci_reject_reason" style="display: none;" placeholder="Enter Rejection Reason"></textarea>
                                                            <input type="text" name="hvci_amount_paid" value="<?php echo $q['hvci_ap'] ?>" hidden>
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="submitClaimHVCI" class="btn btn-info btn-sm">Submit</button>
                                                    </td>
                                                    </form>

                                                    <script>
                                                        document.getElementById('hvci_claim_stat').addEventListener('change', function() {
                                                            var rejectReasonField = document.getElementById('hvci_reject_reason');

                                                            if (this.value === 'Rejected') {
                                                                rejectReasonField.style.display = 'block';
                                                            } else {
                                                                rejectReasonField.style.display = 'none';
                                                            }
                                                        });
                                                    </script>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-bs-target="#hvci_view_claim" data-bs-toggle="modal">Back to first</button>
                    <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- LMI Claim Application Modal -->
    <div class="modal fade" id="lmi_view_claim" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Livestock Mortality Insurance Application</h1>
                </div>
                <div class="modal-body">
                    <?php
                    if (!empty($q['lmi_claim_application'])) {
                        echo '<iframe src="uploaded_pdfs_claim/' . $q['lmi_claim_application'] . '" class="embed-responsive custom-iframe" frameborder="0" style="width: 100%; height: 80vh;"></iframe>';
                    } else {
                        // Display alternative content when ci_form is empty
                        echo '<p>This client has not yet uploaded an application for this insurance.</p>';
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <td>
                        <button class="btn btn-default" data-bs-target="#lmi_view_claim2" data-bs-toggle="modal">Next</button>
                    </td>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="lmi_view_claim2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">task</i>
                            </div>
                            <h4 class="card-title">How's the Application?</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!-- Additional buttons/actions for the toolbar can be placed here -->
                            </div>
                            <div class="">
                                <div class="container-fluid px-4">
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <td class="namer text-center">Crop Insurance Claim <br> Application</td>
                                                    <td>
                                                        <form action="#" method="POST">
                                                            <select class="selectpicker" data-style="select-with-transition" title="Approve or Reject?" name="lmi_claim_stat" id="lmi_claim_stat">
                                                                <option value="Approved">Approve</option>
                                                                <option value="Rejected">Reject</option>
                                                            </select>

                                                            <textarea class="form-control" id="lmi_reject_reason" name="lmi_reject_reason" style="display: none;" placeholder="Enter Rejection Reason"></textarea>
                                                            <input type="text" name="lmi_amount_paid" value="<?php echo $q['lmi_ap'] ?>" hidden>
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="submitClaimLMI" class="btn btn-info btn-sm">Submit</button>
                                                    </td>
                                                    </form>

                                                    <script>
                                                        document.getElementById('lmi_claim_stat').addEventListener('change', function() {
                                                            var rejectReasonField = document.getElementById('lmi_reject_reason');

                                                            if (this.value === 'Rejected') {
                                                                rejectReasonField.style.display = 'block';
                                                            } else {
                                                                rejectReasonField.style.display = 'none';
                                                            }
                                                        });
                                                    </script>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-bs-target="#lmi_view_claim" data-bs-toggle="modal">Back to first</button>
                    <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>