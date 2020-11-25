FROM centos:7

ENV LANG en_US.UTF-8
ENV TZ Europe/Berlin

RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
    && rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

RUN yum -y install \
    httpd \
    php70w \
    php70w-cli \
    php70w-iconv \
    php70w-intl \
    php70w-json \
    php70w-mbstring \
    php70w-mcrypt \
    php70w-opcache \
    php70w-pdo \
    php70w-pdo_mysql \
    php70w-xml \
    mod_ssl \
    openssl

ENV COMPOSER_MEMORY_LIMIT -1
RUN php -r "copy('https://getcomposer.org/composer.phar', '/usr/local/bin/composer');" \
    && chmod ugo+x /usr/local/bin/composer \
    && composer self-update

COPY ./bin/httpd-foreground /usr/bin/httpd-foreground
COPY ./etc/php.d/php.ini /etc/php.d/php.ini
COPY ./etc/php.d/opcache.ini /etc/php.d/opcache.ini
COPY ./etc/httpd/apache.conf /etc/httpd/conf.d/apache.conf
COPY ./etc/httpd/welcome.conf /etc/httpd/conf.d/welcome.conf

EXPOSE 80

WORKDIR /var/www/shop

CMD ["/usr/bin/httpd-foreground"]
