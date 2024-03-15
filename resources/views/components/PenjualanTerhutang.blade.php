<script>
    $(document).ready(function(){
        // Data penjualan terhutang bulanan (contoh)
        const salesData = {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni"],
        datasets: [{
            label: "Penjualan Terhutang",
            backgroundColor: "rgba(54, 162, 235, 0.5)",
            borderColor: "rgba(54, 162, 235, 1)",
            borderWidth: 1,
            data: [15000, 20000, 18000, 25000, 22000, 30000]
        }]
        };

        // Konfigurasi chart
        const chartConfig = {
        type: 'bar',
        data: salesData,
        options: {
            scales: {
            yAxes: [{
                ticks: {
                beginAtZero: true
                }
            }]
            }
        }
        };

        // Inisialisasi chart
        const ctx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctx, chartConfig);
    });
</script>