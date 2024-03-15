<script>
    $(document).ready(function(){
        const bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        const pendapatan = [20000, 22000, 25000, 24000, 23000, 26000, 28000, 30000, 32000, 35000, 34000, 36000];
        const pengeluaran = [15000, 16000, 18000, 17000, 16500, 18500, 20000, 21000, 22500, 24000, 23500, 25000];

        // Periksa apakah elemen canvas sudah ada sebelum mencoba mendapatkannya
        const canvas = document.getElementById('cashflowChart');
        if (canvas) {
        // Buat chart
        const ctx = canvas.getContext('2d');
        const cashflowChart = new Chart(ctx, {
            type: 'line',
            data: {
            labels: bulan,
            datasets: [
                {
                label: 'Pendapatan',
                data: pendapatan,
                borderColor: 'green',
                backgroundColor: 'green',
                fill: false,
                tension: 0.4
                },
                {
                label: 'Pengeluaran',
                data: pengeluaran,
                borderColor: 'red',
                backgroundColor: 'red',
                fill: false,
                tension: 0.4
                }
            ]
            },
            options: {
            responsive: false,
            plugins: {
                title: {
                display: false,
                text: 'Cashflow Bulanan',
                font: {
                    size: 20
                }
                }
            },
            scales: {
                x: {
                title: {
                    display: true,
                    text: 'Bulan',
                    font: {
                    size: 16
                    }
                }
                },
                y: {
                title: {
                    display: true,
                    text: 'Jumlah (satuan juta)',
                    font: {
                    size: 16
                    }
                }
                }
            }
            }
        });
        } else {
        console.error('Elemen canvas dengan ID cashflowChart tidak ditemukan.');
        }
    });
</script>