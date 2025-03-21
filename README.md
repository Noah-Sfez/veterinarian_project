# Veterinarian Project

## 🐾 Overview  
The **Veterinarian Project** is a web application designed to streamline veterinary clinic operations, including the management of patient records, appointments, billing, and more.

## ✨ Features
- **Patient Records**: Keep detailed information for each animal patient.
- **Appointments**: Easily schedule, update, and track appointments.
- **Billing**: Manage billing and payments with ease.
- **Reports**: Generate insightful reports to monitor and improve clinic performance.

## ⚙️ Installation
1. Clone the repository:
    ```bash
    git clone https://github.com/Noah-Sfez/veterinarian_project.git
    ```
2. Navigate to the project directory:
    ```bash
    cd veterinarian_project
    ```
3. Install the required dependencies:
    ```bash
    composer install
    ```

## 🚀 Usage
1. Start the application:
    ```bash
    symfony serve
    ```
2. Open your browser and go to:  
   `http://localhost:8000`

## 🔎 Search Functionality  
The Veterinarian Project includes advanced search capabilities to help you quickly retrieve records for appointments, patients, and billing. Examples of search queries:

- **Search by Appointment Date Range**:
    ```
    https://127.0.0.1:8000/api/appointments?createdDate[after]=2000-01-01&createdDate[strictly_before]=2000-01-02
    ```

- **Search for a Specific Appointment Date**:
    ```
    https://127.0.0.1:8000/api/appointments?createdDate[after]=2025-03-21T00:00:00&createdDate[before]=2025-03-21T23:59:59
    ```

- **Filter by Status**:
    ```
    https://127.0.0.1:8000/api/appointments?statut=termine
    ```

- **Filter by Payment Status**:
    ```
    https://127.0.0.1:8000/api/appointments?isPaid=1
    ```
    *(true = 1; false = 0)*

## 📬 API Usage  
You can use all available routes via the **Postman collection** named **"Veterinarian Project.postman_collection.json"** provided at the root of the project.  
Import it into Postman and you're ready to go! 🎉

## 👥 Project Members
- Antoine Schmerber-Perraud  
- Noah Sfez
