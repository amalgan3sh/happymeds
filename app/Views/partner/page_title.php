<?php
function generateDynamicTitleBar($title, $welcomeMessage, $userName) {
    $html = '
    <div class="page-titles">
        <div class="sub-dz-head">
            <div class="d-flex align-items-center dz-head-title">
                <h2 class="text-white m-0">' . htmlspecialchars($title) . '</h2>
                <p class="ms-2 text-warning">' . htmlspecialchars($welcomeMessage) . ' ' . htmlspecialchars($userName) . '</p>
            </div>
        </div>
    </div>';
    
    return $html;
}
?>