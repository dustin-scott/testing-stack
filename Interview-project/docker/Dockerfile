FROM alpine:latest
COPY ./Interview-project /usr/src/app
WORKDIR /usr/src/app

RUN apk upgrade && \
    apk add --no-cache \
        bash \
        chromium \
        chromium-chromedriver \
        maven \
        openjdk17 \
        openssh \
        poppler-utils \
        sudo \
        vim \
        vimdiff && \
    rm -rf /var/cache/apk/*

SHELL ["/bin/bash", "-c"]
