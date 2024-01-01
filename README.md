# How To Install & Run

Pastikan Anda memiliki beberapa prasyarat yang sudah terinstall di sistem Anda:

- [Node.js](https://nodejs.org/) 
- [npm](https://www.npmjs.com/)
- [composer] https://getcomposer.org/download/

## Instalasi

1. Clone repositori ini ke sistem Anda di dalam folder localhost:
   ```bash
   git clone https://github.com/hanawazaki/crud
   
2. Buka terminal pada folder tersebut
   
3. Install semua dependensi di terminal dengan perintah berikut:
   ```bash
   npm install
   composer install

4. buka kode pada text editor, Duplicate file bernama .env.example dan ubah namanya menjadi .env
   
6. generate app key dengan perintah:
    ```bash
   php artisan key:generate
    
7. Migrate database dengan perintah :
    ```bash
   php artisan migrate
jika ada warning "The database crud does not exist on the 'mysql' connection. Would you like to create it?" 
ketik "yes" dan enter

8. selesai


## Menjalankan Aplikasi

Setelah Anda selesai menginstal dependensi, Anda dapat menjalankan aplikasi dengan perintah berikut:

1. jalankan frontend nya dengan perintah :
   ```bash
   npm run dev
   
2. jalankan php dengan perintah :

   ```bash
   php artisan serve
   
3. Buka link berikut pada browser (port secara default)
   ```bash
   http://127.0.0.1:8000/
