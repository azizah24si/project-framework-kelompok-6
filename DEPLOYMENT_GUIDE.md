# Panduan Deployment ke AlwaysData.net

## Langkah-langkah Deployment

### 1. Persiapan File
Upload semua file project ke hosting AlwaysData kecuali:
- `node_modules/`
- `.env` (akan dibuat dari `.env.production`)
- `vendor/` (akan diinstall via composer)

### 2. Konfigurasi Database
1. Login ke panel AlwaysData
2. Buat database MySQL baru
3. Catat informasi database:
   - Host: `mysql-youraccount.alwaysdata.net`
   - Database: `youraccount_databasename`
   - Username: `youraccount_username`
   - Password: `your-password`

### 3. Jalankan Script Deployment
```bash
# Masuk ke directory project
cd /path/to/your/project

# Jalankan script deployment
bash deploy.sh
```

### 4. Edit File .env
Setelah script selesai, edit file `.env` dengan kredensial database Anda:

```env
DB_HOST=mysql-youraccount.alwaysdata.net
DB_DATABASE=youraccount_databasename
DB_USERNAME=youraccount_username
DB_PASSWORD=your-password
APP_URL=https://yourdomain.alwaysdata.net
```

### 5. Konfigurasi Web Root
Di panel AlwaysData, set document root ke folder `public/` dari project Anda.

### 6. Test Aplikasi
Buka browser dan akses domain Anda untuk memastikan aplikasi berjalan.

## Troubleshooting

### Error: Table already exists
Jika ada error "Table already exists" saat migrasi:
```bash
php deployment_fix.php
php artisan migrate --force
```

### Error: Storage link
Jika foto tidak muncul:
```bash
php artisan storage:link
```

### Error: Permission denied
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### Error: 500 Internal Server Error
1. Cek file `.env` sudah benar
2. Jalankan: `php artisan config:clear`
3. Cek log error di `storage/logs/`

## File Penting untuk Deployment

1. **deployment_fix.php** - Mengatasi masalah migrasi
2. **deploy.sh** - Script otomatis deployment
3. **.env.production** - Template konfigurasi production
4. **public/.htaccess** - Konfigurasi Apache

## Setelah Deployment Berhasil

1. Buat user admin pertama melalui halaman register
2. Test semua fitur aplikasi
3. Backup database secara berkala

## Catatan Penting

- Pastikan PHP version di hosting minimal 8.1
- Aktifkan extension: PDO, OpenSSL, Mbstring, Tokenizer, XML, Ctype, JSON
- Set memory_limit minimal 256M
- Aktifkan mod_rewrite untuk Apache