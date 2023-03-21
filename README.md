# Transport Management System

A transport management system that takes care of booking and payment of tickets, auto assignment of seat number and more.

[![License](https://img.shields.io/github/license/sixtusagbo/transport_management_system)](LICENSE)

![Screenshot](https://raw.githubusercontent.com/sixtusagbo/transport_management_system/main/screenshot.png)

## Framework

This project was built with Laravel 8.68.1

## Installation

#### Clone the repo
```bash
git clone https://github.com/sixtusagbo/transport_management_system
```

#### Duplicate and modify [.env.example](https://github.com/sixtusagbo/transport_management_system/blob/main/.env.example)
```bash
cp .env.example .env
# Modify it
```

#### Generate app key
```bash
php artisan key:generate
```

#### Install composer dependencies
```bash
composer install
```

#### Install npm packages
```bash
npm install
```

#### Compile with mix
```bash
npm run dev
```

#### Run the database migrations
```bash
php artisan migrate
```

#### Create symlink to storage
```bash
php artisan storage:link
```

#### Run the app
```bash
php arisan serve
```

## Contributing
- [Fork the repo](https://github.com/sixtusagbo/transport_management_system/fork)
- Create a branch for your new feature ( `git checkout -b my-new-feature` )
- Commit your changes (`git commit -am 'Added some feature'`)
- Push to the branch (`git push origin my-new-feature`)
- Create a new [Pull Request](https://github.com/sixtusagbo/transport_management_system/pulls)

