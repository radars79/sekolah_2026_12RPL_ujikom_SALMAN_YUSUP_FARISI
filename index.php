<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Aspirasi & Pengaduan Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --student-color: #FFC107;
            --admin-color: #0D6EFD;
            --light-student: #FFF9C4;
            --light-admin: #CCE5FF;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        .student-section {
            background: linear-gradient(135deg, var(--student-color) 0%, #FFD54F 100%);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .admin-section {
            background: linear-gradient(135deg, var(--admin-color) 0%, #5B9FFF 100%);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .card-header {
            border-radius: 10px 10px 0 0 !important;
            font-weight: bold;
        }
        
        .student-card .card-header {
            background-color: var(--student-color);
            color: #000;
        }
        
        .admin-card .card-header {
            background-color: var(--admin-color);
            color: #fff;
        }
        
        .btn-student {
            background-color: var(--student-color);
            color: #000;
            border: none;
            font-weight: bold;
        }
        
        .btn-student:hover {
            background-color: #FFD54F;
            color: #000;
        }
        
        .btn-admin {
            background-color: var(--admin-color);
            color: #fff;
            border: none;
            font-weight: bold;
        }
        
        .btn-admin:hover {
            background-color: #0B5ED7;
            color: #fff;
        }
        
        .nav-tabs .nav-link {
            color: #495057;
            font-weight: bold;
        }
        
        .nav-tabs .nav-link.active {
            background-color: var(--student-color);
            color: #000;
            border-color: var(--student-color);
        }
        
        .nav-tabs .nav-link:nth-child(2).active {
            background-color: var(--admin-color);
            color: #fff;
            border-color: var(--admin-color);
        }
        
        .complaint-item {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        .complaint-item:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--student-color);
            box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
        }
        
        .admin-section .form-control:focus, .admin-section .form-select:focus {
            border-color: var(--admin-color);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        
        .status-badge {
            font-size: 0.8rem;
            padding: 4px 8px;
            border-radius: 12px;
        }
        
        .status-pending {
            background-color: #FFF3CD;
            color: #856404;
        }
        
        .status-processed {
            background-color: #D1ECF1;
            color: #0C5460;
        }
        
        .status-resolved {
            background-color: #D4EDDA;
            color: #155724;
        }
        
        .login-container {
            max-width: 400px;
            margin: 0 auto;
        }
        
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
        }
        
        .welcome-message {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <header class="text-center mb-4">
            <h1 class="display-4 fw-bold">Sistem Aspirasi & Pengaduan Siswa</h1>
            <p class="lead">Platform untuk menyampaikan aspirasi dan pengaduan siswa</p>
        </header>
        
        <ul class="nav nav-tabs mb-4" id="mainTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="student-tab" data-bs-toggle="tab" data-bs-target="#student" type="button" role="tab" aria-controls="student" aria-selected="true">
                    <i class="bi bi-person-fill me-2"></i>Halaman Siswa
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin" type="button" role="tab" aria-controls="admin" aria-selected="false">
                    <i class="bi bi-shield-lock-fill me-2"></i>Halaman Admin
                </button>
            </li>
        </ul>
        
        <div class="tab-content" id="mainTabsContent">
            <!-- Student Section -->
            <div class="tab-pane fade show active" id="student" role="tabpanel" aria-labelledby="student-tab">
                <div class="student-section">
                    <div class="welcome-message">
                        <h2 class="mb-3">Halaman Utama</h2>
                        <p class="mb-3">Selamat datang di Sistem Aspirasi & Pengaduan Siswa. Gunakan form di bawah ini untuk menyampaikan aspirasi atau pengaduan Anda.</p>
                        <button class="btn btn-student btn-lg" onclick="scrollToForm()">
                            <i class="bi bi-pencil-square me-2"></i>Buat Pengaduan Baru
                        </button>
                    </div>
                    
                    <div class="card student-card">
                        <div class="card-header">
                            <i class="bi bi-chat-dots-fill me-2"></i>Form Aspirasi Siswa
                        </div>
                        <div class="card-body">
                            <form id="aspirationForm">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nis" class="form-label">NIS (Nomor Induk Siswa)</label>
                                        <input type="text" class="form-control" id="nis" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="kelas" class="form-label">Kelas</label>
                                        <select class="form-select" id="kelas" required>
                                            <option value="" selected disabled>Pilih Kelas</option>
                                            <option value="X-1">X-</option>
                                            <option value="X-2">X-2</option>
                                            <option value="X-3">X-3</option>
                                            <option value="XI-1">XI-1</option>
                                            <option value="XI-2">XI-2</option>
                                            <option value="XI-3">XI-3</option>
                                            <option value="XII-1">XII-1</option>
                                            <option value="XII-2">XII-2</option>
                                            <option value="XII-3">XII-3</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kategori" class="form-label">Kategori Pengaduan</label>
                                        <select class="form-select" id="kategori" required>
                                            <option value="" selected disabled>Pilih Kategori</option>
                                            <option value="akademik">Akademik</option>
                                            <option value="fasilitas">Fasilitas</option>
                                            <option value="kebersihan">Kebersihan</option>
                                            <option value="keamanan">Keamanan</option>
                                            <option value="lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="subjek" class="form-label">Subjek</label>
                                    <input type="text" class="form-control" id="subjek" required>
                                </div>
                                <div class="mb-3">
                                    <label for="isi-pengaduan" class="form-label">Isi Pengaduan</label>
                                    <textarea class="form-control" id="isi-pengaduan" rows="5" required></textarea>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="reset" class="btn btn-secondary">
                                        <i class="bi bi-arrow-clockwise me-2"></i>Reset
                                    </button>
                                    <button type="submit" class="btn btn-student">
                                        <i class="bi bi-send-fill me-2"></i>KIRIM
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="card student-card">
                        <div class="card-header">
                            <i class="bi bi-search me-2"></i>Cari Data Pengaduan
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="searchComplaint" placeholder="Masukkan NIS atau Nomor Pengaduan">
                                <button class="btn btn-student" type="button" id="btnSearch">
                                    <i class="bi bi-search me-2"></i>CEK
                                </button>
                            </div>
                            <div id="searchResults"></div>
                        </div>
                    </div>
                    
                    <div class="card student-card">
                        <div class="card-header">
                            <i class="bi bi-list-ul me-2"></i>Data Pengaduan Saya
                        </div>
                        <div class="card-body">
                            <div id="myComplaints">
                                <div class="complaint-item">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6>#202301001 - Kerusakan Toilet</h6>
                                            <p class="mb-1">Toilet di lantai 2 mengalami kerusakan pada kran air...</p>
                                            <small class="text-muted">Dikirim: 10 Januari 2023</small>
                                        </div>
                                        <span class="status-badge status-processed">Diproses</span>
                                    </div>
                                </div>
                                <div class="complaint-item">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6>#202301002 - Permintaan Buku Referensi</h6>
                                            <p class="mb-1">Mohon ditambahkan buku referensi mata pelajaran Matematika...</p>
                                            <small class="text-muted">Dikirim: 12 Januari 2023</small>
                                        </div>
                                        <span class="status-badge status-resolved">Selesai</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Admin Section -->
            <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                <div class="admin-section">
                    <div id="loginForm" class="login-container">
                        <div class="card admin-card">
                            <div class="card-header text-center">
                                <i class="bi bi-shield-lock-fill me-2"></i>LOGIN ADMIN
                            </div>
                            <div class="card-body">
                                <form id="adminLoginForm">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                            <input type="text" class="form-control" id="username" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                            <input type="password" class="form-control" id="password" required>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-admin">
                                            <i class="bi bi-box-arrow-in-right me-2"></i>MASUK
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div id="adminDashboard" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>Dashboard Admin</h2>
                            <button class="btn btn-light" id="btnLogout">
                                <i class="bi bi-box-arrow-right me-2"></i>Keluar
                            </button>
                        </div>
                        
                        <div class="card admin-card">
                            <div class="card-header">
                                <i class="bi bi-funnel-fill me-2"></i>Data Pengaduan - Filter
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="filterStatus" class="form-label">Status</label>
                                        <select class="form-select" id="filterStatus">
                                            <option value="">Semua Status</option>
                                            <option value="pending">Menunggu</option>
                                            <option value="processed">Diproses</option>
                                            <option value="resolved">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="filterCategory" class="form-label">Kategori</label>
                                        <select class="form-select" id="filterCategory">
                                            <option value="">Semua Kategori</option>
                                            <option value="akademik">Akademik</option>
                                            <option value="fasilitas">Fasilitas</option>
                                            <option value="kebersihan">Kebersihan</option>
                                            <option value="keamanan">Keamanan</option>
                                            <option value="lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="filterDate" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="filterDate">
                                    </div>
                                    <div class="col-md-3 mb-3 d-flex align-items-end">
                                        <button class="btn btn-admin w-100" id="btnFilter">
                                            <i class="bi bi-funnel me-2"></i>Filter
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card admin-card">
                            <div class="card-header">
                                <i class="bi bi-list-task me-2"></i>Data Pengaduan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Subjek</th>
                                                <th>Kategori</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>#202301001</td>
                                                <td>2021001</td>
                                                <td>Ahmad Rizki</td>
                                                <td>Kerusakan Toilet</td>
                                                <td>Fasilitas</td>
                                                <td>10 Jan 2023</td>
                                                <td><span class="status-badge status-processed">Diproses</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#responseModal" data-id="202301001">
                                                        <i class="bi bi-reply-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>#202301002</td>
                                                <td>2021002</td>
                                                <td>Siti Nurhaliza</td>
                                                <td>Permintaan Buku Referensi</td>
                                                <td>Akademik</td>
                                                <td>12 Jan 2023</td>
                                                <td><span class="status-badge status-resolved">Selesai</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#responseModal" data-id="202301002">
                                                        <i class="bi bi-reply-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>#202301003</td>
                                                <td>2021003</td>
                                                <td>Budi Santoso</td>
                                                <td>Kebersihan Kelas</td>
                                                <td>Kebersihan</td>
                                                <td>13 Jan 2023</td>
                                                <td><span class="status-badge status-pending">Menunggu</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#responseModal" data-id="202301003">
                                                        <i class="bi bi-reply-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Response Modal -->
    <div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="responseModalLabel">
                        <i class="bi bi-reply-fill me-2"></i>Admin Response
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Detail Pengaduan</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-3 fw-bold">ID Pengaduan:</div>
                                <div class="col-sm-9" id="complaintId">#202301001</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 fw-bold">NIS:</div>
                                <div class="col-sm-9" id="complaintNIS">2021001</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 fw-bold">Nama:</div>
                                <div class="col-sm-9" id="complaintName">Ahmad Rizki</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 fw-bold">Kelas:</div>
                                <div class="col-sm-9" id="complaintClass">X-1</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 fw-bold">Subjek:</div>
                                <div class="col-sm-9" id="complaintSubject">Kerusakan Toilet</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 fw-bold">Isi Pengaduan:</div>
                                <div class="col-sm-9" id="complaintContent">Toilet di lantai 2 mengalami kerusakan pada kran air. Sudah 3 hari tidak bisa digunakan. Mohon segera diperbaiki.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Tanggapan</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="responseStatus" class="form-label">Status</label>
                                <select class="form-select" id="responseStatus">
                                    <option value="pending">Menunggu</option>
                                    <option value="processed">Diproses</option>
                                    <option value="resolved">Selesai</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="responseContent" class="form-label">Isi Tanggapan</label>
                                <textarea class="form-control" id="responseContent" rows="5" placeholder="Ketik tanggapan Anda di sini..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="btnSaveResponse">
                        <i class="bi bi-save me-2"></i>Simpan Tanggapan
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Toast Notification -->
    <div class="toast-container">
        <div class="toast" id="notificationToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi bi-info-circle-fill me-2 text-primary"></i>
                <strong class="me-auto">Notifikasi</strong>
                <small>Baru saja</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toastMessage">
                Pesan notifikasi
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
            
            // Student form submission
            document.getElementById('aspirationForm').addEventListener('submit', function(e) {
                e.preventDefault();
                showToast('Pengaduan Anda telah berhasil dikirim! Nomor pengaduan: #202301004');
                this.reset();
                
                // Add new complaint to the list
                const newComplaint = document.createElement('div');
                newComplaint.className = 'complaint-item';
                newComplaint.innerHTML = `
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6>#202301004 - ${document.getElementById('subjek').value}</h6>
                            <p class="mb-1">${document.getElementById('isi-pengaduan').value.substring(0, 50)}...</p>
                            <small class="text-muted">Dikirim: ${new Date().toLocaleDateString('id-ID')}</small>
                        </div>
                        <span class="status-badge status-pending">Menunggu</span>
                    </div>
                `;
                
                const complaintsContainer = document.getElementById('myComplaints');
                complaintsContainer.insertBefore(newComplaint, complaintsContainer.firstChild);
            });
            
            // Search complaint
            document.getElementById('btnSearch').addEventListener('click', function() {
                const searchTerm = document.getElementById('searchComplaint').value;
                if (searchTerm) {
                    const searchResults = document.getElementById('searchResults');
                    searchResults.innerHTML = `
                        <div class="alert alert-info">
                            <h6>Hasil Pencarian untuk "${searchTerm}":</h6>
                            <div class="complaint-item mt-2">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6>#202301001 - Kerusakan Toilet</h6>
                                        <p class="mb-1">Toilet di lantai 2 mengalami kerusakan pada kran air...</p>
                                        <small class="text-muted">Dikirim: 10 Januari 2023</small>
                                    </div>
                                    <span class="status-badge status-processed">Diproses</span>
                                </div>
                            </div>
                        </div>
                    `;
                } else {
                    showToast('Masukkan NIS atau Nomor Pengaduan untuk mencari');
                }
            });
            
            // Admin login
            document.getElementById('adminLoginForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const username = document.getElementById('username').value;
                const password = document.getElementById('password').value;
                
                // Simple validation (in real app, this would be server-side)
                if (username === 'admin' && password === 'admin123') {
                    document.getElementById('loginForm').style.display = 'none';
                    document.getElementById('adminDashboard').style.display = 'block';
                    showToast('Login berhasil! Selamat datang, Admin.');
                } else {
                    showToast('Username atau password salah. Silakan coba lagi.', 'danger');
                }
            });
            
            // Admin logout
            document.getElementById('btnLogout').addEventListener('click', function() {
                document.getElementById('loginForm').style.display = 'block';
                document.getElementById('adminDashboard').style.display = 'none';
                document.getElementById('username').value = '';
                document.getElementById('password').value = '';
                showToast('Anda telah keluar dari sistem.');
            });
            
            // Filter complaints
            document.getElementById('btnFilter').addEventListener('click', function() {
                const status = document.getElementById('filterStatus').value;
                const category = document.getElementById('filterCategory').value;
                const date = document.getElementById('filterDate').value;
                
                let filterMessage = 'Filter diterapkan: ';
                if (status) filterMessage += `Status: ${status}, `;
                if (category) filterMessage += `Kategori: ${category}, `;
                if (date) filterMessage += `Tanggal: ${date}, `;
                
                if (filterMessage === 'Filter diterapkan: ') {
                    filterMessage = 'Tidak ada filter yang diterapkan';
                } else {
                    filterMessage = filterMessage.slice(0, -2); // Remove trailing comma and space
                }
                
                showToast(filterMessage);
            });
            
            // Save response
            document.getElementById('btnSaveResponse').addEventListener('click', function() {
                const status = document.getElementById('responseStatus').value;
                const response = document.getElementById('responseContent').value;
                
                if (response) {
                    showToast('Tanggapan berhasil disimpan!');
                    bootstrap.Modal.getInstance(document.getElementById('responseModal')).hide();
                    document.getElementById('responseContent').value = '';
                } else {
                    showToast('Isi tanggapan tidak boleh kosong!', 'danger');
                }
            });
            
            // Response modal data population
            document.getElementById('responseModal').addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const complaintId = button.getAttribute('data-id');
                
                // In a real app, you would fetch data based on the ID
                // For demo purposes, we're using static data
                if (complaintId === '202301002') {
                    document.getElementById('complaintId').textContent = '#202301002';
                    document.getElementById('complaintNIS').textContent = '2021002';
                    document.getElementById('complaintName').textContent = 'Siti Nurhaliza';
                    document.getElementById('complaintClass').textContent = 'XI-2';
                    document.getElementById('complaintSubject').textContent = 'Permintaan Buku Referensi';
                    document.getElementById('complaintContent').textContent = 'Mohon ditambahkan buku referensi mata pelajaran Matematika untuk kelas XI. Buku yang ada saat ini sudah tidak sesuai dengan kurikulum terbaru.';
                    document.getElementById('responseStatus').value = 'resolved';
                    document.getElementById('responseContent').value = 'Terima kasih atas masukannya. Kami sudah mengajukan permintaan pembelian buku referensi Matematika terbaru untuk kelas XI. Estimasi buku akan tersedia di perpustakaan minggu depan.';
                } else if (complaintId === '202301003') {
                    document.getElementById('complaintId').textContent = '#202301003';
                    document.getElementById('complaintNIS').textContent = '2021003';
                    document.getElementById('complaintName').textContent = 'Budi Santoso';
                    document.getElementById('complaintClass').textContent = 'X-3';
                    document.getElementById('complaintSubject').textContent = 'Kebersihan Kelas';
                    document.getElementById('complaintContent').textContent = 'Kelas X-3 seringkali dalam kondisi tidak bersih. Sampah menumpuk dan lantai kotor. Mohon perhatian dari pihak sekolah.';
                    document.getElementById('responseStatus').value = 'pending';
                    document.getElementById('responseContent').value = '';
                }
            });
        });
        
        // Helper function to show toast notifications
        function showToast(message, type = 'primary') {
            const toastElement = document.getElementById('notificationToast');
            const toastMessage = document.getElementById('toastMessage');
            const toastHeader = toastElement.querySelector('.toast-header i');
            
            // Set message
            toastMessage.textContent = message;
            
            // Set icon and color based on type
            toastHeader.className = 'bi me-2';
            if (type === 'success') {
                toastHeader.classList.add('bi-check-circle-fill', 'text-success');
            } else if (type === 'danger') {
                toastHeader.classList.add('bi-exclamation-triangle-fill', 'text-danger');
            } else if (type === 'warning') {
                toastHeader.classList.add('bi-exclamation-circle-fill', 'text-warning');
            } else {
                toastHeader.classList.add('bi-info-circle-fill', 'text-primary');
            }
            
            // Show toast
            const toast = new bootstrap.Toast(toastElement);
            toast.show();
        }
        
        // Helper function to scroll to form
        function scrollToForm() {
            document.getElementById('aspirationForm').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</body>
</html>
