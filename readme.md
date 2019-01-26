# Welcome to FantasyStar

## 幻星科幻协会 - Fantasy Star Association

---

### Introduce

A website about science society association.

But maybe this is not a good choice.

In fact, static pages are enough for us. So, I give up it.
And build a organization, separate it to components.

You can visit permanent links. And find more info in this orgaization.

- [Homepage | FantasyStar](https://fantasy-star.github.io) <https://fantasy-star.github.io>
- [Valhalla | FantasyStar](https://fantasy-star.github.io/valhalla) <https://fantasy-star.github.io/valhalla>

### Function

- Member management
  - Member search
  - Member information modify
- Book management
  - Book reviews
  - Book search
  - Book order and borrow
  - Book information modify
- Message Board
- Resouce Share
- Department introduction
- Personal center

### Usage

#### Env

- php ( > 7.0)
- Apache
- MySql
- npm (base on node.js)
- composer
- Laravel 5.5

#### Install

```sh
# install npm dependencies
npm install
# install composer dependencies
composer i
```

- [laravel-admin](https://laravel-admin.org/docs/zh/installation) is used.

```sh
composer require encore/laravel-admin
# composer require encore/laravel-admin 1.5.x-dev
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
php artisan admin:install
# http://localhost/admin/
```

#### Generate Key

```sh
php artisan key:generate
```

#### Serve

```sh
php artisan serve
```

#### Deploy

I have no money to continue to support my server.

So I give up it, and use [heroku](https://www.heroku.com/).

### Intend

- Novel display
- Vote for product

---

## Support or Contact

YunYouJun

- Blog : <https://yunyoujun.cn>
- Email : <me@yunyoujun.cn>
- GitHub: <https://github.com/YunYouJun>
