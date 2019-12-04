@echo off
echo Backing up database...
set /p Build=<mysqlpwd.password
C:\xampp\mysql\bin\mysqldump  --single-transaction   -h remotemysql.com -p%Build% -u GBtyfP4tfL GBtyfP4tfL > mysqlbackup.sql
pause