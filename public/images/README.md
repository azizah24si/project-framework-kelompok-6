# Logo Pembangunan

## Cara Menambahkan Logo

Untuk menambahkan logo pembangunan ke sidebar, ikuti langkah berikut:

1. **Siapkan file logo** dengan salah satu format berikut:
   - `logo.png` (Recommended - untuk kualitas terbaik)
   - `logo.jpg` (Alternative)
   - `logo.svg` (Vector - untuk scalability)

2. **Upload file logo** ke direktori ini (`public/images/`)

3. **Nama file harus tepat**:
   - `logo.png` atau
   - `logo.jpg` atau  
   - `logo.svg`

4. **Ukuran yang disarankan**:
   - Minimal: 40x40 pixels
   - Maksimal: 200x200 pixels
   - Rasio: Square (1:1) atau landscape
   - Format: PNG dengan background transparan (recommended)

## Prioritas Logo

Sistem akan mencari logo dengan urutan prioritas:
1. `logo.png` (prioritas tertinggi)
2. `logo.jpg` 
3. `logo.svg`
4. Jika tidak ada, akan menggunakan icon default (building icon)

## Contoh

Setelah menambahkan file `logo.png`, logo akan otomatis muncul di sidebar menggantikan icon building default.

## Tips

- Gunakan PNG dengan background transparan untuk hasil terbaik
- Pastikan logo terlihat jelas pada background gelap sidebar
- Logo akan di-resize otomatis ke 40x40 pixels