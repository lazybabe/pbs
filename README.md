本工具支持YAF项目在开发环境的构建和启动

安装pbs
--
mkdir -p ~/devspace

git clone https://github.com/qinyuguang/pbs.git

cd pbs

sudo bin/init.sh


创建项目
----

sudo mkdir -p /usr/local/nginx/conf/include

mkdir -p ~/devspace

cd ~/devspace

git clone https://github.com/qinyuguang/libyaf.git


执行buildprj ，按提示输入参数，即可创建一个基于YAF框架的项目
进入创建好的项目目录，执行 pbs 查看可用参数

执行 pbs build ，启动项目

执行 composer install ，安装依赖



依赖
--

**nginx**
/usr/local/nginx
**php-fpm**
/usr/local/php

编辑/usr/local/nginx/conf/nginx.conf，增加一行
include include/*.conf;
