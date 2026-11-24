<?php

declare(strict_types=1);

$pageTitle = 'Student Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="./assets/dashboard.css">
</head>
<body data-dashboard-role="student">
    <div class="dashboardShell">
        <button class="sidebarBackdrop" type="button" aria-label="Close sidebar"></button>

        <aside class="sidebar" id="dashboardSidebar">
            <div class="userAvatar">
                <img class="avatarImg" src="./assets/profileImage.png" alt="Profile picture">
                <p class="userName"><?= htmlspecialchars($userName, ENT_QUOTES, 'UTF-8') ?></p>
                <p class="studentNo">Student: <?= htmlspecialchars($userEmail, ENT_QUOTES, 'UTF-8') ?></p>
            </div>
            <nav class="navButtons" aria-label="Student navigation">
                <a class="navItem active" href="#dashboard"><span class="icon"><img src="./assets/dashboardIcon.png" alt=""></span><span class="label">Dashboard</span></a>
                <a class="navItem" href="#profile"><span class="icon"><img src="./assets/profileIcon.png" alt=""></span><span class="label">Profile</span></a>
                <a class="navItem" href="#attendance"><span class="icon"><img src="./assets/attendanceIcon.png" alt=""></span><span class="label">Attendance</span></a>
                <a class="navItem" href="#gamifiedQuiz"><span class="icon"><img src="./assets/gamifiedIcon.png" alt=""></span><span class="label">Gamified Quiz</span></a>
                <a class="navItem" href="#assignments"><span class="icon"><img src="./assets/assignmentIcon.png" alt=""></span><span class="label">Assignments</span></a>
                <a class="navItem" href="#announcement"><span class="icon"><img src="./assets/announcementIcon.png" alt=""></span><span class="label">Announcements</span></a>
                <a class="navItem" href="#academicCalendar"><span class="icon"><img src="./assets/academicCalendarIcon.png" alt=""></span><span class="label">Academic Calendar</span></a>
                <a class="navItem" href="#moduleSources"><span class="icon"><img src="./assets/moduleIcon.png" alt=""></span><span class="label">Module Sources</span></a>
                <a class="navItem logout" href="../auth/logout.php"><span class="icon"><img src="./assets/logoutIcon.png" alt=""></span><span class="label">Logout</span></a>
            </nav>
        </aside>

        <main class="dashboardContent">
            <header class="topBar">
                <button class="sidebarToggle" type="button" aria-label="Hide sidebar" aria-controls="dashboardSidebar" aria-expanded="true" title="Toggle sidebar (Ctrl + B)"><span aria-hidden="true">☰</span></button>
                <h1>Dashboard</h1>
                <label class="searchBox">
                    <span class="icon"><img src="./assets/searchIcon.png" alt=""></span>
                    <input id="dashboardSearch" type="search" placeholder="Search dashboard..." aria-label="Search dashboard">
                </label>
                <button class="iconBtn" type="button" aria-label="Notifications"><span class="icon"><img src="./assets/notificationsIcon.png" alt=""></span></button>
            </header>

            <section class="greeting">
                <h2>Hi, <?= htmlspecialchars($userName, ENT_QUOTES, 'UTF-8') ?></h2>
                <p class="headline">Welcome back</p>
                <p class="subline" id="todayDate"></p>
            </section>

            <div class="dashboardGrid">
                <section class="dashboardPanel" id="assignments">
                    <div class="panelHead"><h3>Assignments</h3><a href="#assignments">View all</a></div>
                    <div class="panelCards">
                        <article class="dataCard searchable"><p class="tag">Upcoming</p><h4>No assignments loaded</h4><p>Database data will appear here.</p></article>
                    </div>
                </section>
                <section class="dashboardPanel" id="attendance">
                    <div class="panelHead"><h3>Today</h3><a href="#attendance">Details</a></div>
                    <div class="panelCards">
                        <article class="dataCard searchable"><p class="tag">Schedule</p><h4>No classes scheduled</h4><p>Database data will appear here.</p></article>
                    </div>
                </section>
                <aside class="dashboardPanel calendarPanel" id="academicCalendar">
                    <div class="panelHead"><h3>Academic Calendar</h3></div>
                    <div class="calendarGrid" id="calendarGrid"></div>
                </aside>
            </div>
        </main>
    </div>
    <script src="./assets/dashboard.js"></script>
</body>
</html>
