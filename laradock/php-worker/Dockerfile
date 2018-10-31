#
#--------------------------------------------------------------------------
# Image Setup
#--------------------------------------------------------------------------
#

ARG PHP_VERSION=${PHP_VERSION}
FROM php:${PHP_VERSION}-alpine

LABEL maintainer="Mahmoud Zalt <mahmoud@zalt.me>"

RUN apk --update add wget \
  curl \
  git \
  build-base \
  libmemcached-dev \
  libmcrypt-dev \
  libxml2-dev \
  zlib-dev \
  autoconf \
  cyrus-sasl-dev \
  libgsasl-dev \
  supervisor

RUN docker-php-ext-install mysqli mbstring pdo pdo_mysql tokenizer xml pcntl
RUN pecl channel-update pecl.php.net && pecl install memcached mcrypt-1.0.1 && docker-php-ext-enable memcached

#Install BCMath package:
ARG INSTALL_BCMATH=false
RUN if [ ${INSTALL_BCMATH} = true ]; then \
    docker-php-ext-install bcmath \
;fi

# Install PostgreSQL drivers:
ARG INSTALL_PGSQL=false
RUN if [ ${INSTALL_PGSQL} = true ]; then \
    apk --update add postgresql-dev \
        && docker-php-ext-install pdo_pgsql \
;fi

RUN rm /var/cache/apk/* \
    && mkdir -p /var/www

###########################################################################
# xDebug:
###########################################################################

ARG INSTALL_XDEBUG=false

RUN if [ ${INSTALL_XDEBUG} = true ]; then \
  # Install the xdebug extension
  if [ $(php -r "echo PHP_MAJOR_VERSION;") = "5" ]; then \
    pecl install xdebug-2.5.5; \
  else \
    pecl install xdebug; \
  fi && \
  docker-php-ext-enable xdebug \
;fi

# Copy xdebug configuration for remote debugging
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN sed -i "s/xdebug.remote_autostart=0/xdebug.remote_autostart=1/" /usr/local/etc/php/conf.d/xdebug.ini && \
    sed -i "s/xdebug.remote_enable=0/xdebug.remote_enable=1/" /usr/local/etc/php/conf.d/xdebug.ini && \
    sed -i "s/xdebug.cli_color=0/xdebug.cli_color=1/" /usr/local/etc/php/conf.d/xdebug.ini


#
#--------------------------------------------------------------------------
# Optional Supervisord Configuration
#--------------------------------------------------------------------------
#
# Modify the ./supervisor.conf file to match your App's requirements.
# Make sure you rebuild your container with every change.
#

COPY supervisord.conf /etc/supervisord.conf

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisord.conf"]

#
#--------------------------------------------------------------------------
# Optional Software's Installation
#--------------------------------------------------------------------------
#
# If you need to modify this image, feel free to do it right here.
#
    # -- Your awesome modifications go here -- #

#
#--------------------------------------------------------------------------
# Check PHP version
#--------------------------------------------------------------------------
#

RUN php -v | head -n 1 | grep -q "PHP ${PHP_VERSION}."

#
#--------------------------------------------------------------------------
# Final Touch
#--------------------------------------------------------------------------
#

WORKDIR /etc/supervisor/conf.d/
