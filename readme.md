# TP3DPBO2023

Saya Davin mengerjakan evaluasi TP3DPBO2023 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Penjelasan

Tugas ini adalah membuat mvc, jadi emang mvc wwkeoqmowdmew

### models
1. Database
Merupakan kelas untuk menjalin hubungan dengan database. Mulai dari membuka koneksi, mengeksekusi query, dan menutup koneksi.

2. Interface SQLTable
Merpakan interface yang memodelkan tabel sql pada umumnya. Tabel ini dapat dilakukan query SELECT, INSERT, UPDATE, dan DELETE.

3. Interface SQLViewTable
Merupakan interface yang memodelkan (pseudo)tabel views pada sql. Tabel ini hanya dapat melakukan query SELECT.

4. modelFigureInfo
Merupakan kelas yang memodelkan tabel view figure_info. Mewarisi kelas Database dan mengimplementasikan SQLViewTable. Terdapat kolom id, name, img, type, manufacturer, dan man_logo

5. modelFigures
Merupakan kelas yang memodelkan tabel figures. Mewarisi kelas Database dan mengimplementasikan SQLTable. Terdapat kolom id, name, img, type, man.

6. modelFigureType
Merupakan kelas yang memodelkan tabel figure_type. Mewarisi kelas Database dan mengimplementasikan SQLTable. Terdapat kolom id, name, dan num_figure.

7. modelManufacturers
Merupakan kelas yang memodelkan tabel manufacturers. Mewarisi kelas Database dan mengimplementasikan SQLTable. Terdapat kolom id, name, dan num_figure.

8. Models.php
Sebuah file untuk memudahkan include

### Views

1. folder skins
berisi file2 html yang akan digunakan sebagai UI. Terdiri dari index, table, dan figureForm.

2. ViewHandler
Merupakan abstract class untuk memodifikasi skin sesuai dengan data yang dikirimkan.
Terdapat metode untuk menghapus tag <replace>, menggantikan <replace> dengan data, mendapatkan mentahan skin dalam bentuk string, dan menampilkan skin yang sudah dimodifikasi. Terdapat abstract method untuk mengimplementasikan logika bagaimana data ditampilkan.
  
3. addForm.view
Merupakan kelas untuk menampilkan form penambahan figure. Mewarisi abstract class ViewHandler.

4. figure_type.view
Merupakan kelas untuk menampilkan tabel tipe2 figure. Merupakan kelas untuk menampilkan form penambahan figure. Mewarisi abstract class ViewHandler.

5. index.view
Merupakan elas untuk menampilkan halaman index: list of card figure2. Merupakan kelas untuk menampilkan form penambahan figure. Mewarisi abstract class ViewHandler.

6. manufacturer.view
Merupakan kelas untuk menamplkan tabel manufakturer. Merupakan kelas untuk menampilkan form penambahan figure. Mewarisi abstract class ViewHandler.
  
7. updateForm.view
Merupakan kelas untuk menampilkan form update figure. Merupakan kelas untuk menampilkan form penambahan figure. Mewarisi abstract class ViewHandler.

### Controllers
1. addForm.controller
merupakan kelas untuk mengatasi proses bisnis menambahkan figure baru. Adapun data yang dibutuhkan untuk menambahkan adalah nama, gambar (unggah gambar), tipe, dan manufakturer. Metode terdiri dari menampilkan formulir, dan melakukan penambahan

2. delete.controller
Merupakan kelas untuk mengatasi proses penghapusan. Hanya membutuhkan Id figure yang akan dihapus. Hanya memiliki methode untuk menghapus

3. figure_type.controller
Merupakan kelas untuk menampilkan tipe2 figure menggunakan tabel. Adapun dapat dimasukkan keyword atau sort untuk mencari tipe tertentu atau mengurutkan berdasarkan jumlah figure. Hanya memiliki method untuk menampilkan tabel

4. figure.controller
Merupakan kelas yang menampilkan seluruh figure dalam bentuk card. Adapun dapat dimasukkan keyword untuk mencari figure dengan nama, tipe, atau manufakturer tertentu. Hanya memiliki method untuk menampilkan list of cards Figure.

5. manucturer.controller
Merupakan kelas untuk menampilkan manufakturer figure menggunakan tabel. Adapun dapat dimasukkan keyword atau sort untuk mencari mannufakturer tertentu atau mengurutkan berdasarkan jumlah figure. Hanya memiliki method untuk menampilkan tabel manufakturer

### Other
1. semua file .php yang tidak dikategorikan merupakan navigator

### DOKSLI
  ###### index
  ![Screenshot (879)](https://github.com/davinUpi/TP3DPBO2023/assets/100902319/488ead88-7451-475b-9c1a-71370cbabe14)

  ###### form
  ![Screenshot (882)](https://github.com/davinUpi/TP3DPBO2023/assets/100902319/506a4c9b-840c-4d9f-8cb7-3abc3c501e2c)

  ###### tabel
![Screenshot (886)](https://github.com/davinUpi/TP3DPBO2023/assets/100902319/e1696446-bc8c-45a9-a172-18393f9c8322)

  
  ## VIDEO ADA DI DOKUMENTASI
  
  ## UML JUGA DI DOCS
  ###### uml.png
  ![class_diagram drawio](https://github.com/davinUpi/TP3DPBO2023/assets/100902319/859c4474-f35f-4fc3-bace-d7ee05d6fd1c)
