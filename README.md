<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Blogging Platform

## Features
* **Highly Customizable:** Turn features on and off in the config
*  **Security Focused CMS:** A CMS for Posts, Users, and Comments with strong and customizable security policies is included out of the box. You can easily update user's permissions as well.
*  **Dark Mode & Mobile Friendly:** A must for the modern app: Dark mode. And of course, all parts of the site are mobile friendly, including the tables in the CMS.
*  **Smart Markdown Editor:** Posts are made using Markdown. To aid in this, the EasyMDE editor is included by default which allows for rich text editing with autosave and markdown previews.
*  **Users & Comments:** Users can create accounts and leave comments. If you want them too. You can even require users to verify their emails to comment.
*  **Semantic and data-rich SEO-minded HTML:** The frontend adheres to follow the practices of Semantic HTML. Blog articles are automatically injected with Open Graph meta tags for better SEO. 

## Full Documentation
Full documentation is available at https://docs.desilva.se/blogkit/. Generated using my free [Laradocgen](https://github.com/caendesilva/laradocgen) package!

## Get Started
### Quick Install

```bash
git clone https://github.com/moshoubash/BloggingPlatform.git
cd laravel-blogkit
composer install
npm install && npm run prod
cp .env.example .env
php artisan migrate
php artisan db:seed --class=DemoSeeder
php artisan key:generate
php artisan storage:link
php artisan admin:create

php artisan serve
```

Once you have installed the Laravel app you can use the helper command to create an admin account using `php artisan admin:create` in your terminal.

### How to set up the blog using the demo settings
**Important! This guide is just to demo the site. For production use you must follow the production guide as this guide allows anyone to log in as admin! **

1. Clone the git repo
2. In the config file `config\blog.php` change `demoMode` to `true`
3. In your terminal, run `php artisan migrate --seed`

### How to set up the blog for production
1. Clone the git repo
2. In your terminal, run `php artisan migrate` (Note, if you have previously set up your app using demo data, use `migrate:fresh` to clear demo users instead!)
3. In your terminal, run `php artisan admin:create` and follow the on-screen instructions to create an admin account. Make sure to set a strong password or passphrase!
4. Next, follow the instructions in the [Official Deployment Documentation](https://laravel.com/docs/9.x/deployment) to ensure you are following the best practices.

#### How to add authors
It may be useful to add more authors to your blog. First, instruct the author to create a standard account. Then, you as admin go to the dashboard and press the "manage" button and check the "Is User Author?" tick and press save.

### Writing blog posts
Blog posts are a breeze to create using the Markdown editor!

#### Good cover images
Each post has a featured cover image that is dynamically cropped using CSS background properties so that it looks smooth in all widths.

For best results, ensure that your cover images are 960 by 640 pixels as that is usually the max size. However, you should also remember that the images are cropped to a much narrower format in many places. Thus you need to make sure that all primary content such as text is contained within the center 640 by 340 pixels.

## Contribute!
PRs are very much welcome!

## Open Source Attributions
The Starter Kit is a modern [TALL stack](https://tallstack.dev/) application based on [Laravel Breeze](https://github.com/laravel/breeze) (MIT) using:
- [TailwindCSS 3](https://tailwindcss.com/) (MIT)
- [AlpineJS 3](https://alpinejs.dev/) (MIT)
- [Laravel 11](https://laravel.com/) (MIT)
- [Livewire 2](https://laravel-livewire.com/) (MIT)

Featured images on blog posts used by the seeder come from [Unsplash](https://unsplash.com/) via [picsum.photos](https://picsum.photos/) (Image License)[https://unsplash.com/license]
Some of the frontend components are from [Flowbite](https://github.com/themesberg/flowbite) (MIT)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

This starter kit is also open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Credit is not required, but it is highly appreciated. If this project helped you, please leave a star and let me know! I'd LOVE to see what you build using this. I'm happy to add a link to your site in this readme if you are using it.
