## Event Registration and Management System  

### Background  
In today's digital era, online organizations frequently host virtual events on platforms like Google Meet, Zoom, and Discord to engage their members. Managing these events effectively requires a structured system where administrators can create events, manage participants, and ensure a smooth registration process. Simultaneously, members need a convenient way to explore upcoming events and register for them without accessing unnecessary event credentials until they have successfully registered.  

### Objectives  
- **Simplify Event Management:** Provide an easy-to-use platform for administrators to create, edit, and manage online events.  
- **Efficient Member Registration:** Allow members to register for events and view their registered event details in a personalized dashboard.  
- **Controlled Access to Event Credentials:** Prevent public access to event links and credentials, ensuring only registered members can access them.  
- **Transparency:** Display ongoing and upcoming events with limited information (title, date, image, and description) on the homepage without exposing event credentials.  

---

### **Key Features**  

#### 1. **Roles & Permissions:**  
   - **Admin:**  
     - Create, edit, and delete events.  
     - Manage event details (title, date, platform, capacity, link).  
     - Manage members and their registrations.  
   - **Member:**  
     - Register for events.  
     - View registered events and their details, including event links.  

#### 2. **Event Management:**  
   - Event creation and management with the following attributes:  
     - Title, description, date, image, platform (Google Meet, Zoom, Discord), link, capacity, and status (active, completed, canceled).  
   - Event status updates (e.g., active, completed, canceled).  

#### 3. **Event Registration:**  
   - Members can register for available events.  
   - Display registered events in the member’s dashboard, including event credentials (link, date, time).  

#### 4. **Homepage (Public Page):**  
   - Show a list of ongoing and upcoming events.  
   - Display limited information (title, date, image, and description).  
   - Hide event links and credentials from non-registered users.  

---

### **System Requirements:**  

#### **Functional Requirements:**  
- Admin can create, update, and delete events.  
- Members can register for events.  
- Registered members can view event details and credentials in their dashboard.  
- Public homepage shows limited event information.  

#### **Non-Functional Requirements:**  
- Secure user authentication and authorization.  
- Clean and responsive user interface.  
- Scalable database design.  

---

### **Database Schema:**  

- **Users:**  
  - `id, name, email, password, role (admin/member)`  

- **Events:**  
  - `id, title, description, image, date, platform, link, capacity, status`  

- **Event Registrations:**  
  - `id, user_id, event_id, registered_at`  


### **Tech Stack:**  

#### **Backend:**  
- **Laravel 10:** PHP framework for backend logic, routing, and database management.  
- **MySQL:** Relational database for storing user data, event details, and registrations.  

#### **Frontend:**  
- **Blade Templating Engine:** Laravel's default templating engine for rendering dynamic web pages.  
- **Tailwind CSS:** For styling and responsive design.  

#### **Authentication & Authorization:**  
- **Policies & Gates:** To handle role-based access control for admins and members.  

#### **Security:**  
- CSRF Protection (built-in with Laravel).  
- Form request validation for data integrity.  
- Password hashing using Laravel's bcrypt.  

#### **Development Tools:**  
- **VS Code:** Code editor.  
- **Git:** Version control.  

#### **Deployment & Hosting:**  
- **Apache/Nginx:** Web server.  
- **DigitalOcean / VPS with Ubuntu:** For production hosting.  
- **SSL (Let's Encrypt):** For secure HTTPS connections.  
