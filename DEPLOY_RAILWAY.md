# Deploy ke Railway

Project ini di-deploy memakai `Dockerfile` (Railway otomatis mendeteksinya). Saat container start, `docker/entrypoint.sh` akan: menyetel Apache ke `$PORT` Railway → `migrate --force` → `storage:link` → cache config/route/view → start Apache.

## 1. Service yang dibutuhkan

- **App** — repo ini (build dari Dockerfile).
- **MySQL** — tambahkan plugin MySQL Railway, lalu hubungkan variabelnya ke service App.

## 2. Environment variables (service App)

| Variable | Nilai |
|---|---|
| `APP_NAME` | Nama perusahaan |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` — **wajib**, jangan `true` di production |
| `APP_KEY` | Hasil `php artisan key:generate --show` (jalankan lokal, copy hasilnya) |
| `APP_URL` | URL publik Railway, mis. `https://xxx.up.railway.app` |
| `APP_LOCALE` | `id` (opsional) |
| `DB_CONNECTION` | `mysql` |
| `DB_HOST` | `${{MySQL.MYSQLHOST}}` |
| `DB_PORT` | `${{MySQL.MYSQLPORT}}` |
| `DB_DATABASE` | `${{MySQL.MYSQLDATABASE}}` |
| `DB_USERNAME` | `${{MySQL.MYSQLUSER}}` |
| `DB_PASSWORD` | `${{MySQL.MYSQLPASSWORD}}` |
| `SESSION_DRIVER` | `database` |
| `CACHE_STORE` | `database` |
| `QUEUE_CONNECTION` | `database` |
| `ADMIN_EMAILS` | Email admin Filament, pisahkan koma: `a@x.com,b@x.com` |
| `RECAPTCHA_SITE_KEY` | Site key reCAPTCHA v2 (domain Railway harus didaftarkan di Google) |
| `RECAPTCHA_SECRET_KEY` | Secret key reCAPTCHA v2 |
| `LOG_CHANNEL` | `stderr` — agar log muncul di Railway Logs |
| `LOG_LEVEL` | `error` |

## 3. Volume (wajib untuk upload gambar)

Filesystem container **ephemeral** — gambar produk/partner/sales yang di-upload lewat Filament hilang setiap redeploy tanpa volume.

- Tambahkan **Volume** ke service App dengan mount path: `/var/www/html/storage/app/public`
- Symlink `public/storage` dibuat otomatis saat boot (lihat `AppServiceProvider`).

## 4. Membuat user admin pertama

Setelah deploy pertama sukses, jalankan sekali via Railway CLI atau shell service:

```bash
php artisan tinker --execute="\App\Models\User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => 'GANTI_PASSWORD']);"
```

Pastikan email tersebut juga terdaftar di `ADMIN_EMAILS`. Panel admin: `https://domain-anda/admin`.

## 5. Checklist sebelum go-live

- [ ] `APP_DEBUG=false` dan `APP_KEY` terisi
- [ ] Volume terpasang di `/var/www/html/storage/app/public`
- [ ] Domain Railway terdaftar di konsol Google reCAPTCHA
- [ ] `ADMIN_EMAILS` terisi (tanpa ini tidak ada yang bisa login ke `/admin`)
- [ ] Health check Railway diarahkan ke `/up` (opsional, endpoint sudah tersedia)
