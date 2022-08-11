ARG IMAGE
FROM ${IMAGE}

# Set SSH private key, make sure you have it installed on ~/.ssh/id_rsa
ARG SSH_PRIVATE_KEY
RUN echo "$SSH_PRIVATE_KEY" >> ~/.ssh/id_rsa &&\
    chmod 600 ~/.ssh/id_rsa

ARG DOWNGRADE_COMPOSER
USER root
RUN if [ ${DOWNGRADE_COMPOSER} = "1" ]; then composer self-update --1; fi
USER docker
