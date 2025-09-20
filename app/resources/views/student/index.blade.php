<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Talabalar Yashash Joylari</title>

    <!-- CSS ulash -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo-section">
                    <div class="logo">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                            <path d="M6 12v5c3 3 9 3 12 0v-5" />
                        </svg>
                    </div>
                    <div class="title-section">
                        <h1>Talabalar Yashash Joylari</h1>
                        <p>Universitet talabalarining yashash joylari tizimi</p>
                    </div>
                </div>

                <nav class="nav-tabs">
                    <button class="tab-btn active" data-tab="all">
                        Barchasi
                        <span class="count" id="all-count">0</span>
                    </button>
                    <button class="tab-btn" data-tab="dormitory">
                        Yotoqxona
                        <span class="count" id="dormitory-count">0</span>
                    </button>
                    <button class="tab-btn" data-tab="rental">
                        Ijara
                        <span class="count" id="rental-count">0</span>
                    </button>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main">
        <div class="container">
            <!-- Statistics -->
            <div class="statistics" id="statistics">
                <div class="stat-card stat-blue">
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                    <div class="stat-content">
                        <p>Jami talabalar</p>
                        <span id="total-students">0</span>
                    </div>
                </div>

                <div class="stat-card stat-green">
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M3 21h18" />
                            <path d="M5 21V7l8-4v18" />
                            <path d="M19 21V11l-6-4" />
                        </svg>
                    </div>
                    <div class="stat-content">
                        <p>Yotoqxonada</p>
                        <span id="dormitory-students">0</span>
                    </div>
                </div>

                <div class="stat-card stat-orange">
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9,22 9,12 15,12 15,22" />
                        </svg>
                    </div>
                    <div class="stat-content">
                        <p>Ijarada</p>
                        <span id="rental-students">0</span>
                    </div>
                </div>

                <div class="stat-card stat-purple">
                    <div class="stat-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                        </svg>
                    </div>
                    <div class="stat-content">
                        <p>Fakultetlar</p>
                        <span id="faculties-count">0</span>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="search-container">
                <div class="search-box">
                    <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8" />
                        <path d="M21 21l-4.35-4.35" />
                    </svg>
                    <input type="text" id="search-input"
                        placeholder="Talaba ismi, fakulteti, guruhi yoki telefon raqami bo'yicha qidiring...">
                    <button class="clear-btn" id="clear-search" style="display: none;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Students Table -->
            <div class="table-container" id="table-container">
                <!-- Desktop Table -->
                <div class="desktop-table">
                    <table class="students-table">
                        <thead>
                            <tr>
                                <th>Talaba rasmi</th>
                                <th>F.I.O</th>
                                <th>Jinsi</th>
                                <th>Fakultet</th>
                                <th>Kurs</th>
                                <th>Guruh</th>
                                <th>Talaba tel</th>
                                <th>TJ turi</th>
                                <th>TJ manzili | Xona raqami</th>
                                <th>Xonadoshlar</th>
                            </tr>
                        </thead>
                        <tbody id="students-tbody">
                            <!-- Students will be inserted here -->
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Cards -->
                <div class="mobile-cards" id="mobile-cards">
                    <!-- Mobile cards will be inserted here -->
                </div>

                <!-- No Results -->
                <div class="no-results" id="no-results" style="display: none;">
                    <div class="no-results-icon">🔍</div>
                    <h3>Hech qanday talaba topilmadi</h3>
                    <p>Qidiruv shartlaringizni o'zgartirib ko'ring yoki boshqa bo'limni tanlang</p>
                </div>
            </div>

            <!-- Results Info -->
            <div class="results-info" id="results-info"></div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Universitet Talabalar Yashash Joylari Tizimi. Barcha huquqlar himoyalangan.</p>
        </div>
    </footer>

    <!-- JS ulash -->
    <script>
        const studentsData = @json($students);
        // console.log(studentsData);
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>


{{-- 

--}}