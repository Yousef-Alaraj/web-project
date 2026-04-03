When structuring your HTML and CSS, establishing a solid naming convention early on will save you from major headaches as your stylesheet grows. 

Here are the industry-standard best practices for naming your IDs and classes.

### The Golden Rule: IDs vs. Classes
Before diving into names, you must strictly follow how they are meant to be used:
* **Classes (`.class-name`)** are for **reusable** styles. If an element appears more than once on a page (like a place card, a button, or a navigation link), it must use a class.
* **IDs (`#id-name`)** are for **unique** elements. An ID should only appear *once* per HTML page. They are best reserved for major structural sections (like `#main-navigation`) or for targeting specific elements with JavaScript (like `#search-input`).

---

### 1. Use `kebab-case` (The Standard)
In HTML and CSS, the universally accepted format is all lowercase letters with words separated by hyphens. Avoid camelCase or snake_case.
* ❌ **Bad:** `<div class="placeCard">`, `<div class="place_card">`
* ✅ **Good:** `<div class="place-card">`

### 2. Name by Purpose, Not Appearance (Semantic Naming)
Name your classes based on *what the content is*, not what it *looks like*. If you change your design later, a class named for its appearance will become confusing.
* ❌ **Bad:** `<button class="red-button">` *(What happens if you redesign the site and the button becomes blue?)*
* ❌ **Bad:** `<div class="left-column">` *(What if it stacks vertically on mobile?)*
* ✅ **Good:** `<button class="btn-primary">` or `<button class="btn-delete">`
* ✅ **Good:** `<div class="sidebar">` or `<div class="category-filters">`

### 3. Separate JavaScript Hooks
When you start writing JavaScript for your dynamic features (like filtering categories or saving to `localStorage`), it is a great practice to use special classes that are *only* used for JavaScript, not for CSS styling. Prefix them with `js-`.

This prevents your code from breaking if you accidentally rename a CSS class later.
* ❌ **Bad:** `<button class="btn-primary filter-btn">` *(If you change `filter-btn` in CSS, you might break your JS).*
* ✅ **Good:** `<button class="btn-primary js-filter-category">`

### 4. Use the BEM Methodology (Block, Element, Modifier)
BEM is a highly popular naming convention that keeps your code incredibly organized, especially for UI components like cards or navigation menus. It breaks names down into three parts:
* **Block:** The standalone component (e.g., `card`)
* **Element:** A part of the block, separated by two underscores (e.g., `card__image`)
* **Modifier:** A different version of the block, separated by two hyphens (e.g., `card--featured`)

**Example for your Places page:**
```html
<article class="place-card">
    <img class="place-card__image" src="./images/park.jpg" alt="City Park">
    <h3 class="place-card__title">Central Park</h3>
    <p class="place-card__description">A beautiful green space.</p>
    
    <span class="place-card__badge place-card__badge--top-rated">★ 5.0</span>
</article>
```

Do you want to see how to apply these naming conventions to structure a specific section of your layout, like the featured categories on the homepage?