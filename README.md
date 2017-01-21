# ProjectManager

### SQL for Users and Projects table

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,	
    email VARCHAR(50) NOT NULL,	
    password VARCHAR(255) NOT NULL,
	role varchar(20) NOT NULL DEFAULT 'user',
	created datetime DEFAULT CURRENT_TIMESTAMP,
	modified datetime DEFAULT NULL
);
```

```sql
CREATE TABLE projects ( 
	id INT AUTO_INCREMENT PRIMARY KEY, 
	name varchar(255) NOT NULL,
	c_name varchar(255) NOT NULL,
	user_id INT NOT NULL, 
	capacity int(11) NOT NULL, 
	estimated_time varchar(255) DEFAULT NULL,
	start_date datetime DEFAULT CURRENT_TIMESTAMP,
	deadline datetime NOT NULL, 
	p_status varchar(50) DEFAULT 'Ettevalmistamisel',
	FOREIGN KEY user_key (user_id) REFERENCES users(id)
);
```