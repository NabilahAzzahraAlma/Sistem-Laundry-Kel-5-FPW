<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Laundry App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* ====== GLOBAL LAYOUT (bg hijau daun + center) ====== */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            /* Menggunakan Font yang Lebih Umum */
            font-family: 'Inter', sans-serif; 
            background: linear-gradient(135deg, #388e3c, #81c784); /* Hijau daun gradient */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* PERBAIKAN 1: Menggunakan Flexbox untuk memusatkan dan menata elemen */
        .login-wrapper {
            /* Tampilan di Desktop: Form dan Gambar bersebelahan */
            display: flex;
            /* Menggunakan 'center' agar form dan gambar berada di tengah wrapper */
            justify-content: center; 
            align-items: center;
            width: 90%; /* Sedikit lebih lebar */
            max-width: 1000px; /* Ukuran maksimal container */
            background: white; /* Beri background putih pada wrapper */
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3); /* Bayangan yang lebih tegas */
            overflow: hidden; /* Penting agar gambar tidak keluar dari container */
        }

        /* ====== LOGIN FORM STYLING ====== */
        .login-container {
            /* PERBAIKAN 2: Alokasi lebar 50% untuk form */
            width: 50%; 
            padding: 40px;
            /* Hapus background: white; karena sudah ada di .login-wrapper */
            text-align: center;
            /* Tambahkan padding di desktop */
            padding-right: 40px; 
        }

        .login-container h1 {
            margin-bottom: 25px;
            color: #388e3c; /* Hijau daun */
            font-size: 1.8em; /* Sedikit lebih besar */
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 18px;
            text-align: left;
        }

        label {
            display: block;
            font-size: 0.9em;
            color: #333;
            margin-bottom: 6px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px; /* Padding lebih besar */
            border: 1px solid #ccc;
            border-radius: 8px; /* Sudut lebih membulat */
            box-sizing: border-box;
            font-size: 1em;
            transition: border-color 0.2s;
        }

        input:focus {
            outline: none;
            border-color: #4caf50; /* Hijau yang lebih cerah saat fokus */
        }

        /* ====== ACTIONS AND BUTTON ====== */
        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px; /* Jarak lebih baik */
            margin-bottom: 20px;
        }

        .actions a {
            font-size: 0.9em;
            color: #388e3c; 
            text-decoration: none;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        button {
            background-color: #fbc02d; /* Kuning */
            color: white;
            border: none;
            border-radius: 8px; /* Sudut lebih membulat */
            padding: 12px 0;
            width: 100%;
            font-size: 1.1em; /* Sedikit lebih besar */
            cursor: pointer;
            transition: background-color 0.3s, transform 0.1s;
        }

        button:hover {
            background-color: #f9a825; 
            transform: translateY(-1px); /* Efek subtle saat hover */
        }

        .register-link {
            margin-top: 25px;
            font-size: 0.95em;
        }

        .register-link a {
            color: #388e3c; 
            text-decoration: none;
            font-weight: 700;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .error {
            background: #ffcdd2;
            color: #b71c1c;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 0.9em;
            border: 1px solid #e57373;
        }

        /* ====== Gambar Styling ====== */
        .image-container {
            /* PERBAIKAN 3: Alokasi lebar 50% untuk gambar */
            width: 50%;
            /* Beri background kontras untuk kolom gambar */
            background-color: #f5f5f5; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 20px; /* Padding di dalam container gambar */
        }

        .image-container img {
            max-width: 100%;
            height: auto; 
            border-radius: 8px; /* Sudut membulat pada gambar */
            /* Pastikan gambar mengisi ruang dengan baik tanpa meregang */
            object-fit: cover; 
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* ====== RESPONSIVITAS (Mobile) ====== */
        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column; /* Tumpuk form dan gambar */
                width: 90%;
                /* Atur ulang background putih hanya pada container utama */
                background: white; 
                box-shadow: none;
            }
            .login-container {
                width: 100%;
                padding: 30px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.2); /* Bayangan hanya di form */
                border-radius: 10px;
            }
            .image-container {
                /* Sembunyikan gambar di layar mobile atau berikan margin */
                display: none; 
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <!-- Login Form -->
        <div class="login-container">
            <h1>Login Laundry App</h1>

            @if ($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Masukkan email" required autofocus>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" required>
                </div>

                <div class="actions">
                    <label>
                        <input type="checkbox" name="remember"> Ingat saya
                    </label>
                    <a href="{{ route('password.request') }}">Lupa password?</a>
                </div>

                <button type="submit">Masuk</button>

                <div class="register-link">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Daftar sekarang</a>
                </div>
            </form>
        </div>

        <!-- Image Container -->
        <div class="image-container">
            <!-- CATATAN: Pastikan gambar 'login view.jpg' ada di folder 'public/img/' proyek Laravel Anda. -->
            <img src="{{ asset('img/login view.jpg') }}" alt="Laundry Image">
        </div>
    </div>
</body>
</html>