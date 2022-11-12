<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## System Environment
- PHP: ^7.4
- MySql: ^5.7
- Apache: ^2.4
- PM2: ^5.2.0

## How To Start
- 將此Repository Clone至本地www資料夾
- 獲取.env檔案至本地
- MySql的my.ini需另外設定 sql-mode=""，並restart MySql service
- Database schema 請直接dump測試機資料至本地
- 設定 Virtual Host，從 Git checkout 下來的目錄可能是 C:\wamp\mkkreman，以設定成 localhost.mkkreman.com 為例

1．本機 hosts 設定 
開啟 C:\Windows\System32\drivers\etc\hosts
並加上以下內容：

    127.0.0.1 localhost
    ::1 localhost
    127.0.0.1 localhost.mkkreman.com

2．Apache 設定
開啟 C:\wamp64\bin\apache\apache2.4.51\conf\extra\httpd-vhosts.conf
並加上以下內容：

    <VirtualHost *:80>
        DocumentRoot "C:/wamp64/www"
        ServerName localhost
        ServerAlias localhost
    </VirtualHost>

    <VirtualHost *:80>
        <Directory C:/wamp64/www/mkkreman>
          Order allow,deny
          Allow from all
        </Directory>
        DocumentRoot "C:/wamp64/www/mkkreman/public"
        ServerName localhost.mkkreman.com
        ServerAlias localhost.mkkreman.com
        ErrorLog "logs/dummy-host.example.com-error.log"
        CustomLog "logs/dummy-host.example.com-access.log" common
    </VirtualHost>

3．重啟Apache，之後瀏覽器開啟 localhost.mkkreman.com 就會指向 C:\wamp\www\mkkreman

參考資料：
https://kingweblife.blogspot.com/2016/07/xamppvirtualhostwordpress-opencart.html
