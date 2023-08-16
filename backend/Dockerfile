FROM php:8.1-apache

RUN apt-get update \ 
    && apt-get install -y apt-utils \
	&& apt-get install -y nano \
	&& apt-get install -y git \
	&& apt-get install -y curl \
	# && apt-get install -y zip \
	# && apt-get install -y unzip 
	&& apt-get install -y libzip-dev \
	&& apt-get install -y libxml2-dev \
    # && apt-get install -y zlib1g 
    && apt-get install -y openssl \
    && apt-get install -y libssl-dev 




# install composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/ \
    && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer


#install mysql
RUN docker-php-ext-install pdo_mysql mysqli

#install postgres
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

#install mongodb
RUN pecl install mongodb && docker-php-ext-enable mongodb

#install redis
RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

#install zip
RUN docker-php-ext-install zip

#install calendar
RUN docker-php-ext-install calendar && docker-php-ext-enable calendar

#install other laravel requirements
RUN docker-php-ext-install bcmath pcntl soap

# install gd, tidy
RUN apt install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libtidy-dev \
        libzip-dev \
        ghostscript \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd exif tidy

#RUN pecl install xdebug
#RUN docker-php-ext-enable xdebug

#RUN echo "" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#RUN echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#RUN echo "xdebug.discover_client_host=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini


RUN a2enmod rewrite

ENV PATH="~/.composer/vendor/bin:./vendor/bin:${PATH}"

WORKDIR "/var/www/html"
