## 📝 Application Background — Structure

### 1. **Business Context**
- This project is a simple **Content Management System (CMS)**.  
- The primary end users are:  
  - **Content Manager** → responsible for creating, editing, and publishing content.  
  - **Reader** → consumes published content.  
- The application is currently a **halfway‑built product**: some features are scaffolded, but not yet complete.  
- Your task is to **select from the available tasks below** and implement them as a way to showcase your skills.


---

### 2. **Core Features in Scope**

- **Models**
  - **Post** → main content entity with fields like `title`, `body`, `is_published`
  - **Admin** → authenticated user who manages content
  - **Role** → defines permissions (e.g., Admin, Reader)

- **Features**
  - **Authentication**
    - Admin login/logout flow
  - **Post Management (Admin only)**
    - List all posts
    - Create new post
    - Edit existing post
    - Delete post
  - **Public Content**
    - All posts with `is_published = true` are visible at `/post/list`
  - **Future Enhancements ()**
    - Post detail page at `/post/{id}`
    - Basic search or filter for posts (e.g., by title, tags)
    - Role‑based access control
    - Toggle publish status (`is_published`)


---

### 3. **Technical Constraints / Assumptions**
- **Framework**: Laravel Framework 12.35.1  
- **Database**: MySQL 8.4  
- **Environment**: Docker (preferred) or local fallback setup  
- **Frontend**: Tailwind CSS is pre‑configured in this project.  
  - Candidates may use Tailwind or their preferred CSS framework.  
  - A simple, functional design is sufficient — the focus of this task is on **logic and coding practices**, not UI polish.

---

### 4. **Data Model Overview**

The application uses three main entities:

- **Admin**
  - Represents a content manager who can log in and manage posts.
  - Fields: `email`, `password`, `role_id`, `created_at`, `updated_at`.
  - Relationships:
    - Belongs to one **Role**.
    - Has many **Posts**.

- **Post**
  - Represents a piece of content created by an Admin.
  - Fields: `admin_id`, `title`, `content`, `is_published`, `created_at`, `updated_at`.
  - Relationships:
    - Belongs to one **Admin** (the author).
  - Notes:
    - Only posts with `is_published = true` are visible to the public.

- **Role**
  - Defines access level for Admins (e.g., `administrator`, `editor`, `author`).
  - Fields: `name`, `created_at`, `updated_at`.
  - Relationships:
    - Has many **Admins**.

---

#### Role Permissions (System Logic Design)

The table below defines the **system logic design** for role‑based permissions. It outlines what each role is allowed to do within the CMS:

| Role            | Can Create Post | Can Edit Own Post | Can Edit Others’ Posts | Can Publish Post | Can Delete Post | Can View Post |
|-----------------|-----------------|-------------------|------------------------|------------------|-----------------|---------------|
| **Administrator** | ✅ Yes          | ✅ Yes            | ✅ Yes                 | ✅ Yes           | ✅ Yes          | ✅ Yes        |
| **Editor**       | ✅ Yes          | ✅ Yes            | ✅ Yes                 | ✅ Yes           | ✅ Yes          | ✅ Yes        |
| **Author**       | ✅ Yes          | ✅ Yes            | ❌ No                  | ✅ Yes (own)     | ✅ Yes (own)    | ✅ Yes        |
| **Contributor**  | ✅ Yes (drafts) | ✅ Yes (own drafts)| ❌ No                  | ❌ No (needs approval) | ❌ No (cannot delete published) | ✅ Yes        |
| **Viewer**       | ❌ No           | ❌ No             | ❌ No                  | ❌ No            | ❌ No           | ✅ Yes (read‑only) |

### 🔑 Key Differences
- **Administrator**: Full control over all posts and system settings.  
- **Editor**: Manages all content but not system-wide settings.  
- **Author**: Independent in publishing their own posts, but no control over others.  
- **Contributor**: Can draft but not publish — requires review/approval.  
- **Viewer**: Read-only access, no content creation.  

---

#### Seeded Data
- At least one **Admin** user is seeded with fixed login credentials.
> Email: admin@comp.com
> PW: password
- A default list of **Role** is created and assigned to the seeded Admin.  
- Example **Posts** are seeded, with a mix of `is_published = true` and `false`, so you can test both the Admin dashboard and the public listing.

---

### 5. **Task Scope**

Choose **at least one** of the following tasks to complete.  
Each task is designed to be self‑contained, testable, and relevant to real‑world development.  
You are welcome to complete more than one task if you’d like to demonstrate a broader range of skills.

- **Task 1: Remember Me Function**
  - Complete the "Remember Me" functionality for Admin login.
  - Ensure that sessions persist correctly when the option is selected.

- **Task 2: Route Protection (Guest‑Only Pages)**
  - Prevent authenticated Admins from accessing routes intended only for unauthenticated users (e.g., the login page).
  - Example:  
    - If an Admin is already logged in and tries to visit `/login`, they should be redirected to `/admin/post/list` (or another dashboard route).  
    - Only unauthenticated users should see the login form.

- **Task 3: Quick Publish Toggle**
  - Complete the functionality of the **Quick Publish** button on `/admin/post/list`.
  - The button must:
    - Clearly indicate the current status of the post (e.g., “Published” vs. “Unpublished”).  
    - Toggle the `is_published` field when clicked, updating the status without requiring a full edit form.

- **Task 4: Featured Image**
  - Extend the **Post** model to include a new field: `featured_image`.
  - Update the Admin post form and listing view to allow upload/display of the featured image.

- **Task 5: Admin Manager**
  - Create a controller and view to allow registering new Admin users with assigned roles.  
  - Only users with the `administrator` role can access this feature.  
  - Scope is limited to **registering new Admins only** (no editing, listing, or deleting existing Admins).  
  - Adding a navigation button that links to this view will count as part of the task.

---



