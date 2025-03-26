# 📱 Eclipse IMEI - IMEI Tracking System

**Eclipse IMEI** is a simple IMEI tracking web application that allows users to check, report, and manage lost or found mobile devices using their IMEI numbers. This system does **not use a database** but instead relies on structured data files (`data.json` & `data.csv`) to store IMEI records.

## 🚀 Features
✅ **IMEI Lookup** – Check if a device is reported as lost or found  
✅ **Report Lost/Found Devices** – Submit an IMEI to mark a phone as lost or found  
✅ **No Database Required** – Uses JSON/CSV files instead of SQL databases  
✅ **Admin Panel** – Manage IMEI records through a simple admin interface  
✅ **Secure & Lightweight** – Basic security mechanisms to prevent abuse  

---

## 📂 File Structure

```
Eclipse-IMEI/
│── frontend/                 # Frontend files
│   ├── index.html            # Homepage
│   ├── search.html           # IMEI search page
│   ├── report.html           # IMEI reporting page
│   ├── about.html            # About page
│   ├── contact.html          # Contact page
│   ├── header.html           # Navigation header
│   ├── footer.html           # Footer section
│   ├── assets/               # Static assets
│   │   ├── css/              # Stylesheets
│   │   │   ├── styles.css    # Main styles
│   │   ├── js/               # JavaScript files
│   │   │   ├── scripts.js    # Main logic
│   │   │   ├── config.js     # Configuration settings
│
│── backend/                  # Backend files
│   ├── admin.php             # Admin panel
│   ├── login.php             # Authentication system
│   ├── manage-imei.php       # Manage IMEI records
│   ├── check_imei.php        # Endpoint to check IMEI status
│   ├── get_imei_list.php     # Fetch IMEI records
│   ├── report_imei.php       # Report lost/found IMEI
│   ├── logger.php            # Logs activities
│   ├── security.php          # Security-related functions
│
│── data/                     # Data storage
│   ├── data.json             # JSON file storing IMEI records
│   ├── data.csv              # CSV file storing IMEI records
│
│── .gitignore                # Git ignore file
│── LICENSE                   # License file
│── README.md                 # Documentation
```

---

## ⚙️ Installation & Usage

### 1️⃣ **Clone the Repository**
```sh
git clone https://github.com/yourusername/Eclipse-IMEI.git
cd Eclipse-IMEI
```

### 2️⃣ **Run a Local Server**
Since this project contains PHP files, you need a local server like XAMPP, WAMP, or a simple built-in PHP server:
```sh
php -S localhost:8000
```
Now, visit `http://localhost:8000/frontend/index.html` in your browser.

### 3️⃣ **Configure API Endpoints**
Modify `config.js` to point to the correct backend URL:
```js
const config = {
    apiBaseUrl: "http://localhost:8000/backend",
};
export default config;
```

---

## ✅ Usage

### ✅ **Checking an IMEI**
1. Open `search.html`
2. Enter a 15-digit IMEI number
3. Click "Check IMEI"
4. The system will return if the IMEI is **Lost** or **Found**

### ✅ **Reporting a Lost or Found Phone**
1. Open `report.html`
2. Enter a 15-digit IMEI number
3. Select **Lost** or **Found**
4. Submit the form

### ✅ **Admin Panel (manage-imei.php)**
- Access the admin panel to update or delete IMEI records manually.
- Requires login credentials (handled in `login.php`).

---

## 🔒 Security Features
- Basic **input validation** to prevent incorrect IMEI entries
- **Logging system** (`logger.php`) to track user activity
- **Security file** (`security.php`) for sanitizing inputs

---

## 🌍 Deployment
To deploy Eclipse IMEI:
1. Upload the `backend/` and `frontend/` folders to your web server
2. Ensure PHP is enabled on your hosting
3. Update `config.js` with the correct server URL

---

## ✉ Contact
For support or suggestions, reach out via:
- ✉ Email: `support@eclipse-imei.com`
- GitHub Issues: [Report an Issue](https://github.com/yourusername/Eclipse-IMEI/issues)

---

## ⚖️ License
This project is licensed under the **MIT License**. See [LICENSE](LICENSE) for details.

---

💪 Built with passion for helping people recover lost devices! 🚀

