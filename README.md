# Laravel Socket Example

Laravel events and socket connection examples.

## Install with docker

1. Clone this repo.

<blockquote>git clone https://github.com/NaMLu/laravel-socket-example.git ExampleProject</blockquote>

2. Open ExampleProject in terminal and install composer packages.

<blockquote>cd ExampleProject && composer install</blockquote>

3. Create .env file copy .env.example to .env.

<blockquote>php -r "copy('.env.example','.env');"</blockquote>

4. Edit .env file.

<blockquote>
DB_CONNECTION=mysql <br />
DB_HOST=mysql <br />
DB_PORT=3306 <br />
DB_DATABASE=example_app <br />
DB_USERNAME=sail <br />
DB_PASSWORD=password
</blockquote>

5. Build docker image.

```./vendor/bin/sail build --no-cache```

6. Start the project.

<blockquote>./vendor/bin/sail up</blockquote>

7. Open the localhost and ta taa.
