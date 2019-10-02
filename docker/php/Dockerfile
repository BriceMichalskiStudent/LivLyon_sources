FROM php:7.0-fpm

ARG UID=1000
ARG PLATFORM_OS=Linux

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

# Get packages and build
RUN set -xe; \
    apt update; \
    apt install -y ${PHPIZE_DEPS} \
        libxml2-dev \
        libfontconfig1 \
        libxrender1 \
        libxext6 \
        libzip-dev \
        gnupg \
        vim \
        procps \
        git \
        unzip \
        ssh \
        zsh \
        bash-completion \
    ; \
    docker-php-ext-install -j$(nproc) opcache pdo_mysql bcmath intl zip mbstring exif pcntl sockets; \
    usermod -u ${UID} www-data; \
    echo  '. /etc/bash_completion' >> /var/www/.bashrc; \
    chown -R www-data:www-data /var/www;

# Xdebug settings
RUN set -xe; \
    echo "xdebug.remote_enable=On" >> ${PHP_INI_DIR}/conf.d/docker-php-ext-xdebug.ini; \
    echo "xdebug.remote_autostart=On" >> ${PHP_INI_DIR}/conf.d/docker-php-ext-xdebug.ini; \
    echo "xdebug.profiler_enable_trigger=On" >> ${PHP_INI_DIR}/conf.d/docker-php-ext-xdebug.ini; \
    if [ "${PLATFORM_OS}" = "Linux" ];then \
        echo "xdebug.remote_connect_back=On" >> ${PHP_INI_DIR}/conf.d/docker-php-ext-xdebug.ini; \
    elif [ "${PLATFORM_OS}" = "Darwin" ];then \
        echo "xdebug.remote_host=docker.for.mac.localhost" >> ${PHP_INI_DIR}/conf.d/docker-php-ext-xdebug.ini; \
    fi;

USER www-data

# auto completion and shell custom
RUN set -xe; \
    curl -sL https://github.com/robbyrussell/oh-my-zsh/raw/master/tools/install.sh | zsh || true; \
    echo 'setopt correct' >> /var/www/.zshrc;

VOLUME ["/var/www/html"]
