<?php

if (isset($_POST['submit_ci'])) {
    $ci_stat = $_POST['ci_stat'];
    $ci_approval_date = $_POST['ci_approval_date'];
    $ci_tbp = $_POST['ci_tbp'];
    $ci_comment = $_POST['reject_reason'];

    $update_query = mysqli_query($conn, "UPDATE `user_table` SET ci_comment='$ci_comment', ci_status='$ci_stat', ci_approval_date='$ci_approval_date', ci_tbp='$ci_tbp' WHERE id='$id'");
    $message = "Application Updated Successfully!";
    header('refresh:2;url=admin_view_user.php?id=' . $id);
}


if (isset($_POST['submit_hvci'])) {
    $hvci_stat = $_POST['hvci_stat'];
    $hvci_approval_date = $_POST['hvci_approval_date'];
    $hvci_tbp = $_POST['hvci_tbp'];
    $hvci_comment = $_POST['reject_reason'];

    $update_query = mysqli_query($conn, "UPDATE `user_table` SET hvci_comment='$hvci_comment', hvci_status='$hvci_stat', hvci_approval_date='$hvci_approval_date', hvci_tbp='$hvci_tbp' WHERE id='$id'");
    $message = "Application Updated Successfully!";
    header('refresh:2;url=admin_view_user.php?id=' . $id);
}


if (isset($_POST['submit_lmi'])) {
    $lmi_stat = $_POST['lmi_stat'];
    $lmi_approval_date = $_POST['lmi_approval_date'];
    $lmi_tbp = $_POST['lmi_tbp'];
    $lmi_comment = $_POST['reject_reason'];

    $update_query = mysqli_query($conn, "UPDATE `user_table` SET lmi_comment='$lmi_comment', lmi_status='$lmi_stat', lmi_approval_date='$lmi_approval_date', lmi_tbp='$lmi_tbp' WHERE id='$id'");
    $message = "Application Updated Successfully!";
    header('refresh:2;url=admin_view_user.php?id=' . $id);
}


if (isset($_POST['editPaymentCI'])) {
    $ci_ps = $_POST['ci_ps'];
    $ci_pd = $_POST['ci_pd'];
    $ci_amount_paid = $_POST['ci_amount_paid'];
    $ci_ap = $_POST['ci_ap'] + $ci_amount_paid;
    $ci_tbp = $_POST['ci_tbp'] - $_POST['ci_ap'];

    $update_query = mysqli_query($conn, "UPDATE `user_table` SET ci_ps='$ci_ps', ci_pd='$ci_pd', ci_tbp='$ci_tbp', ci_ap='$ci_ap' WHERE id='$id'");
    $message = "Payment Updated Successfully!";
    header('refresh:2;url=admin_view_user.php?id=' . $id);
}

if (isset($_POST['editPaymentHVCI'])) {
    $hvci_ps = $_POST['hvci_ps'];
    $hvci_pd = $_POST['hvci_pd'];
    $hvci_amount_paid = $_POST['hvci_amount_paid'];
    $hvci_ap = $_POST['hvci_ap'] + $hvci_amount_paid;
    $hvci_tbp = $_POST['hvci_tbp'] - $_POST['hvci_ap'];

    $update_query = mysqli_query($conn, "UPDATE `user_table` SET hvci_ps='$hvci_ps', hvci_pd='$hvci_pd', hvci_tbp='$hvci_tbp', hvci_ap='$hvci_ap' WHERE id='$id'");
    $message = "Payment Updated Successfully!";
    header('refresh:2;url=admin_view_user.php?id=' . $id);
}

if (isset($_POST['editPaymentLMI'])) {
    $lmi_ps = $_POST['lmi_ps'];
    $lmi_pd = $_POST['lmi_pd'];
    $lmi_amount_paid = $_POST['lmi_amount_paid'];
    $lmi_ap = $_POST['lmi_ap'] + $lmi_amount_paid;
    $lmi_tbp = $_POST['lmi_tbp'] - $_POST['lmi_ap'];

    $update_query = mysqli_query($conn, "UPDATE `user_table` SET lmi_ps='$lmi_ps', lmi_pd='$lmi_pd', lmi_tbp='$lmi_tbp', lmi_ap='$lmi_ap' WHERE id='$id'");
    $message = "Payment Updated Successfully!";
    header('refresh:2;url=admin_view_user.php?id=' . $id);
}



//CLAIM QUERIES
if (isset($_POST['submitClaimCI'])) {
    $ci_claim_stat = $_POST['ci_claim_stat'];
    $ci_reject_reason = $_POST['ci_reject_reason'];

    if ($ci_claim_stat === "Rejected") {
        $update_query = mysqli_query($conn, "UPDATE `user_table` SET ci_claim_stat='$ci_claim_stat', ci_claim_comment='$ci_reject_reason' WHERE id='$id'");
        $message = "Insurance Claim Update Successfully!";
        header('refresh:2;url=admin_view_user.php?id=' . $id);

    } else {
        $ci_ap = $_POST['ci_amount_paid'];
        $ci_deduction = $ci_ap - $ci_ap;

        $update_query = mysqli_query($conn, "UPDATE `user_table` SET ci_claim_stat='$ci_claim_stat', ci_claim_comment='$ci_reject_reason', ci_ap='$ci_deduction' WHERE id='$id'");
        $message = "Insurance Claim Update Successfully!";
        header('refresh:2;url=admin_view_user.php?id=' . $id);
    }
}

if (isset($_POST['submitClaimHVCI'])) {
    $hvci_claim_stat = $_POST['hvci_claim_stat'];
    $hvci_reject_reason = $_POST['hvci_reject_reason'];

    if ($hvci_claim_stat === "Rejected") {
        $update_query = mysqli_query($conn, "UPDATE `user_table` SET hvci_claim_stat='$ci_claim_stat', hvci_claim_comment='$hvci_reject_reason' WHERE id='$id'");
        $message = "Insurance Claim Update Successfully!";
        header('refresh:2;url=admin_view_user.php?id=' . $id);

    } else {
        $hvci_ap = $_POST['hvci_amount_paid'];
        $hvci_deduction = $hvci_ap - $hvci_ap;

        $update_query = mysqli_query($conn, "UPDATE `user_table` SET hvci_claim_stat='$hvci_claim_stat', hvci_claim_comment='$hvci_reject_reason', hvci_ap='$hvci_deduction' WHERE id='$id'");
        $message = "Insurance Claim Update Successfully!";
        header('refresh:2;url=admin_view_user.php?id=' . $id);
    }
}

if (isset($_POST['submitClaimLMI'])) {
    $lmi_claim_stat = $_POST['lmi_claim_stat'];
    $lmi_reject_reason = $_POST['lmi_reject_reason'];

    if ($lmi_claim_stat === "Rejected") {
        $update_query = mysqli_query($conn, "UPDATE `user_table` SET lmi_claim_stat='$lmi_claim_stat', lmi_claim_comment='$lmi_reject_reason' WHERE id='$id'");
        $message = "Insurance Claim Update Successfully!";
        header('refresh:2;url=admin_view_user.php?id=' . $id);

    } else {
        $lmi_ap = $_POST['lmi_amount_paid'];
        $lmi_deduction = $lmi_ap - $lmi_ap;

        $update_query = mysqli_query($conn, "UPDATE `user_table` SET lmi_claim_stat='$lmi_claim_stat', lmi_claim_comment='$lmi_reject_reason', lmi_ap='$lmi_deduction' WHERE id='$id'");
        $message = "Insurance Claim Update Successfully!";
        header('refresh:2;url=admin_view_user.php?id=' . $id);
    }
}
