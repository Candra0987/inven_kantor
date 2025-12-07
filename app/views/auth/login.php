<?php require __DIR__.'/../layout/header.php'; ?>

<style>
    /* Body & background */
    body {
        background: linear-gradient(145deg, #4f46e5, #0ea5e9, #8b5cf6);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        animation: fadeInBody 1s ease-in;
    }

    @keyframes fadeInBody {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Login card */
    .login-card {
        background-color: #fff;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        width: 100%;
        max-width: 400px;
        text-align: center;
        animation: fadeInCard 1s ease-in;
    }

    @keyframes fadeInCard {
        from { transform: translateY(-20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    h3 {
        margin-bottom: 25px;
        color: #333;
    }

    /* Input field with icons */
    .form-group {
        position: relative;
        margin-bottom: 20px;
    }

    .form-group input {
        width: 100%;
        padding: 12px 12px 12px 40px;
        border: 1px solid #ccc;
        border-radius: 10px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-group input:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0,123,255,0.3);
        outline: none;
    }

    .form-group i {
        position: absolute;
        top: 50%;
        left: 12px;
        transform: translateY(-50%);
        color: #999;
    }

    /* Button gradient */
    .btn-login {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        color: #fff;
        background: linear-gradient(90deg, #ff7e5f, #feb47b);
        cursor: pointer;
        transition: background 0.4s, transform 0.2s;
    }

    .btn-login:hover {
        background: linear-gradient(90deg, #feb47b, #ff7e5f);
        transform: translateY(-2px);
    }

    /* Alert */
    .alert {
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
</style>

<div class="login-card">
    <h3>Login</h3>
    <?php if(isset($error)) : ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post" action="?url=login">
        <div class="form-group">
            <i class="fa fa-envelope"></i>
            <input class="form-control" type="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
            <i class="fa fa-lock"></i>
            <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>

        <button class="btn-login" type="submit">Login</button>
    </form>
</div>

<!-- Pastikan font awesome sudah tersedia untuk icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<?php require __DIR__.'/../layout/footer.php'; ?>
