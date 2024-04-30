# Sidapeg (Sistem Data Pegawai)

## Jalankan Aplikasi
### Instalasi

1. Klon repositori
```bash
    git clone https://github.com/r-aozora/sidapeg.git
    cd sidapeg
    composer install
    cp .env.example .env
```

2. Konfigurasi database di file ```.env```
```bash
    DB_DATABASE=sidapeg
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
```

3. Migrasi database
```bash
    php artisan migrate
```

4. Jalankan aplikasi
```bash
    php artisan key:generate
    php artisan serve
```

5. Buka ```http://localhost:8000``` di browser kamu

## Author
Sidapeg dibuat oleh [Muhamad Citra](https://instagram.com/zitra.hidayat).
