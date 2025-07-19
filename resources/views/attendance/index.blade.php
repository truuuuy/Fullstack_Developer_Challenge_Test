<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kehadiran - Sistem Kehadiran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --card-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .main-card {
            background: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            margin-top: 20px;
        }       
        
        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 20px;
            border-bottom: none;
        }
        
        .stats-row {
            background: #f8f9fa;
            padding: 20px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 15px;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .table-container {
            padding: 20px;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-present {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-late {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .status-early {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .action-buttons {
            margin-bottom: 20px;
        }
        
        .btn-custom {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-right: 10px;
            margin-bottom: 5px;
        }
        
        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
            color: white;
        }
        
        .time-display {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 10px 15px;
            display: inline-block;
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.9rem;
            }
            
            .action-buttons {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="main-card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h2><i class="fas fa-chart-line me-2"></i>Data Kehadiran Karyawan</h2>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="time-display">
                                    <i class="fas fa-calendar me-2"></i>
                                    <span id="current-date">{{ date('d F Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Stats Section -->
                    <div class="stats-row">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="stat-card">
                                    <div class="stat-number">{{ $attendances->where('status', 'present')->count() }}</div>
                                    <div class="stat-label">Hadir Hari Ini</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stat-card">
                                    <div class="stat-number">{{ $attendances->where('status', 'Terlambat')->count() }}</div>
                                    <div class="stat-label">Terlambat</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stat-card">
                                    <div class="stat-number">{{ $attendances->whereNotNull('check_out_time')->count() }}</div>
                                    <div class="stat-label">Sudah Pulang</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stat-card">
                                    <div class="stat-number">{{ $attendances->whereNull('check_out_time')->count() }}</div>
                                    <div class="stat-label">Belum Pulang</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-container">
                        @if(session('success'))
                            <div class="alert alert-success d-flex align-items-center">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if(session('error'))
                            <div class="alert alert-danger d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                {{ session('error') }}
                            </div>
                        @endif
                        
                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <a href="{{ route('attendance.checkin.form') }}" class="btn btn-custom">
                                <i class="fas fa-sign-in-alt me-2"></i>Absen Masuk
                            </a>
                            <a href="{{ route('attendance.checkout.form') }}" class="btn btn-custom">
                                <i class="fas fa-sign-out-alt me-2"></i>Absen Keluar
                            </a>
                            {{-- <a href="{{ route('attendance_history.index') }}">Lihat Riwayat Absensi</a>

                            </a> --}}
                            <a href="{{ route('attendance.ketepatan') }}" class="btn btn-custom">
                                <i class="fas fa-clock me-2"></i>history Absensi
                            </a>
                        </div>
                        
                        <!-- Data Table -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Karyawan</th>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Status</th>
                                        <th>Durasi Kerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($attendances as $attendance)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <strong>{{ $attendance->employee->name }}</strong>
                                                <br>
                                                {{-- <small class="text-muted">ID: {{ $attendance->employee->id }}</small> --}}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}</td>
                                            <td>
                                                @if($attendance->check_in_time)
                                                    <i class="fas fa-sign-in-alt text-success me-1"></i>
                                                    {{ \Carbon\Carbon::parse($attendance->check_in_time)->format('H:i:s') }}
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($attendance->check_out_time)
                                                    <i class="fas fa-sign-out-alt text-warning me-1"></i>
                                                    {{ \Carbon\Carbon::parse($attendance->check_out_time)->format('H:i:s') }}
                                                @else
                                                    <span class="text-muted">Belum keluar</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($attendance->status == 'present')
                                                    <span class="status-badge status-present">
                                                        <i class="fas fa-check me-1"></i>Hadir
                                                    </span>
                                                @elseif($attendance->status == 'Terlambat')
                                                    <span class="status-badge status-late">
                                                        <i class="fas fa-clock me-1"></i>Terlambat
                                                    </span>
                                                @elseif($attendance->status == 'Pulang Awal')
                                                    <span class="status-badge status-early">
                                                        <i class="fas fa-door-open me-1"></i>Pulang Awal
                                                    </span>
                                                @else
                                                    <span class="status-badge status-present">{{ $attendance->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($attendance->check_in_time && $attendance->check_out_time)
                                                    @php
                                                        $checkIn = \Carbon\Carbon::parse($attendance->check_in_time);
                                                        $checkOut = \Carbon\Carbon::parse($attendance->check_out_time);
                                                        $duration = $checkOut->diff($checkIn);
                                                    @endphp
                                                    {{ $duration->h }} jam {{ $duration->i }} menit
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                                <p class="text-muted">Belum ada data kehadiran hari ini</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 text-center text-muted">
                    <small>
                        Sistem Kehadiran Karyawan &copy; {{ date('Y') }} 
                        <i class="fas fa-building mx-1"></i> PT.Astra Nusantara Asia
                    </small>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update current date and time
        function updateDateTime() {
            const now = new Date();
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            };
            const dateString = now.toLocaleDateString('id-ID', options);
            
            document.getElementById('current-date').textContent = dateString;
        }
        
        // Update every minute
        setInterval(updateDateTime, 60000);
        updateDateTime();
        
        // Auto refresh page every 5 minutes to get latest data
        setInterval(function() {
            window.location.reload();
        }, 300000); // 5 minutes
    </script>
</body>
</html>