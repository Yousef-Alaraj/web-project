# Phase 1: Web Project Description (Spring 2025/2026)
# DEADLINE April 11th

### Project Administration & Setup
- [x] **Form a team:** Group up with 2-3 other students (max 4 per team) from your exact section to avoid a 2-point penalty.[cite: 12]
- [x] **Setup Submission Folder:** Create a folder containing the full names and university IDs of all team members.[cite: 12]
- [x] **Asset Management:** Ensure all images and files are included in your folder and linked using relative paths.[cite: 12]

### Core HTML Pages (Minimum 5 required)
- [x] **`index.html` (Homepage)**[cite: 12]
    - [x] Add the "City Explorer" title/logo and a uniform navigation menu. **(Banner at the top with `<header>` tag)**[cite: 12]
    - [x] Build a Hero **Section** with a large image/banner, short intro **(2 - 3 sentences)**, and a "Start Exploring" button linking to `places.html`.[cite: 12]
    - [x] Create a "Featured Categories" section displaying at least 4 categories (e.g., Restaurants, Parks) with images, titles, and descriptions. **(Possibly make every two categories on a row might be changed later)**[cite: 12]
    - [x] Create a "Featured Places" section displaying 3 example place cards (image, name, description, link). **(Possibly make every two categories on a row might be changed later)**[cite: 12]
    - [x] Add a uniform footer with copyright, social links, and contact info.[cite: 12]
    
- [x] **`places.html` (Explore Page)**[cite: 12]
    - [x] Add a page title and short description.[cite: 12]
    - [x] Add a search bar for places and JavaScript filter options (e.g., by category). **(No idea how to implement)**[cite: 12]
    - [x] Display at least 8 places across 4 different categories meaning each place should belong to a category using cards with image, place name, category, short description, rating and link to `place-details.html`.[cite: 12]
    - [-] *Optional features:* Implement an "Add to Favorites" button using `localStorage` and a sorting feature.[cite: 12]

- [x] **`place-details.html` (Single Place)**[cite: 12]
    - [x] Include the place title, category, and rating.[cite: 12]
    - [x] Add an Image Gallery with 2-4 images.[cite: 12]
    - [x] Write a description paragraph and an information section (location, hours, entry fee, contact).[cite: 12]

- [x] **`discover.html` (API Integration)**[cite: 12]
    - [x] Page Title and Short Explanation[cite: 12]
    - [x] Use the Fetch API to dynamically display at least 5 items from a public API (e.g., upcoming events or weather).[cite: 12]
    - [x] Include a "Refresh" button that reloads the data from the API.[cite: 12]

- [x] **`contact.html` (Team & Form)**[cite: 12]
    - [x] Display your team's details (pictures, emails).[cite: 12]
    - [x] Build a contact form (name, email, subject, message) and validate it using JavaScript.[cite: 12]

### Technical Standards
- [x] **HTML:** Use semantic tags (`<header>`, `<nav>`, `<section>`, `<form>`) and ensure clean structure.[cite: 12]
- [x] **CSS:** Use **external stylesheets only**. Layout the site using Flexbox or Grid, and make it responsive with media queries.[cite: 12]
- [x] **JS:** Use search/filter and sort, include form validation, show or hide sections and store data in local storage.[cite: 12]
- [x] **API:** Use on public API **MEANINGFULLY**.[cite: 12]
- [x] **Accessibility (Pick at least 4):** Add image `alt` text, form labels, keyboard navigation, ARIA tags, and ensure sufficient color contrast.[cite: 12]

### Final Review & Submission
- [x] **Deadlines:** Submit ONE copy per team to the eLearning gateway before Wednesday, April 8th, 2026. No late submissions are accepted.[cite: 12]
- [x] **Presentation Prep:** Prepare to present your work and answer coding/design questions (failing to present results in a zero).[cite: 12]
- [x] **Paths and File Linking:** It's your responsibility to ensure that all the images and files referenced in your project are included in your submission folder and linked using relative.[cite: 12]

---

# Phase 2: Full-Stack Personalized City Explorer Web Application (Spring 2025/2026)
# DEADLINE: Thursday, May 14th, 2026

### Tech Stack & Core Setup
- [ ] **Architecture:** Transition the Phase 1 project into a full-stack web application using React, PHP, MySQL, and Sessions (Authentication).
- [ ] **No Hardcoding:** Ensure all hardcoded data from Phase 1 is removed; all user-related data must be fetched dynamically from the database.

### User Authentication (zeina)
- [ ] **Registration & Login:** Implement user registration, user login, and user logout systems.
- [ ] **Security:** Store user data in the database and ensure all passwords are hashed.
- [ ] **Session Management:** Use PHP sessions to manage logged-in users.
- [ ] **Access Control:** Restrict access to personalized pages (like the dashboard) unless the user is logged in.

### Database (MySQL) Implementation
- [ ] **DB Setup:** Create and connect to a MySQL database using PHP, implementing insert, select, update, and delete operations.
- [ ] **Table: `users`:** Store registered user information. (zeina)
- [ ] **Table: `places`:** Store the places shown on the discover page. (void)
- [ ] **Table: `favorites`:** Store user favorites with fields for `userID` and `placeID`. (yousef)
- [ ] **Table: `reviews`:** Store user reviews and feedback for places. (sami)
- [ ] **Data Isolation:** Ensure each user sees only their own personalized favorite places, while all users can see reviews for places.

### React Component Requirement
- [ ] **Component Creation:** Implement at least one React component (e.g., a Favorites List).
- [ ] **React Concepts:** The component must demonstrate the use of state, props, and dynamic rendering of data using the `map()` function.

### Page Requirements & Updates
- [ ] **`index.html` or `index.php`:** Update main entry point. (void)
- [ ] **`register.php` & `login.php`:** Create registration and login interfaces (can be combined into one page). (zeina)
- [ ] **`dashboard.php`:** Build a user dashboard featuring a customized welcome message. (sami)
    - [ ] Allow viewing available/favorite places.
    - [ ] Enable adding/removing places from favorites.
    - [ ] Allow users to add/view reviews.
- [ ] **`favorites.php`:** Create a dedicated favorites page (or integrate this functionality directly into the dashboard). (yousef)
- [ ] **`discover.php`:** Convert your discover page to dynamically list all places from the database. (sami) 
- [ ] **`details.php`:** Update the single place details page. (void)
    - [ ] Add a `textarea` so users can enter feedback/reviews.
    - [ ] Display reviews from other users (as a DB retrieve operation or a React component).
- [ ] **`logout.php`:** Implement a script to destroy the session and log the user out. (zeina)

### Frontend-Backend Integration & CRUD
- [ ] **Data Flow:** Connect your HTML/React frontend to your PHP backend and MySQL database.
    - [ ] Ensure forms send data to PHP.
    - [ ] Ensure PHP inserts data into the database.
    - [ ] Ensure data is retrieved and displayed dynamically.
- [ ] **Favorites CRUD:** Replace the Phase 1 `localStorage` favorites system with database CRUD operations (Add, View, Remove).

### Phase 2 Final Review & Submission
- [ ] **Code Submission:** Submit the full project source code to the eLearning gateway.
- [ ] **Database Submission:** Include your Database file (SQL export) in the submission.
- [ ] **Presentation Prep:** Prepare to present your project and answer coding questions. Students who do not present will receive a zero.