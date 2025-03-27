# Eclipse IMEI - Device Tracking System

Eclipse IMEI is a comprehensive device tracking system that allows users to report, search, and manage IMEI (International Mobile Equipment Identity) records for lost or found mobile devices. The system provides a secure and user-friendly interface for tracking mobile devices and helping users recover their lost devices.

## 🌟 Features

### Core Functionality
- **IMEI Search**: Check if a device has been reported as lost or found
- **Device Reporting**: Report lost or found devices with detailed information
- **Record Management**: View and manage all IMEI records in a user-friendly interface
- **Status Tracking**: Track device status (active, lost, found, blocked)
- **Detailed Device Information**: Store and display comprehensive device details

### Technical Features
- **Responsive Design**: Fully responsive interface that works on all devices
- **Real-time Search**: Instant search functionality across all records
- **Advanced Filtering**: Filter records by status and other criteria
- **Secure Database**: Protected storage of IMEI and device information
- **Modern UI/UX**: Clean and intuitive user interface

## 🛠️ Technology Stack

### Frontend
- HTML5
- CSS3 (with modern features and variables)
- JavaScript (ES6+)
- DataTables for enhanced table functionality
- Font Awesome for icons

### Backend
- PHP 7.4+
- MySQL/MariaDB
- PDO for secure database connections
- RESTful API endpoints

## 📋 Prerequisites

- Web server (Apache/Nginx)
- PHP 7.4 or higher
- MySQL 5.7 or MariaDB 10.3 or higher
- Modern web browser with JavaScript enabled

## 🚀 Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/Crimzor3086/Eclipse-IMEI.git
   cd eclipse-imei
   ```

2. **Database Setup**
   - Create a new MySQL database
   - Import the database schema from `database/schema.sql`
   - Configure database connection in `backend/config.php`

3. **Configuration**
   - Copy `backend/config.example.php` to `backend/config.php`
   - Update database credentials and other settings
   - Set appropriate file permissions

4. **Web Server Configuration**
   - Point your web server to the `frontend` directory
   - Ensure PHP files in the `backend` directory are accessible
   - Configure URL rewriting if needed

## 💻 Usage

### For Users
1. Visit the homepage
2. Use the navigation menu to:
   - Check IMEI status
   - Report lost/found devices
   - View all records
   - Access additional information

### For Administrators
1. Access the records page to manage all entries
2. Use the search and filter functions to find specific records
3. View detailed information about each device
4. Monitor system status and usage

## 🔒 Security Features

- Secure database connections using PDO
- Input validation and sanitization
- XSS protection
- CSRF protection
- Secure password handling
- Rate limiting on API endpoints

## 📱 Mobile Responsiveness

The system is fully responsive and works on:
- Desktop computers
- Tablets
- Mobile phones
- Different screen sizes and orientations

## 🔄 API Endpoints

### Available Endpoints
- `GET /backend/records.php` - Retrieve all IMEI records
- `POST /backend/report.php` - Report a lost/found device
- `GET /backend/search.php` - Search for a specific IMEI
- `POST /backend/update.php` - Update device status

## 🎨 Customization

### Theme Customization
The system uses CSS variables for easy theme customization:
```css
:root {
    --primary-color: #8B0000;
    --secondary-color: #800000;
    --accent-color: #A52A2A;
    --text-color: #ffffff;
    --background-color: #1a1a1a;
    /* ... other variables ... */
}
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## 📄 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 👥 Support

For support, please:
- Check the documentation
- Open an issue
- Contact the development team

## 🔄 Updates and Maintenance

Regular updates include:
- Security patches
- Feature additions
- Bug fixes
- Performance improvements

## 📊 Database Schema

The system uses the following main tables:
- `imei_records`: Stores device information
- `status_history`: Tracks device status changes
- `user_reports`: Stores user reports

## 🎯 Future Enhancements

Planned features:
- User authentication system
- Mobile app integration
- Advanced analytics
- Bulk import/export
- API rate limiting
- Enhanced search capabilities

---

Made with ❤️ by the Eclipse IMEI Team
