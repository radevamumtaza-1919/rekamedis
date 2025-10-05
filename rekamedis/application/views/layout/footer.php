</div> <!-- /.content-wrapper -->

<footer class="main-footer text-sm text-center">
  <strong>&copy; <?= date('Y') ?> Labolatorium Kesehatan</strong> - Sistem E-Rekam Medis.
</footer>

</div> <!-- ./wrapper -->

<!-- jQuery dari AdminLTE (hindari duplikat) -->
<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>

<!-- Bootstrap & AdminLTE -->
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js') ?>"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<!-- Inisialisasi DataTables -->
 <!--form permintaan-->
<script>
  $(document).ready(function() {
    $('#tabel-permintaan').DataTable({
      responsive: true,
      autoWidth: false,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Cari...",
        paginate: {
          previous: "←",
          next: "→"
        },
        zeroRecords: "Data tidak ditemukan",
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        lengthMenu: "Tampilkan _MENU_ data"
      }
    });
  });
</script>

<!--dokter pengirim-->
<script>
  $(document).ready(function() {
    $('#tabel-dokter').DataTable({
      responsive: true,
      autoWidth: false,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Cari...",
        paginate: {
          previous: "←",
          next: "→"
        },
        zeroRecords: "Data tidak ditemukan",
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        lengthMenu: "Tampilkan _MENU_ data"
      }
    });
  });
</script>

<!--pasien-->
<script>
  $(document).ready(function() {
    $('#tabel-pasien').DataTable({
      responsive: true,
      autoWidth: false,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Cari...",
        paginate: {
          previous: "←",
          next: "→"
        },
        zeroRecords: "Data tidak ditemukan",
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        lengthMenu: "Tampilkan _MENU_ data"
      }
    });
  });
</script>

<!--ambil sampel-->
<script>
  $(document).ready(function() {
    $('#tabel-ambil-sampel').DataTable({
      responsive: true,
      autoWidth: false,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Cari...",
        paginate: {
          previous: "←",
          next: "→"
        },
        zeroRecords: "Data tidak ditemukan",
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        lengthMenu: "Tampilkan _MENU_ data"
      }
    });
  });
</script>

<!--pembayaran-->
<script>
  $(document).ready(function() {
    $('#tabel-pembayaran').DataTable({
      responsive: true,
      autoWidth: false,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Cari...",
        paginate: {
          previous: "←",
          next: "→"
        },
        zeroRecords: "Data tidak ditemukan",
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        lengthMenu: "Tampilkan _MENU_ data"
      }
    });
  });
</script>


</body>
</html>
