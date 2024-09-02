<?php

// Count all users
$count_user = "SELECT COUNT(*) as count FROM `user_table`";
$result_user = mysqli_query($conn, $count_user);
$row_user = mysqli_fetch_assoc($result_user);
$total_users = $row_user['count'];

// Count all LMI Application approved
$count_lmi = "SELECT COUNT(*) as count FROM `user_table` WHERE lmi_status='Approved'";
$result_lmi = mysqli_query($conn, $count_lmi);
$row_lmi = mysqli_fetch_assoc($result_lmi);
$total_lmi = $row_lmi['count'];

// Count all HVCI Application approved
$count_hvci = "SELECT COUNT(*) as count FROM `user_table` WHERE hvci_status='Approved'";
$result_hvci = mysqli_query($conn, $count_hvci);
$row_hvci = mysqli_fetch_assoc($result_hvci);
$total_hvci = $row_hvci['count'];

// Count all CI Application approved
$count_ci = "SELECT COUNT(*) as count FROM `user_table` WHERE ci_status='Approved'";
$result_ci = mysqli_query($conn, $count_ci);
$row_ci = mysqli_fetch_assoc($result_ci);
$total_ci = $row_ci['count'];



// Count of CI Insurance that are pending
$count_pending_ci = "SELECT COUNT(*) as count FROM `user_table` WHERE ci_status='Pending'";
$result_pending_ci = mysqli_query($conn, $count_pending_ci);
$row_pending_ci = mysqli_fetch_assoc($result_pending_ci);
$total_pending_ci = $row_pending_ci['count'];

// Count of HVCI Insurance that are pending
$count_pending_hvci = "SELECT COUNT(*) as count FROM `user_table` WHERE hvci_status='Pending'";
$result_pending_hvci = mysqli_query($conn, $count_pending_hvci);
$row_pending_hvci = mysqli_fetch_assoc($result_pending_hvci);
$total_pending_hvci = $row_pending_hvci['count'];

// Count of LMI Insurance that are pending
$count_pending_lmi = "SELECT COUNT(*) as count FROM `user_table` WHERE lmi_status='Pending'";
$result_pending_lmi = mysqli_query($conn, $count_pending_lmi);
$row_pending_lmi = mysqli_fetch_assoc($result_pending_lmi);
$total_pending_lmi = $row_pending_lmi['count'];



// Count of CI Insurance that are inactive
$count_inactive_ci = "SELECT COUNT(*) as count FROM `user_table` WHERE ci_ps='Inactive'";
$result_inactive_ci = mysqli_query($conn, $count_inactive_ci);
$row_inactive_ci = mysqli_fetch_assoc($result_inactive_ci);
$total_inactive_ci = $row_inactive_ci['count'];

// Count of HVCI Insurance that are inactive
$count_inactive_hvci = "SELECT COUNT(*) as count FROM `user_table` WHERE hvci_ps='Inactive'";
$result_inactive_hvci = mysqli_query($conn, $count_inactive_hvci);
$row_inactive_hvci = mysqli_fetch_assoc($result_inactive_hvci);
$total_inactive_hvci = $row_inactive_hvci['count'];

// Count of LMI Insurance that are inactive
$count_inactive_lmi = "SELECT COUNT(*) as count FROM `user_table` WHERE lmi_ps='Inactive'";
$result_inactive_lmi = mysqli_query($conn, $count_inactive_lmi);
$row_inactive_lmi = mysqli_fetch_assoc($result_inactive_lmi);
$total_inactive_lmi = $row_inactive_lmi['count'];



// Count of CI Insurance that are active
$count_active_ci = "SELECT COUNT(*) as count FROM `user_table` WHERE ci_ps='Active'";
$result_active_ci = mysqli_query($conn, $count_active_ci);
$row_active_ci = mysqli_fetch_assoc($result_active_ci);
$total_active_ci = $row_active_ci['count'];

// Count of HVCI Insurance that are active
$count_active_hvci = "SELECT COUNT(*) as count FROM `user_table` WHERE hvci_ps='Active'";
$result_active_hvci = mysqli_query($conn, $count_active_hvci);
$row_active_hvci = mysqli_fetch_assoc($result_active_hvci);
$total_active_hvci = $row_active_hvci['count'];

// Count of LMI Insurance that are active
$count_active_lmi = "SELECT COUNT(*) as count FROM `user_table` WHERE lmi_ps='Active'";
$result_active_lmi = mysqli_query($conn, $count_active_lmi);
$row_active_lmi = mysqli_fetch_assoc($result_active_lmi);
$total_active_lmi = $row_active_lmi['count'];


// Count of all the insurance policies applied
$total_noi = $total_ci + $total_hvci + $total_lmi;
// Count of All Insurances that are pending
$total_ip = $total_pending_ci + $total_pending_hvci + $total_pending_lmi;
// Count of all Insurances that are active
$total_active = $total_active_ci + $total_active_hvci + $total_active_lmi;
// Count of all Insurances that are inactive
$total_inactive = $total_inactive_ci + $total_inactive_hvci + $total_inactive_lmi;
