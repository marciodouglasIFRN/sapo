FROM gitpod/workspace-full

USER root

# Install custom tools, runtime, etc. using apt-get
# For example, the command below would install "bastet" - a command line tetris clone:
#
RUN apt-get update 
RUN apt-get install -y mysql-server 
RUN sed -i 's/;extension=pdo_mysql/extension=pdo_mysql/g' /etc/php/7.2/cli/php.ini
# RUN /etc/php/7.2/cli/php.ini << "extension=pdo_mysql"
#
# More information: https://www.gitpod.io/docs/42_config_docker/
