// Student data
// const studentsData = [
//     {
//         id: "1",
//         image: "https://randomuser.me/api/por",
//         fullName: "Aziz Karimov Aliyevich",
//         gender: "Erkak",
//         jshshr: "12345678901234",
//         passportId: "AB1234567",
//         faculty: "Tarmoq Ilumlari",
//         course: "2",
//         group: "KI-21",
//         studentPhone: "+998 91 321 45 67",
//         parentsPhone: "+998 90 123 45 67",
//         addressType: "Yotoqxona",
//         housingType: "dormitory",
//         address: "203",
//         owner: "Universitet",
//         ownerPhone: "+998 90 321 45 67",
//         price: "000,000 UZS",
//         contract: "Imtiyozli",
//         roommates: ["Bahrom Karimov", "Vali Karimov"],
//     },
// ];

// Global variables
let currentTab = "all";
let currentSearchTerm = "";
let filteredStudents = [...studentsData];

// DOM elements
const tabButtons = document.querySelectorAll(".tab-btn");
const searchInput = document.getElementById("search-input");
const clearSearchBtn = document.getElementById("clear-search");
const studentsTableBody = document.getElementById("students-tbody");
const mobileCards = document.getElementById("mobile-cards");
const noResults = document.getElementById("no-results");
const resultsInfo = document.getElementById("results-info");
const tableContainer = document.getElementById("table-container");

// Statistics elements
const totalStudentsEl = document.getElementById("total-students");
const dormitoryStudentsEl = document.getElementById("dormitory-students");
const rentalStudentsEl = document.getElementById("rental-students");
const facultiesCountEl = document.getElementById("faculties-count");

// Count elements
const allCountEl = document.getElementById("all-count");
const dormitoryCountEl = document.getElementById("dormitory-count");
const rentalCountEl = document.getElementById("rental-count");

// Initialize the application
function init() {
    updateStatistics();
    updateCounts();
    filterAndDisplayStudents();
    setupEventListeners();
}

// Setup event listeners
function setupEventListeners() {
    // Tab buttons
    tabButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const tab = button.dataset.tab;
            setActiveTab(tab);
        });
    });

    // Search input
    searchInput.addEventListener("input", (e) => {
        currentSearchTerm = e.target.value;
        toggleClearButton();
        filterAndDisplayStudents();
    });

    // Clear search button
    clearSearchBtn.addEventListener("click", () => {
        searchInput.value = "";
        currentSearchTerm = "";
        toggleClearButton();
        filterAndDisplayStudents();
        searchInput.focus();
    });
}

// Set active tab
function setActiveTab(tab) {
    currentTab = tab;

    // Update tab buttons
    tabButtons.forEach((button) => {
        button.classList.toggle("active", button.dataset.tab === tab);
    });

    // Update table container class
    tableContainer.className = "table-container";
    if (tab !== "all") {
        tableContainer.classList.add(tab);
    }

    filterAndDisplayStudents();
}

// Toggle clear search button
function toggleClearButton() {
    clearSearchBtn.style.display = currentSearchTerm ? "block" : "none";
}

// Filter students based on current tab and search term
function filterStudents() {
    let filtered = [...studentsData];

    // Filter by housing type
    if (currentTab !== "all") {
        filtered = filtered.filter(
            (student) => student.housingType === currentTab
        );
    }

    // Filter by search term
    if (currentSearchTerm) {
        const searchLower = currentSearchTerm.toLowerCase();
        filtered = filtered.filter((student) => {
            const fullName =
                `${student.fullName}`.toLowerCase();
            return (
                fullName.includes(searchLower) ||
                student.faculty.toLowerCase().includes(searchLower) ||
                student.group.toLowerCase().includes(searchLower) ||
                student.studentPhone.includes(currentSearchTerm) ||
                student.addressType.toLowerCase().includes(searchLower)
            );
        });
    }

    return filtered;
}

// Filter and display students
function filterAndDisplayStudents() {
    filteredStudents = filterStudents();
    displayStudents(filteredStudents);
    updateResultsInfo();
}

// Display students in table and mobile cards
function displayStudents(students) {
    if (students.length === 0) {
        showNoResults();
        return;
    }

    hideNoResults();
    renderDesktopTable(students);
    renderMobileCards(students);
}

// Show no results message
function showNoResults() {
    studentsTableBody.innerHTML = "";
    mobileCards.innerHTML = "";
    noResults.style.display = "block";
}

// Hide no results message
function hideNoResults() {
    noResults.style.display = "none";
}

// Render desktop table
function renderDesktopTable(students) {
    const tbody = studentsTableBody;
    tbody.innerHTML = "";

    students.forEach((student, index) => {
        const row = document.createElement("tr");
        row.className = "fade-in";
        row.style.animationDelay = `${index * 0.05}s`;

        row.innerHTML = `
        <td><img style="display: block;       
            width: 80px;         
            height: 80px;         
            max-width: 100%;      
            object-fit: cover;    
            border-radius: 6px;   
            box-shadow: 0 1px 4px rgba(0,0,0,0.15);
            background-color: #f4f4f4; " 
            src="${student.image}" alt="">
            </td>
            <td>
                <div class="student-name"><a href="/admin/${student.id}">${student.fullName}</a></div>
            </td>
            <td>${student.gender}</td>
            <td>${student.jshshr}</td>
            <td>${student.passportId}</td>
            <td>${student.faculty}</td>
            <td>${student.course}-kurs</td>
            <td><strong>${student.group}</strong></td>
            <td>${student.studentPhone}</td>
            <td>${student.parentsPhone}</td>
            <td>${student.addressType}</td>
            <td>${student.address}</td>
            <td>${student.owner}</td>
            <td>${student.ownerPhone}</td>
            <td>${student.price}</td>
            <td>${student.contract}</td>
            <td>${student.roommates.join(", ")}</td>
        `;

        tbody.appendChild(row);
    });
}

