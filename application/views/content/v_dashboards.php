<section>
    <div class="dashboard">
        <div class="box">
            <i class="fas fa-file-alt icon-dash"></i>
            <h2><?php echo $form_count; ?> Booking</h2>
        </div>
        <div class="box">
            <i class="fas fa-address-book icon-dash"></i>
            <h2><?php echo $formkontak_count; ?> Kontak</h2>
        </div>
        <div class="box">
            <i class="fas fa-envelope-open-text icon-dash"></i>
            <h2><?php echo $subscribe_count; ?> Berlangganan</h2>
        </div>
    </div>
</section>

<!-- analisis dan statistik -->
<section class="mt-5 container">
    <h3 class="text-center">Analisis Dashboard</h3>

    <div class="row mt-4">
        <div class="col-md-6">
            <h5>Grafik Booking per Bulan</h5>
            <canvas id="bookingChart"></canvas>
        </div>
        <div class="col-md-6">
            <h5>Distribusi Jenis Servis</h5>
            <canvas id="servisChart"></canvas>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <h5>Status Pembayaran</h5>
            <canvas id="pembayaranChart"></canvas>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data PHP ke JS
    const bookingLabels = <?= json_encode(array_map(function($item) {
        return date('M', mktime(0, 0, 0, $item['bulan'], 1));
    }, $booking_per_month)); ?>;
    const bookingData = <?= json_encode(array_column($booking_per_month, 'total')); ?>;

    const servisLabels = <?= json_encode(array_column($servis_distribusi, 'label')); ?>;
    const servisData = <?= json_encode(array_column($servis_distribusi, 'total')); ?>;

    const statusLabels = <?= json_encode(array_column($status_pembayaran, 'status')); ?>;
    const statusData = <?= json_encode(array_column($status_pembayaran, 'total')); ?>;

    // Booking Chart
    new Chart(document.getElementById("bookingChart"), {
        type: 'bar',
        data: {
            labels: bookingLabels,
            datasets: [{
                label: 'Jumlah Booking',
                data: bookingData,
                backgroundColor: '#007bff'
            }]
        }
    });

    // Servis Pie
    new Chart(document.getElementById("servisChart"), {
        type: 'pie',
        data: {
            labels: servisLabels,
            datasets: [{
                data: servisData,
                backgroundColor: ['#28a745', '#ffc107', '#dc3545', '#17a2b8', '#6f42c1']
            }]
        }
    });

    // Status Doughnut
    new Chart(document.getElementById("pembayaranChart"), {
        type: 'doughnut',
        data: {
            labels: statusLabels,
            datasets: [{
                data: statusData,
                backgroundColor: ['#28a745', '#dc3545', '#ffc107']
            }]
        }
    });
</script>
