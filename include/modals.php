            <!-- Modal for Viewing the comments and Editing the CI Application Form -->
            <div class="modal fade" id="ci_edit_application" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">Reason for Rejection of the Application</h1>
                        </div>
                        <div class="modal-body">
                            <div class="px-3 mt-4">
                                <p class="lead">To proceed with your application, please review the comments explaining why it was rejected. Make necessary edits as per the comments and resubmit the form.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="modal-body">
                            <div class="p-3">
                                <p class="lead"><?php echo $row["ci_comment"]; ?></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#ci_edit_application2">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ci_edit_application2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">Re-upload the Application Form</h1>
                        </div>
                        <div class="modal-body">
                            <div class="px-3">
                                <p class="lead fw-semibold">Make necessary edits as per the comments before resubmitting the form.</p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form method="POST" action="#" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="pdf_file" class="form-label">Select a PDF file</label>
                                        <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept=".pdf">
                                        <input type="text" value="Pending" name="status" hidden>
                                    </div>
                                    <button type="submit" name="submit_ci" class="btn btn-primary">Upload PDF</button>
                                </form>
                                <?php
                                // Use an if-else statement to display SweetAlert2 message for success or failure
                                if (!empty($message)) {
                                    if (strpos($message, 'Error') !== false) {
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: '$message',
                                            });
                                        </script>";
                                    } else {
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success',
                                                text: '$message',
                                            });
                                        </script>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-target="#ci_edit_application" data-bs-toggle="modal">Back</button>
                            <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Viewing the comments and Editing the HVCI Application Form -->
            <div class="modal fade" id="hvci_edit_application" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">Reason for Rejection of the Application</h1>
                        </div>
                        <div class="modal-body">
                            <div class="px-3 mt-4">
                                <p class="lead">To proceed with your application, please review the comments explaining why it was rejected. Make necessary edits as per the comments and resubmit the form.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="modal-body">
                            <div class="p-3">
                                <p class="lead"><?php echo $row["hvci_comment"]; ?></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#hvci_edit_application2">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="hvci_edit_application2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">Re-upload the Application Form</h1>
                        </div>
                        <div class="modal-body">
                            <div class="px-3">
                                <p class="lead fw-semibold">Make necessary edits as per the comments before resubmitting the form.</p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form method="POST" action="#" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="pdf_file" class="form-label">Select a PDF file</label>
                                        <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept=".pdf">
                                        <input type="text" value="Pending" name="status" hidden>
                                    </div>
                                    <button type="submit" name="submit_hvci" class="btn btn-primary">Upload PDF</button>
                                </form>
                                <?php
                                // Use an if-else statement to display SweetAlert2 message for success or failure
                                if (!empty($message)) {
                                    if (strpos($message, 'Error') !== false) {
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: '$message',
                                            });
                                        </script>";
                                    } else {
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success',
                                                text: '$message',
                                            });
                                        </script>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-target="#hvci_edit_application" data-bs-toggle="modal">Back</button>
                            <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Viewing the comments and Editing the LMI Application Form -->
            <div class="modal fade" id="lmi_edit_application" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">Reason for Rejection of the Application</h1>
                        </div>
                        <div class="modal-body">
                            <div class="px-3 mt-4">
                                <p class="lead">To proceed with your application, please review the comments explaining why it was rejected. Make necessary edits as per the comments and resubmit the form.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="modal-body">
                            <div class="p-3">
                                <p class="lead"><?php echo $row["lmi_comment"]; ?></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#lmi_edit_application2">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="lmi_edit_application2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">Re-upload the Application Form</h1>
                        </div>
                        <div class="modal-body">
                            <div class="px-3">
                                <p class="lead fw-semibold">Make necessary edits as per the comments before resubmitting the form.</p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form method="POST" action="#" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="pdf_file" class="form-label">Select a PDF file</label>
                                        <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept=".pdf">
                                        <input type="text" value="Pending" name="status" hidden>
                                    </div>
                                    <button type="submit" name="submit_lmi" class="btn btn-primary">Upload PDF</button>
                                </form>
                                <?php
                                // Use an if-else statement to display SweetAlert2 message for success or failure
                                if (!empty($message)) {
                                    if (strpos($message, 'Error') !== false) {
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: '$message',
                                            });
                                        </script>";
                                    } else {
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success',
                                                text: '$message',
                                            });
                                        </script>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-target="#lmi_edit_application" data-bs-toggle="modal">Back</button>
                            <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal for Viewing the CI Information -->
            <div class="modal fade mt-5" id="ci_view_info" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-xl modal-dialog-scrollable" style="width: 100%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">Crop Insurance Information</h1>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid px-4">
                                <div class="row">
                                    <div class="col my-4 px-3">
                                        <?php foreach ($query as $q) { ?>
                                            <table class="table border table-hover">
                                                <tr>
                                                    <td class="namer table-active">Crop Insurance</td>
                                                    <td><?php echo $q['ci_status']; ?></td>
                                                    <td class="namer table-active">Approval Date</td>
                                                    <td><?php echo $q['ci_approval_date']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="namer table-active">Status</td>
                                                    <td><?php echo $q['ci_ps']; ?></td>
                                                    <td class="namer table-active">Amount to be Paid</td>
                                                    <td><?php echo empty($q['ci_tbp']) ? '₱0.00' : '₱' . number_format($q['ci_tbp']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="namer table-active">Total Amount Paid</td>
                                                    <td><?php echo empty($q['ci_ap']) ? '₱0.00' : '₱' . number_format($q['ci_ap']); ?></td>
                                                    <td class="namer table-active">Payment Date</td>
                                                    <td><?php echo $q['ci_pd']; ?></td>
                                                </tr>
                                            </table>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Viewing the HVCI Information -->
            <div class="modal fade mt-5" id="hvci_view_info" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-xl modal-dialog-scrollable" style="width: 100%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">High Value Crop Insurance Information</h1>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid px-4">
                                <div class="row">
                                    <div class="col my-4 px-3">
                                        <?php foreach ($query as $q) { ?>
                                            <table class="table border table-striped-columns table-hover">
                                                <tr>
                                                    <td class="namer table-active">Crop Insurance</td>
                                                    <td><?php echo $q['hvci_status']; ?></td>
                                                    <td class="namer table-active">Approval Date</td>
                                                    <td><?php echo $q['hvci_approval_date']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="namer table-active">Status</td>
                                                    <td><?php echo $q['hvci_ps']; ?></td>
                                                    <td class="namer table-active">Amount to be Paid</td>
                                                    <td><?php echo empty($q['hvci_tbp']) ? '₱0.00' : '₱' . number_format($q['hvci_tbp']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="namer table-active">Total Amount Paid</td>
                                                    <td><?php echo empty($q['hvci_ap']) ? '₱0.00' : '₱' . number_format($q['hvci_ap']); ?></td>
                                                    <td class="namer table-active">Payment Date</td>
                                                    <td><?php echo $q['hvci_pd']; ?></td>
                                                </tr>
                                            </table>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Viewing the LMI Information -->
            <div class="modal fade mt-5" id="lmi_view_info" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-xl modal-dialog-scrollable" style="width: 100%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">High Value Crop Insurance Information</h1>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid px-4">
                                <div class="row">
                                    <div class="col my-4 px-3">
                                        <?php foreach ($query as $q) { ?>
                                            <table class="table border table-striped-columns table-hover">
                                                <tr>
                                                    <td class="namer table-active">Livestock Mortality Insurance Information</td>
                                                    <td><?php echo $q['lmi_status']; ?></td>
                                                    <td class="namer table-active">Approval Date</td>
                                                    <td><?php echo $q['lmi_approval_date']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="namer table-active">Status</td>
                                                    <td><?php echo $q['lmi_ps']; ?></td>
                                                    <td class="namer table-active">Amount to be Paid</td>
                                                    <td><?php echo empty($q['lmi_tbp']) ? '₱0.00' : '₱' . number_format($q['lmi_tbp']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="namer table-active">Total Amount Paid</td>
                                                    <td><?php echo empty($q['lmi_ap']) ? '₱0.00' : '₱' . number_format($q['lmi_ap']); ?></td>
                                                    <td class="namer table-active">Payment Date</td>
                                                    <td><?php echo $q['lmi_pd']; ?></td>
                                                </tr>
                                            </table>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal for Viewing the comments and Editing the CI Claim Application Form -->
            <div class="modal fade" id="ci_claim_edit_application" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">Reason for Rejection of the Claim Application</h1>
                        </div>
                        <div class="modal-body">
                            <div class="px-3 mt-4">
                                <p class="lead">To proceed with your application, please review the comments explaining why it was rejected. Make necessary edits as per the comments and resubmit the form.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="modal-body">
                            <div class="p-3">
                                <p class="lead"><?php echo $row["ci_claim_comment"]; ?></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#ci_claim_edit_application2">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ci_claim_edit_application2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">Re-upload the Claim Application Form</h1>
                        </div>
                        <div class="modal-body">
                            <div class="px-3">
                                <p class="lead fw-semibold">Make necessary edits as per the comments before resubmitting the form.</p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form method="POST" action="#" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="pdf_file" class="form-label">Select a PDF file</label>
                                        <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept=".pdf">
                                        <input type="text" value="Pending" name="status" hidden>
                                    </div>
                                    <button type="submit" name="submit_claim_ci" class="btn btn-primary">Upload PDF</button>
                                </form>
                                <?php
                                // Use an if-else statement to display SweetAlert2 message for success or failure
                                if (!empty($message)) {
                                    if (strpos($message, 'Error') !== false) {
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: '$message',
                                            });
                                        </script>";
                                    } else {
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success',
                                                text: '$message',
                                            });
                                        </script>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-target="#ci_claim_edit_application" data-bs-toggle="modal">Back</button>
                            <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal for Viewing the comments and Editing the CI Claim Application Form -->
            <div class="modal fade" id="hvci_claim_edit_application" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">Reason for Rejection of the Claim Application</h1>
                        </div>
                        <div class="modal-body">
                            <div class="px-3 mt-4">
                                <p class="lead">To proceed with your application, please review the comments explaining why it was rejected. Make necessary edits as per the comments and resubmit the form.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="modal-body">
                            <div class="p-3">
                                <p class="lead"><?php echo $row["hvci_claim_comment"]; ?></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#hvci_claim_edit_application2">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="hvci_claim_edit_application2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">Re-upload the Claim Application Form</h1>
                        </div>
                        <div class="modal-body">
                            <div class="px-3">
                                <p class="lead fw-semibold">Make necessary edits as per the comments before resubmitting the form.</p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form method="POST" action="#" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="pdf_file" class="form-label">Select a PDF file</label>
                                        <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept=".pdf">
                                        <input type="text" value="Pending" name="status" hidden>
                                    </div>
                                    <button type="submit" name="submit_claim_hvci" class="btn btn-primary">Upload PDF</button>
                                </form>
                                <?php
                                // Use an if-else statement to display SweetAlert2 message for success or failure
                                if (!empty($message)) {
                                    if (strpos($message, 'Error') !== false) {
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: '$message',
                                            });
                                        </script>";
                                    } else {
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success',
                                                text: '$message',
                                            });
                                        </script>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-target="hv#ci_claim_edit_application" data-bs-toggle="modal">Back</button>
                            <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal for Viewing the comments and Editing the CI Claim Application Form -->
            <div class="modal fade" id="lmi_claim_edit_application" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">Reason for Rejection of the Claim Application</h1>
                        </div>
                        <div class="modal-body">
                            <div class="px-3 mt-4">
                                <p class="lead">To proceed with your application, please review the comments explaining why it was rejected. Make necessary edits as per the comments and resubmit the form.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="modal-body">
                            <div class="p-3">
                                <p class="lead"><?php echo $row["lmi_claim_comment"]; ?></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#ci_claim_edit_application2">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="lmi_claim_edit_application2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" id="exampleModalLabel">Re-upload the Claim Application Form</h1>
                        </div>
                        <div class="modal-body">
                            <div class="px-3">
                                <p class="lead fw-semibold">Make necessary edits as per the comments before resubmitting the form.</p>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form method="POST" action="#" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="pdf_file" class="form-label">Select a PDF file</label>
                                        <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept=".pdf">
                                        <input type="text" value="Pending" name="status" hidden>
                                    </div>
                                    <button type="submit" name="submit_claim_ci" class="btn btn-primary">Upload PDF</button>
                                </form>
                                <?php
                                // Use an if-else statement to display SweetAlert2 message for success or failure
                                if (!empty($message)) {
                                    if (strpos($message, 'Error') !== false) {
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: '$message',
                                            });
                                        </script>";
                                    } else {
                                        echo "<script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Success',
                                                text: '$message',
                                            });
                                        </script>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-target="#lmi_claim_edit_application" data-bs-toggle="modal">Back</button>
                            <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>