// Render mobile cards
function renderMobileCards(students) {
    const container = mobileCards;
    container.innerHTML = "";

    students.forEach((student, index) => {
        const card = document.createElement("div");
        card.className = "student-card fade-in";
        card.style.animationDelay = `${index * 0.05}s`;
        card.innerHTML = `
            <div class="student-header">
                <div>

                    <div class="student-name-mobile"><img style="display: block;       
            width: auto;         
            height: auto;         
            max-width: 100%;      
            object-fit: cover;    
            border-radius: 6px;   
            box-shadow: 0 1px 4px rgba(0,0,0,0.15);
            background-color: #f4f4f4; " 
            src="${student.image}" alt=""></div>
                    <div class="student-name-mobile"><a href="/admin/${student.id}">${student.fullName}</a></div>

                    <span class="housing-badge housing-${student.addressType}">
                        ${
                            student.addressType === "dormitory"
                                ? "Yotoqxona"
                                : "Ijara"
                        }
                    </span>

                </div>
            </div>
            
            <div class="student-details">
                    <div class="detail-row">
                        <strong>Jinsi:</strong>
                        <strong>${student.gender}</strong>
                    </div>
                <div class="detail-row">
                    <strong>JSHSHR:</strong>
                    <strong>${student.jshshr}</strong>
                </div>
                <div class="detail-row">
                    <strong>Paaposrt ID:</strong>
                    <strong>${student.passportId}</strong>
                </div>
                <div class="detail-row">
                    <strong>Fakultet:</strong>
                    <strong>${student.faculty}</strong>
                </div>
                
                <div class="detail-row">
                    <strong>Kursi:</strong>
                    <span>${student.course}-kurs</span>
                </div>
                
                <div class="detail-row">
                    <strong>Guruhi:</strong>
                    <span>${student.group}</span>
                </div>
                
                <div class="detail-row">
                    <strong>Talaba nomeri:</strong>
                    <a href="tel:${student.studentPhone}" class="student-phone">${
            student.studentPhone
        }</a>
                </div>

                <div class="detail-row">
                    <strong>Ota-ona nomeri:</strong>
                    <a href="tel:${student.parentsPhone}" class="student-phone">${
            student.parentsPhone
        }</a>
                </div>
                
                <div class="detail-row">
                    <strong>TJ turi:</strong>
                    <span>${student.addressType}</span>
                </div>
                <div class="detail-row">
                    <strong>Manzili:</strong>
                    <span>${student.address}</span>
                </div>
                <div class="detail-row">
                    <strong>TJ egasi:</strong>
                    <span>${student.owner}</span>
                </div>
                <div class="detail-row">
                    <strong>TJ nomeri:</strong>
                    <span>${student.ownerPhone}</span>
                </div>
                <div class="detail-row">
                    <strong>TJ narxi:</strong>
                    <span>${student.price}</span>
                </div>
                <div class="detail-row">
                    <strong>Shartnoma:</strong>
                    <span>${student.contract}</span>
                </div>
                <div class="detail-row">
                    <strong>Xonadoshlar:</strong>
                    <span>${student.roommates}</span>
                </div>
            </div>
        `;

        container.appendChild(card);
    });
}

// Update statistics
function updateStatistics() {
    const dormitoryCount = studentsData.filter(
        (s) => s.housingType === "dormitory"
    ).length;
    const rentalCount = studentsData.filter(
        (s) => s.housingType === "rental"
    ).length;
    const faculties = [...new Set(studentsData.map((s) => s.faculty))];

    totalStudentsEl.textContent = studentsData.length;
    dormitoryStudentsEl.textContent = dormitoryCount;
    rentalStudentsEl.textContent = rentalCount;
    facultiesCountEl.textContent = faculties.length;
}

// Update tab counts
function updateCounts() {
    const dormitoryCount = studentsData.filter(
        (s) => s.housingType === "dormitory"
    ).length;
    const rentalCount = studentsData.filter(
        (s) => s.housingType === "rental"
    ).length;

    allCountEl.textContent = studentsData.length;
    dormitoryCountEl.textContent = dormitoryCount;
    rentalCountEl.textContent = rentalCount;
}

// Update results info
function updateResultsInfo() {
    const count = filteredStudents.length;
    const tabName =
        currentTab === "all"
            ? "Barcha"
            : currentTab === "dormitory"
            ? "Yotoqxona"
            : "Ijara";

    if (count > 0) {
        resultsInfo.textContent = `${tabName} bo'limida ${count} ta talaba ko'rsatilmoqda`;
        resultsInfo.style.display = "block";
    } else {
        resultsInfo.style.display = "none";
    }
}

// Initialize the application when DOM is loaded
document.addEventListener("DOMContentLoaded", init);
