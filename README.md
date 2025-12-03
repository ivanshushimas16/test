# Student Schedule Management System

A pure PHP/HTML/CSS/JavaScript application for managing student schedules at Cebu Eastern College, Inc.

## Technology Stack

- **Frontend:** HTML5, CSS3, JavaScript (vanilla)
- **Backend:** PHP 7.4+
- **Database:** MySQL 5.7+
- **Server:** Apache (via XAMPP)

## Project Structure

\`\`\`
├── index.html                    # Main landing page
├── login.html                    # Login page
├── admin-dashboard.html          # Admin dashboard
├── staff-dashboard.html          # Staff dashboard
├── student-dashboard.html        # Student dashboard
├── archive-viewer.html           # Archive viewer
│
├── config/
│   └── database.php             # Database connection configuration
│
├── includes/
│   └── auth.php                 # Authentication and session management
│
├── api/
│   ├── login.php                # Login API endpoint
│   ├── logout.php               # Logout API endpoint
│   ├── check-session.php        # Session check API
│   ├── admin/                   # Admin API endpoints
│   ├── staff/                   # Staff API endpoints
│   └── student/                 # Student API endpoints
│
├── js/
│   ├── auth.js                  # Authentication JavaScript
│   ├── admin-dashboard.js       # Admin dashboard functionality
│   ├── staff-dashboard.js       # Staff dashboard functionality
│   ├── student-dashboard.js     # Student dashboard functionality
│   ├── print-utils.js           # Print utility functions
│   └── archive-viewer.js        # Archive viewer functionality
│
├── css/
│   └── styles.css               # Main stylesheet
│
├── scripts/
│   ├── 01_create_database.sql   # Database schema creation
│   └── 02_seed_data.sql         # Initial test data
│
└── public/
    └── images/                  # Images and assets

\`\`\`

## Setup Instructions

### Prerequisites

1. **Download XAMPP** from https://www.apachefriends.org/
2. **Install XAMPP** with Apache and MySQL selected
3. **Start Apache and MySQL** services

### Installation Steps

1. Copy this entire project folder to `C:\xampp\htdocs\` (Windows) or `/Applications/XAMPP/htdocs/` (Mac)

2. Open http://localhost/phpmyadmin in your browser

3. Create a new database:
   - Click "New" button
   - Database name: `student_schedule_db`
   - Click "Create"

4. Import the database schema:
   - Select the `student_schedule_db` database
   - Click "Import" tab
   - Choose `scripts/01_create_database.sql`
   - Click "Go"

5. Import the test data:
   - Click "Import" tab again
   - Choose `scripts/02_seed_data.sql`
   - Click "Go"

6. Access the application:
   - Open http://localhost/student-schedule-system (or your folder name)
   - You should see the login page

## Test Credentials

- **Admin User**
  - Username: `admin`
  - Password: `admin123`

- **Staff User**
  - Username: `staff001`
  - Password: `staff123`

- **Student User**
  - Username: `student001`
  - Password: `student123`

## Features

### Admin Dashboard
- User management (add, edit, delete users)
- Activity logs and filtering
- System settings and configuration
- Database backup and restore
- Data archival

### Staff Dashboard
- Student management
- Schedule management
- Course management
- Enrollment management
- Grade management
- Report generation

### Student Dashboard
- View personal schedule
- View grades
- View enrolled courses
- Download transcripts

## Database Schema

### Users Table
- id, username, password, full_name, email, role, created_at, updated_at

### Students Table
- id, user_id, student_id, program, year_level, gpa, created_at

### Courses Table
- id, course_code, course_name, credits, instructor_id, status

### Schedules Table
- id, course_id, day, time_start, time_end, room, instructor_name

### Enrollments Table
- id, student_id, schedule_id, grade, created_at

### Activity Logs Table
- id, user_id, action, description, timestamp

## API Endpoints

### Authentication
- `POST /api/login.php` - User login
- `POST /api/logout.php` - User logout
- `GET /api/check-session.php` - Check session status

### Admin APIs
- `GET /api/admin/get-users.php` - Get all users
- `POST /api/admin/add-user.php` - Add new user
- `POST /api/admin/update-user.php` - Update user
- `POST /api/admin/toggle-user-status.php` - Toggle user active/inactive
- `GET /api/admin/get-overview.php` - Get dashboard overview
- `GET /api/admin/get-activity-logs.php` - Get activity logs

### Staff APIs
- `GET /api/staff/get-students.php` - Get students
- `POST /api/staff/add-student.php` - Add student
- `POST /api/staff/update-student.php` - Update student
- `GET /api/staff/get-schedules.php` - Get schedules
- `POST /api/staff/add-schedule.php` - Add schedule
- `POST /api/staff/update-schedule.php` - Update schedule

### Student APIs
- `GET /api/student/get-info.php` - Get student info
- `GET /api/student/get-schedule.php` - Get student schedule
- `GET /api/student/get-grades.php` - Get student grades

## Troubleshooting

### Apache won't start
- Check if port 80 is in use
- Try changing port in XAMPP config
- Run XAMPP as administrator

### MySQL won't start
- Check if port 3306 is in use
- Ensure no other MySQL instances are running
- Check XAMPP error logs

### Database connection error
- Verify MySQL is running
- Check database credentials in `config/database.php`
- Ensure `student_schedule_db` database exists

### Login page blank
- Clear browser cache (Ctrl+Shift+Delete)
- Check browser console for errors (F12)
- Verify Apache is serving PHP files correctly

## Security Notes

- Change test credentials in production
- Enable HTTPS in production
- Implement rate limiting on login
- Regular database backups
- Keep PHP and MySQL updated

## License

MIT License - See LICENSE file for details

## Support

For issues or questions, refer to the XAMPP_SETUP_GUIDE.html file included in the project.
