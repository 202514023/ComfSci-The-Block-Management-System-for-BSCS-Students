<?php

declare(strict_types=1);

$pageTitle = 'Administrator Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="./assets/dashboard.css">
</head>
<body data-dashboard-role="admin">
    <div class="dashboardShell">
        <button class="sidebarBackdrop" type="button" aria-label="Close sidebar"></button>

        <aside class="sidebar" id="dashboardSidebar">
            <div class="userAvatar">
                <img class="avatarImg" src="./assets/profileImage.png" alt="Profile picture">
                <p class="userName"><?= htmlspecialchars($userName, ENT_QUOTES, 'UTF-8') ?></p>
                <p class="studentNo">Admin: <?= htmlspecialchars($userEmail, ENT_QUOTES, 'UTF-8') ?></p>
            </div>
            <nav class="navButtons" aria-label="Administrator navigation">
                <a class="navItem active" href="#dashboard"><span class="icon"><img src="./assets/dashboardIcon.png" alt=""></span><span class="label">Dashboard</span></a>
                <a class="navItem" href="#users"><span class="icon"><img src="./assets/profileIcon.png" alt=""></span><span class="label">Users</span></a>
                <a class="navItem" href="#blocks"><span class="icon"><img src="./assets/moduleIcon.png" alt=""></span><span class="label">Blocks</span></a>
                <a class="navItem" href="#assignments"><span class="icon"><img src="./assets/assignmentIcon.png" alt=""></span><span class="label">Assignments</span></a>
                <a class="navItem" href="#events"><span class="icon"><img src="./assets/academicCalendarIcon.png" alt=""></span><span class="label">Events</span></a>
                <a class="navItem" href="#announcements"><span class="icon"><img src="./assets/announcementIcon.png" alt=""></span><span class="label">Announcements</span></a>
                <a class="navItem logout" href="../auth/logout.php"><span class="icon"><img src="./assets/logoutIcon.png" alt=""></span><span class="label">Logout</span></a>
            </nav>
        </aside>

        <main class="dashboardContent">
            <header class="topBar">
                <button class="sidebarToggle" type="button" aria-label="Hide sidebar" aria-controls="dashboardSidebar" aria-expanded="true" title="Toggle sidebar (Ctrl + B)"><span aria-hidden="true">☰</span></button>
                <h1>Administrator Dashboard</h1>
                <label class="searchBox">
                    <span class="icon"><img src="./assets/searchIcon.png" alt=""></span>
                    <input id="dashboardSearch" type="search" placeholder="Search management records..." aria-label="Search dashboard">
                </label>
            </header>

            <section class="greeting">
                <h2>Hi, <?= htmlspecialchars($userName, ENT_QUOTES, 'UTF-8') ?></h2>
                <p class="headline">Administration overview</p>
                <p class="subline" id="todayDate"></p>
            </section>

            <div class="adminGrid">
                <section class="statCard searchable" id="users"><strong>0</strong><span>Students</span></section>
                <section class="statCard searchable" id="blocks"><strong>0</strong><span>Blocks</span></section>
                <section class="statCard searchable" id="assignments"><strong>0</strong><span>Assignments</span></section>
                <section class="statCard searchable" id="events"><strong>0</strong><span>Events</span></section>
                <section class="dashboardPanel adminWide searchable" id="announcements">
                    <div class="panelHead"><h3>Recent Announcements</h3><a href="#announcements">Manage</a></div>
                    <div class="panelCards">
                        <article class="dataCard"><p class="tag">Announcement</p><h4>No announcements loaded</h4><p>Database data will appear here.</p></article>
                    </div>
                </section>
            </div>
        </main>
    </div>
    <script src="./assets/dashboard.js"></script>
</body>
</html>
