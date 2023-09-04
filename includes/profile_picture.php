<?php
if (isset($row['user_id'])) {
    $target = glob("data/images/profiles/" . $row['user_id'] . ".*");
    if ($target) {
        echo '<img src="' . $target[0] . '" width="' . $width . '" height="' . $height . '">';
    } else {
        if (isset($row['user_verified']) && $row['user_verified'] == 'y' && isset($row['user_gender']) && $row['user_gender'] == 'M') {
            echo '<img src="data/images/profiles/M-Verified.jpg" width="' . $width . '" height="' . $height . '">';
        } else if (isset($row['user_gender']) && $row['user_gender'] == 'M') {
            echo '<img src="data/images/profiles/M.jpg" width="' . $width . '" height="' . $height . '">';
        } else if (isset($row['user_verified']) && $row['user_verified'] == 'y' && isset($row['user_gender']) && $row['user_gender'] == 'F') {
            echo '<img src="data/images/profiles/M-Verified.jpg" width="' . $width . '" height="' . $height . '">';
        } else if (isset($row['user_gender']) && $row['user_gender'] == 'F') {
            echo '<img src="data/images/profiles/F.jpg" width="' . $width . '" height="' . $height . '">';
        }
    }
} else {
    // Handle the case when 'user_id' key is not set in $row array
    echo 'No user ID available.';
}
?>
