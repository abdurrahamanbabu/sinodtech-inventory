## Features
  - Product Management
    - Create Product
    - Edit Product
    - Delete Product
    - API for Product list
    -> API for Single Product
  
- Sale Management
  - Create Sale
  - Sale List

- Marketing
  - Email Marketing

- Customer Management
  - Create Customer
  - Edit Customer
  - Delete Customer
  - Purchase records
  -
 
## Installation steps

## 🚀 Installation

### 1. Clone the repository

```bash
git clone https://github.com/your-username/your-project.git
cd your-project
```

### 2. Install PHP dependencies

```bash
composer install
```



### 3. Create the environment file

```bash
cp .env.example .env
```

### 4. Generate the application key

```bash
php artisan key:generate
```

### 5. Configure the database

Update your `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Run migrations

```bash
php artisan migrate
```

### 7. (Optional) Seed the database

```bash
php artisan db:seed
```
Update your `.env` file with your mail credentials.

### SMTP Example

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

After updating the mail configuration, clear the configuration cache:

```bash
php artisan optimize:clear
```

## Queue Configuration

Set the queue driver in your `.env` file:

```env
QUEUE_CONNECTION=database
```

Create the queue tables:

```bash
php artisan queue:table
php artisan migrate
```

Start the queue worker:

```bash
php artisan queue:work
```

### Start the development server

```bash
php artisan serve
```

Visit:

```
http://127.0.0.1:8000
``` 
