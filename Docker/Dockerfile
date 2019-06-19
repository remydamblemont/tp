FROM php:7.3.5-apache-stretch
MAINTAINER RemDav <contact@remydamblemont.fr>
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get update && apt-get install -y \
    libzip-dev \
    curl \
    git \
    libxml2-dev \
    libicu-dev\
    zlib1g-dev \
    unzip \
    libpq-dev \
    software-properties-common \
    nodejs \
    && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-configure zip --with-libzip; \
	docker-php-ext-install \
		intl \
		pdo \
		pdo_pgsql \
		zip \
	; \
	pecl install \
		apcu-5.1.17 \
	; \
	pecl clear-cache; \
	docker-php-ext-enable \
		apcu \
		opcache \
    && docker-php-source delete \
    && php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
WORKDIR /var/www/html
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Paris /etc/localtime
ADD Conf/Host/Run.sh /usr/src/app/Run.sh
ADD Conf/php.ini /usr/local/etc/php/
ADD Conf/.bashrc /root/
RUN ["chmod", "+x", "/usr/src/app/Run.sh"]
CMD ["/usr/src/app/Run.sh"]