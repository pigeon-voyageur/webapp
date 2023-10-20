# Web app - Pigeon voyageur

![Build on main](https://github.com/pigeon-voyageur/webapp/actions/workflows/build-on-main.yml/badge.svg)
[![Maintainability](https://api.codeclimate.com/v1/badges/28044aaedf1a25200a28/maintainability)](https://codeclimate.com/github/pigeon-voyageur/webapp/maintainability)

## Before setup

### Dependencies

You must have Docker installed on your computer

### Recommended IDE

PhpStorm with Laravel Idea plugin

### Laravel Sail

We recommend you to set a shell alias for sail like described on
the [Sail documentation](https://laravel.com/docs/10.x/sail#configuring-a-shell-alias)

## Setup

Copy env file:  
`cp -n .env.example .env`

Install dependencies:  
`npm install`  
`composer install`

Start containers  
`./vendor/bin/sail up -d`

Generate key:  
`./vendor/bin/sail artisan key:generate`

Launch migrations:  
`./vendor/bin/sail artisan migrate`

## Start

run `sail up -d` to start containers, then run `npm run dev` to start script compiling

