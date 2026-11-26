<?php

declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en" data-theme="light" data-sidebar="closed">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= dashboard_escape($pageTitle) ?></title>
    <link rel="stylesheet" href="./assets/dashboard.css?v=9">
</head>
<body>
<div class="app">
    <aside class="sidebar" id="dashboardSidebar" aria-label="Administrator navigation">
        <div class="avatar"><img src="./assets/profileIcon.png" alt="" class="avatarImg"></div>
        <h2 class="student-name"><?= dashboard_escape($userName) ?></h2>
        <p class="student-no">Administrator</p>
        <nav class="nav-panel" aria-label="Main navigation">
            <ul>
                <li><a href="./dashboard.php" title="Dashboard"><?= dashboard_icon('dashboard') ?><span class="nav-label">Dashboard</span></a></li>
                <?php foreach ([
                    'students' => ['Students', 'user'],
                    'blocks' => ['Blocks', 'layout'],
                    'assignments' => ['Assignments', 'file'],
                    'events' => ['Events', 'calendar'],
                    'announcements' => ['Announcements', 'bell'],
                ] as $navKey => [$navLabel, $navIcon]): ?>
                    <li><a href="./admin_<?= dashboard_escape($navKey) ?>.php"<?= $adminEntity === $navKey ? ' class="active" aria-current="page"' : '' ?> title="<?= dashboard_escape($navLabel) ?>"><?= dashboard_icon($navIcon) ?><span class="nav-label"><?= dashboard_escape($navLabel) ?></span></a></li>
                <?php endforeach; ?>
            </ul>
            <a href="../auth/logout.php" class="logout" title="Logout"><?= dashboard_icon('logout') ?><span class="nav-label">Logout</span></a>
        </nav>
    </aside>
    <a class="sidebarBackdrop" href="#" data-sidebar-close aria-label="Close navigation"></a>

    <div class="main">
        <header class="topbar">
            <div class="top-left">
                <button class="icon-btn sidebarToggle" type="button" aria-controls="dashboardSidebar" aria-expanded="false" aria-label="Open navigation"><?= dashboard_icon('menu', 18) ?></button>
                <span class="tab"><?= dashboard_icon('layout', 16) ?><?= dashboard_escape($entity['title']) ?></span>
            </div>
            <div class="actions">
                <button class="icon-btn themeToggle" type="button" aria-label="Switch to dark mode" title="Switch theme"><?= dashboard_icon('moon', 18) ?></button>
            </div>
        </header>
        <main class="content admin-content">
            <section class="hero">
                <h1><?= dashboard_escape($entity['title']) ?></h1>
                <h2><?= $showArchived ? 'Archived records' : 'Manage ' . dashboard_escape(strtolower($entity['title'])) ?></h2>
                <p><?= $showArchived ? 'Restore an archived record to make it active again.' : 'Create, update, and archive records. Archived records can be restored later.' ?></p>
            </section>
            <?php if ($flashMessage !== ''): ?><p class="toast" role="status"><?= dashboard_escape($flashMessage) ?></p><?php endif; ?>
            <div class="admin-management-grid">
                <?php require __DIR__ . '/admin_management.php'; ?>
            </div>
        </main>
    </div>
</div>
<script src="./assets/dashboard.js?v=7"></script>
</body>
</html>
