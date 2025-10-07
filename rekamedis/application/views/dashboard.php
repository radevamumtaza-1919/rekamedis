<style>
  #chartKunjungan {
    max-height: 600px;
    width: 50%;
  }
</style>

<div class="content-wrapper px-4 pt-4">
    <h1 class="fw-bold text-primary">Selamat Datang</h1>
    <p>Halo, <?= $this->session->userdata('nama') ?>. Anda login sebagai <strong><?= $this->session->userdata('role') ?></strong>.</p>

    <!-- Diagram Kunjungan Pasien -->
    <div class="row mt-4">
  <div class="col-md-6"> <!-- Ukuran lebih kecil -->
    <div class="card shadow-sm">
      <div class="card-header bg-info text-white fw-bold">
        Grafik Kunjungan Pasien
      </div>
      <div class="card-body">
        <canvas id="chartKunjungan" height="200"></canvas>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    fetch("<?= site_url('form_permintaan_klinik/get_kunjungan_data') ?>")
      .then(response => response.json())
      .then(result => {
        const ctx = document.getElementById("chartKunjungan").getContext("2d");

        new Chart(ctx, {
          type: "bar",
          data: {
            labels: result.labels,
            datasets: [{
              label: "Jumlah Kunjungan",
              data: result.data,
              backgroundColor: "rgba(75, 192, 192, 0.5)",
              borderColor: "rgba(75, 192, 192, 1)",
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            scales: {
              y: {
                beginAtZero: true,
                ticks: {
                  stepSize: 1,
                  precision: 0
                }
              }
            }
          }
        });
      });
  });
</script>
