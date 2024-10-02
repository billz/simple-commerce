# (Really) Simple Commerce 🛍️

I needed a simple, fast, responsive, self-hosted commerce solution to sell a featured product plus a few accessories. The existing commerce projects I found didn't fit my requirements, so created my own. Rather than rely on a database backend, all relevant settings (shop, product, shipping and inventory) are managed with JSON files. Stripe is used as the payment processor. 

After successfully running this side business for several years, I decided to sunset the physical product and open source the software project. This repo is the end result. It's worked more-or-less flawlessly for me and done all that I've asked of it.

## Getting started
After cloning this repository, the PHP and JavaScript dependencies will need to be installed by using their associated package managers.

### Install PHP dependencies

Run [Composer](https://getcomposer.org/) to install the PHP dependencies listed in `composer.json`:
```
composer install
```
This will install the required PHP packages and generate a `composer.lock` file.

### Install JavaScript dependencies

Either `npm` or `yarn` can be used to install JavaScript dependencies in `package.json`.

If using `npm` execute:
```
npm install
```
Alternatively, if using Yarn execute:

```
yarn install
```
Either of these methods will install the required JavaScript packages and generate a `package-lock.json` or `yarn.lock` file.

### Create an .env file
In the project root, create a file called `.env` and add the following contents:

```
# Stripe keys
STRIPE_SECRET_KEY=my-stripe-secret-key

# Stripe checkout session vars
DOMAIN=http://localhost:8888
```

Replace `my-stripe-secret-key` with your Stripe test or live key. Substitute `http://localhost:8888` for your local (or live) shop URL.

## Stripe checkout
Stripe's [Node.js library for the Stripe API](https://github.com/stripe/stripe-node) is used to handle payment processing. At checkout time, `create-session.php` creates a Stripe object with `\Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY'])`. The basket items are enumerated and a checkout session is created with shipping options, payment methods and a success or failure callback URL. For full details see Stripe's [checkout session documentation](https://stripe.com/docs/api/checkout/sessions/).

I used the [PM2](https://pm2.keymetrics.io/) daemon process manager to keep Stripe's Node.js backend online 24/7. Over many years of operation it never missed a beat.

## Hosting requirments
My commerce site ran reliably on a Linode 1GB Nanode server and required almost zero maintenance, apart from periodically updating shop settings and inventories. Your hosting needs may differ.

