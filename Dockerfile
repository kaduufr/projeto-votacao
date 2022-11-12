FROM webdevops/php-apache-dev:8.1

# Install nodejs
RUN apt-get update && \
    curl -fsSL https://deb.nodesource.com/setup_19.x | bash - && \
    apt-get install -y nodejs

WORKDIR /app
