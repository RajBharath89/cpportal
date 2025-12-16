<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CP Managers - CoEvolve Organization</title>
    <link rel="apple-touch-icon" href="https://coevolvegroup.com/assets/images/fav.png" />
   <link rel="shortcut icon" type="image/x-icon" href="https://coevolvegroup.com/assets/images/fav.png" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .sidebar {
            transition: transform 0.3s ease;
        }
        
        .sidebar-hidden {
            transform: translateX(-100%);
        }
        
        @media (min-width: 768px) {
            .sidebar-hidden {
                transform: translateX(0);
            }
        }
        
        .dropdown-menu {
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        .dropdown-menu.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        
        .action-menu {
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        .action-menu.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        
        .modal {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .modal.active {
            display: flex;
            opacity: 1;
        }
        
        .modal-content {
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        
        .modal.active .modal-content {
            transform: scale(1);
        }
        
        .nav-item {
            transition: all 0.3s ease;
        }
        
        .nav-item:hover {
            background: #eff6ff;
            color: #2563eb;
        }
        
        .nav-item.active {
            background: #dbeafe;
            color: #1d4ed8;
            border-left: 4px solid #2563eb;
        }
        
        .badge-active {
            background: #dcfce7;
            color: #166534;
        }
        
        .badge-inactive {
            background: #fee2e2;
            color: #991b1b;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Top Header -->
    <header class="bg-gray-800 shadow-sm fixed top-0 left-0 right-0 z-40">
        <div class="flex items-center justify-between px-4 py-3">
            <!-- Logo and Mobile Menu -->
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="md:hidden text-white hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div class="flex items-center text-white">
                    <img src="https://coevolvegroup.com/assets/images/logos/primary-logo.png" alt="CoEvolve Logo" class="h-10 mr-3">
                    <span class="font-semibold">Admin</span>
                </div>
            </div>

            <!-- User Avatar -->
            <div class="relative">
                <button onclick="toggleUserMenu()" class="flex items-center gap-2 hover:bg-gray-900 rounded-lg px-3 py-2 transition-colors">
                    <div class="w-9 h-9 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
                        AU
                    </div>
                    <div class="hidden md:block text-left">
                        <div class="text-sm font-semibold text-gray-100">Admin User</div>
                    </div>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                
                <!-- Dropdown Menu -->
                <div id="userMenu" class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1">
                    <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Profile
                    </a>
                    <hr class="my-1">
                    <a href="#" onclick="handleLogout()" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="flex pt-16">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar fixed left-0 top-16 bottom-0 w-64 bg-white shadow-lg z-30 md:translate-x-0 sidebar-hidden">
            <nav class="p-4 space-y-1 mt-4">
                <a href="index.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>                
                <a href="cpm.php" class="nav-item active flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    CP Managers
                </a>
                <a href="cp.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Channel Partners
                </a>
                <a href="leads.php" class="nav-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Leads
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 md:ml-64 p-4 md:p-8">
            <!-- Title and Add Button -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">CP Managers</h1>
                <button onclick="openAddModal()" class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add CP Manager
                </button>
            </div>

            <!-- Search and Filters -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-6">
                <div class="flex flex-col md:flex-row gap-4">
                    <!-- Search -->
                    <div class="flex-1">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                id="searchInput"
                                onkeyup="filterTable()"
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" 
                                placeholder="Search by name, email, phone..."
                            >
                        </div>
                    </div>
                    
                    <!-- Status Filter -->
                    <div class="w-full md:w-48">
                        <select 
                            id="statusFilter"
                            onchange="filterTable()"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                        >
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    
                    <!-- Role Filter -->
                    <!-- <div class="w-full md:w-48">
                        <select 
                            id="roleFilter"
                            onchange="filterTable()"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                        >
                            <option value="">All Roles</option>
                            <option value="Manager">Manager</option>
                            <option value="Senior Manager">Senior Manager</option>
                            <option value="Team Lead">Team Lead</option>
                            <option value="Supervisor">Supervisor</option>
                        </select>
                    </div> -->
                </div>
            </div>

            <!-- Data Table -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Phone</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Designation</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date Created</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="divide-y divide-gray-200">
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200 flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-gray-600">
                        Showing <span class="font-medium" id="showingStart">1</span> to <span class="font-medium" id="showingEnd">10</span> of <span class="font-medium" id="totalRecords">0</span> results
                    </div>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 disabled:opacity-50" disabled>Previous</button>
                        <button class="px-3 py-1 bg-blue-600 text-white rounded-lg text-sm">1</button>
                        <button class="px-3 py-1 border border-gray-300 rounded-lg text-sm hover:bg-gray-50">Next</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add/Edit Modal -->
    <div id="addModal" class="modal fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center p-4">
        <div class="modal-content bg-white rounded-xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                <h2 id="modalTitle" class="text-xl font-bold text-gray-900">Add New CP Manager</h2>
                <button onclick="closeAddModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <form id="addForm" onsubmit="handleSubmit(event)" class="p-6">
                <input type="hidden" id="editIndex" value="">
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone <span class="text-red-500">*</span></label>
                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" pattern="[0-9+\s-]+" required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Designation <span class="text-red-500">*</span></label>
                        <input type="text" id="designation" name="designation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Role <span class="text-red-500">*</span></label>
                        <select id="role" name="role" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                            <option value="">Select Role</option>
                            <option value="Manager">Manager</option>
                            <option value="Senior Manager">Senior Manager</option>
                            <option value="Team Lead">Team Lead</option>
                            <option value="Supervisor">Supervisor</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status <span class="text-red-500">*</span></label>
                        <select id="status" name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                
                <div class="flex gap-3 mt-6">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        <span id="submitBtnText">Save</span>
                    </button>
                    <button type="button" onclick="closeAddModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let tableData = [
            { id: 'CPM001', name: 'John Doe', email: 'john.doe@example.com', phone: '+91 9876543210', designation: 'Regional Manager', role: 'Manager', status: 'active', dateCreated: '2024-01-15' },
            { id: 'CPM002', name: 'Jane Smith', email: 'jane.smith@example.com', phone: '+91 9876543211', designation: 'Area Manager', role: 'Senior Manager', status: 'active', dateCreated: '2024-02-20' },
            { id: 'CPM003', name: 'Mike Johnson', email: 'mike.j@example.com', phone: '+91 9876543212', designation: 'Team Leader', role: 'Team Lead', status: 'inactive', dateCreated: '2024-03-10' },
            { id: 'CPM004', name: 'Sarah Williams', email: 'sarah.w@example.com', phone: '+91 9876543213', designation: 'Operations Manager', role: 'Manager', status: 'active', dateCreated: '2024-04-05' },
            { id: 'CPM005', name: 'David Brown', email: 'david.b@example.com', phone: '+91 9876543214', designation: 'Sales Supervisor', role: 'Supervisor', status: 'active', dateCreated: '2024-05-12' },
            { id: 'CPM006', name: 'Emily Davis', email: 'emily.d@example.com', phone: '+91 9876543215', designation: 'Branch Manager', role: 'Manager', status: 'inactive', dateCreated: '2024-06-18' },
            { id: 'CPM007', name: 'Robert Wilson', email: 'robert.w@example.com', phone: '+91 9876543216', designation: 'District Manager', role: 'Senior Manager', status: 'active', dateCreated: '2024-07-22' },
            { id: 'CPM008', name: 'Lisa Anderson', email: 'lisa.a@example.com', phone: '+91 9876543217', designation: 'Team Coordinator', role: 'Team Lead', status: 'active', dateCreated: '2024-08-30' }
        ];

        let filteredData = [...tableData];

        function renderTable() {
            const tbody = document.getElementById('tableBody');
            tbody.innerHTML = '';
            
            if (filteredData.length === 0) {
                tbody.innerHTML = '<tr><td colspan="9" class="px-6 py-8 text-center text-gray-500">No records found</td></tr>';
                document.getElementById('totalRecords').textContent = '0';
                document.getElementById('showingStart').textContent = '0';
                document.getElementById('showingEnd').textContent = '0';
                return;
            }
            
            filteredData.forEach((row, index) => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-gray-50';
                tr.innerHTML = `
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">${row.id}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">${row.name}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">${row.email}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">${row.phone}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">${row.designation}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">${row.role}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full ${row.status === 'active' ? 'badge-active' : 'badge-inactive'}">
                            ${row.status.charAt(0).toUpperCase() + row.status.slice(1)}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">${formatDate(row.dateCreated)}</td>
                    <td class="px-6 py-4 text-sm relative">
                        <button onclick="toggleActionMenu(${index})" class="text-gray-500 hover:text-gray-700">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                            </svg>
                        </button>
                        <div id="actionMenu${index}" class="action-menu absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-10">
                            <button onclick="editRecord(${tableData.indexOf(row)})" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit
                            </button>
                            <hr class="my-1">
                            ${row.status === 'active' ? 
                                `<button onclick="handleAction('deactivate', ${tableData.indexOf(row)})" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Deactivate
                                </button>` : 
                                `<button onclick="handleAction('activate', ${tableData.indexOf(row)})" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Activate
                                </button>`
                            }
                        </div>
                    </td>
                `;
                tbody.appendChild(tr);
            });
            
            document.getElementById('totalRecords').textContent = filteredData.length;
            document.getElementById('showingStart').textContent = filteredData.length > 0 ? '1' : '0';
            document.getElementById('showingEnd').textContent = Math.min(filteredData.length, 10);
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
        }

        function filterTable() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value.toLowerCase();
            const roleFilter = document.getElementById('roleFilter').value.toLowerCase();
            
            filteredData = tableData.filter(row => {
                const matchesSearch = !searchInput || 
                    row.name.toLowerCase().includes(searchInput) ||
                    row.email.toLowerCase().includes(searchInput) ||
                    row.phone.toLowerCase().includes(searchInput) ||
                    row.designation.toLowerCase().includes(searchInput);
                    
                const matchesStatus = !statusFilter || row.status === statusFilter;
                const matchesRole = !roleFilter || row.role === roleFilter;
                
                return matchesSearch && matchesStatus && matchesRole;
            });
            
            renderTable();
        }

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('sidebar-hidden');
        }

        function toggleUserMenu() {
            document.getElementById('userMenu').classList.toggle('active');
        }

        function setActiveNav(element) {
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('active');
            });
            element.classList.add('active');
        }

        function toggleActionMenu(index) {
            const menu = document.getElementById(`actionMenu${index}`);
            document.querySelectorAll('.action-menu').forEach(m => {
                if (m !== menu) m.classList.remove('active');
            });
            menu.classList.toggle('active');
        }

        function handleAction(action, index) {
            const item = tableData[index];
            
            if (action === 'activate') {
                tableData[index].status = 'active';
                alert(`${item.name} has been activated`);
            } else if (action === 'deactivate') {
                tableData[index].status = 'inactive';
                alert(`${item.name} has been deactivated`);
            }
            
            filterTable();
        }

        function editRecord(index) {
            const record = tableData[index];
            
            document.getElementById('modalTitle').textContent = 'Edit CP Manager';
            document.getElementById('submitBtnText').textContent = 'Update';
            document.getElementById('editIndex').value = index;
            
            document.getElementById('name').value = record.name;
            document.getElementById('email').value = record.email;
            document.getElementById('phone').value = record.phone;
            document.getElementById('designation').value = record.designation;
            document.getElementById('role').value = record.role;
            document.getElementById('status').value = record.status;
            
            openAddModal();
        }

        function openAddModal() {
            document.getElementById('addModal').classList.add('active');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.remove('active');
            document.getElementById('addForm').reset();
            document.getElementById('modalTitle').textContent = 'Add New CP Manager';
            document.getElementById('submitBtnText').textContent = 'Save';
            document.getElementById('editIndex').value = '';
        }

        function handleSubmit(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const editIndex = document.getElementById('editIndex').value;
            
            const entry = {
                name: formData.get('name'),
                email: formData.get('email'),
                phone: formData.get('phone'),
                designation: formData.get('designation'),
                role: formData.get('role'),
                status: formData.get('status')
            };
            
            if (editIndex !== '') {
                const index = parseInt(editIndex);
                tableData[index] = {
                    ...tableData[index],
                    ...entry
                };
                alert('CP Manager updated successfully!');
            } else {
                const newEntry = {
                    id: 'CPM' + String(tableData.length + 1).padStart(3, '0'),
                    ...entry,
                    dateCreated: new Date().toISOString().split('T')[0]
                };
                tableData.unshift(newEntry);
                alert('CP Manager added successfully!');
            }
            
            filterTable();
            closeAddModal();
        }

        function handleLogout() {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '../auth/login-org.php';
            }
        }

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.relative')) {
                document.querySelectorAll('.dropdown-menu, .action-menu').forEach(menu => {
                    menu.classList.remove('active');
                });
            }
        });

        document.getElementById('addModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeAddModal();
            }
        });

        renderTable();
    </script>
</body>
</html>