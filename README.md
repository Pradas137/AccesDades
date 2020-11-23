# AccesDades
## Instalacion.
- Instalar LAMP para (Linux)  o XAMPP para (Windows).
- Sudo apt update.
- Sudo apt install mysql-server.
- Crear Usuario en MySQL, con Password. y permisos.
- Sudo mysql_secure_installation.
- Descargar world.sql o (World_PHP-master.zip).
- Dentro de (mysql) SOURCE /Tu_Carpeta/world.sql;.
- En los ficheros en: **$conexion = mysqli_connect('localhost','Tu_Username','Tu_Password');**
	**mysqli_select_db($conexion, 'nombre de tu tabla'(en este caso 'world');**
