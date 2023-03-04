# SISTEM INFORMASI BARANG SEKOLAH

1. Database design,
    Using MariaDB 10.10.2 as Database enggine to handle Database in this app and contains 6 tables.
    * barang table, contains reference data about goods and id_brg as Primary Key, index in id_jns field, created_user and updated_user 
      conected to users table as Foreign Key on id_user.
    * ruang table, contains reference data about rooms and id_ruang as Primary Key, created_user and updated_user conected to users table as Foreign Key on id_user.
    * sekolah table, contains reference data about school and id_sek as Primary Key (not yet utilized). 
    * barang_in table_, contains data on items that enter the inventory of goods and id_in as Primary Key, created_user conected to users table as Foreign Key on id_user, also id_brg conected to barang table as Foreign Key on id_brg.
    * barang_out table_, contains data on goods that go out to the inventory of goods and id_out as Primary Key, created_user conected to users table as Foreign Key on id_user, also id_brg conected to barang table as Foreign Key on id_brg.
    *users table, contains data about usersl and id_user as Primary Key and hak_akses in index Key. 


2. File and directory structure,
    * Main directory contains several directories assets, config, database, image and modules also contains some of the main files.
    * index.php file as an index file contains login page for user interaction.
    * main.php file contain reference assets, plugin and main function required also call the top-menu.php and sidebar-menu.php.
    * content.php this file has function as a router to redirect user request based on the menu that has been selected.
    * login-check.php to handle verification process using md5 encryption when user try to login.
    * logout.php this file to handle user logout system by destroy their session login.
    * sidebar-menu.php contains sidebar code.
    * top-menu.php contains topbar code.
    * assets directory contains contains all the necessary assets such, css, fonts,img for image, js for JavaScript and plugins.
    * config directory contains contains database.php to handle database connection, fungsi_rupiah.php to casting user input in Indonesia currency (Rupiah) and fungsi_tanggal.php to handle date format in Indonesia Calendar.
    * database directoriy is containing sql file, goods.sql for deploy database required.
    * images directory to store user image.
    * modules directory contains all code based on user menu in sidebar-menu.php


3. Detail in modules directory,
    * beranda directory contains : 
        - view.php file to perform dashboard data in small card by each table (barang, ruang, barang_in, barang_out, and report for inventory, incoming inventory and outgoing inventory).
    * user directory contains : 
        - view.php file to perform all list of data in users table and interface for user to add, edit or delete users data.
        - form.php file perform editing form to modify user data.
        - proses.php file for handling database operation in from.php using MySQLi.  
    * ruang directory contains : 
        - view.php file to perform list of data in ruang table and interface for user to edit or delete rooms data.
        - form.php file perform editing form to modify rooms data.
        - proses.php file for handling database operation in from.php using MySQLi.
    * profil directory contains : 
        - view.php file to displays the profile of the user who is currently logged in and interface for user to edit user data.
        - form.php file perform editing form to modify user who is currently logged in data.
        - proses.php file for handling database operation in from.php using MySQLi.
     * password directory contains : 
        - view.php file to displays interface editing password for user who is currently logged into data.
        - proses.php file for handling database operation (change password) in view.php using MySQLi.
    * barang directory contains : 
        - view.php file to displays list of the goods and interface for user to add, edit and delete goods data.
        - form.php file perform editing form to modify goods data.
        - proses.php file for handling database operation in from.php using MySQLi.
     * barang-in directory contains : 
        - view.php file to displays list of the goods was in the incoming inventory in list and interface for user to add goods into inventory in data.
        - form.php file perform adding form to add goods into incoming inventory data.
        - proses.php file for handling database operation in from.php using MySQLi. 
    * barang-out directory contains : 
        - view.php file to displays list of the goods was in the outgoing inventory out list and interface for user to add goods into inventory in data.
        - form.php file perform adding form to add goods into outgoing inventory data.
        - proses.php file for handling database operation in from.php using MySQLi.
    * lap-stok directory contains : 
        - view.php file to interface for user to select inventory goods data by periode of date into pdf format or downloading in excel file.
        - cetak.php file create pdf file html2pdf library based on user selected inventory goods data by periode of date.
        - excel.php file export data goods inventory into excel file (*.xls) using php and mysqli.
    * lap-barang-in directory contains : 
        - view.php file to interface for user to select incoming inventory goods data by periode of date into pdf format or downloading in excel file.
        - cetak.php file create pdf file html2pdf library based on user selected incoming inventory goods data by periode of date.
        - excel.php file export data incoming inventory into excel file (*.xls) using php and mysqli.
    * lap-barang-out directory contains : 
        - view.php file to interface for user to select outgoing inventory goods data by periode of date into pdf format or downloading in excel file.
        - cetak.php file create pdf file html2pdf library based on user selected outming inventory goods data by periode of date.
        - excel.php file export data outgoing inventory into excel file (*.xls) using php and mysqli.
        
