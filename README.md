## About this application

Aplikasi ini menggunakan database mysql

Langkah langkah menggunakan web ini (Setelah Clone Project ini):
1. Buka terminal project ini dan ketik "npm install" karena project ini menggunakan tailwindcss
2. Copy file .env.example dan paste dengan nama.env dan sesuaikan settingan root yang ada didalamnya dengan yang kamu punya
3. Buat database dengan nama "seacatering"
4. Jalankan "php artisan migrate" pada terminal project ini
5. Jalankan "php artisan db:seed" untuk membuat akun admin bawaan

urusan dengan database sudah selesai, sekarang kita lanjut untuk menampilkan di web browser

Menggunakan laragon:
1. Pastikan clone project didalam folder laragon anda lalu, didalam folder www jadi (laragon/www/(nama project yang di clone)) *JANGAN SAMPAI SALAH FILE LARAGON YANG ANDA MILIKI* 
2. Buka Laragon
3. "Start All" pada laragon
4. Ketik "npm run dev" pada terminal untuk menjalankan tailwindcss
5. buka browser dan ketik "compfest-seacatering-ahmadghani.test" -> jika bawaan tau tidak diganti pada browser atau sesuaikan nama dengan folder yang sudah kalian clone

Menggunakan XAMPP:
1. Pastikan clone project pada folder htdocs pada xampp anda
2. Jalankan Apache dan MySQL pada XAMPP anda
3. Buka terminal untuk project anda dan ketik "npm run dev" pada terminal untuk menjalankan tailwindcss
4. Buka browser dan ketikan localhost:8000