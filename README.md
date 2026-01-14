# 🥗 Nutrition Management System (Laravel 10)

This project is a **Laravel 10 web application** developed as part of a **Server-Side Scripting assignment**.

The application allows users to calculate their **BMI**, browse **diets, foods, and meals**, and generate **diet and meal plan recommendations** using real nutritional data retrieved from an external API.

The project follows the **MVC (Model–View–Controller)** architecture and demonstrates proper use of:
- Database relationships
- Server-side validation
- Business logic
- Filtering and sorting
- External API integration

---

## 🚀 Features

### BMI Calculation
- Users can calculate BMI using height and weight
- BMI category is automatically determined
- A suitable diet is recommended based on BMI range

### Diet Management
- Create, read, update, and delete diets
- Each diet defines a BMI range (`min_bmi`, `max_bmi`)
- Diets act as parent entities for foods

### Food Management
- Full CRUD functionality for foods
- Each food belongs to a specific diet
- Nutritional data stored:
  - Calories
  - Protein
  - Carbohydrates
  - Fats

### Meal Management
- Meals belong to foods
- Meal categorisation (breakfast, lunch, dinner)
- Portion-based meal information

### External API Integration
- Integration with **OpenFoodFacts API**
- Automatically retrieves nutritional values when creating foods
- API logic handled in a dedicated service class

### Server-Side Validation
- Mandatory fields validation
- Numeric validation for nutritional values
- User-friendly validation error messages

### Clean MVC Architecture
- Models handle relationships
- Controllers handle business logic and validation
- Views handle presentation only
- Services handle heavy logic (API communication)

---

## 🛠️ Technologies Used

- Laravel 10
- PHP 8+
- MySQL
- Blade Templates
- Eloquent ORM
- OpenFoodFacts API

---

## 📂 Project Structure

app/
├── Models/ # Eloquent models & relationships
├── Http/Controllers/ # Controllers & business logic
├── Services/ # API and helper services

database/
├── migrations/ # Database structure

resources/
├── views/ # Blade templates

routes/
├── web.php # Web routes


---

## ⚙️ Installation & Setup (From GitHub)

Follow the steps below to run the project locally.

### 1️⃣ Clone the Repository

git clone https://github.com/your-username/your-repository-name.git

cd your-repository-name

---

### 2️⃣ Install Dependencies

composer install

---

### 3️⃣ Create Environment File

cp .env.example .env


Update the `.env` file with your database credentials:

DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

---

### 4️⃣ Generate Application Key

php artisan key:generate

---

### 5️⃣ Run Database Migrations

php artisan migrate

---

### 6️⃣ Start the Development Server

php artisan serve

http://127.0.0.1:8000


---

## 🧪 Usage

1. Register or log in as a user
2. Enter height and weight to calculate BMI
3. View the recommended diet based on BMI
4. Browse diets, foods, and meals
5. Add foods with automatic nutritional data via API
6. Generate meal plan recommendations using stored data

---

## 📐 Database Design

- **Diet → Food** : One-to-Many  
- **Food → Meal** : One-to-Many  
- **BMI → Diet** : Logical relationship handled in controller logic (not via foreign keys)

The database follows normalization principles and enforces referential integrity using foreign keys.

---

## 📄 License

This project was created for **educational purposes** as part of a Server-Side Scripting assignment.

---

## 👨‍💻 Author

**Jean Paul Fenech**  
Server-Side Scripting – Home Assignment  
Laravel MVC Application

---

## ✅ Examiner Note

This project demonstrates:
- MVC architecture
- Eloquent relationships
- Server-side validation
- Business logic separation
- Filtering and sorting
- External API integration
- Clean and maintainable code structure
