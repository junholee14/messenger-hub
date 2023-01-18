FROM php:8.1.2-fpm

# Timezone 설정
ENV TZ Asia/Seoul

# Composer 설치
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# 필요 패키지 설치
RUN apt-get update --fix-missing \
    && apt-get install -y --no-install-recommends git \
    libssh2-1-dev libssh2-1 \
    zip \
    libssl-dev \
    openssl \
    libmagickwand-dev \
    imagemagick \
    libzip-dev \
    curl \
    libonig-dev \
    vim \
    default-mysql-client \
    npm \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

#RUN apt-get update --fix-missing \
#    && curl -sL https://deb.nodesource.com/setup_14.x | bash - \
#    && apt-get install -y --no-install-recommends nodejs npm

RUN docker-php-source extract \
    && mkdir -p /usr/src/php/ext/ssh2 \
    && curl -fsSL https://github.com/php/pecl-networking-ssh2/archive/master.tar.gz | tar xvz -C /usr/src/php/ext/ssh2 --strip 1 \
    && docker-php-ext-install ssh2 \
    && docker-php-source delete

RUN docker-php-ext-install bcmath mysqli soap pdo_mysql gd zip exif \
    bcmath \
    calendar \
    iconv \
    intl \
    pdo \
    pcntl \
#    @link https://github.com/docker-library/php/issues/1231
#    tokenizer \ 이미 설치되어 있는 경우 생략, docker run --rm php:8.1.2-fpm php -i | grep -i token 를 통해 확인
    xml \
    soap

# PHP 확장 모듈 설치
RUN pecl install -o -f redis \
    && pecl install -o -f imagick \
    && rm -rf /tmp/pear \
    && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
    && echo "extension=imagick.so" > /usr/local/etc/php/conf.d/imagick.ini
