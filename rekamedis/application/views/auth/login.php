<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login E-Rekam Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            height: 100vh;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 40px 30px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        .login-card .logo {
            display: block;
            margin: 0 auto 20px auto;
            width: 70px;
        }

        .login-card h3 {
            text-align: center;
            font-weight: bold;
            color: #1e3a8a;
            margin-bottom: 25px;
        }

        .btn-login {
            background-color: #1e3a8a;
            color: #fff;
            font-weight: 500;
        }

        .btn-login:hover {
            background-color: #3749b0;
        }

        .text-error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control {
            border-radius: 8px;
        }

        footer {
            position: absolute;
            bottom: 15px;
            color: #ccc;
            font-size: 12px;
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <!-- Optional Logo -->
        <img src="<?= base_url('assets/img/logolabkes.png') ?>" class="logo" alt="Logo Labkes">

        <h3>E-Rekam Medis</h3>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="text-error"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= site_url('auth/login') ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-login w-100 mt-3">
                <i class="fas fa-sign-in-alt me-2"></i> Masuk
            </button>
        </form>
    </div>

     <footer>
    &copy; <?= date('Y') ?> UPTD Labkes Pangkal Pinang • Sistem E-Rekam Medis
  </footer>

</body>
</html>
