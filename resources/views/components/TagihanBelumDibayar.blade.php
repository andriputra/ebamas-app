<script>
    $(document).ready(function(){
        // Data tagihan belum dibayar bulanan (contoh)
        const unpaidBillsData = {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni"],
        datasets: [{
            label: "Tagihan Belum Dibayar",
            backgroundColor: "rgba(255, 99, 132, 0.5)",
            borderColor: "rgba(255, 99, 132, 1)",
            borderWidth: 1,
            data: [5000, 6000, 4500, 7000, 5500, 8000]
        }]
        };

        // Konfigurasi chart
        const chartConfig = {
        type: 'bar',
        data: unpaidBillsData,
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
        const ctx = document.getElementById('barChartTagihan').getContext('2d');
        const barChart = new Chart(ctx, chartConfig);
    });
</script>