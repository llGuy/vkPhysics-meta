# vkPhysics-meta
Meta server for the vkPhysics game

## SQL database

```mysql
CREATE DATABASE vkPhysics;
USE vkPhysics;
CREATE TABLE users (uid INT NOT NULL AUTO_INCREMENT, username VARCHAR(40), password VARCHAR(40), usertag INT, PRIMARY KEY (uid));
CREATE TABLE servers (uid INT NOT NULL AUTO_INCREMENT, servername VARCHAR(40), ip VARCHAR(20), playercount INT, PRIMARY KEY (uid));
```

### NOTE

For fixing the password error:

```mysql
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';
```

With 'root' being the new password.
