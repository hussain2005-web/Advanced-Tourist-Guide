METHOD to connect your project with this SQL file** in the easiest possible way.

👉 `travel.sql`

Now follow these steps carefully 👇

✅ STEP 1: Start Server

1. Open **XAMPP**
2. Click **Start** on:

   * Apache ✅
   * MySQL ✅

If both are green → Good 👍

✅ STEP 2: Import the SQL File (Create Database + Tables)

1. Open browser
   Type:

   ```
   http://localhost/phpmyadmin

   ```

2. Click **Import** (top menu)

3. Click **Choose File**

4. Select:

   travel.sql

5. Click **Go**

🎉 Now database **travel** and all tables are created automatically.

# ✅ STEP 3: Check Your config.php File

Open your `config.php`

It must look like this:

```php
<?php
$conn = mysqli_connect("localhost","root","","travel");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
?>
```

### Very Important:

* localhost → correct
* root → correct
* password → empty (because XAMPP default has no password)
* travel → database name (must match exactly)

---

# ✅ STEP 4: Put Project in Correct Folder

Your project folder must be inside:

```
C:\xampp\htdocs\
```

Example:

```
C:\xampp\htdocs\travel\
```

All files like:

* home.php
* config.php
* login.php
* register.php

must be inside this folder.

---

# ✅ STEP 5: Run Project

Open browser and type:

```
http://localhost/travel/
```

OR

```
http://localhost/travel/home.php
```

If page opens → 🎉 CONNECTION SUCCESS

---

# ❌ If You See "Connection Failed"

Check:

1. Is MySQL running?
2. Did SQL file import successfully?
3. Is database name exactly "travel"?
4. Is config.php spelling correct?

---

# 🧠 Simple Understanding

Think like this:

XAMPP = mini server
MySQL = storage
travel = storage name
PHP = connector

When names match → connection works ✅
