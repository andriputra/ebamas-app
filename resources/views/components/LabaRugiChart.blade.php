<script>
    $(document).ready(function(){
        // Contoh data laba rugi
        const labaRugiData = {
            'Januari': 10000,
            'Februari': 15000,
            'Maret': 20000,
            'April': 18000,
            'Mei': 22000,
            'Juni': 25000,
        };

        // Ambil labels dan values dari data
        const labels = Object.keys(labaRugiData);
        const values = Object.values(labaRugiData);

        // Buat chart menggunakan Chart.js
        const ctx = document.getElementById('Labachart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Laba Rugi',
                    data: values,
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>